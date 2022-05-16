<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\CabinetController;
use App\Models\PaymentForm;
use App\Models\PaymentList;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends CabinetController
{


    public function __construct()
    {

        if(\request()->get('twofagoogleset')){
            $this->middleware(['auth','2fa']);

        }else{
            $this->middleware(['auth']);
        }

//        if (auth()->user()->is2Fa())
//        {
//            $this->middleware(['2fa']);
//        }


    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return redirect(route('profile_me'));
    }

    /**
     *
     *
     *
     * @param  \App\Models\User  $user
     *
     */
    public function me(Request $request)
    {

        $user = Auth::user();


        $registration_data = [
            'email'=>$user->email,
        ];
        $google2fa = app('pragmarx.google2fa');



        if(!$user->twofagoogle){
            $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $registration_data['email'],
                $registration_data['google2fa_secret']
            );

            $request->session()->flash('registration_data', $registration_data);

        }else{
            $QR_Image = '';
            $registration_data["google2fa_secret"] = $user->google2fa_secret;
        }

        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();



        return view('profile.me',[
            'user'=>$user,
            'QR_Image' => $QR_Image,
            'trans'=>$transactions->groupBy('currency'),
            'secret' => $registration_data['google2fa_secret'
           ]
        ]);
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);

        $user = User::query()->where('id',$request->post('id'));
        $user->update([
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'kuna'=>$request->post('kuna'),
        ]);

        $user_currency = User::query()->where('id',$request->post('id'));
        $user_currency->update(['4bil'=>$request->post('4bil'),
            'global'=>$request->post('global'),
        ]);




        return redirect()->route('profile_me')->with('success','Пользователь обновлен!');
    }

    /**
     * Обновляет указанный ресурс в хранилище
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function twoFaGoogle(Request $request)
    {
        $user = Auth::user();


        $user->update([
            'twofagoogle'=>$request->post('twofagoogle'),
            'google2fa_secret'=>$request->post('google2fa_secret'),
        ]);





        return redirect()->route('profile_me')->with('error','Двух-факторная авторизация включена');
    }



    public function transactions(Request $request)
    {
        $build = Transactions::select('*')->with('user');

        if ($request->has('shop_id')){
            $build->where($request->get('shop_id'), $request->get('value'));
        }

        if ($request->has('select'))
        {
            $build->where($request->get('select'), $request->get('value'));
        }
        if ($request->has('status'))
        {
            $build->where('status',$request->get('status'));
        }
        if ($request->has('limit'))
        {
            $users = $build->paginate($request->get('limit'));
        }
        else
        {
            $users = $build->paginate(10);
        }


        return view('profile.transactions', compact('users'));
    }

    public function conclusions()
    {
        return view('profile.conclusions');
    }

    public function currencies()
    {
        return view('profile.currencies');
    }

    public function userPage()
    {
        $transactions = Transactions::where('uder_id', auth()->id())->where('status', '!=', Transactions::BLOCK)->orderBy('id', 'desc')->get();
        return view('profile.userPage', ['trans'=>$transactions]);
    }

    public function discount()
    {
        return view('profile.discount');
    }

    public function affilProgram()
    {
        return view('profile.affilProgram');
    }

    public function fastOutput()
    {
        return view('profile.fastOutput');
    }
    public function arbitraryPayment()
    {
        $currency = 'UAH';
        $listPay = PaymentList::where('currency', $currency)->pluck('name', 'id');
        $copyListPay = $listPay->toArray();
        $key = array_key_first($copyListPay);
        $payActual = array_shift($copyListPay);
        $paymList = PaymentForm::where('user_id', auth()->id())->orderBy('id', 'desc')->get();


        return view('profile.arbitrary-payment', compact('listPay','paymList'));
    }

    public function arbitraryPaymentSave(Request $request)
    {
        $transaction = Transactions::create([
            'amount'=>$request->get('payment'),
            'status'=>'process',
            'currency'=>'UAH',
            'shop_id'=>auth()->user()->id,
            'total'=>0,
        ]);

       $paymList = PaymentList::find($request->get('listpay'));
        $payForm = PaymentForm::create([
            'user_id'=>auth()->user()->id,
            'sum'=>$request->get('payment'),
            'payment'=>$paymList->name,
            'transaction_id'=> $transaction->id
            ]);

        $payForm->url = env('APP_URL').'/form/'.$paymList->name.'/'.auth()->user()->id.'/UAH/'.$request->get('payment').'/'.$payForm->id;
        $payForm->save();
        $transaction->url_id = $payForm->id;
        $transaction->save();

        return redirect(route('profile_arbitraryPayment'));
    }
    public function statUser()
    {
        $transactions = Transactions::where('shop_id', auth()->user()->id)->where('status', '=', 'success')->orderBy('id', 'desc')->get();

        return view('profile.statUser', ['trans'=>$transactions->groupBy('currency')]);
    }
    public function userTransaction(Request $request)
    {
        $build = Transactions::where('shop_id', auth()->id());

        if ($request->has('select'))
        {
            $build->where($request->get('select'), $request->get('value'));
        }
        if ($request->has('status'))
        {
            $build->where('status',$request->get('status'));
        }
        if ($request->has('limit'))
        {
            $build->limit($request->get('limit'));
        }

//        dd(vsprintf(str_replace(['?'], ['\'%s\''], $build->toSql()), $build->getBindings()));

        $transactions = $build->orderBy('id', 'desc')->get();
        return view('profile.userTransact', ['trans'=>$transactions]);
    }
    public function conclusionsCreate()
    {
        return view('profile.conclusionsCreate');
    }

    public function conclusionsPays()
    {
        return view('profile.conclusionsPays');
}
    public function sample()
    {
        return view('profile.sample');
    }
    public function discUser()
    {
        return view('profile.discUser');
    }
//    public function changePass()
//    {
//        return view('profile.changePass');
//    }


}
