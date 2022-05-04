<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers {
         // We are doing this so the predefined register method does not clash with this one we just defined.
           register as registration;
       }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kuna'=> ['required', 'double (8, 2)'],
            '4bil'=> ['required', 'double (8, 2)'],
            'global'=> ['required', 'double (8, 2)'],
            'BTC'=> ['required', 'decimal ($precision = 8, $scale = 2)'],
            'RUB'=> ['required', 'double (8, 2)'],
            'UAH'=> ['required', 'double (8, 2)'],
            'USDT'=> ['required', 'double (8, 2)'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'USDT' => $data['USDT'],
            'UAH' => $data['UAH'],
            'RUB' => $data['RUB'],
            'BTC' => $data['BTC'],
            'global' => $data['global'],
            '4bil' => $data['4bil'],
            'kuna' => $data['kuna'],
            'password' => Hash::make($data['password']),
            'google2fa_secret' => $data['google2fa_secret'],
            'api_token' => Str::random(60),
            'role' => User::USER,
        ]);
    }

      public function register(Request $request)
      {
          //Validate the incoming request using the already included validator method
          $this->validator($request->all())->validate();

          // Initialise the 2FA class
          $google2fa = app('pragmarx.google2fa');

          // Save the registration data in an array
          $registration_data = $request->all();

          // Add the secret key to the registration data
          $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

          // Save the registration data to the user session for just the next request
          $request->session()->flash('registration_data', $registration_data);

          // Generate the QR image. This is the image the user will scan with their app
       // to set up two factor authentication
          $QR_Image = $google2fa->getQRCodeInline(
              config('app.name'),
              $registration_data['email'],
              $registration_data['google2fa_secret']
          );

          // Pass the QR barcode image to our view
          return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
      }

      public function completeRegistration(Request $request)
      {
          // add the session data back to the request input
          $request->merge(session('registration_data'));

          // Call the default laravel authentication
          return $this->registration($request);
      }


}
