<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;


class StripeController extends Controller
{

    public function getSession() {
        $stripe = new StripeClient(
            env('STRIPE_SECRET')
        );

//        $checkout = $stripe->checkout->sessions->create([
//            'success_url' => 'http://127.0.0.1:8000/success',
//            'cancel_url' => 'http://127.0.0.1:8000/cancel',
//            'line_items' => [
//                [
//                    'price_data' => [
//                        'currency' => 'usd',
//                        'unit_amount' => 500,
//                        'product_data' => [
//                            'name' => "Cool stripe checkout",
//                        ]
//                    ],
//                    'quantity' => 1,
//                ],
//            ],
//            'mode' => 'payment',
//        ]);

        $subTime = $stripe->checkout->sessions->create([
            'success_url' => 'http://127.0.0.1:8000/success',
            'cancel_url' => 'http://127.0.0.1:8000/cancel',
            'line_items' => [
                [
                    'price' => 'price_1LiNSUAiWKWREfWc2paZr3OU',
                    'quantity' => 1,
                ],
            ],
            'mode' => 'subscription',
        ]);

        return ['subTime'=>$subTime];
//        return ['oneTime' => $checkout, 'subTime' => $subTime];


    }


    public function webhook(Request $request) {
        Log::info("webhook");
        $endpoint_secret = env("STRIPE_WEBHOOK");

            // Only verify the event if there is an endpoint secret defined
            // Otherwise use the basic decoded event
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $payload = @file_get_contents('php://input');
            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload, $sig_header, $endpoint_secret
                );
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                // Invalid signature
                echo '⚠️  Webhook error while validating signature.';
                http_response_code(400);
                exit();
            }


        if ($request->type=='checkout.session.completed') {
            Log::info('donedone');
        }

        return response()->json(["status"=>"success"]);

}



}


