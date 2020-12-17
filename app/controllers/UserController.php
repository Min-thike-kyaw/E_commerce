<?php

namespace App\Controllers;

use App\Models\User;
use App\Classes\Auth;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\Redirect;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;

class UserController
{
    public function login()
    {
        $post = Request::get('post');
        if( CSRFToken::checkToken($post->token)) {
            $rule = [
                "email" => ["required" => true,],
                "password" => ["required" => true]
            ];
            $validate = new ValidateRequest();
            $validate->checkValidate($post, $rule);
            if($validate->hasError()) {
                $errors = $validate->getError();
                return view("user.login", compact('errors'));
            } else {
                $user = User::where("email", $post->email)->get()->first();
                if($user) {
                    if(password_verify($post->password,$user->password)) {
                        Session::replace("userId", $user->id);
                        return Redirect::to("cart");
                    } else {
                        echo "wrong pass";
                    }
                } else {
                    echo "email error";
                }
            }
        }
    }

    public function showLogin()
    {
        if(!Auth::check()) {
            return view("user.login");
        }
    }

    public function register()
    {
        $post = Request::get('post');
        if( CSRFToken::checkToken($post->token)) {
            $rule = [
                "name" => [ "minLength" => 5, "string" =>true, "required"=> true, ],
                "email" => [ "unique" => "users", "email"=> true, "required" => true,],
                "password" => [ "minLength" => 6, "required" => true]
            ];
            $validate = new ValidateRequest();
            $validate->checkValidate($post, $rule);
            if($validate->hasError()) {
                $errors = $validate->getError();
                return view("user.register", compact('errors'));
            } else {
                if($post->password == $post->confirm_password) {
                    $user = new User();
                    $user->name = $post->name;
                    $user->email = $post->email;
                    $user->password = password_hash($post->password, PASSWORD_BCRYPT);
                    if($user->save()) {
                        Session::replace("userId", $user->id);
                        return Redirect::to("user/register");
                    } else {
                        echo "database error";
                    }
                } else {
                    echo "password do not match";
                }
            }
        }
    }
    
    public function showRegister()
    {
        if(!Auth::check()) {
            return view("user.register");
        }
    }

    public function logout()
    {
        Session::remove("userId");
        return Redirect::to("");
    }
}