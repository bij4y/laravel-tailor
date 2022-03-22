@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/onboarding/create" class="btn btn-primary"><i class="fas fa-plus"></i> CREATE</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th> Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody>
                          @foreach ($onboarding as $onboarding)
                              <tr>
                                  <th>{{ $onboarding->id }}</th>
                                  <th>{{ $onboarding->name }}</th>
                                  <th><img src="{{ asset($onboarding->image) }}" alt="" srcset="" width="60"></th>
                                  <th><a href="/onboarding/{{ $onboarding->id }}/edit">Edit</a></th>
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
