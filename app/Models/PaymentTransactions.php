<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransactions extends Model
{
    use HasFactory;

    protected $table = 'payment_transactions';

    protected $fillable = [
        'user_id',
        'payment_id'
    ];
}
