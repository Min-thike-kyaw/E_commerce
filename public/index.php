<?php

use App\Classes\Mail;
use App\Classes\Session;
use App\Models\Category;
use App\Classes\CSRFToken;
use App\Classes\ValidateRequest;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "../bootstrap/init.php";




// if( $validator->hasError()) {
//     beautify($validator->getError());
// } else {
//     echo "good to go";
// }




// Session::remove("token");
// if($mail->send($data)) {
//      echo "mail send successfully";
// } else {
//      echo "fail";
// }