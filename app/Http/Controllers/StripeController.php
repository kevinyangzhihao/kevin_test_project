<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;


class StripeController extends Controller
{

    public function getSession() {
        $stripe = new StripeClient(
            env('STRIPE_API_KEY')
        );

        $checkout = $stripe->checkout->sessions->create([
            'success_url' => 'https://127.0.0.1:8000/success',
            'cancel_url' => 'https://127.0.0.1:8000/cancel',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => 500,
                        'product_data' => [
                            'name' => "Cool stripe checkout",
                        ]
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
        ]);

        return $checkout;


    }


}
