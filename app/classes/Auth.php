<?php

namespace App\Classes;

use App\Models\User;
use App\Classes\Session;

class Auth
{
    public static function check()
    {
        return Session::has("userId");
    }

    public static function user()
    {
        return User::where("id", Session::get("userId"))->first();
    }
}