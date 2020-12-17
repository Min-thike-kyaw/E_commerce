<?php


$dotEnv = new \Dotenv\Dotenv(APP_ROOT);

$dotEnv->load();

require_once __DIR__ . "/_stripe.php";