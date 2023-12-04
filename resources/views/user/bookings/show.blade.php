@extends('layouts.user_app')

@section('content')
    <h1>Booking Details</h1>
    <div class="card">
        <div class="card-body">
            <h4>Title: {{ $booking->title }}</h4>
            <p>Genre: {{ $booking->genre }}</p>
            <p>Date: {{ $booking->date }}</p>
            <p>Time: {{ $booking->time }}</p>
            <p>Room: {{ $booking->room }}</p>
            <p>Price: {{ $booking->price }}</p>
            <p>User: {{ $booking->user->name }}</p>
            <p>Schedule: {{ $booking->schedule->name }}</p>
            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
