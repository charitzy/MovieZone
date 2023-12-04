<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        
        $schedules = Schedule::all();
        $movies = Movie::all();
        $bookings = Booking::Where('user_id', auth()->user()->id)->get();
        return view('user.client', compact('schedules', 'movies','bookings'));
    }
   


}
