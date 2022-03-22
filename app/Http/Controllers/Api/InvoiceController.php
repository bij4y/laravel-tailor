<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // $product = Product::all();
        $invoice = new Invoice();
        $invoice->user_id = Auth::user()->id;
        $invoice->address = $request->address;
        $invoice->total = $request->total;
        $invoice->save();

        foreach($request->products as $product){
            $invoicedetail = new InvoiceDetail();
            $invoicedetail->invoice_id = $invoice->id;
            $invoicedetail->product_id = $product['product_id'];
            $invoicedetail->qty = $product['qty'];
            $invoicedetail->amount = $product['amount'];
            $invoicedetail->save();
        }
        //       $requestData = $request->all();
        // foreach ($requestData as $key => $data) {
        //     InvoiceDetail::create([
        //       'user_id'       =>  $data['user_id'],
        //       'invoice_id'       =>  $data['invoice_id'],
        //       'product_id'      =>  $data['product_id'],
        //       'qty'         =>  $data['qty'],
        //       'amount' =>  $data['amount'],

        //     ]);
        // }
        return response()->json(['message' => 'Order Sent','code' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
