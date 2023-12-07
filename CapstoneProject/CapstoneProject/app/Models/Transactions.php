<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_paid',
        'invoice'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class);
    }
    public function detail()
    {
        return $this->hasMany(DetailTransactions::class);
    }
    public function detailTransactions()
{
    return $this->hasMany(DetailTransactions::class, 'transaction_id');
}

}