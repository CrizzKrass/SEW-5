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
        <th>User Clearing</th>
        <th>Clearing Date</th>
    </tr
    @foreach($invoices as $invoice)
        <tr>
            <td>{{$invoice->id}}</td>
            <td>{{$invoice->name}}</td>
            <td>{{$invoice->price_net}}</td>
            <td>{{$invoice->price_gross}}</td>
            <td>{{$invoice->vat}}</td>
            <td>{{$invoice->user_clearing}}</td>
            <td>{{$invoice->clearing_date}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
