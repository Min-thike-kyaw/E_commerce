@extends('layouts.master')

@section("content")
@include('layouts.nav')

<div class="container mt-5">
    <div class="col-md-4">
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/category/create' ?>">Create Category</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/create' ?>">Create Product</a></li>
            <li class="list-group-item"><a href="<?php echo URL_ROOT . 'admin/product/home' ?>">All Products</a></li>
        </ul>
    </div>
</div>

@endsection


