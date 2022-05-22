<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransactions extends Model
{
    use HasFactory;

    protected $table = 'user_transactions';

    protected $fillable = [
        'user_id',
        'transaction_id'
    ];
}
