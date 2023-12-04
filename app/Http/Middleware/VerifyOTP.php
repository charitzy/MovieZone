<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyOTP
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && !$request->user()->hasVerifiedPhone()) {
            return redirect('/verify-otp')->with('phone', $request->user()->phone);
        }

        return $next($request);
    }
}

