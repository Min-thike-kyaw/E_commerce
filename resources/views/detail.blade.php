@extends("layouts.master")

@section("content")
@include("layouts.nav")
<div class="mt-5 pt-4"></div>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-3">
                <img src="{{$product->image}}" alt="" class="img-fluid">
            </div>
            <div class="col-md-9">
                <h2 class="text-info">{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <button class="btn btn-warning text-white rounded-0">${{$product->price}}</button>
                <button class="btn btn-success rounded-0" onClick="addToCart({{$product->id}})">Add to Cart</button>
                <div class=mt-2>
                Rate: 
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star text-warning"></i>
                <i class="fa fa-star-half text-warning "></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

