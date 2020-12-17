<?php

namespace App\Controllers;

use App\Models\Product;
use App\Classes\Request;
use App\Classes\Session;

class IndexController
{
    public function show()
    {
        $products = Product::all();
        return view('home',compact('products'));  
    }

    public function Showcart()
    {
        view("cart");
    }

    public function cart()
    {
        
        $posts = Request::get('post');
        $products = [];
        foreach ($posts->cart as $post) {
            $item = Product::where("id", $post)->first();
            $item->qty = 1;
            array_push($products, $item);
        }
        echo json_encode($products);
        exit;
    }

    public function detail($params) 
    {
        $product = Product::where("id", $params['id'])->first();
        return view('detail', compact('product'));
    }

    public function payout()
    {
        $product = Request::get('post');
        if ( $this->saveOrder($product)) {
            Session::replace("items", $product);
            echo "success";
            exit;
        } else {
            echo "fail";
            exit;
        }
        // echo "hello";
    }

    public function getItemsFromSession()
    {
        beautify(Session::get("items"));
    }
    public function saveOrder($item)
    {
        $order = serialize($item);
        return true;
    }

}