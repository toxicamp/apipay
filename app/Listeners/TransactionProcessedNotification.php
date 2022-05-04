<?php

namespace App\Listeners;

use App\Events\TransactionProcessed;
use App\Models\PaymentList;
use App\Models\User;
use http\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Service\EasypayHelper;
use App\Service\FourbilHelper;
use App\Service\GlobalHelper;
use App\Service\KunaHelper;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionProcessedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TransactionProcessed  $event
     * @return void
     */
    public function handle(TransactionProcessed $event)
    {
        $transaction = $event->transaction;
        $pay = PaymentList::find($transaction->pay_id);
        $wallet = Payment::find($transaction->payment_id);

        $user = User::find($transaction->shop_id);
        Auth::login($user);

        $token = Str::random(60);
        $user->forceFill([
            'api_token' => $token,
        ])->save();

        $price = $transaction->amount;
        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;

        $sum = $price * ($percent / 100);  //сумма процента внутренней системы
        $servTotal = $price +  $sum + $commission;

        if($pay->slug == PaymentList::FOURBIL) {
            $paymentMethod = new FourbilHelper();
        } else {
            $slug = ucfirst($pay->slug);
            $methodName = $slug.'Helper';
            $paymentMethod = new $methodName();
        }

        while (true)
        {
            sleep(180);

            $paymentMethod->getToken();
            $paymentMethod->loginAuth();
            $paymentMethod->setNumber($wallet->number);
            $paymentMethod->setBalance($wallet->balance);
            if($paymentMethod->isTransactionSuccess())
            {
                $transaction->status = 'success';
                $transaction->save();

                $wallet->balance += $servTotal;
                $wallet->save();

                break;
            }
        }
    }
}
