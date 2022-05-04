<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentForm extends Model
{
    use HasFactory;

    protected $table = 'payment_form_url';

    protected $fillable = [
        'user_id',
        'sum',
        'status',
        'url',
        'payment',
        'transaction_id'
    ];

    public function getUserAttribute()
    {
        $user = User::find($this->user_id);
        return $user;
    }
}
