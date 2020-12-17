<?php

namespace App\Controllers;

class BaseController
{
    public function index()
    {
        echo "I'm index method</br>";
        view("index");
    }
}