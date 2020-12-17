@extends("layouts.master")


@section("content")
@include("layouts.nav")
{{ \App\Classes\Session::flash('success') }}
@include("layouts.report_message")
<div class="container mt-5">
    <div class="row">
    <div class="col-md-4">
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Create Category</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/create' ?>">Create Product</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/home' ?>">All Products</a></li>
        </ul>
    </div>
            <div class="col-md-8">    
                <h3 class="text-info text-center">Create a product</h3>
                <form action="{{URL_ROOT}}admin/product/{{$product->id}}/update" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id=name class="form-control" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="price">Price</label>
                            <input type="number" step=any class="form-control" name=price id="price" value="{{$product->price}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cat_id">Category</label>
                                <select name="cat_id" id="cat_id" class="form-control">
                                    @foreach($cats as $cat)
                                        <option <?php echo $product->cat_id == $cat->id ? "selected" : ""?> value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="sub_cat_id">Category</label>
                                <select name="sub_cat_id" id="sub_cat_id" class="form-control">
                                    @foreach($subcats as $cat)
                                        <option <?php echo $product->sub_cat_id == $cat->id ? "selected" : ""?> value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-group">
                            <input type="file" class="form-control-file bg-dark text-white" name="file">
                        </div>
                    </div>
                    <div class="col-md-12 p-0">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class=form-control name="description" id="" cols="30" rows="3">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                    <div class="row justify-content-end no-gutters">
                        <button class="btn btn-primary mr-2">Create</button>
                        <button type=reset class="btn btn-outline-dark">Cancel</button>
                    </div>
                </form> 
            </div>
    </div>
</div>
@endsection
