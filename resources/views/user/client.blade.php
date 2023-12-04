@extends('layouts.user_app')

@section('content')
<style>
    body {
        background-color:black;
        color: white;
    }
    .table-striped th,
    .table-striped td {
        color: #ffffff; /* Set the text color to light (white) */
    }

    div{
        color: white;
    }
    .table th,
    .table td {
        color: black; /* Set the text color to white */
    }
</style>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
 
            <div class="card mt-2" style="background-color: lightblue; color: black;">
                <div class="card-header">{{ __('Select Your Chosen Movie and Book Now!') }}</div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4 ">
        <div class="col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" style="width: 25%; color: white">Movie</th>
                        <th scope="col" style="width: 15%; color: white">Genre</th>
                        <th scope="col" style="width: 15%; color: white">Description</th>
                        <th scope="col" style="width: 15%; color: white">Price</th>
                        <th scope="col" style="width: 15%; color: white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td><img src="{{ asset($movie->image) }}" alt="{{ $movie->title }}" style="max-width: 100px;"></td>
                            <td style="color: white;">{{ $movie->title }}</td>
                            <td style="color: white;">{{ $movie->genre }}</td>
                            <td style="color: white;">{{ $movie->description }}</td>
                            <td style="color: white;">{{ $movie->price }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal{{ $movie->id }}">
                                    Create Booking
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
        </div>
    </div>
</div>

@foreach ($movies as $movie)
    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal{{ $movie->id }}" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel{{ $movie->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="color:black">
                <h5 class="modal-title" id="bookingModalLabel{{ $movie->id }}">MOVIE TITLE: {{ $movie->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <!-- Place your booking form or additional information here -->
                <h2  style="color:black">Available Room</h2>

                <div class="row">
                <h4 class="col-4 " style="color:black">Date </h4>
                <h4 class="col-4 " style="color:black">Time </h4>
                <h4 class="col-4 " style="color:black">Action </h4>
                </div>
                @foreach ($schedules as $schedule)
                    @if($movie->id == $schedule->movie_id)
                    

                    <div class="row" style="color:black">
                    <h4 class="col-4 ">{{ $schedule->date }} </h4>
                    <h4 class="col-4 ">{{ $schedule->time }} </h4>
                    <h4 class="col-4 ">
                        <a href="{{ route('bookings.create', ['id' => $schedule->id]) }}" class="btn btn-primary">Create Booking</a></h4>
                    </div>


                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>


    <!-- End of Booking Modal -->
@endforeach


<div class="container mt-5">
                <h1>Bookings</h1>
        
                    <table class="table mt-3">
                        <thead>
                            <tr >
                                <th></th>
                                <th style="color:white">Movie Title</th>
                                <th style="color:white">Genre</th>
                                <th style="color:white">Room</th>
                                <th style="color:white">Date</th>
                                <th style="color:white">Time</th>
                                <th style="color:white">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr><img width="30%" class="img-circle" src="{{ URL::asset('storage/images'.$booking->images) }}"></td>
                                    <td style="color:white">{{ $booking->title }}</td>
                                    <td style="color:white">{{ $booking->genre }}</td>
                                    <td style="color:white">{{ $booking->room }}</td>
                                    <td style="color:white">{{ $booking->date }}</td>
                                    <td style="color:white">{{ $booking->time }}</td>
                                    <td style="color:white">{{ $booking->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
            
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });
    });
</script>
@endsection
