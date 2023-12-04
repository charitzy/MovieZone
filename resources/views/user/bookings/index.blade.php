@extends('layouts.user_app')

@section('content')
    <h1>Bookings</h1>
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Price</th>
                        <th>User</th>
                        <th>Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->title }}</td>
                            <td>{{ $booking->genre }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->time }}</td>
                            <td>{{ $booking->room }}</td>
                            <td>{{ $booking->price }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->schedule->name }}</td>
                            <td>
                                <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $bookings->links() }}

        </div>
    </div>
@endsection
