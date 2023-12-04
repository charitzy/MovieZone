@extends('layouts.admin')

@section('content')
<div class="">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('you are logged in to the Admin dashboard') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
