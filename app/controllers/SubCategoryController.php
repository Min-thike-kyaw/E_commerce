<?php

namespace App\Controllers;

use App\Classes\Request;
use App\Classes\CSRFToken;
use App\Models\SubCategory;
use App\Classes\ValidateRequest;

class SubCategoryController
{
    public function store()
    {
        $post = Request::get('post');
        if( CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["required" => true, "string"=> true, "unique" => "sub_categories", "minLength" => 5],
                "cat_id" => ["number" => true],
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if( $validator->hasError()) {
                header("HTTP/1.1 422 Valid Error!", true, 422);
                echo "Valid Error";
                exit;
            } else {
                $sub_cat = new SubCategory();
                $sub_cat->name = $post->name;
                $sub_cat->cat_id = $post->cat_id;
                if($sub_cat->save()) {
                    echo "successfully u did";
                    exit;
                } else {
                    echo 'something went wrong';
                    exit;
                }
            }
        } else {
            header("HTTP/1.1 422 Token Mis-Match Error!",true, 422);
            echo "Token Mis-Match Error";
            exit;
        }
        
    
    }

    public function update()
    {
        $post = Request::get('post');
        if( CSRFToken::checkToken($post->token)) {
            $rules = [
                "name" => ["required" => true, "string"=> true, "unique" => "sub_categories", "minLength" => 5],
            ];
            $validator = new ValidateRequest();
            $validator->checkValidate($post, $rules);
            if( $validator->hasError()) {
                header("HTTP/1.1 422 Valid Error!", true, 422);
                echo "Valid Error";
                exit;
            } else {
                SubCategory::where("id",$post->id)->update([
                    "name" => $post->name,
                ]);
                echo json_encode("SubCategory updated successfully");
                exit;
            }
        } else {
            header("HTTP/1.1 422 Token Mis-Match Error!",true, 422);
            echo "Token Mis-Match Error";
            exit;
        }
    }
}