<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Admin</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/app-lite.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('theme-assets/css/core/colors/palette-gradient.css') }}">
  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
             
            
             
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                  
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-language nav-item">
              <div class="col-6 text-end mt-3">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
              </li>
            </ul>
          
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header ">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="/admin">
              <h3 class="brand-text">Booking System</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="{{ route('admin.dashboard') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          </li>
          <li class=" nav-item"><a href="/admin/users"><i class="la la-user"></i><span class="menu-title" data-i18n="">Users</span></a>
          </li>
          <li class=" nav-item"><a href="/admin/movies/"><i class="la la-file-movie-o"></i><span class="menu-title" data-i18n="">MOVIES</span></a>
          </li>
          <li class="nav-item"><a href="/admin/rooms"><i class="la la-home"></i><span class="menu-title" data-i18n="">Rooms</span></a>
          </li>
          <li class=" nav-item"><a href="/schedules"><i class="la la-calendar-check-o"></i><span class="menu-title" data-i18n="">Schedule</span></a>
          </li>
          </li>
          <li class=" nav-item"><a href="/admin/bookings"><i class="ft-book"></i><span class="menu-title" data-i18n="">Booking</span></a>
          </li>
         
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
         
        
        </div>
        <div class="content-body"><!-- Line Awesome section start -->
<section id="line-awesome-icons">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                      <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                      </ul>
                  </div>
              </div>

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
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


 


    <script src="{{ asset('theme-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
 
    <script src="{{ asset('theme-assets/js/core/app-menu-lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('theme-assets/js/core/app-lite.js') }}" type="text/javascript"></script>

  </body>
</html>