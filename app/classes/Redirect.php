<?php

namespace App\Classes;

class Redirect
{
    public static function to($url)
    {
        header("Location:".URL_ROOT."$url");
    }
    public static function back()
    {
        $url = $_SERVER["REQUEST_URI"];
        return header("Location:$url");
    }
}