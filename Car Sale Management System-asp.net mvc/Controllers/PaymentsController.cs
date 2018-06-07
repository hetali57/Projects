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
    public class PaymentsController : Controller
    {
        private VintageDBEntities7 db = new VintageDBEntities7();

        // GET: Payments
        [HttpPost]
        public ActionResult Index()
        {
            var payments = db.Payments.Include(p => p.Car).Include(p => p.Customer);
            return View(payments.ToList());
        }

        public ActionResult Index(string search)
        {
            return View(db.Payments.Where(x => x.Customer.Name.Contains(search) || search == null).ToList());
        }

        // GET: Payments/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Payment payment = db.Payments.Find(id);
            if (payment == null)
            {
                return HttpNotFound();
            }
            return View(payment);
        }

        // GET: Payments/Create
        public ActionResult Create()
        {

            ViewBag.Car_Model = new SelectList(db.Cars, "Id", "Make", Session["LoginBuyID"]);
            ViewBag.Customer_Name = new SelectList(db.Customers, "Id", "Name", Session["LoggedCustomerID"]);
            ViewBag.Amount = Session["Amount"];
            List<SelectListItem> list3 = new List<SelectListItem>
            {
                new SelectListItem
                {
                    Text = "Visa SCENE",
                    Value = "Visa SCENE"
                },
                new SelectListItem
                {
                    Text = "Mastercard",
                    Value = "Mastercard"
                },
                new SelectListItem
                {
                    Text = "Golden Card",
                    Value = "Golden Card"
                },
                new SelectListItem
                {
                    Text = "Direct Payment",
                    Value = "Direct Payment"
                }
            };

            ViewBag.paymenttype = list3;
            return View();
        }

        // POST: Payments/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,AccountNumber,Amount,PurchaseDate,PaymentType,Customer_Name,Car_Model")] Payment payment)
        {
            if (ModelState.IsValid)
            {
                db.Payments.Add(payment);
                db.SaveChanges();
                return RedirectToAction("Details", new { id = payment.Id });
            }

            ViewBag.Car_Model = new SelectList(db.Cars, "Id", "Make", payment.Car_Model);
            ViewBag.Customer_Name = new SelectList(db.Customers, "Id", "Name", payment.Customer_Name);
            return View(payment);
        }

        // GET: Payments/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Payment payment = db.Payments.Find(id);
            if (payment == null)
            {
                return HttpNotFound();
            }
            ViewBag.Car_Model = new SelectList(db.Cars, "Id", "Make", payment.Car_Model);
            ViewBag.Customer_Name = new SelectList(db.Customers, "Id", "Name", payment.Customer_Name);
            return View(payment);
        }

        // POST: Payments/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,AccountNumber,Amount,PurchaseDate,PaymentType,Customer_Name,Car_Model")] Payment payment)
        {
            if (ModelState.IsValid)
            {
                db.Entry(payment).State = System.Data.Entity.EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index", "Home");
            }
            ViewBag.Car_Model = new SelectList(db.Cars, "Id", "Make", payment.Car_Model);
            ViewBag.Customer_Name = new SelectList(db.Customers, "Id", "Name", payment.Customer_Name);
            return View(payment);
        }

        // GET: Payments/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Payment payment = db.Payments.Find(id);
            if (payment == null)
            {
                return HttpNotFound();
            }
            return View(payment);
        }

        // POST: Payments/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Payment payment = db.Payments.Find(id);
            db.Payments.Remove(payment);
            db.SaveChanges();
            return RedirectToAction("Index", "Home");
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
