@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha384-oO2DSU8qrLIZ3kRMZBA9YHy8M21OeAfG+J3Cj4l4a21nFO9aaEQ0zU4n9pz/uWc4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css">

    <script>
            function onSubmit(token) {
                document.getElementById("g-recaptcha-response").value = token;
                document.getElementById("login-form").submit(); // Assuming your form ID is "login-form"
            }
    </script>
</head>
<style>
    body {
        background-color:black;
    }
    .card {
        background: linear-gradient(to right,  #41016f5d, #c37ec31d);
        color: white;
        opacity: 0.8; /* Set the initial opacity */
        transition: opacity 0.3s ease; /* Add a smooth transition */
        /* animation: bounce 3.5s ease infinite; */
    }
    /* @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    } */
    img{
        width: 50px; 
        height: 50px;
    }
    /* On hover, increase the opacity */
    .card:hover {
        opacity: 1;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fw-bolder">{{ __('LOGIN') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                        </div>
                    
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br>
                                <div class="row"> 
                                    <div class="col-md-1">
                                        <a href="{{ route('google-auth') }}" class="g-sign-in-button">
                                            <div class="content-wrapper">
                                                <div class="logo-wrapper">
                                                    <img src="/images/download.png" style="display: block; margin: 0 auto;">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{ route('google-auth') }}" class="g-sign-in-button">
                                            <div class="content-wrapper">
                                                <div class="logo-wrapper">
                                                    <img src="/images/g.png" style=" width:75px; height:35px; margin-top: 6px;">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>


                                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                                <div class="g-recaptcha mt-4" data-sitekey="{{ config('services.recaptcha.key') }}" data-callback="onSubmit"></div>
                        </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endpush
