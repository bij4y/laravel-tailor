@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/products/create" class="btn btn-primary"><i class="fas fa-plus"></i> CREATE</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Feature Image</th>
                                <th>Product Name</th>
                                <th>Price</th>

                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                          @foreach ($products as $product)
                              <tr>
                                  <th>{{ $product->id }}</th>
                                  <th><img src="{{ asset($product->image) }}" alt="" srcset="" width="60"></th>
                                  <th>{{ $product->name }}</th>

                                  <th>{{ $product->sp }}</th>
                                  <th><a href="/products/{{ $product->id }}/edit">Edit</a></th>
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
