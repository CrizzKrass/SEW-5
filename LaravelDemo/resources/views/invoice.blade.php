<html>
<head>
    <title>
        Invoice
    </title>
</head>
<body>
    <a href="{{route('invoice.create')}}"><button>Datensatz erstellen</button></a>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price Net</th>
        <th>Price Gross</th>
        <th>Vat</th>
        <th></th>
        <th></th>
        <th></th>
    </tr
    @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->name}}</td>
            <td>{{$invoice->price_net}}</td>
            <td>{{$invoice->price_gross}}</td>
            <td>{{$invoice->vat}}</td>
            <td><a href="{{ route('invoice.edit', [$invoice->id]) }}"> Edit </a></td>
            <td><a href="{{ route('invoice.show', [$invoice->id]) }}"> Details </a></td>
            <td><a href="{{ route('invoice.destroy', [$invoice->id]) }}"> Delete </a></td>
        </tr>
    @endforeach
</table>
</body>
</html>
