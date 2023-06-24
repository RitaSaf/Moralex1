<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Product $id){

        $cart = Cart::where('user',session()->getId())->get();

        return view('product',[
            'product' => $id,
            'cart' => $cart
        ]);
    }
}
