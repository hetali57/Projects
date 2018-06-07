using System;
using System.Collections.Generic;
using System.Data;
using System.Data.Entity;
using System.Linq;
using System.Net;
using System.Web;
using System.Web.Mvc;
using HMS.Models;

namespace HMS.Controllers
{
    public class Patient2Controller : Controller
    {
        private Database1Entities6 db = new Database1Entities6();

        // GET: Patient2
        public ActionResult Index()
        {
            var patient2 = db.Patient2.Include(p => p.Doctor);
            return View(patient2.ToList());
        }

        // GET: Patient2/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Patient2 patient2 = db.Patient2.Find(id);
            if (patient2 == null)
            {
                return HttpNotFound();
            }
            return View(patient2);
        }

        // GET: Patient2/Create
        public ActionResult Create()
        {
            ViewBag.DoctorId = new SelectList(db.Doctors, "Id", "Name");
            return View();
        }

        // POST: Patient2/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Name,Email,Address,Telephone,dateOfBirth,DoctorId")] Patient2 patient2)
        {
            if (ModelState.IsValid)
            {
                db.Patient2.Add(patient2);
                db.SaveChanges();
                return RedirectToAction("Index");
            }

            ViewBag.DoctorId = new SelectList(db.Doctors, "Id", "Name", patient2.DoctorId);
            return View(patient2);
        }

        // GET: Patient2/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Patient2 patient2 = db.Patient2.Find(id);
            if (patient2 == null)
            {
                return HttpNotFound();
            }
            ViewBag.DoctorId = new SelectList(db.Doctors, "Id", "Name", patient2.DoctorId);
            return View(patient2);
        }

        // POST: Patient2/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,Name,Email,Address,Telephone,dateOfBirth,DoctorId")] Patient2 patient2)
        {
            if (ModelState.IsValid)
            {
                db.Entry(patient2).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            ViewBag.DoctorId = new SelectList(db.Doctors, "Id", "Name", patient2.DoctorId);
            return View(patient2);
        }

        // GET: Patient2/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            Patient2 patient2 = db.Patient2.Find(id);
            if (patient2 == null)
            {
                return HttpNotFound();
            }
            return View(patient2);
        }

        // POST: Patient2/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            Patient2 patient2 = db.Patient2.Find(id);
            db.Patient2.Remove(patient2);
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
