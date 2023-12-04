<!-- admin/users.blade.php -->

@extends('layouts.admin')

@section('content')
    <div>
        <h1>All Users</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
