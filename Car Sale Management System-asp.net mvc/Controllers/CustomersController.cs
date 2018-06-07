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
    public class CustomersController : Controller
    {
        private VintageDBEntities7 db = new VintageDBEntities7();

        // GET: Customers
        public ActionResult Index(string search)
        {
            return View(db.Customers.Where(x => x.Name.Contains(search) && x.Name != "Admin" || search == null).ToList());
        }

        [HttpPost]
        public ActionResult Index()
        {
            return View(db.Customers.Where(x => x.Name != "Admin").ToList());
        }

        // GET: Customers/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Customer customer = db.Customers.Find(id);
            if (customer == null)
            {
                return HttpNotFound();
            }
            return View(customer);
        }

        // GET: Customers/Create
        public ActionResult Create()
        {
            return View();
        }


        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Name,Address,City,Email,Password")] Customer customer)
        {
            if (ModelState.IsValid)
            {
                db.Customers.Add(customer);
                db.SaveChanges();
                return RedirectToAction("Login");
            }

            return View(customer);
        }

        public ActionResult SellRequest()
        {
            return View();
        }

        public ActionResult Login()
        {
            Customer cust = new Customer();
            Session["shopnow"] = db.Customers.Select(x => x.Name);
            return View();
        }

        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Login(Customer cust)
        {
            if (ModelState.IsValid)
            {
                using (VintageDBEntities7 dc = new VintageDBEntities7())
                {
                    var v = dc.Customers.Where(model => model.Email.Equals(cust.Email) && model.Password.Equals(cust.Password)).FirstOrDefault();
                    if (v != null)
                    {
                        Session["LoginCustomerID"] = v.Email.ToString();
                        Session["LoginCustomerName"] = v.Name.ToString();
                        Session["LoggedCustomerID"] = v.Id.ToString();
                        if (Session["LoginBuyID"] == null)
                        {
                            return RedirectToAction("Index", "Home");
                        }
                        else
                        {
                            Session["shopnow"] = v.Name;
                            return RedirectToAction("Details", "Cars", new { id = Session["LoginBuyID"] });
                        }
                    }
                }
            }
            return View(cust);
        }

        public ActionResult AfterLogin()
        {
            if (Session["LoginCustomerID"] != null)
            {
                return View();
            }
            else
            {
                return RedirectToAction("Index");
            }
        }

        public ActionResult Logout()
        {
            Session.Abandon();
            return RedirectToAction("Index", "Home");
        }

        public ActionResult Admin()
        {
            return View();
        }

        // GET: Customers/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Customer customer = db.Customers.Find(id);
            if (customer == null)
            {
                return HttpNotFound();
            }
            return View(customer);
        }

        // POST: Customers/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,Name,Address,City,Email,Password")] Customer customer)
        {
            if (ModelState.IsValid)
            {
                db.Entry(customer).State = EntityState.Modified;
                db.SaveChanges();
                if (Session["LoginCustomerName"].Equals("Admin"))
                {
                    return RedirectToAction("Index", "Customers", null);
                }
                else
                {
                    return RedirectToAction("Details", "Customers", new { id = Session["LoggedCustomerID"] });
                }
            }
            return View(customer);
        }

        // GET: Customers/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Customer customer = db.Customers.Find(id);
            if (customer == null)
            {
                return HttpNotFound();
            }
            return View(customer);
        }

        // POST: Customers/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Customer customer = db.Customers.Find(id);
            db.Customers.Remove(customer);
            db.SaveChanges();
            return RedirectToAction("Index", "Customers", null);
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
