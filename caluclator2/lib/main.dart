import 'package:flutter/material.dart';
import 'package:function_tree/function_tree.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.pink,
      ),
      home: const MyHomePage(title: 'Flutter Demo Home Page'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});

  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  num _result = 0;
  String _expressionToCalculate =  "";

  void addChar(String s){
    setState(() {
      _expressionToCalculate += s;
    });
  }

  void calculate(){
    setState(() {
      _result = _expressionToCalculate.interpret();
    });
  }

  void reset(){
    setState(() {
      _expressionToCalculate = '';
      _result = 0;
    });
  }
  
  void removeLastChar(){
    setState(() {
      _expressionToCalculate = _expressionToCalculate.substring(0, _expressionToCalculate.length-1);
    });
  }

  @override
  Widget build(BuildContext context) {

    return Scaffold(
      appBar: AppBar(
        title: Text(widget.title),
      ),
      body: Column(
        children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              Text(_expressionToCalculate, style: TextStyle(fontSize: 24)),
              Text(_result.toString(),style: TextStyle(fontSize: 24))
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              TextButton(
                onPressed: () => addChar('7'),
                child: Text('7'),
              ),
              TextButton(
                onPressed: () => addChar('8'),
                child: Text('8'),
              ),
              TextButton(
                onPressed: () => addChar('9'),
                child: Text('9'),
              ),
              TextButton(
                  onPressed: () => addChar('/'),
                  child: Text('/')
              ),
              IconButton(
                  onPressed: () => removeLastChar(),
                  icon: Icon(Icons.backspace, color: Colors.pink,)
              ),
              TextButton(
                  onPressed: () => reset(),
                  child: Text('C')
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              TextButton(
                  onPressed: () => addChar('4'),
                  child: Text('4')
              ),
              TextButton(
                  onPressed: () => addChar('5'),
                  child: Text('5')
              ),
              TextButton(
                  onPressed: () => addChar('6'),
                  child: Text('6')
              ),
              TextButton(
                  onPressed: () => addChar('*'),
                  child: Text('*')
              ),
              TextButton(
                  onPressed: () => addChar('('),
                  child: Text('(')
              ),
              TextButton(
                  onPressed: () => addChar(')'),
                  child: Text(')')
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              TextButton(
                  onPressed: () => addChar('1'),
                  child: Text('1')
              ),
              TextButton(
                  onPressed: () => addChar('2'),
                  child: Text('2')
              ),
              TextButton(
                  onPressed: () => addChar('3'),
                  child: Text('3')
              ),
              TextButton(
                  onPressed: () => addChar('-'),
                  child: Text('-')
              ),
              TextButton(
                  onPressed: () => addChar('^'),
                  child: Text('^')
              ),
              TextButton(
                  onPressed: () => addChar('sqrt('),
                  child: Text('sqrt')
              )
            ],
          ),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              TextButton(
                  onPressed: () => addChar('0'),
                  child: Text('0')
              ),
              TextButton(
                  onPressed: () => addChar('.'),
                  child: Text('.')
              ),
              TextButton(
                  onPressed: () => addChar('%'),
                  child: Text('%')
              ),
              TextButton(
                  onPressed: () => addChar('+'),
                  child: Text('+')
              ),
              TextButton(
                  onPressed: () => calculate(),
                  child: Text('=')
              ),
            ],
          ),
        ],
      ),
    );
  }
}
