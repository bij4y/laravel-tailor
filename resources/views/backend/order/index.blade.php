@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="" class="btn btn-primary"><i class="fas fa-plus"></i>Order Details</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Delivered</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                              <tr>
                                  <th>{{ $invoiceDetail->id }}</th>
                                  <th>{{ $invoiceDetail->created_at }}</th>
                                  <th>{{ $invoiceDetail->user->name }}</th>
                                  <th>{{ $invoiceDetail->total }}</th>
                                  <th>{{ $product->delivered == 0 ? 'No' : 'Yes'}}</th>
                                  <th>{{ $invoiceDetail->sp }}</th>
                                  <th><a href="/orders/{{ $order->id }}/edit">View</a></th>
                              </tr>
                          @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
