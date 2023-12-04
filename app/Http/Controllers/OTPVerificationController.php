<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PhoneVerification;

class OTPVerificationController extends Controller
{
    public function showOTPVerificationForm()
    {
        return view('verify-otp'); 
    }

    public function verifyOTP(Request $request)
    {
        $user = Auth::user(); 
        $otpEntered = $request->input('otp');

    
        $storedOTP = PhoneVerification::where('user_id', $user->id)->value('otp');

        if ($otpEntered == $storedOTP) {
          
            PhoneVerification::where('user_id', $user->id)->update(['verified' => true]);
        
        
            $userRole = Auth::user()->role;
        
          
            switch ($userRole) {
                case '2':
                    return redirect('/admin')->with('success', 'OTP verified successfully!');
                case '5':
                    return redirect('/client')->with('success', 'OTP verified successfully!');

                
            }
        } else {
           
            return redirect('/verify-otp')->with('error', 'Invalid OTP. Please try again.');
        }
        
    }
}
