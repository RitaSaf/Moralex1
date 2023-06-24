<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request , Cart $cart,$product){

        $cart->user = session()->getId();
        $cart->product = $product;
        $cart->qty = $request->input('qty');
        $cart->size = $request->input('size');
        $cart->save();

        return redirect()->route('cart.index');
    }

    public function index(){

        $cart = Cart::where('user',session()->getId())->get();

        return view('cart',[
            'cart' => $cart
        ]);
    }

    public function update_qty(Request $request , Cart $cart){

    
        $cart->qty = $request->input('qty');
        $cart->update();

        return back();
    }

    public function delete_product( Cart $cart){

        $cart->delete();
        return back();
    }

    public function checkout(){

       session()->regenerate();
       session()->flash('success', 'Order has been sent successfully!');
       return back();
    }

}
