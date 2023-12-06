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
use Illuminate\Support\Collection;


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
    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $user_id = Auth::id();
    $carts = Carts::where('user_id', $user_id)->get();
    $user= Auth::user();


    $totalPrice = max(round($carts->sum('total_price')), 0.01);



    $params = array(
        'transaction_details' => array(
            'order_id' => $carts->pluck('id')->first(),
            'gross_amount' => (int)$totalPrice,
            'currency' => 'IDR',
        ),
        'customer_details' => array(
            'name' => $user->name,
            'phone' => $user->phone,
        ),
    );

    // dd($params);

    $snapToken = \Midtrans\Snap::getSnapToken($params);



    return view('checkout', compact('snapToken','carts', 'totalPrice'));


    }
}
