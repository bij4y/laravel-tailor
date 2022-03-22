@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/onboarding" class="btn btn-primary">Item Details</a>
                </div>
                <div class="card-body">
                    <form action="/onboarding" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container">

                                <div class="form-group row">
                                    <label for="name">Text</label>

                                        <input type="text" class="form-control" name="name" id="name" placeholder="">
                                    </div>




                                                      <div class="form-group">
                                                        <label for="feature">Feature Image</label>
                                                        <input type="file" class="form-control-file" name="feature" id="feature"  >

                                                      </div>

                                    {{-- <div class="form-group">
                                        <label for="images"> Design</label>
                                        <input type="file" class="form-control-file" name="images[]" multiple  id="images"  >

                                      </div> --}}
                                    <button type="submit" class="btn btn-primary">Save</button>




                    </form>

                </div>
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                      @if(Session::has('alert-' . $msg))

                      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                      @endif
                    @endforeach
                  </div> <!-- end .flash-message -->
            </div>
        </div>
    </div>
</div>

@endsection
