<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use http\Env\Response;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoice'); //->with(['invoices' => $invoices]); //datatables ohne AJAX
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoiceedit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->name = $request->name;
        $invoice->price_net = $request->pricenet;
        $invoice->price_gross = $request->pricegross;
        $invoice->vat = $request->vat;
        $invoice->save();

        return redirect(route('invoice.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoiceshow')->with(['invoice'=>$invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoiceedit')->with(['invoice'=>$invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $invoice->name = $request->name;
        $invoice->price_net = $request->pricenet;
        $invoice->price_gross = $request->pricegross;
        $invoice->vat = $request->vat;
        $invoice->save();

        return redirect(route('invoice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        //return redirect(route('invoice.index'));
    }

    public function getInvoiceData(){
        //return json_encode(array('data' => Invoice::all()));
        return datatables()->of(Invoice::all())->make(true);
    }
}
