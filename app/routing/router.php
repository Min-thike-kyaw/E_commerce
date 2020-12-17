<?php

use App\Routing\RouteDispatcher;


$route = new AltoRouter();

$route->setBasePath("/E_commerce/public");

$route->map("GET", '/', "App\Controllers\IndexController@show", "Home Page");
$route->map("GET", '/cart', "App\Controllers\IndexController@showCart", "Cart Page");
$route->map("POST", '/cart', "App\Controllers\IndexController@cart");
$route->map("POST", '/payout', "App\Controllers\IndexController@payout");
$route->map("GET", '/product/[i:id]/detail', "App\Controllers\IndexController@detail");
$route->map("GET", '/getitems', "App\Controllers\IndexController@getItemsFromSession");
$route->map("POST", '/payment/stripe', "App\Controllers\PaymentController@stripePayment");


#admin
$route->map("GET", '/admin', "App\Controllers\AdminController@index", "Admin Home");
$route->map("GET", '/admin/category/create', "App\Controllers\CategoryController@create", "Category Create");
$route->map("POST", '/admin/category/create', "App\Controllers\CategoryController@store");
$route->map("GET", '/admin/category/[i:id]/delete', "App\Controllers\CategoryController@delete");
$route->map("POST", '/admin/category/[i:id]/update', "App\Controllers\CategoryController@update");

$route->map("POST", '/admin/subcategory/create', "App\Controllers\SubCategoryController@store");
$route->map("POST", '/admin/subcategory/update', "App\Controllers\SubCategoryController@update");

$route->map("GET", '/admin/product/create', "App\Controllers\ProductController@create");
$route->map("POST", '/admin/product/create', "App\Controllers\ProductController@store");
$route->map("GET", '/admin/product/home', "App\Controllers\ProductController@index");
$route->map("GET", '/admin/product/[i:id]/edit', "App\Controllers\ProductController@edit");
$route->map("POST", '/admin/product/[i:id]/update', "App\Controllers\ProductController@update");
$route->map("GET", '/admin/product/[i:id]/delete', "App\Controllers\ProductController@delete");

// User

$route->map("GET", '/user/login', "App\Controllers\UserController@showLogin");
$route->map("POST", '/user/login', "App\Controllers\UserController@login");
$route->map("GET", '/user/register', "App\Controllers\UserController@showRegister");
$route->map("POST", '/user/register', "App\Controllers\UserController@register");
$route->map("GET", '/user/logout', "App\Controllers\UserController@logout");


new RouteDispatcher($route);
