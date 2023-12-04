@extends('layouts.admin')

@section('content')

        <h2>Schedules</h2>
        <div class="card"> 
<div class="card-body"> 
        <a href="{{ route('schedules.create') }}" class="btn btn-primary mb-2">Create Schedule</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>date</th>
                    <th>time</th>
                    <th>Movie</th>
                    <th>Room</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->date }}</td>
                        <td>{{ $schedule->time }}</td>
                        <td>{{ $schedule->movie->title }}</td>
                        <td>{{ $schedule->room->room }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div></div>
@endsection
