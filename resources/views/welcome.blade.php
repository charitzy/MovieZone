<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MovieZone</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("/images/bg5.png");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            z-index: -1;
        }

        /* .navbar {
            background-color: black;
            opacity: 0.5;
            padding: 9px;
            height: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        } */

        .navbar .nav-links {
            display: flex;
            align-items: center;
            margin-left: 1000px;
            /* Added margin to move the links to the left */
        }

        .navbar .nav-links a {
            padding: 20px;
            margin: 0 5px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
            display: inline-block;
            /* Add this line to make the link behave like a block element */
            border-radius: 50%;
            /* Add this line to make the element circular */
        }

        .navbar .nav-links a:hover {
            background-color: gray;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            /* Adjusted container height to fit the logo within the viewport */
            padding: 5px;
        }

        .logo {
            max-height: 400px;
            max-width: 600px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 768px) {
            .navbar .nav-links {
                margin-top: 20px;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="nav-links">
            @if (Route::has('login'))
            @auth
            <a href="/client">Home</a>
            @else
            <a href="{{ route('login') }}">Log in</a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
            @endif
        </div>
    </div>

    <div class="container">
        <!-- <img src="/images/3.png" alt="Logo" class="logo"> -->
    </div>
</body>

</html>