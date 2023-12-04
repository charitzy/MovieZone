@extends('layouts.admin')

@section('content')
    <h1>Create Room</h1>
    <form action="{{ route('rooms.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="room" class="form-label">Room</label>
            <input type="text" name="room" id="room" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="seats" class="form-label">Seats</label>
            <input type="number" name="seats" id="seats" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
