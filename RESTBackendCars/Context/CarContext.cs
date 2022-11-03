using RESTBackendCars.Model;
using Microsoft.EntityFrameworkCore;

namespace RESTBackendCars.Context
{
    public class CarContext : DbContext
    {
        public CarContext(DbContextOptions<CarContext> options)
            : base(options)
        {
        }

        public DbSet<Car> Cars { get; set; }
    }
}
