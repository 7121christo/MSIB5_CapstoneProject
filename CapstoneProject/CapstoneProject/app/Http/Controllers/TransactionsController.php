<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use App\Models\Carts;
use App\Models\Products;
use App\Models\Transactions;
use Illuminate\Http\Request;


class TransactionsController extends Controller
{

    // public function checkout(){
    //     return view('checkout');
    // }
    public function show_order(){
        return view('show_order', compact('transactions'));
    }

    


}