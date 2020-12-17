<?php

namespace App\Controllers;

use App\Models\Product;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Category;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\UploadFile;
use App\Models\SubCategory;
use App\Classes\ValidateRequest;

class ProductController
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact("products"));
    }
    public function create()
    {
        $cats = Category::all();
        $subcats = SubCategory::all();
        view('admin.product.create', compact('cats', 'subcats'));
    }

    public function store()
    {
        $post = Request::get('post');
        
        $file = Request::get('file');
        $rule = [
            "name" => [ "unique"=> "products", "required" => true, "minLength" => 5, "string" => true],
            "description" => ["minlength" => 20],
            "price" => ["number" => true]
        ];
        if ( CSRFToken::checkToken($post->token)) {
            // echo "hello";
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rule);
            if($validator->hasError()) {
                $cats = Category::all();
                $subcats = SubCategory::all();
                $errors = $validator->getError();
            
                view('admin.product.create', compact('cats', 'subcats', 'errors')); 
            } else {
                $uploadfile = new UploadFile();
                if ($uploadfile->isImage($file)) {
                    if($uploadfile->move($file)) {
                        $product = new Product();
                        $product->name = $post->name;
                        $product->price = $post->price;
                        $product->cat_id = $post->cat_id;
                        $product->sub_cat_id = $post->sub_cat_id;
                        $product->description = $post->description;
                        $product->image = $uploadfile->getPath();
                        if($product->save()) {
                            Session::flash("success", "Product created successfully");
                            return Redirect::to("admin/product/home");
                        } else {
                            Session::flash("fail", "Database connection fail");
                            return Redirect::to("admin/product/create");
                        }

                    } else {
                        Session::flash("fail", "File upload");
                        return Redirect::to("admin/product/create");
                    }
                } else {
                    Session::flash("fail", "File is not image");
                    return Redirect::to("admin/product/create");
                }
            }
        } else {
            Session::flash("fail", "Token Error");
            return Redirect::to("admin/product/create");
        }
    }

    public function edit($id)
    {
        $product = Product::where("id",$id['id'])->get()->first();
        $cats = Category::all();
        $subcats = SubCategory::all();
        return view("admin.product.edit", compact('cats','subcats', 'product'));
    }
    
    public function update($id)
    {
        $product = Product::where("id",$id['id'])->get()->first();
        $post = Request::get('post');
        
        $file = Request::get('file');
        $rule = [
            "name" => [ "unique"=> "products", "required" => true, "minLength" => 5, "string" => true],
            "description" => ["minlength" => 20],
            "price" => ["number" => true]
        ];
        if ( CSRFToken::checkToken($post->token)) {
            // echo "hello";
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rule);
            if($validator->hasError()) {
                $cats = Category::all();
                $subcats = SubCategory::all();
                $errors = $validator->getError();
            
                view('admin/product/edit', compact('cats', 'subcats', 'errors', 'product')); 
            } else {
                if($file->file->name == null) {
                    $imageFile = $product->image;
                } else {
                    $uploadfile = new UploadFile();
                    if($uploadfile->isImage($file)) {
                        if($uploadfile->move($file)) {
                            $imageFile = $uploadfile->getPath();
                        }
                    }
                }
                Product::where("id", $id['id'])->update([
                    "name" => $post->name,
                    "price" => $post->price,
                    "cat_id" => $post->cat_id,
                    "sub_cat_id" => $post->sub_cat_id,
                    "description" => $post->description,
                    "image" => $imageFile,
                ]);
                Session::flash('success', 'Category edited successfully');
                return Redirect::to('admin/product/home');
            }
        } else {
            Session::flash("fail", "Token Error");
            return Redirect::to("admin/product/create");
        }
    }

    public function delete($id)
    {
        if(Product::destroy($id['id'])) {
            Session::flash('success', "Category deleted successfully");
            return Redirect::to('admin/product/home');
        } else {
            Session::flash('success', "Category deleted successfully");
            return Redirect::to('admin/product/home');
        }
    }

}