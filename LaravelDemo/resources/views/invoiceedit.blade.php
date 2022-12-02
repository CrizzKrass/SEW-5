@extends('master')
@section('title', isset($invoice) ? "edit Invoice $invoice->id" : 'create Invoice')
@section('content')
<form action="{{ isset($invoice) ? route('invoice.update',[$invoice->id]) : route('invoice.store') }}" method="post">
    @csrf
    @if(isset($invoice))
        @method('PUT')
    @endif
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ isset($invoice->name) ? $invoice->name : '' }}"/>
    <br />
    <label for="pricenet">Price Net</label>
    <input type="number" name="pricenet" value = "{{ isset($invoice->price_net) ? $invoice->price_net : '' }}"/>
    <br />
    <label for="pricegross">Price Gross</label>
    <input type="number" name="pricegross" value="{{ isset($invoice->price_gross) ? $invoice->price_gross : '' }}"/>
    <br />
    <label for="vat">Vat</label>
    <input type="number" name="vat" value="{{ isset($invoice->vat) ? $invoice->vat : '' }}"/>
    <br />
    <input type="submit" value="Absenden">
</form>
@endsection
