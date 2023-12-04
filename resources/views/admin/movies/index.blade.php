<!-- resources/views/admin/movies/index.blade.php -->
@extends('layouts.admin')

@section('content')
<h1>Movies</h1>
<div class="card">
    <div class="card-body">

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">Add Movie</a>


        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th style="width: 300px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movies as $movie)
                <tr>
                    <td>
                        <img src="{{ asset('' . $movie->image) }}" alt="Movie Image" style="width: 70px; height: 70px;">
                    </td>

                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->price }}</td>
                    <td>{{ $movie->start_time }}</td>
                    <td>{{ $movie->end_time }}</td>
                    <td>
                        <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.movies.destroy', $movie) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">No movies found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection