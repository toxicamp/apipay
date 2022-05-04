<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreezingAmount extends Model
{
    use HasFactory;

    protected $table = 'freezing_amount';

    protected $fillable = [
        'amount',
        'payment_id',
        'user_id',
        'transaction_id',
        'currency',
        'pay_id',
        'status', ['other', 'error', 'blocking', 'process', 'success']
    ];

    const FREEZING_OTHER = 'other';
    const FREEZING_ERROR = 'error';
    const FREEZING_BLOCKING = 'blocking';
    const FREEZING_PROCESS = 'process';
    const FREEZING_SUCCESS = 'success';

    public function user()
    {
        return $this->hasOne (User::class);
    }

    public function payment()
    {
        return $this->hasOne (Payment::class);
    }

    public function transaction()
    {
        return $this->hasMany (Transactions::class);
    }

    public function pay()
    {
        return $this->hasOne (PaymentList::class, 'pay_id');
    }

    public static function balanceVerification($user_id, $pay_id, $payment_id, $currency)
    {
        return self::where('user_id', $user_id)
            ->where('pay_id', $pay_id)
            ->where('payment_id', $payment_id)
            ->where('currency', $currency)
            ->whereIn('status', [self::FREEZING_BLOCKING, self::FREEZING_PROCESS])
            ->get();
    }
}
