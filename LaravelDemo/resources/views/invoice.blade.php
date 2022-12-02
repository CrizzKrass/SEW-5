@extends('master')
@section('title', 'Invoices')
@section('content')
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
            <td><a href="{{ route('invoice.edit', [$invoice->id]) }}"><button>Edit</button></a></td>
            <td><a href="{{ route('invoice.show', [$invoice->id]) }}"><button>Details</button></a></td>
            <td><form action="{{route('invoice.destroy',[$invoice->id])}}" method="post">
                    @method("DELETE")
                    @csrf
                    <button type="submit"  onclick="return confirm('Löschen?')">Delete</button>
                </form></td>
        </tr>
    @endforeach
</table>
@endsection
