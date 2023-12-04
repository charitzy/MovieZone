<!-- resources/views/admin/movies/create.blade.php -->
@extends('layouts.admin')

@section('content')
    <h1>Add Movie</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
    
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" id="genre" name="genre" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time">
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
