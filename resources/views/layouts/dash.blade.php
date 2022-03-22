
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('css/simple-sidebar.css?4')}}" rel="stylesheet" >
    @yield('header')
</head>
<body>
    <div class="d-flex" id="wrapper">

        @include('layouts.sidebar')
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-md shadow-sm px-4 navbar-light bg-light">

                <a class="navbar-brand" id="menu-toggle">
                    <img src="{{asset('casacredito-logo.svg')}}" height="35" alt="">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                        <li class="nav-item dropdown d-none d-sm-block d-md-none"> 
                            <a class="nav-link @if(Request::is('admin')) active @endif" href="{{route('admin.index')}}">Dashboard</a> </li>
                        <li class="nav-item dropdown d-none d-sm-block d-md-none"> 
                            <a class="nav-link @if(Request::is('admin/listings')) active @endif" href="{{route('admin.properties')}}">Propiedades</a> </li>
                        <li class="nav-item dropdown d-none d-sm-block d-md-none"> 
                            <a class="nav-link @if(Request::is('admin/listings/create')) active @endif" href="{{route('admin.listings.create')}}">Nueva Propiedad</a> </li>

                        @if(Auth::user()->role='administrator')
                        <li class="nav-item dropdown d-none d-sm-block d-md-none"> 
                            <a class="nav-link @if(Request::is('admin/services')) active @endif" href="{{route('admin.services.index')}}">Servicios</a> </li>
                        @endif



                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            <main class="row m-0">
                @yield('content')
            </main>

        </div> <!-- /#page-content-wrapper -->
    </div>  <!-- /#wrapper -->


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener("click", function(e) {
          e.preventDefault();
          document.getElementById('wrapper').classList.toggle("toggled");
        });
      </script>
    @yield('scripts')
</body>
</html>
