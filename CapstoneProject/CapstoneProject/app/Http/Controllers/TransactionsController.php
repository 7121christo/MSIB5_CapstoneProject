<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use App\Models\Carts;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\DetailTransactions;



class TransactionsController extends Controller
{

    // public function checkout(){
    //     return view('checkout');
    // }
    public function show_order(){
        return view('show_order', compact('transactions'));
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->carts->id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key){
            if ($request->transaction_status == 'capture') {
                $change = Transactions::find($request->id);
                $change->update(['status' => 1]);


                $user_id = Auth::id();
                $carts = Carts::where('user_id', $user_id)->get();
                $user= Auth::user();


                $totalPrice = max(round($carts->sum('total_price')), 0.01);


                $products = Carts::pluck('product_id');
                $trans_id = Transactions::pluck('id');

                DetailTransactions::create([
                    'total_amount' => (int)$totalPrice,
                    'product_id' => $products->first(),
                    'transaction_id' => $trans_id->first(),
                    'user_id' => $user->id,
                ]);
            }
        }
    }

    public function invoice($id){
        $order = Carts::find($id);
        return view('invoice', compact('carts'));
    }




}
