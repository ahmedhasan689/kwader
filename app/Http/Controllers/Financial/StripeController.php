<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
        Charge::create([
           'amount' => 100,
           'currency' =>  'usd',
           'source' => $request->stripeToken,
           'description' => 'Test Payment From Ahmed',
        ]);

        session::flash('success', 'Payment Has Been Successfully');
        return redirect()->back();
    }
}
