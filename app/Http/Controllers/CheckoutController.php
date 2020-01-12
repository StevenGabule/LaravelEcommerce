<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay()
    {
//        dd(request()->all());
        Stripe::setApiKey('sk_test_Mt0e9w6oIoxRFJXbmblOhwYi');
        $charge = Charge::create([
           'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Learn from the beast code',
            'source' => request()->stripeToken
        ]);

        Session::flash('success', 'Purchased successful. Wait for our email');
        Cart::destroy();
        Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccessful);
        return redirect()->route('index');
    }
}
