<html>
<head>
    <title>Invoice {{$invoice->id}}</title>
</head>
<body>
<p>
    Name: {{$invoice->name}}<br>
    Price Net: {{$invoice->price_net}}<br>
    Price Gross: {{$invoice->price_gross}}<br>
    Vat: {{$invoice->vat}}<br>
    <a href="{{ route('invoice.index') }}">Zurück</a>
</p>
</body>
</html>
