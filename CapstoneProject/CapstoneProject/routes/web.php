<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Products;
use GuzzleHttp\Promise\Create;

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
Route::get('/cart', function (){
    return view('cart');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login gooogle
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback'])->name('google.callback');

