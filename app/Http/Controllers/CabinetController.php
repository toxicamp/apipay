<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;

class CabinetController extends Controller
{

    /**
     * @var User
     */

    private $user;
    /**
     * Create a new controller instance.
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct()
    {

        //$this->middleware(['auth','2fa']);

        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            if($this->user->twofagoogle){
               // $this->middleware(['auth','2fa']);
            }else{
              //  $this->middleware(['auth']);
            }

            return $next($request);
        });

        $twofagoogle = 1;


    }
}
