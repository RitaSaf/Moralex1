<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//Views.
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/product/{id}', [ProductsController::class, 'index'])->name('product.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/about', [MainController::class, 'about'])->name('about');

//Functions.
Route::post('/add-to-cart/{product}', [CartController::class, 'store'])->name('cart.add_to_cart');
Route::post('/update-qty/{cart}', [CartController::class, 'update_qty'])->name('cart.update_qty');
Route::post('/delete-product/{cart}', [CartController::class, 'delete_product'])->name('cart.delete_product');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

