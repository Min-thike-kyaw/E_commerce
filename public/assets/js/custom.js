function addToCart(num) {    
    var ary = JSON.parse(localStorage.getItem("items"));
    if ( ary == null) {
        var itemAry = [num];
        localStorage.setItem("items",JSON.stringify(itemAry))
    } else {
        con = ary.indexOf(num);
        if ( con == -1) {
            ary.push(num);
            localStorage.setItem("items",JSON.stringify(ary))
        }
    }
    alert("Item already added");
    showCartItem();
}

function getCartItem(){
    var ary = JSON.parse(localStorage.getItem("items"));
    return ary;
}

function deleteCartItem(id) {
    var ary = JSON.parse(localStorage.getItem("items"));
    if (ary != null) {
        ary.forEach((item) => {
            if (item == id) {
                var ind = ary.indexOf(item);
                ary.splice(ind, 1);
            }
        });
    }
    localStorage.setItem("items",JSON.stringify(ary))
}
function showCartItem() {
    var ary = JSON.parse(localStorage.getItem("items"));
    if (ary != null) {
        $('#card-count').html(ary.length);
    } else {
        $('#card-count').html(0);
    }
}
function clearCart(){
    localStorage.removeItem("items");
}

showCartItem();