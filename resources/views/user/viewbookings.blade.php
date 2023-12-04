<!-- user/viewbookings.blade.php -->

@extends('layouts.app')

@section('content')
    <div>
        <h1>Bookings</h1>
        <ul>
            @foreach ($bookings as $booking)
                <li>{{ $booking->name }}</li>
                <!-- Assuming 'name' is a property of the Booking model, modify it accordingly -->
            @endforeach
        </ul>
    </div>
@endsection
