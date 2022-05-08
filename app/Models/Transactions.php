<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transactions extends Model
{
    use HasFactory;
    use SoftDeletes;

    const BLOCK = 'block';

    protected $table = 'transaction';

    protected $fillable = [
        'amount',
        'status',
        'pay_id',
        'transaction_id',
        'payment_list_id',
        'payment_id',
        'currency',
        'shop_id',
        'total',
        'pay_commission',
        'pay_percent',
        'pay_limit',
        'serv_commission',
        'serv_percent',
        'serv_limit',
        'from',
        'to',
        'payment',
        'point',
        'key',
        'hash',
        'pay_result'

    ];
}
