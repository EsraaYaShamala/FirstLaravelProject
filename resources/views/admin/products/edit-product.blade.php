
@extends('admin.layout.master')

@section('title')
    EditProduct
@endsection
@section('content')

        @include('admin.layout.messages')

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product </h4>

                        <form id="signupForm" method="post" action="{{route('product.update',$product)}}">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" class="form-control" name="name" type="text" value="{{$product->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Price</label>
                                <input id="email" class="form-control" name="price" type="number" value="{{$product->price}}">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Views</label>
                                <input id="email" class="form-control" name="views" type="number" value="{{$product->views}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-check-label">Size</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" value="M"  class="form-check-input">
                                        <label  class="form-label">M</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" value="L"  class="form-check-input">
                                        <label  class="form-label">L</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]" value="X"  class="form-check-input">
                                        <label class="form-label">X</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="size[]"value="XL"  class="form-check-input">
                                        <label class="form-label">XL</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="CategorySelect" class="form-label">Category</label>
                                <select class="form-select" name="cat_id" id="CategorySelect" >
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->cat_id==$category->id ?'selected':''}}>{{$category->type}}</option>
                                    @endforeach


                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">IS Featured</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="isFeatured" id="yes" value="1" {{$product->isFeatured==1 ?'checked':''}}>
                                        <label class="form-check-label" for="yes">
                                            1
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="isFeatured" id="no" value="0" {{$product->isFeatured==0 ?'checked':''}}>
                                        <label class="form-check-label" for="no">
                                            0
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="defaultconfig-4" class="col-form-label">Description</label>
                                <textarea name="description"  id="maxlength-textarea" class="form-control" id="defaultconfig-4" maxlength="100" rows="8" >
                                    {{$product->description}}
                                </textarea>
                            </div>

                            <div class="col-md-6 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Select Image</h6>
                                        <input type="file" id="myDropify" name="image"/>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Update Product" name="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
