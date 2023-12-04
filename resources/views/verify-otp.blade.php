

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
                <div class="card-header text-center fw-bolder"></div>
                <h2 class="d-flex justify-content-center">Enter OTP</h2>
                    @if(session('error'))
                        <p>{{ session('error') }}</p>
                    @endif
                    <form method="POST" action="{{ url('/verify-otp') }}">
                        @csrf
                        <div class="d-flex justify-content-center">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Verify</button>
                                </div>
                            </div>

                    </form>
                <div class="card-body">
                 
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endpush

