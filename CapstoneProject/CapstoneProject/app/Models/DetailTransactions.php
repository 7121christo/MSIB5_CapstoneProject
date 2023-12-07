<?php

namespace App\Models;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'transaction_id',
        'user_id',
        'total_amount'
    ];

    public function order()
    {
        return $this->belongsTo(Transactions::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function transaction()
{
    return $this->belongsTo(Transactions::class, 'transaction_id');
}
}