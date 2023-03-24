using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UnitTestsExample
{
    public class FizzBuzzConverter
    {
        private IValueConverter defaultConverter;
        private IValueConverter[] valueConverters;
        public FizzBuzzConverter(IValueConverter defaultConverter, params IValueConverter[] converter)
        {
            this.valueConverters = converter;
            this.defaultConverter = defaultConverter;
        }

        public String Convert(int number)
        {
            string res = "";

            foreach(var converter in this.valueConverters)
            {
                res += converter.Convert(number);
            }

            if (string.IsNullOrEmpty(res))
            {
                return this.defaultConverter.Convert(number);
            }

            return res;
        }

    }

    public interface IValueConverter
    {
        string Convert(int number);
    }

    public class FizzConvert : IValueConverter
    {
        public string Convert(int number)
        {

            if (number % 3 == 0) return "Fizz";

            return "";
        }
    }

    public class BuzzConvert : IValueConverter
    {
        public string Convert(int number)
        {

            if (number % 5 == 0) return "Buzz";

            return "";
        }
    }

    public class NumberConvert : IValueConverter
    {
        public string Convert(int number)
        {
            return number.ToString();
        }
    }
}
