<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
 
    public function index()
    {
        $schedules = Schedule::all();
        $movies = Movie::all();
        return view('user.client', compact('schedules', 'movies'));
    }


    

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
        public function create(Request $request)
        {
            $id = $request->query('id');
            $schedules = Schedule::where('id', $id)->get();
            
            // Assuming 'room_id' is a foreign key in the 'schedules' table
            $rooms = Room::whereIn('id', $schedules->pluck('room_id'))->get();
            $movies = Movie::whereIn('id', $schedules->pluck('movie_id'))->get();
        
            return view('user.bookings.create', compact('schedules', 'rooms', 'movies'));
        }
        
   
    

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Booking $booking)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'room' => 'required',
            'price' => 'required|numeric',
            'schedule_id' => 'required',
        ]);

        $booking = new Booking();
        $booking->title = $request->title;
        $booking->genre = $request->genre;
        $booking->room = $request->room;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->price = $request->price;
        $booking->user_id = auth()->user()->id;
        $booking->schedule_id = $request->schedule_id;
        $booking->save();

        
        return redirect()->route('client')
            ->with('success', 'Booking created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $users = User::all();
        $schedules = Schedule::all();
        return view('user.bookings.edit', compact('booking', 'users', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'date' => 'required',
            'time' => 'required',
            'room' => 'required',
            'price' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
