<?php

namespace App\Controllers;

use App\Classes\Update;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Category;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use voku\helper\Paginator;
use App\Models\SubCategory;
use App\Classes\ValidateRequest;

class CategoryController
{
    public function create()
    {
        $categories = Category::all()->count();

        $subcategories = SubCategory::all()->count();
    
        list($cats, $pages) = paginate(3, $categories,new Category());
        
        list($subcats, $subpages) = paginate(3, $subcategories,new SubCategory());
        
        $cats  = json_decode(json_encode($cats));

        $subcats  = json_decode(json_encode($subcats));
        
        view('admin/category/create', compact('cats', 'pages', 'subcats', 'subpages'));
        
    }
    public function store()
    {
        // die(var_dump(Request::all()));
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["string"=> true, "unique" => "categories", "minLength" => 5]
            ];
            $validator = new ValidateRequest();
            
            $validator->checkValidate($post, $rules);
            if( $validator->hasError()) {
                $categories = Category::all();
                $errors = $validator->getError();
                view('admin/category/create', compact('categories', 'errors'));

            } else {
                $category = new Category();
                $category->name = $post->name;
                $category->slug = slug($post->name);
                if($category->save()) {
                   Session::flash('success', "Category created successfully");
                   return Redirect::to("admin/category/create");
                } else {
                    echo "something wrong";
                }
            }
        } else {
            echo "CSRF attack occur";
            Session::flash("success", "u fail");
            Redirect::back();
        }
    }

    public function delete($params)
    {
        if(Category::destroy($params['id'])){
            Session::flash('delete_success',"Deleteed Successfully");
            return Redirect::to('admin/category/create');
        } else {
            Session::flash('delete_fail', "Delete fail");
            return Redirect::to('admin/category/create');
        }
        

    }
    
    public function update()
    {
        $post = Request::get("post");
        $data = [
            "name" => $post->name,
            "id" => $post->id,
            "token" => $post->token,
        ];
        if(CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["string"=> true, "unique" => "categories", "minLength" => 5]
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if( $validator->hasError()) {
                header("HTTP/1.1 422 Validatioin Error!",true, 422);
                echo json_encode($validator->getError());
                exit;
            } else {
                Category::where("id",$post->id)->update([
                    "name" => $post->name,
                    "slug" => slug($post->name),
                ]);
                echo json_encode("Category updated successfully");
                exit;
            }
            
        } else {
                header("HTTP/1.1 422 Token Mis-Match Error!",true, 422);
                echo json_encode(["error" => "Token Mis-Match Error!"]);
                exit;
        }
    }

}