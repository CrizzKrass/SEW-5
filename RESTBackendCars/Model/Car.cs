namespace RESTBackendCars.Model
{
    public class Car
    {
        public int Id { get; set; }
        public String Hersteller { get; set; }
        public String Typenbezeichnung { get; set; }
        public int Verkaufspreis { get; set; }
        public DateTime Service { get; set; }
        public int Leistung { get; set; }
        public int KmStand { get; set; }
    }
}
