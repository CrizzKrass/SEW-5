@extends('master')
@section('title', 'Invoices')
@section('content')
<a href="{{route('invoice.create')}}"><button>Datensatz erstellen</button></a>
<table id="invoice-table" class="table table-striped">
    <thead>
        <tr class="table-info">
            <th>Id</th>
            <th>Name</th>
            <th>Price Net</th>
            <th>Price Gross</th>
            <th>Vat</th>
            <th>User Clearing</th>
            <th>Clearing Date</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
</table>
@endsection
