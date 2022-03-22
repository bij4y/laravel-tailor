@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h5>Invoice</h5>
                </div>
                <div class="card-body">
                    <address>
                        Date: {{ $invoice->created_at }} <br>
                        Customer: {{ $invoice->user->name }} <br>
                        Address: {{ $invoice->user->address }} <br>
                        Mobile: {{ $invoice->user->mobile }} <br>
                    </address>

                    <hr>
                    <h5>Product Details</h5>

                    <table class="table">
                        <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>

                        @foreach ($invoiceDetail as $index=> $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->product->sp }}</td>
                                <td>{{ $item->amount }}</td>

                        @endforeach
                        <tr class="bg-dark">
                            <td colspan="4">Grand Total</td>
                            <td>{{ $invoice->total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
