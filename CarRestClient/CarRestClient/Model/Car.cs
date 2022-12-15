using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CarRestClient.Model
{
    public class Car
    {
        public int Id { get; set; }
        public String Hersteller { get; set; }
        public String Typenbezeichnung { get; set; }
        public int Verkaufspreis { get; set; }
        public DateTime Service { get; set; } = DateTime.Now;
        public int Leistung { get; set; }
        public int KmStand { get; set; }
    }
}
