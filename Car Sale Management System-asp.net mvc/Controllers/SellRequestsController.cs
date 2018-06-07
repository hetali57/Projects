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
    public class SellRequestsController : Controller
    {
        private VintageDBEntities7 db = new VintageDBEntities7();

        // GET: SellRequests
        [HttpPost]
        public ActionResult Index()
        {
            var sellRequests = db.SellRequests.Include(s => s.Customer);
            return View(sellRequests.ToList());
        }

        public ActionResult Index(string search)
        {
            return View(db.SellRequests.Where(x => x.Customer.Name.Contains(search) || search == null).ToList());
        }

        // GET: SellRequests/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            SellRequest sellRequest = db.SellRequests.Find(id);
            if (sellRequest == null)
            {
                return HttpNotFound();
            }
            return View(sellRequest);
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Details([Bind(Include = "Id,Make,Model,Year,Price,Kms,EnginLitres,Transmission,Fuel_Type,IsUsed,Color,CustomerID,Image")] SellRequest sellRequest)
        {
            if (ModelState.IsValid)
            {
                SellRequest sentRequest = db.SellRequests.Find(sellRequest.Id);
                Car car = new Car()
                {
                    Make = sentRequest.Make,
                    Model = sentRequest.Model,
                    Year = sentRequest.Year,
                    Price = sentRequest.Price,
                    Kms = sentRequest.Kms,
                    EnginLitres = sentRequest.EnginLitres,
                    Transmission = sentRequest.Transmission,
                    Fuel_Type = sentRequest.Fuel_Type,
                    IsUsed = sentRequest.IsUsed,
                    Color = sentRequest.Color,
                    CustomerID = sentRequest.CustomerID,
                    Image = sentRequest.Image
                };
                db.Cars.Add(car);
                SellRequest soldRequest = db.SellRequests.Find(sellRequest.Id);
                db.SellRequests.Remove(soldRequest);
                Session["RequestID"] = sellRequest.Id;
                db.SaveChanges();
                return RedirectToAction("Index", "Home");
            }
            return View(sellRequest);
        }


        // GET: SellRequests/Create
        public ActionResult Create()
        {
            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", Session["LoggedCustomerID"]);

            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Make,Model,Year,Price,Kms,EnginLitres,Transmission,Fuel_Type,IsUsed,Color,CustomerID,Image")] SellRequest sellRequest)
        {
            if (ModelState.IsValid)
            {
                db.SellRequests.Add(sellRequest);
                db.SaveChanges();

                return RedirectToAction("Index", "Home");
            }

            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", sellRequest.CustomerID);
            return View(sellRequest);
        }

        // GET: SellRequests/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            SellRequest sellRequest = db.SellRequests.Find(id);
            if (sellRequest == null)
            {
                return HttpNotFound();
            }
            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", sellRequest.CustomerID);
            return View(sellRequest);
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,Make,Model,Year,Price,Kms,EnginLitres,Transmission,Fuel_Type,IsUsed,Color,CustomerID,Image")] SellRequest sellRequest)
        {
            if (ModelState.IsValid)
            {
                db.Entry(sellRequest).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.CustomerID = new SelectList(db.Customers, "Id", "Name", sellRequest.CustomerID);
            return View(sellRequest);
        }

        // GET: SellRequests/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            SellRequest sellRequest = db.SellRequests.Find(id);
            if (sellRequest == null)
            {
                return HttpNotFound();
            }
            return View(sellRequest);
        }

        // POST: SellRequests/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            SellRequest sellRequest = db.SellRequests.Find(id);
            db.SellRequests.Remove(sellRequest);
            db.SaveChanges();
            return RedirectToAction("Index");
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
