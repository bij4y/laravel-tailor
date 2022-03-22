@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/carousel/create" class="btn btn-primary"><i class="fas fa-plus"></i> CREATE</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Feature</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                          @foreach ($carousel as $carousel)
                              <tr>
                                  <th>{{ $carousel->id }}</th>
                                  <th><img src="{{ asset($carousel->feature) }}" alt="" srcset="" width="60"></th>
                                  <th><a href="/carousel/{{ $carousel->id }}/edit">Edit</a></th>
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
