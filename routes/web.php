<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Shop\MainController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// General Routes
Route::get('/home', function () {
    return view('index');
})->name('home');
Route::get('/', function () {
    return view('index');
});
Route::get('/blog', [MainController::class, 'blog'])->name(('blog'));
Route::get('/about', [MainController::class, 'about'])->name(('about'));
Route::get('/contact', [MainController::class, 'contact'])->name(('contact'));

// Shops
Route::get('/shops', [MainController::class, 'index'])->name(('shops.index'));
Route::get('/shops/{shop}/product', [MainController::class, 'show'])->name(('shops.show'));
Route::get('/shops/categories/{category}', [MainController::class, 'categories'])->name(('shops.categories'));
// Cart
Route::get('/shops/cart', [CartController::class, 'index'])->name('shops.cart');
Route::delete('/shops/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::POST('/shops', [CartController::class, 'store'])->name(('cart.store'));


// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/subscribe', function () {
    return view('subscription');
});
Auth::routes();
