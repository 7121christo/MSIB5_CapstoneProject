<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginGoogleController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;



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

Route::get('/', function () {
    return view('home');
});

//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update/{cart}', [CartController::class, 'updateCart']);
Route::post('/cart/delete/{cart}', [CartController::class, 'deleteCartItem']);
Route::get('/cart/total', [CartController::class, 'getTotal']);
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/shop', [ProductsController::class, 'indexshop'])->name('indexshop');
Route::get('/shop/{id}', [ProductsController::class, 'show'])->name('detailshop');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login gooogle
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

//transaction
Route::get('/order/{order}', [TransactionsController::class, 'show_order'])->name('show_order');

Route::post('/transactions/{transactions}/pay', [TransactionsController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
