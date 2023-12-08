<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Carts;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\DetailTransactions;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class DetailTransactionsController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $cartItems = Carts::with('product')->get();

    $totalAmount = 0;
    $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $productName = $cartItem->product->name;
        $productAmount = $cartItem->amount;
        $productTotalPrice = $cartItem->total_price;

        $totalAmount += $productAmount;
        $totalPrice += $productTotalPrice;
    }

    $transaction = Transactions::create([
        'invoice' => $user->name,
        'is_paid' => 'Unpaid',
        'user_id' => $user->id,
    ]);

    //dd($transaction);

    return view('checkout', compact('user', 'cartItems', 'totalAmount', 'totalPrice'));
}

    public function precheckout(){
        $user= Auth::user();
        $cartItems = Carts::where('user_id', $user->id)->get();
        $totalPrice = max(round($cartItems->sum('total_price')), 0.01);
        return view('precheckout', compact ('user', 'cartItems', 'totalPrice'));
    }
    public function checkout(){
        $user = Auth::user();
        $cartItems = Carts::with('product')->get();

        $totalAmount = 0;
        $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $productName = $cartItem->product->name;
        $productAmount = $cartItem->amount;
        $productTotalPrice = $cartItem->total_price;

        $totalAmount += $productAmount;
        $totalPrice += $productTotalPrice;
    }

    $transaction = Transactions::create([
        'invoice' => $user->name,
        'is_paid' => 'Unpaid',
        'user_id' => $user->id,
    ]);
    session(['transactionId' => $transaction->id]);
    session(['userId' => $transaction->user_id]);
    session(['cartItems' => $cartItems]);
    session(['totalPrice' => $totalPrice]);
    // session(['totalAmount' => $totalAmount]);

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

    $cart_id = $carts->pluck('id')->first();

    $order_id = "user{$user_id}_cart{$cart_id}_" . Str::uuid();

    $params = array(
        'transaction_details' => array(
            'order_id' => $order_id,
            'gross_amount' => (int)$totalPrice,
            'currency' => 'IDR',
        ),
        'customer_details' => array(
            'name' => $user->name,
            'phone' => $user->phone,
        ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);

    // dd($snapToken);

    return view('checkout', compact('snapToken','carts', 'totalPrice'));

    }

    public function handlePayment(Request $request) {
        $status = $request->input('status');

        $transactionId = session('transactionId');
        $userId = session('userId');
        $cartItems = session('cartItems',[]);
        $totalPrice = session('totalPrice');
        // $totalAmount = session('totalAmount');

        if ($status === 'success') {
            foreach ($cartItems as $cartItem) {
                if (is_array($cartItem) || is_object($cartItem)) {
                    DetailTransactions::create([
                                'total_amount' => $cartItem->total_price,
                                'product_id' => $cartItem->product_id,
                                'transaction_id' =>  $transactionId,
                                'user_id' =>   $userId
                    ]);
                }
            }

            Transactions::where('id',$transactionId)->update(['is_paid' => 'Paid']);
            Carts::where('product_id',$cartItem->product_id)->delete();

            $product = Products::find($cartItem->product_id);
                if ($product) {
                    $newStock = $product->stock - $cartItem->amount;
                    $product->update(['stock' => $newStock]);
                }
        }
        return response()->json(['message' => 'Payment data received successfully']);
    }
}
