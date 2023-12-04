<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    use RegistersUsers;

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
            'mobile_no' => ['nullable', 'string', 'max:255'], // Add validation for mobile_no
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha'

        ],
        [
            'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
            ],
        ]
        );
    
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['role'] = '5'; // Set the 'role' value to '2' in the $data array
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_no' => $data['mobile_no'],
            'role' => $data['role'], // Use the modified 'role' value from the $data array
            'password' => Hash::make($data['password']),
        ]);
    }
}
