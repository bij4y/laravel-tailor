@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/categories/create" class="btn btn-primary"><i class="fas fa-plus"></i> CREATE</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                          @foreach ($category as $category)
                              <tr>
                                  <th>{{ $category->id }}</th>
                                  <th>{{ $category->name }}</th>
                                  <th><a href="/categories/{{ $category->id }}/edit">Edit</a></th>
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
