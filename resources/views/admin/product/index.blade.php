@extends("layouts.master")

@section("content")
@include("layouts.nav")
{{ \App\Classes\Session::flash('success') }}
@include("layouts.report_message")

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">All Products</a></li>
                <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Category Create</a></li>
                <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Products Create</a></li> 
            </ul>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Image</td>
                        <td>Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td><img src="{{$product->image}}" alt="" class="img-fluid" width="200"></td>
                        <td>${{$product->price}}</td>
                        <td>
                        <a href="{{URL_ROOT}}admin/product/{{$product->id}}/delete"><i class="fa fa-trash text-danger pr-2"></i></a>
                        <a href="<?php echo URL_ROOT . "admin/product/$product->id/edit"?>"><i class="fa fa-edit text-warning"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection