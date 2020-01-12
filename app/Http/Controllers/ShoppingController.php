<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart()
    {

        $pdt = Product::find(request()->pdt_id);
        $cart = Cart::add([
           'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);
        Cart::associate($cart->rowId, 'App\Product');
       return redirect()->back();
    }

    public function cart()
    {
//        Cart::destroy();
        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function increment($id, $qty)
    {
        Cart::update($id, $qty+1);
        return redirect()->back();
    }

    public function decrement($id, $qty)
    {
        Cart::update($id, $qty-1);
        return redirect()->back();
    }

    public function rapid($id)
    {
        $pdt = Product::find($id);
        $cart = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price
        ]);
        Cart::associate($cart->rowId, 'App\Product');
        return redirect()->back();
    }
}
