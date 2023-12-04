@extends('layouts.admin')

@section('content')
    <h1> <b>All Users</b></h1>
    <div class="card"> 
        <div class="card-body"> 
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 5)
                                    Customer
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}

        </div>   
    </div>   
@endsection
