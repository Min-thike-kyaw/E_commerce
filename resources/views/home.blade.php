@extends("layouts.master")

@section("content")
@include("layouts.nav")
    <div class="container mt-5">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 py-3">
                <div class="card">
                    <div class="card-header">
                        <h6>{{$product->name}}</h6>
                    </div>
                    <div class="card-body">
                        <img src="{{$product->image}}" alt="" class="img-fluid" style="height: 280px; width: 160px; ">
                    </div>
                    <div class="card-footer py-0 my-0 d-flex justify-content-between">
                        <a href="{{URL_ROOT}}product/{{$product->id}}/detail" class="btn btn-info btn-sm my-1"><i class="fa fa-eye"></i></a>
                        <span>${{$product->price}}</span>
                        <button class="btn btn-info btn-sm my-1" onclick="addToCart({{$product->id}})"><i class="fa fa-shopping-cart"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

