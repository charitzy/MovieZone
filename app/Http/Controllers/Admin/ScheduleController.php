<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Room;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.schedules.create', compact('movies', 'rooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'movie_id' => 'required',
            'room_id' => 'required',
        ]);

        $schedule = new Schedule();
        $schedule->date = $request->date;
        $schedule->time = $request->time;
        $schedule->movie_id = $request->movie_id;
        $schedule->room_id = $request->room_id;
        $schedule->save();

        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit(Schedule $schedule)
    {
        $movies = Movie::all();
        $rooms = Room::all();
        return view('admin.schedules.edit', compact('schedule', 'movies', 'rooms'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'movie_id' => 'required',
            'room_id' => 'required',
        ]);

        $schedule->date = $request->date;
        $schedule->time = $request->time;
        $schedule->movie_id = $request->movie_id;
        $schedule->room_id = $request->room_id;
        $schedule->save();

        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
