@extends('layouts.admin')

@section('content')
    <h1>Edit Room</h1>
    <form action="{{ route('rooms.update', $room->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="room" class="form-label">Room</label>
            <input type="text" name="room" id="room" class="form-control" value="{{ $room->room }}" required>
        </div>
        <div class="mb-3">
            <label for="seats" class="form-label">Seats</label>
            <input type="number" name="seats" id="seats" class="form-control" value="{{ $room->seats }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
