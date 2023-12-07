<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use App\Models\Carts;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\DetailTransactions;



class TransactionsController extends Controller
{



    public function indextransaction()
    {
        $user = Auth::user();
        $is_admin = $user->is_admin;
        if($is_admin)
        {
            $orders = Transactions::all();
        }
        else
        {
            $orders = Transactions::where('user_id', $user->id)->get();
        }
        return view('indextransaction', compact('orders'));
    }


    public function show_order(){

        $user = Auth::user();
        $is_admin = $user->is_admin;


        return view('show_order', compact('transactions'));
    }

    public function callback(Request $request)
{
    $serverKey = config('midtrans.server_key');
    $hashed = hash('sha512', $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

    if ($hashed == $request->signature_key) {
        if ($request->transaction_status == 'capture') {
            $change = Transactions::find($request->id);

            if ($change) {
                $change->is_paid = 'Paid';
                $change->save();

                // Debugging
                dd('Change saved:', $change);

                $user_id = Auth::id();
                $carts = Carts::where('user_id', $user_id)->get();
                $user = Auth::user();

                $totalPrice = max(round($carts->sum('total_price')), 0.01);

                $products = Carts::pluck('product_id');
                $trans_id = Transactions::pluck('id');

                // Debugging
                dd('Creating DetailTransaction:', $totalPrice, $products->first(), $trans_id->first());

                DetailTransactions::create([
                    'total_amount' => (int)$totalPrice,
                    'product_id' => $products->first(),
                    'transaction_id' => $trans_id->first(),
                    'user_id' => Auth::user()->id
                ]);
            }
        }
    }
}

    

}