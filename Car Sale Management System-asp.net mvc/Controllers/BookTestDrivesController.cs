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
    public class BookTestDrivesController : Controller
    {
        private VintageDBEntities7 db = new VintageDBEntities7();

        // GET: BookTestDrives
        [HttpPost]
        public ActionResult Index()
        {
            return View(db.BookTestDrives.ToList());
        }

        public ActionResult Index(string search)
        {
            return View(db.BookTestDrives.Where(x => x.FirstName.Contains(search) || x.LastName.Contains(search) || search == null).ToList());
        }

        // GET: BookTestDrives/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            BookTestDrive bookTestDrive = db.BookTestDrives.Find(id);
            if (bookTestDrive == null)
            {
                return HttpNotFound();
            }
            return View(bookTestDrive);
        }

        // GET: BookTestDrives/Create
        public ActionResult Create()
        {
            return View();
        }

        // POST: BookTestDrives/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,FirstName,LastName,Email,Phone,BestDate")] BookTestDrive bookTestDrive)
        {
            if (ModelState.IsValid)
            {
                db.BookTestDrives.Add(bookTestDrive);
                db.SaveChanges();
                return RedirectToAction("Details", new { id=bookTestDrive.Id });
            }

            return View(bookTestDrive);
        }

        // GET: BookTestDrives/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            BookTestDrive bookTestDrive = db.BookTestDrives.Find(id);
            if (bookTestDrive == null)
            {
                return HttpNotFound();
            }
            return View(bookTestDrive);
        }

        // POST: BookTestDrives/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,FirstName,LastName,Email,Phone,BestDate")] BookTestDrive bookTestDrive)
        {
            if (ModelState.IsValid)
            {
                db.Entry(bookTestDrive).State = System.Data.Entity.EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Index");
            }
            return View(bookTestDrive);
        }

        // GET: BookTestDrives/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            BookTestDrive bookTestDrive = db.BookTestDrives.Find(id);
            if (bookTestDrive == null)
            {
                return HttpNotFound();
            }
            return View(bookTestDrive);
        }

        // POST: BookTestDrives/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            BookTestDrive bookTestDrive = db.BookTestDrives.Find(id);
            db.BookTestDrives.Remove(bookTestDrive);
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
