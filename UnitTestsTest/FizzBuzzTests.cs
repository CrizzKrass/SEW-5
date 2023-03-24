using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using UnitTestsExample;

namespace UnitTestsTest
{
    [TestFixture]
    public class FizzBuzzTests
    {
        [TestCase(1, ExpectedResult = "1")]
        [TestCase(3, ExpectedResult = "Fizz")]
        [TestCase(5, ExpectedResult = "Buzz")]
        [TestCase(15, ExpectedResult = "FizzBuzz")]

        public String GivenNumberIsConvertedCorrectly(int number)
        {
            var sut = new FizzBuzzConverter(new NumberConvert(), new FizzConvert(), new BuzzConvert());
            return sut.Convert(number);
        }
    }
}
