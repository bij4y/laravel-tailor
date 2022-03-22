@extends('backend.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/products" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="/products" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <form>
                                    <div class="form-group row">
                                        <label for="SKU">Product Code</label>

                                            <input type="text" class="form-control" name="SKU" id="SKU" placeholder="">


                                    </div>
                                    <div class="form-group row">
                                        <label for="name">Product Name</label>

                                            <input type="text" class="form-control" name="name" id="name" placeholder="">


                                    </div>
                                    <div class="form-group row">
                                        <label for="sp">Price</label>

                                            <input type="text" class="form-control" name="sp" id="sp" placeholder="">


                                    </div>
                                 {{-- <div class="form-group">
                                   <label for="discount">Is there any discount in this product?</label>
                                   <select class="form-control" name="discount" id="discount">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                   </select>
                                 </div> --}}
                                 {{-- <div class="form-group row">
                                    <label for="sp">Selling Price</label>

                                        <input type="text" class="form-control" name="sp" id="sp" placeholder="">


                                </div> --}}
                                <div class="form-group">
                                  <label for="image">featured Image</label>
                                  <input type="file" class="form-control-file" name="image" id="image"  >

                                </div>
                                {{-- <div class="form-group">
                                    <label for="images"> Product Images </label>
                                    <input type="file" class="form-control-file" name="images[]" multiple  id="images"  >

                                  </div> --}}
                                  <div class="form-group">
                                    <label for="description">Short Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="category_id"></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                      @foreach ($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>

                                      @endforeach
                                    </select>
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

