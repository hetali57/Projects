using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using Vintage_World.Models;
using static Vintage_World.Models.VintageDBEntities7;

namespace Vintage_World.Controllers
{
    public class HomeController : Controller
    {
        VintageDBEntities7 db = new VintageDBEntities7();
        public ActionResult Index()
        {
            //SelectList list = new SelectList(carList, "Make", "Make");
            var list = db.Cars.Select(p => p.Make).Distinct().ToList();
            var list2 = db.Cars.Select(p => p.Model).Distinct().ToList();
            List<SelectListItem> list3 = new List<SelectListItem>
            {
                new SelectListItem
                {
                    Text = "2018",
                    Value = "2018"
                },
                new SelectListItem
                {
                    Text = "2017",
                    Value = "2017"
                }
            };
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

            ViewBag.carlistname = new SelectList(list);
            ViewBag.modellist = new SelectList(list2);
            ViewBag.yearlist = list3;
            ViewBag.typelist = list4;

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }

        public ActionResult Service()
        {
            ViewBag.Message = "Your service page.";

            return View();
        }

        public ActionResult Login()
        {
            ViewBag.Message = "Your Login page.";

            return View();
        }
        public ActionResult Welcome()
        {
            return View();
        }
    }
}