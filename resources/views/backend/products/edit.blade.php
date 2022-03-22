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
                        <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="container">
                                <form>
                                    <div class="form-group row">
                                        <label for="SKU">Product Code</label>

                                            <input type="text" class="form-control" name="SKU" id="SKU" placeholder="" value="{{ $product->SKU }}">


                                    </div>
                                    <div class="form-group row">
                                        <label for="name">Product Name</label>

                                            <input type="text" class="form-control" name="name" id="name" placeholder="" value="{{ $product->name }}">


                                    </div>
                                    {{-- <div class="form-group row">
                                        <label for="sp">Price</label>

                                            <input type="text" class="form-control" name="sp" id="sp" placeholder="" value="{{ $product->sp }}">


                                    </div> --}}
                                 {{-- <div class="form-group">
                                   <label for="discount">Is there any discount in this product?</label>
                                   <select class="form-control" name="discount" id="discount">
                                    <option value="0" {{ $product->discount == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ $product->discount == 1 ? 'selected' : '' }}>Yes</option>
                                   </select>
                                 </div> --}}
                                 <div class="form-group row">
                                    <label for="sp">Selling Price</label>

                                        <input type="text" class="form-control" name="sp" id="sp" placeholder="" value="{{ $product->sp }}">


                                </div>
                                <div class="form-group">
                                  <label for="image">Image</label>
                                  <input type="file" class="form-control-file" name="image" id="image"  >

                                </div>
                                <img src="{{ asset($product->image) }}" alt="" srcset="" width="60">

                                {{-- <div class="form-group">
                                    <label for="images"> Product Images </label>
                                    <input type="file" class="form-control-file" name="images[]" multiple  id="images"  >

                                  </div>
                                  @foreach ($product->images as $image)
                                      <img src="{{ asset($image->name) }}" alt="" width="50">
                                  @endforeach --}}

                                  <div class="form-group">
                                    <label for="description">Short Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="category_id"></label>
                                    <select class="form-control" name="category_id" id="category_id">
                                      @foreach ($categories as $category)
                                      <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : ''}}>{{ $category->name }}</option>

                                      @endforeach
                                    </select>
                                  </div>
                                  <button type="submit">Update</button>

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

