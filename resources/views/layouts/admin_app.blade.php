<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap 5 Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <style>
        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .list-group-item.active {
            background-color: #007bff;
        }

        .list-group-item.active a {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <div id="sidebar" class="collapse collapse-horizontal show border-end vh-100 shadow-sm">
                    <div id="sidebar-nav" class="list-group border-0 rounded-0">
                        <div class="p-2">
                            <h4>Admin</h4>
                        </div>
                        <form class="d-flex p-2">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </form>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-black">Dashboard</a>
                                
                            </li>
                            <li class="list-group-item">
                                <a href="/admin/movies/" class="text-decoration-none text-black">MOVIES</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/admin/rooms" class="text-decoration-none text-black">Rooms</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/schedules" class="text-decoration-none text-black">Schedule</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col ps-md-2 pt-2">
                <div class="row">
                    <div class="col-6">
                        <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none">
                            <i class="bi bi-list"></i>
                        </a>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <hr>
                <div class="mt-2">
                    <div class="col">
                        <main class="py-1">
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
