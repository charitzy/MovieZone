<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        // Add other fillable columns here if needed
    ];

    // Add relationships or additional methods as required
}
