<?php

namespace App\Http\Controllers;

use App\Events\TransactionProcessed;
use App\Models\FreezingAmount;
use App\Models\Payment;
use App\Models\PaymentForm;
use App\Models\Shop;
use App\Models\Transactions;
use Illuminate\Http\Request;
use App\Models\PaymentList;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Payments\Facades\PaymentsFacad as Payments;
use Payments\Collection\Dto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($payment, $shop_id, $currency, $price)
    {
        $pay = PaymentList::where('name', $payment)->where('currency', $currency)->first();

        $paymForm = PaymentForm::where('user_id', $shop_id)->where('blocked', 0)->orderBy('id', 'desc')->first();

        if(!$paymForm){
            return redirect(route('order_block'));
        }


        if($price < $pay->limit){
            throw new \Exception('Миннимальная сумма 5', 400);
        }

        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;
        $limit = $pay->serv_limit;

        $pay_sum = $price * ($pay->percent / 100);   //сумма комиссий платежки
        $sum = $price * ($percent / 100);  //сумма процента внутренней системы

        $total = $price + $pay_sum + $sum + $pay->commission + $commission;
        $tot2 = $price + $sum + $commission;

        if ($pay->serv_limit != 0 && $pay->serv_limit < $price) {
            abort('Привышение лимитов платежа!', 406);
        }

        $createAtt = $paymForm->created_at->addMinutes(20);

        $now = Carbon::now()->timestamp;
        $createAt = $paymForm->created_at->addMinutes(20)->timestamp;

        $tarnsaction_id = Session::get('transaction_id');
        if (isset($tarnsaction_id) && $now < $createAt){
            $transaction = Transactions::find($tarnsaction_id);
        }

        else {

            $transaction = Transactions::create([
                'amount'=>$price,
                'status'=>'process',
                'currency'=>$currency,
                'shop_id'=>$shop_id,
                'payment'=>$payment,
                'total'=>$tot2,
                'pay_commission'=>$pay_sum,
                'pay_percent'=>$pay->percent,
                'pay_limit'=>$pay->limit,
                'serv_commission'=>$pay->serv_commission,
                'serv_percent'=>$pay->serv_percent,
                'serv_limit'=>$pay->serv_limit


            ]);

            Session::put('transaction_id', $transaction->id);
        }



        $transaction_id =$transaction->id;




        if ($now > $createAt){

            $transaction->status='block';
            $transaction->save();

            return redirect(route('order_fail' , ['transaction_id' => $transaction_id]), 301);
        }

        $tot2 *= 100;

        $dto = new Dto([
            'payment' => $payment,
            'transaction_id' => $transaction->id,
            'shop_id' => $shop_id,
            'currency' => $currency,
            'price' => $tot2]);

        $payResult = Payments::transactionCreate($dto);

        if($payResult['error']['code']>0)
        {
            dd($payResult);
        }
        return view('order.order', compact('payResult', 'transaction_id', 'price', 'currency', 'shop_id', 'payment', 'total', 'tot2','now', 'createAt', 'createAtt'));

    }

    public function callback($transaction_id)
    {
        $transac = Transactions::find($transaction_id);
        $transac->status = 'success';
        $transac->save();

        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->orderBy('id', 'desc')->first();
        $payInfo->transaction_id = $transaction_id;
        $payInfo->status = 1;
        $payInfo->save();

            return view('order.callback', compact('transaction_id'));
    }

    public function success($transaction_id)
    {
        $transac = Transactions::find($transaction_id);
        $transac->status = 'success';
        $transac->save();

        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->orderBy('id', 'desc')->first();
        $payInfo->transaction_id = $transaction_id;
        $payInfo->status = 1;
        $payInfo->save();

        return view('order.success', compact('transaction_id'));
    }

    public function fail($transaction_id)
    {
        $transac = Transactions::find($transaction_id);
        $transac->status = 'fail';
        $transac->save();

        $payInfo = PaymentForm::where('user_id', $transac->shop_id)->orderBy('id', 'desc')->first();
        $payInfo->transaction_id = $transaction_id;
        $payInfo->status = 0;
        $payInfo->blocked = 1;
        $payInfo->save();

        return view('order.fail', compact('transaction_id'));
    }

    public function block()
    {
        return view('order.block');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payCul(Request $request)
    {
        dd($request->all());
        $payment_list_id = $request->get('payment_list_id');
        $shop_id = $request->get('shop_id');
        $transaction_id = $request->get('transaction_id');
        $price = $request->get('price');
        $pay = PaymentList::find($payment_list_id);
//        $user = User::find($shop_id);
//        $wallet = $user->payments()->where('currency', $pay->currency)->where('slug', $pay->slug)->first();
        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;
        $limit = $pay->serv_limit;

        $pay_sum = $price * ($pay->percent / 100);   //сумма комиссий платежки
        $sum = $price * ($percent / 100);  //сумма процента внутренней системы

        $total = $price + $pay_sum + $sum + $pay->commission + $commission;

        if ($pay->limit != 0 && $total > $pay->limit) {
            abort('Привышение лимитов платежа!', 406);
        }

        if ($limit != 0 && $total > $limit) {
            abort('Привышение внутренних лимитов!', 406);
        }

        return [
            'total' => $total,
            'pay' => [
                'commission' => $pay->commission,
                'percent' => $pay->percent,
                'limit' => $pay->limit,
                'number' => $pay->number
            ],
            'serv' => [
                'commission' => $commission,
                'percent' => $percent,
                'limit' => $limit
            ],
            'shop' =>[
                'action' => $pay->action,
//                'method' => $pay->method,
                'params' => $pay->params
            ]
        ];
    }

    public function paySubmit(Request $request)
    {
        $payment_list_id = $request->get('payment_list_id');
        $shop_id = $request->get('shop_id');
        $transaction_id = $request->get('transaction_id');
        $price = $request->get('price');
        $total = $request->get('total');
        $user = User::find($shop_id);
        $pay = PaymentList::find($payment_list_id);
        $wallet = $user->payments()->where('currency', $pay->currency)->where('slug', $pay->slug)->first();
        $commission = $pay->serv_commission;
        $percent = $pay->serv_percent;
        $limit = $pay->serv_limit;

        $transaction = new Transactions();
        $data = [
            'transaction_id' => $transaction_id,
            'payment_id' => $wallet->id,
            'pay_id' => $pay->id,
            'amount' => $price,
            'status' => 'process',
            'currency' => $pay->currency,
            'shop_id' => $user->id,
            'total' => $total,
            'pay_commission' => $pay->commission,
            'pay_percent' => $pay->percent,
            'pay_limit' => $pay->limit,
            'serv_commission' => $commission,
            'serv_percent' => $percent,
            'serv_limit' => $limit,
            'from' => 'client',
            'to' => 'shop'
        ];
        $transaction->fill($data);
        $transaction->save();

        event(new TransactionProcessed($transaction));
    }

}
