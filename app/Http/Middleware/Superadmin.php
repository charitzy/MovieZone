<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Superadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(!Auth::check()){
            return redirect()->route('login');
        }
        $user=Auth::user();
        if($user->role==1){
            return $next($request);
        }
        if($user->role==2){
            return redirect()->route('admin');//admin
        }
        if($user->role==3){
            return redirect()->route('depthead');
        }
        if($user->role==4){
            return redirect()->route('staff');
        }
        if($user->role==5){
            return redirect()->route('client');//customer
        }
        
    }
}
