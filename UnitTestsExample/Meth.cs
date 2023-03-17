using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UnitTestsExample
{
    public class Meth
    {
        public int Add(int x, int y)
        {
            return x + y;
        }

        public int Sub(int x, int y)
        {
            return x - y;
        }
        public int Mul(int x, int y)
        {
            return x * y;
        }
        public double Div(int x, int y)
        {
            return (double)x / y;
        }
        public int Fuck(int x)
        {
            int ret = 1;
            for(int i = 1; i <= x; i++)
            {
                ret *= i;
            }
            return ret;
        }
        public int Mod(int x, int y)
        {
            return x % y;
        }
    }

}
