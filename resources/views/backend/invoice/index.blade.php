@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="" class="btn btn-primary"> Order Details</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th> Customer</th>
                                <th> Total</th>
                                <th>Delivered</th>
                                <th>Action</th>


                            </tr>

                        </thead>
                        <tbody>
                          @foreach ($invoice as $key=> $invoice)
                              <tr>
                                  <th>{{ $key++ }}</th>

                                  <th>{{ $invoice->created_at }}</th>
                                  <th>{{ $invoice->user->name }}</th>
                                  <th>{{ $invoice->total }}</th>
                                  <th>{{ $invoice->delivered == 0 ? 'No' : 'Yes' }}</th>

                                  <th><a href="/invoice/{{ $invoice->id }}">View</a></th>
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
