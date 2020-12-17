<?php

namespace App\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use App\Classes\Request;

class PaymentController
{
    public function stripePayment()
    {
        $post = Request::get('post');
        $token = $post->stripeToken;
        $email = $post->stripeEmail;
        
        $customer = Customer::create([
            'email' => $email,
            'source' => $token
        ]);

        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => 5000,
            'currency' => 'usd',
        ]);
        die(beautify($charge));
    }
}