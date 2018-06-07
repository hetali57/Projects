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
    public class ChatBoxesController : Controller
    {
        private VintageDBEntities7 db = new VintageDBEntities7();

        // GET: ChatBoxes
        public ActionResult Index()
        {
            return View(db.ChatBoxes.ToList());
        }

        // GET: ChatBoxes/Details/5
        public ActionResult Details(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ChatBox chatBox = db.ChatBoxes.Find(id);
            if (chatBox == null)
            {
                return HttpNotFound();
            }
            return View(chatBox);
        }

        // GET: ChatBoxes/Create
        public ActionResult Create()
        {
            ViewBag.customername = Session["LoginCustomerName"];
            ViewBag.customermail = Session["LoginCustomerID"];
            ChatBox chatBox = db.ChatBoxes.Find(1);
            if (Session["LoginCustomerName"] == null)
            {
                ViewBag.reply = "";
            }
            else
            {
                ViewBag.reply = chatBox.Reply;
            }
            ChatBox chatBox2 = db.ChatBoxes.Find(Session["ChatID"]);
            return View();
        }

        // POST: ChatBoxes/Create
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Create([Bind(Include = "Id,Name,Email,Message,Reply")] ChatBox chatBox)
        {
            if (ModelState.IsValid)
            {
                db.ChatBoxes.Add(chatBox);
                db.SaveChanges();
                Session["ChatID"] = chatBox.Id;
                return RedirectToAction("Index", "Home");
            }

            return View(chatBox);
        }

        // GET: ChatBoxes/Edit/5
        public ActionResult Edit(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ChatBox chatBox = db.ChatBoxes.Find(id);
            if (chatBox == null)
            {
                return HttpNotFound();
            }
            ViewBag.name = chatBox.Name;
            ViewBag.message = chatBox.Message;
            if (ViewBag.reply == null)
            {
                ViewBag.reply = " ";
            }
            else
            {
                ViewBag.reply = chatBox.Reply;
            }

            Session["chatname"] = chatBox.Name;
            Session["chatmessage"] = chatBox.Message;
            Session["chatmail"] = chatBox.Email;
            return View(chatBox);
        }

        // POST: ChatBoxes/Edit/5
        // To protect from overposting attacks, please enable the specific properties you want to bind to, for 
        // more details see https://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public ActionResult Edit([Bind(Include = "Id,Name,Email,Message,Reply")] ChatBox chatBox)
        {
            if (ModelState.IsValid)
            {
                chatBox.Name = Session["chatname"].ToString();
                chatBox.Email = Session["chatmail"].ToString();
                chatBox.Message = Session["chatmessage"].ToString();
                db.Entry(chatBox).State = EntityState.Modified;
                db.SaveChanges();
                return RedirectToAction("Admin", "Customers");
            }
            return View(chatBox);
        }

        // GET: ChatBoxes/Delete/5
        public ActionResult Delete(int? id)
        {
            if (id == null)
            {
                return new HttpStatusCodeResult(HttpStatusCode.BadRequest);
            }
            ChatBox chatBox = db.ChatBoxes.Find(id);
            if (chatBox == null)
            {
                return HttpNotFound();
            }
            return View(chatBox);
        }

        // POST: ChatBoxes/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public ActionResult DeleteConfirmed(int id)
        {
            ChatBox chatBox = db.ChatBoxes.Find(id);
            db.ChatBoxes.Remove(chatBox);
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
