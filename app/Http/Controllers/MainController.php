<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){

        $products = Product::all();
        $cart = Cart::where('user',session()->getId())->get();

        return view('index',[
            'products' => $products,
            'cart' => $cart
        ]);
    }

    public function about(){

        $cart = Cart::where('user',session()->getId())->get();

        return view('about',[

            'cart' => $cart
        ]);
    }
}
