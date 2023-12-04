@extends('layouts.user_app')

@section('content')
<div class="container">
<h1>Create Booking</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
 
                 @foreach($movies as $movie)
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{$movie->title}}" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="text" name="genre" id="genre" value="{{$movie->genre}}" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="room">Room</label>@foreach($rooms as $room)
                        <input type="text" name="room" id="room" value="{{$room->room}}" class="form-control">
                        @endforeach
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>   @foreach($schedules as $schedule)
                        <input type="date" name="date" id="date" value="{{$schedule->date}}" class="form-control">
                        @endforeach
                    </div>
                    
                    <div class="form-group">
                        <label for="time">Time</label>   @foreach($schedules as $schedule)
                        <input type="time" name="time" id="time" value="{{$schedule->time}}" class="form-control">
                        @endforeach
                    </div>

                    

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" step="0.01" value="{{$movie->price}}" class="form-control">
                    </div>
                    @endforeach
                    

                    <div class="form-group">
                     @foreach($schedules as $schedule)
                        <input type="hidden" name="schedule_id" id="schedule_id" value="{{$schedule->id}}" class="form-control">
                        @endforeach
                    </div>
                
                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </form>

        </div>
    </div>
    </div> 
@endsection
