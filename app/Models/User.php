<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile_no', // Add the mobile_no field here
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function createPhoneVerification()
    {
        // Generate OTP
        $otp = strval(mt_rand(100000, 999999));
    
        // Store the OTP in the database
        DB::table('phone_verifications')->updateOrInsert(
            ['user_id' => $this->id],
            ['otp' => $otp, 'created_at' => now()]
        );
    
        // Format the phone number
        $phoneNumber = preg_replace('/^0/', '+63', $this->mobile_no);
    
        // Initialize Twilio client
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    
        // Send OTP via Twilio as a message
        $message = $twilio->messages->create(
            $phoneNumber,
            [
                'from' => env('TWILIO_PHONE_NUMBER'), // Your Twilio phone number
                'body' => "Your verification code is: $otp"
            ]
        );
    
        return $otp;
    }
    


    public function completePhoneVerification($otp)
    {
        // Retrieve OTP from the database
        $verification = DB::table('phone_verifications')
            ->where('user_id', $this->id)
            ->latest()
            ->first();

        if ($verification && $verification->otp === $otp) {
            // Mark phone as verified
            $this->phone_verified_at = now();
            $this->save();

            return (object)['valid' => true];
        }

        return (object)['valid' => false];
    }

    public function hasVerifiedPhone()
    {
        return !is_null($this->phone_verified_at);
    }
}
