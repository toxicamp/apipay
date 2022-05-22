<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $user = Auth::user();

        if($user->twofagoogle){

            $google2fa = session()->get('google2fa');
            if(!is_array($google2fa)){
                $google2fa = [];
            }
            if(!array_key_exists('auth_passed',$google2fa)){


                return redirect()->route('profile_index',['twofagoogleset'=>1]);

            }
            return redirect()->route('profile_index');


        }else{

            return redirect()->route('profile_me');
        }



    }
}
