<?php

use App\Classes\ErrorHandler;
use App\Classes\Database;

if(!isset($_SESSION)) session_start();
define("APP_ROOT" , realpath(__DIR__. '/../'));
define("URL_ROOT", 'http://localhost/E_commerce/public/');

require_once APP_ROOT . "/vendor/autoload.php";

require_once APP_ROOT . "/app/config/_env.php";

// set_error_handler([new ErrorHandler(), 'handleErrors']);
$whoops = new ErrorHandler();
$whoops->handleErrors();

new Database();

require_once APP_ROOT . "/app/routing/router.php";
