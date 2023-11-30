<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    //
    public function checkout(){

    }
    public function show_order(){
        return view('show_order', compact('transactions'));
    }


}