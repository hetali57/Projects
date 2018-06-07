using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using Vintage_World.Models;

namespace Vintage_World.Controllers
{
    public class CarsController : Controller
    {
        private VintageDBEntities7 db = new VintageDBEntities7();

        // GET: Cars
        [HttpPost]
        public ActionResult Index(string TypeList, string MakeList, string ModelList, string YearList)
        {

            return View(db.Cars.Where(x => x.IsUsed.Contains(TypeList) && x.Make.Contains(MakeList) && x.Model.Contains(ModelList) && x.Year.Contains(YearList)).ToList());
        }

        public ActionResult List()
        {
            return View(db.Cars.ToList());
        }

        [HttpGet]
        public ActionResult Index(string search)
        {
            return View(db.Cars.Where(x => x.Make.Contains(search) || search == null).ToList());
        }

        // GET: Cars/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Car car = db.Cars.Find(id);
            if (car == null)
            {
                return HttpNotFound();
            }
            Session["LoginBuyID"] = id;
            Session["Amount"] = car.Price;
            return View(car);
        }

        // GET: Cars/Create
        public ActionResult Create()
        {
            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", Session["LoggedCustomerID"]);
            List<SelectListItem> list4 = new List<SelectListItem>
            {
                new SelectListItem
                {
                    Text = "New",
                    Value = "New"
                },
                new SelectListItem
                {
                    Text = "Pre-Owned",
                    Value = "Pre-Owned"
                },
                new SelectListItem
                {
                    Text = "Certified",
                    Value = "Certified"
                }
            };
            ViewBag.typelist = list4;
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Make,Model,Year,Price,Kms,EnginLitres,Transmission,Fuel_Type,IsUsed,Color,CustomerID,Image")] Car car)
        {
            if (Session["LoginCustomerName"].Equals("Admin"))
            {
                if (ModelState.IsValid)
                {
                    db.Cars.Add(car);
                    SellRequest soldRequest = db.SellRequests.Find(car.Id);
                    db.SellRequests.Remove(soldRequest);
                    db.SaveChanges();
                    if (Session["LoginCustomerName"].Equals("Admin"))
                    {
                        return RedirectToAction("List");
                    }
                }

                ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", car.CustomerID);
                return View(car);
            }
            else
            {
                return RedirectToAction("Index", "Home");
            }
        }

        public ActionResult ApprovedSellList(int id)
        {
            return View(db.Cars.Where(x => x.CustomerID == id).ToList());
        }

        public ActionResult SellRequest()
        {
            return View();
        }

        // GET: Cars/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Car car = db.Cars.Find(id);
            if (car == null)
            {
                return HttpNotFound();
            }
            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", car.CustomerID);
            return View(car);
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,Make,Model,Year,Price,Kms,EnginLitres,Transmission,Fuel_Type,IsUsed,Color,CustomerID,Image")] Car car)
        {
            if (ModelState.IsValid)
            {
                db.Entry(car).State = System.Data.Entity.EntityState.Modified;
                db.SaveChanges();
                if (Session["LoginCustomerName"].Equals("Admin"))
                {
                    return RedirectToAction("List");
                }
                else
                {
                    return RedirectToAction("ApprovedSellList", new { id = car.CustomerID });
                }
            }
            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", car.CustomerID);
            return View(car);
        }

        // GET: Cars/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Car car = db.Cars.Find(id);
            if (car == null)
            {
                return HttpNotFound();
            }
            return View(car);
        }

        // POST: Cars/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Car car = db.Cars.Find(id);
            db.Cars.Remove(car);
            db.SaveChanges();
            return RedirectToAction("List");
        }

        protected override void Dispose(bool disposing)
        {
            if (disposing)
            {
                db.Dispose();
            }
            base.Dispose(disposing);
        }
    }
}
