<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreezingUserPaymentTransactions extends Model
{
    use HasFactory;

    protected $table = 'freezing_user_payment_transactions';

    protected $fillable = [
        'user_id',
        'freezing_id',
        'payment_id',
        'transaction_id'
    ];
}
