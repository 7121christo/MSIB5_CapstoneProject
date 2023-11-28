<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\LoginGoogleController;

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

Route::get('/shop', [ProductsController::class, 'indexshop'])->name('indexshop');


Route::controller(ProductsController::class)->group(function(){
    Route::get('/products','index')->name('products');
    Route::post('/products', 'store')->name('products.store');
    Route::put('/products/{id}', 'update')->name('products.update');
    Route::delete('/products/delete/{id}', 'destroy')->name('products.delete');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Login gooogle
Route::get('auth/google', [LoginGoogleController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('auth/google/callback', [LoginGoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');