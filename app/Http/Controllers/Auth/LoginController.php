<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if (!$user->hasVerifiedPhone()) {
            // Generate and store OTP
            $otp = $user->createPhoneVerification();

            // Redirect to OTP verification page
            return redirect('/verify-otp')->with('phone', $user->phone);
        }

        // If already verified, proceed to the intended destination based on role
        return $this->redirectBasedOnRole($user);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return $this->authenticated($request, $user);
        }

        return redirect('login')->with('error', 'The credentials do not match our records');
    }

    // ... (existing code for OTP verification)

    protected function redirectBasedOnRole($user)
    {
        // Your existing logic for redirecting based on user role goes here
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}