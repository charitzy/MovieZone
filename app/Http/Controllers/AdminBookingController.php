<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }
}
