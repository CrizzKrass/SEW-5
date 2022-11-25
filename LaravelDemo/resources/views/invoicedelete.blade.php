<html>
<head>
    <title>Delete</title>
</head>
<body>
<p>
    Name: {{$invoice->name}}<br>
    Price Net: {{$invoice->price_net}}<br>
    Price Gross: {{$invoice->price_gross}}<br>
    Vat: {{$invoice->vat}}<br>
    Soll die Invoice gelöscht werden?
    <form action="{{ route('invoice.destroy',[$invoice->id]) }}" method="POST">
    @method('DELETE')
    <a href="{{route('invoice.index')}}"><input type="button" value="Nein" ></a>
    <input type="submit" value="Ja">
    </form>
</p>
</body>
</html>
