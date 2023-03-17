using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using UnitTestsExample;

namespace UnitTestsTest
{
    internal class MethTest
    {
        [Test]
        public void TestAddTrue()
        {
            var meth = new Meth();
            var currentResult = meth.Add(1, 2);

            Assert.AreEqual(3, currentResult);
        }
        [Test]
        public void TestAddFalse()
        {
            var meth = new Meth();
            var currentResult = meth.Add(1, 2);

            Assert.AreNotEqual(4, currentResult);
        }
        [Test]
        public void TestSubTrue()
        {
            var meth = new Meth();
            var currentResult = meth.Sub(5, 2);

            Assert.AreEqual(3, currentResult);
        }
        [Test]
        public void TestSubFalse()
        {
            var meth = new Meth();
            var currentResult = meth.Sub(5, 2);

            Assert.AreNotEqual(4, currentResult);
        }
        [Test]
        public void TestMulTrue()
        {
            var meth = new Meth();
            var currentResult = meth.Mul(5, 2);

            Assert.AreEqual(10, currentResult);
        }
        [Test]
        public void TestMulFalse()
        {
            var meth = new Meth();
            var currentResult = meth.Mul(5, 2);

            Assert.AreNotEqual(4, currentResult);
        }
        [Test]
        public void TestDivTrue()
        {
            var meth = new Meth();
            var currentResult = meth.Div(5, 2);

            Assert.AreEqual(2.5, currentResult);
        }
        [Test]
        public void TestDivFalse()
        {
            var meth = new Meth();
            var currentResult = meth.Div(5, 2);

            Assert.AreNotEqual(4, currentResult);
        }
        [Test]
        public void TestFuckTrue()
        {
            var meth = new Meth();
            var currentResult = meth.Fuck(5);

            Assert.AreEqual(120, currentResult);
        }
        [Test]
        public void TestModTrue()
        {
            var meth = new Meth();
            var currentResult = meth.Mod(5,3);

            Assert.AreEqual(2, currentResult);
        }
    }
}
