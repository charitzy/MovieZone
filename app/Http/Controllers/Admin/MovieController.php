<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'price' => 'required|numeric',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|after:start_time',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:10048', // Add image validation rules
        ]);

        $movie = new Movie();
        $movie->title = $validatedData['title'];
        $movie->description = $validatedData['description'];
        $movie->user_id = auth()->user()->id;
        $movie->genre = $validatedData['genre'];
        $movie->price = $validatedData['price'];
        $movie->start_time = $validatedData['start_time'];
        $movie->end_time = $validatedData['end_time'];

        if ($request->hasFile('image')) {
            $filename = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $filename);
            $movie->image = $filename;
        }

        $movie->save();

        return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully.');
    }


    public function edit(Request $request, Movie $movie)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'price' => 'required|numeric',
            'start_time' => 'nullable|date',
            'end_time' => 'nullable|date|after:start_time',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:10048', // Add image validation rules
        ]);

        $movie->title = $validatedData['title'];
        $movie->description = $validatedData['description'];
        $movie->genre = $validatedData['genre'];
        $movie->price = $validatedData['price'];
        $movie->start_time = $validatedData['start_time'];
        $movie->end_time = $validatedData['end_time'];

        // Handle image update
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('movies', 'public'); // Store the updated image in the 'public' disk under the 'movies' directory
            $movie->image = $imagePath;
        }

        $movie->save();

        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }


    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
