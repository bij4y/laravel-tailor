@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <a href="/carousel" class="btn btn-primary">Item Details</a>
                </div>
                <div class="card-body">
                    <form action="/carousel/{{ $carousel->id }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="container">

                            <div class="form-group">
                                <label for="feature">Carousel Image</label>
                                <input type="file" class="form-control-file" name="feature" id="feature" value="{{ $carousel->feature }}">

                              </div>
                                    <button type="submit" class="btn btn-primary">Update</button>


                        </div>

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
