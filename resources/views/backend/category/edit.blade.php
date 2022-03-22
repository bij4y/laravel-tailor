@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/categories" class="btn btn-primary">Item Details</a>
                </div>
                <div class="card-body">
                    <form action="/categories/{{ $category->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="container">

                            <div class="form-group row">
                                <label for="name">Tailor  Name</label>

                                    <input type="text" class="form-control" name="name" id="name" placeholder=""  value="{{ $category->name }}">
                                </div>
                                <div class="form-group row">
                                    <label for="regno">Pan No.</label>

                                        <input type="text" class="form-control" name="regno" id="regno" placeholder=""  value="{{ $category->regno }}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact"> Contact</label>

                                            <input type="text" class="form-control" name="contact" id="contact" placeholder=""  value="{{ $category->contact }}">
                                        </div>
                                        <div class="form-group row">
                                            <label for="address"> Address</label>

                                                <input type="text" class="form-control" name="address" id="address" placeholder=""  value="{{ $category->address }}">
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"> Email</label>

                                                    <input type="text" class="form-control" name="email" id="email" placeholder="" value="{{ $category->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Opening or Closing?</label>
                                                    <select class="form-control" name="status" id="status">
                                                     <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>No</option>
                                                     <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="feature">Feature Image</label>
                                                    <input type="file" class="form-control-file" name="feature" id="feature"  >

                                                  </div>
                                                  <img src="{{ asset($category->feature) }}" alt="" srcset="" width="60">
                                                  <div class="form-group">
                                                    <label for="description">Short Description</label>
                                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $category->description }}</textarea>
                                                  </div>

                                                  <button type="submit" class="btn btn-primary">Update</button>
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
