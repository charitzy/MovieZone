<!-- admin/bookings.blade.php -->

@extends('layouts.admin')

@section('content')
    <div>
        <h1>Admin Bookings</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Room</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Price</th>
                    <th>User ID</th>
                    <th>Schedule ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->title }}</td>
                        <td>{{ $booking->genre }}</td>
                        <td>{{ $booking->room }}</td>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->price }}</td>
                        <td>{{ $booking->user_id }}</td>
                        <td>{{ $booking->schedule_id }}</td>
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
