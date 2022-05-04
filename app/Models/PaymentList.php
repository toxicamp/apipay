<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentList extends Model
{
    use HasFactory;

    protected $table = 'payment_list';

    protected $fillable = [
        'name',
        'currency',
        'commission',
        'serv_commission',
        'percent',
        'serv_percent',
        'public_key',
        'private_key',
        'token',
        'limit',
        'serv_limit',
        'action',
        'params',
        'slug',
        'number'


    ];

    const EASYPAY = 'easypay';
    const KUNA = 'kuna';
    const FOURBIL = '4bil';
    const GLOBAL = 'global';
}
