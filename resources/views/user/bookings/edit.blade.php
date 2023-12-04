@extends('layouts.user_app')

@section('content')
    <h1>Edit Booking</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $booking->title }}">
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre" class="form-control" value="{{ $booking->genre }}">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ $booking->date }}">
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="text" name="time" id="time" class="form-control" value="{{ $booking->time }}">
                </div>
                <div class="form-group">
                    <label for="room">Room</label>
                    <input type="text" name="room" id="room" class="form-control" value="{{ $booking->room }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $booking->price }}">
                </div>
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $booking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="schedule_id">Schedule</label>
                    <select name="schedule_id" id="schedule_id" class="form-control">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}" {{ $schedule->id == $booking->schedule_id ? 'selected' : '' }}>{{ $schedule->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
