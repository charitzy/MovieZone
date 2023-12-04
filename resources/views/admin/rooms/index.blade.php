@extends('layouts.admin')

@section('content')
    <h1>Rooms</h1>
<div class="card"> 
<div class="card-body"> 
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">Create Room</a>
    <table class="table">
        <thead>
            <tr>
                <th>Room</th>
                <th>Seats</th>
                <th style="width: 300px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rooms as $room)
                <tr>
                    <td>{{ $room->room }}</td>
                    <td>{{ $room->seats }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No rooms found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>   
    </div>  
@endsection
