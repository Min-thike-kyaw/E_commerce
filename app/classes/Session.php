<?php

namespace App\Classes;

class Session
{
    public static function add($key, $value)
    {
        if(!self::has($key)) {
            $_SESSION[$key] = $value;
        } else {
            echo "session with this" . $key . " already exists";
        }
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]) ? true : false;
    }

    public static function remove($key)
    {
        if(self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function get($key) {
        if( self::has($key)) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public static function replace($key, $value)
    {
        if(Session::has($key)) {
            self::remove($key);
        }
        self::add($key, $value);
    }

    public static function flash($key, $value ="")
    {
        
        if(!empty($value)) {
            self::add($key, $value);
        } else {
            if( isset($_SESSION[$key])) {
                echo "<div class='alert alert-success'>" . $_SESSION[$key] . "</div>";
                self::remove($key);
            }
        }
    }
}