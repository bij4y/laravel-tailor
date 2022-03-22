@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/add" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/add" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <form>

                                <div class="form-group">
                                    <label for="images"> Product Images </label>
                                    <input type="file" class="form-control-file" name="images[]" multiple  id="images"  >

                                  </div>
                                  <div class="form-group">
                                    <label for="product_id">Short product_id</label>
                                    <textarea class="form-control" name="product_id" id="product_id" rows="3"></textarea>
                                  </div>

                                  <button type="submit">Save</button>

                                </form>

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

