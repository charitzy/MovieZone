<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }
    public function booking()
    {
        $bookings = Booking::all();
        return view('admin.bookings.booking', compact('bookings'));
    }

    

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room' => 'required',
            'seats' => 'required|integer',
        ]);
    
        $room = new Room();
        $room->room = $validatedData['room'];
        $room->seats = $validatedData['seats'];
        $room->movie_id = '1';
        $room->save();
    
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }
    
    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room' => 'required',
            'seats' => 'required|integer',
        ]);

        $room->update($request->all());

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
