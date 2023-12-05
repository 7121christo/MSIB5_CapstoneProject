<?php

namespace App\Http\Controllers;
use App\Models\Carts;
use App\Models\User;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailTransactions;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class DetailTransactionsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $cartItems = Carts::with('product')->get();

        $totalAmount = 0;
    $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $productName = $cartItem->product->name;
        $productAmount = $cartItem->amount;
        $productTotalPrice = $cartItem->total_price;

        // Use the product information as needed

        // Update total amount and total price
        $totalAmount += $productAmount;
        $totalPrice += $productTotalPrice;
    }
    $transaction = Transactions::create([
        'invoice' => $user->name,
        'is_paid' => 0,
        'user_id' => $user->id, 
    ]);

        return view('checkout', compact('user', 'cartItems', 'totalAmount', 'totalPrice'));
    }

    public function checkout(){




    $user_id = Auth::id();
    $carts = Carts::where('user_id', $user_id)->get();

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $totalAmount = 0;
    $totalPrice = 0;

    foreach ($carts as $cart) {
        $totalAmount += $cart->amount;
        $totalPrice += $cart->total_price;
    }

    $order_id = $carts->first()->id;

    $params = array(
        'transaction_details' => array(
            'order_id' => $order_id,
            'gross_amount' => $totalPrice,
        ),
        'customer_details' => array(
            'name' => Auth::user()->name,
            'phone' => Auth::user()->phone,
        ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    return view('checkout', compact('snapToken', 'carts', 'totalAmount', 'totalPrice'));
}



}