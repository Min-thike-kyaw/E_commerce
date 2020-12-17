@extends("layouts.master")

@section("content")
@include("layouts.nav")
<style>
    i{
        cursor: pointer;
    }
</style>
<div class="container mt-5 pt-3">
    <table class="table table-bordered">
    <thead>
        <tr>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Action</td>
            <td>Total</td>
        </tr>
    </thead>
        <tbody  id="table">
        
        </tbody>
    <tbody>
    @if(\App\Classes\Auth::check())
    <tr id="checkoutButton">
        <td colspan="6" class="text-right"><button onclick="payout()" class="btn btn-success">Check out</a></td>
    </tr>
    <tr style="visibility: 0;" id="stripeTr">
        <td colspan="6" class="text-right" style="display: none;" id="stripeForm">
            <form action="{{URL_ROOT}}payment/stripe" method="POST">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                    data-key="{{ \App\Classes\Session::get('publishable_key') }}"
                    data-amount="500000"
                    data-name="Min Thike Kyaw Shop" 
                    data-description="Widget" 
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png" 
                    data-email={{\App\Classes\Auth::user()->email}}
                    data-zip-code="true"
                    data-locale="auto">
            </script>
        </form>
        </td>
    </tr>
    @else
    <tr>
        <td colspan="6" class="text-right"><a href="{{URL_ROOT}}user/login" class="btn btn-success">Login to Check out</a></td>
    </tr>
    @endif
    </tbody>
    </table>
    <a href='{{URL_ROOT}}getitems'>Show Items</a>
</div>



@endsection

@section("script")
<script>
    function loadProduct() {
        $.ajax({
            type: "POST",
            url: '{{URL_ROOT}}cart',
            data: {
                "cart": getCartItem(),
            },
            success: function(result){
                saveProduct(result);
            },
            error: function(response){
                console.log(response);
            }
        })
    }
    function payout() {
        var results = JSON.parse(localStorage.getItem("products"));
        $.ajax({
            type: "POST",
            url: '{{URL_ROOT}}payout',
            data: {
              "item" : results 
            },
            success: function(result) {
                console.log(result);
                $("#stripeTr").css({"visibility": "visible"});
                $('#stripeForm').css({"display": ""});
                $('#checkoutButton').css({"display": "none"});
                // clearCart();
                // $('#card-count').html(0);
                // showProduct([]);
                
            },
            error: function(result) {
                console.log(result);
            }
        })
    }
    loadProduct();
    function saveProduct(result){
        localStorage.setItem("products", result);
        let res = JSON.parse(localStorage.getItem("products"));
        showProduct(res);
    }
    function addProductQty(id){
        var result = JSON.parse(localStorage.getItem("products"))
        result.forEach((result)=> {
            if(result.id == id) {
                result.qty += 1;
            }
        })
        saveProduct(JSON.stringify(result));
    }
    function deduceProductQty(id) {
        var result = JSON.parse(localStorage.getItem("products"))
        result.forEach((result) => {
            if(result.id == id) {
                if( result.qty > 1) {
                    result.qty -= 1;
                }
            }
        })
        saveProduct(JSON.stringify(result));
    }
    function deleteProductQty(id) {
        var result = JSON.parse(localStorage.getItem("products"));
        deleteCartItem(id);
        result.forEach((res) => {
            if(res.id == id) {
                var ind = result.indexOf(id);
                result.splice(ind, 1);
            }
        })
        localStorage.setItem("products", result);
        saveProduct(JSON.stringify(result));
        if (getCartItem() != null) {
            $('#card-count').html(getCartItem().length);
        }
    }
    function showProduct(results){
        let str = "";
        var total = 0;
        results.forEach((result) => {
            str += "<tr>";
            str += `
                <td>${result.name}</td>
                <td><img src=${result.image} style="height: 200px; width: 130px; "/></td>
                <td>${result.price}</td>
                <td>${result.qty}</td>
                <td><i class='fa fa-plus pr-3' onclick="addProductQty(${result.id})"></i> <i class='fa fa-minus pr-3' onclick="deduceProductQty(${result.id})"></i></i> <i class='fa fa-trash' onclick="deleteProductQty(${result.id})"></i></td>
                <td>${(result.qty * result.price).toFixed(2)}</td>
            `;
            str += "</tr>";
            total += result.qty * result.price;
        });
        str += `<tr>
            <td colspan="5" class="text-right">Grand Total</td>
            <td>${total.toFixed(2)}</td>
        </tr>`;
        $("#table").html(str);
    }

</script>
@endsection