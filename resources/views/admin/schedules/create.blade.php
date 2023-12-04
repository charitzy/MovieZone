@extends('layouts.admin')

@section('content')
   
        <h2>Create Schedule</h2>
        <div class="card"> 
<div class="card-body"> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="mb-3">
                <label for="movie_id" class="form-label">Movie</label>
                <select class="form-control" id="movie_id" name="movie_id" required>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="room_id" class="form-label">Room</label>
                <select class="form-control" id="room_id" name="room_id" required>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->room }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>  </div>
@endsection
