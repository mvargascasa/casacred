<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('favicon-new.png')}}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="{{asset('css/5.0.0/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css?x=5')}}">
    @yield('header')

    <style>
      .wsapp{
        position: fixed;
        bottom: 40px;
        right: 20px;
      }
      input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
      /* FIREFOX */
      input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
      /* OTHER */
      input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
      
      @keyframes fade-in-move-left {
      0% {
        opacity: 0;
        transform: translateX(-3rem);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fade-in-move-right {
      0% {
        opacity: 0;
        transform: translateX(0rem);
      }
      100% {
        opacity: 1;
        transform: translateX(-10rem);
      }
    }

    @keyframes fade-in-move-down {
      0% {
        opacity: 0;
        transform: translateY(-3rem);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fade-in-move-up {
      0% {
        opacity: 0;
        transform: translateY(0rem);
      }
      100% {
        opacity: 1;
        transform: translateY(-8rem);
      }
    }

      html, body{
        max-width: 100% !important;
        overflow-x: hidden !important;
        font-family: 'Poppins', sans-serif;
      }
      a{
        text-decoration: none;
        color: #000000;
      }
      @media screen and (max-width: 992px){
        .divlogocenter{
          display: none !important;
        }
        .divtwoptionsright{
          margin-left: 0px !important;
        }
      }
      @media screen and (max-width: 850px){
        .rowconstruye{
          display: none !important;
        }
        .navbar{
          padding-left: 0px !important;
          padding-right: 0px !important;
          margin-top: 0px !important; 
        }
        #col1-footer, #col2-footer{
          font-size: 12px !important;
        }
        #divny{
          margin-top: 0px !important;
        }
      }
      .item-nav-link:hover{
        background-color: #3b4255 !important;
        color: #ffffff !important;
      }
    </style>
</head>
<body style="background-color: #ffffff">
    {{-- <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand " href="{{route('web.index')}}">
            <img id="imglogo" width="80px" height="55px" src="{{asset('img/logo_actualizado.png')}}" height="40" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" onmouseover="changeAppearance();" onmouseout="returnAppearance();">
              <li class="nav-item">
                <a class="nav-link active item-nav-link" aria-current="page" href="{{route('web.servicios','asesores-bienes-raices')}}">Vende</a>
              </li>
              <li class="nav-item">
                <a class="nav-link item-nav-link" href="{{route('web.servicios','creditos-en-ecuador')}}">Créditos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link item-nav-link" href="{{route('web.servicios','nosotros')}}">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link item-nav-link" href="{{route('web.notariausa')}}">Notaria USA</a>
              </li>
            </ul>
            <div class="divlogocenter" style="margin-left: 20%">
              <a href="{{ route('web.home') }}">
                <img width="90px" height="65px" src="{{asset('img/logo_actualizado.png')}}" height="40" alt="">
              </a>
            </div>
            <div class="divtwoptionsright" style="margin-left: 25%">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('web.servicios', 'construye') }}">Construye</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="https://casacredito.com/login"><i class="fas fa-sign-out-alt" style="color: #d71e01"></i> Mi cuenta</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </nav> --}}
    <header>
      <nav class="navbar navbar-expand-lg navbar-light navbar-cc bg-white fixed-top" style="z-index: 100;">

          <div class="d-flex flex-grow-1">
              <span class="w-100 d-lg-none d-block pl-4">
                  <a class="navbar-brand" href="{{route('web.index')}}">
                      <img src="{{asset('casacredito-logo.svg')}}" height="40" alt="">
                      </a>
              </span>

              <a class="navbar-brand d-none d-lg-inline-block px-4" href="{{route('web.index')}}">
                  <img src="{{asset('casacredito-logo.svg')}}" height="40" alt="">
                  </a>
              <div class="w-100 text-right">
                  {{-- @if(Route::is('web.index') or Route::is('web.detail') ) 
                      <button type="button"  data-bs-toggle="modal" data-bs-target="#modalSearch" class="btn btn-sm btn-outline-secondary d-sm-block d-md-none">
                          Busqueda</button> 
                  @endif --}}
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                      <span class="navbar-toggler-icon"></span>
                  </button>
              </div>
          </div>

        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap px-4">
              <li class="nav-item pr-2"> <a class="nav-link @if(Route::is('web.propiedades') or Route::is('web.detail')) active @endif" href="{{route('web.propiedades')}}">Compra</a> </li>
              <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/asesores-bienes-raices')) active @endif" href="{{route('web.servicios','asesores-bienes-raices')}}">Vende</a> </li>
              <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/creditos-en-ecuador')) active @endif" href="{{route('web.servicios','creditos-en-ecuador')}}">Creditos</a> </li>
              <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/construye')) active @endif" href="{{route('web.servicios','construye')}}">Construye</a> </li>
              <li class="nav-item pr-2"> <a class="nav-link @if(Route::is('web.notariausa') ) active @endif" href="{{route('web.notariausa')}}">Notaría USA</a> </li>
              <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/nosotros')) active @endif" href="{{route('web.servicios','nosotros')}}">Nosotros</a> </li>
              
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">  <a class="nav-link mr-6" href="{{ route('login') }}">{{ __('INGRESAR') }}</a>   </li>
                      @else
                          <li class="nav-item dropdown" style="z-index: 999">
                              <a class="nav-link dropdown-toggle" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-expanded="false">
                                 {{ Auth::user()->name }} 
                              </a>
                              <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="{{route('admin.index')}}">Dashboard</a><div class="dropdown-divider"></div></li>
                                  <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                     document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a></li>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </ul>
                          </li>

                      @endguest

            </ul>
        </div>
    </nav>
    </header>

    @yield('content')

    <div class="row pt-5 pb-5" style="background-color: #f2f8f8; padding-left: 5%; padding-right: 5%; font-size: 13px">
      <div class="col-sm-3 justify-content-center">
          <h6 style="font-weight: bold">Tipos de inmuebles populares</h6>
          <a style="text-decoration: none; color: #000000" href="{{url('casas-de-venta-en-ecuador')}}">Casas en Venta</a><br>
          <a style="text-decoration: none; color: #000000" href="{{url('departamentos-de-venta-en-ecuador')}}">Departamentos en Venta</a><br>
          <a style="text-decoration: none; color: #000000" href="{{url('terrenos-de-venta-en-ecuador')}}">Terrenos en venta</a><br>
      </div>
      <div class="col-sm-3 justify-content-center">
          <h6 style="font-weight: bold">Propiedades en venta</h6>
          <a style="text-decoration: none; color: #000000" href="{{url('departamentos-de-venta-en-quito')}}">Departamentos en venta: Quito</a><br>
          <a style="text-decoration: none; color: #000000" href="{{url('departamentos-de-venta-en-guayaquil')}}">Departamentos en venta: Guayaquil</a><br>
          <a style="text-decoration: none; color: #000000" href="{{url('departamentos-de-venta-en-cuenca')}}">Departamentos en venta: Cuenca</a><br>
      </div>
      <div class="col-sm-3 justify-content-center">
          <h6 style="font-weight: bold">Terrenos en venta</h6>
          <a style="text-decoration: none; color: #000000" href="{{url('terrenos-de-venta-en-quito')}}">Terrenos de venta: Quito</a><br>
          <a style="text-decoration: none; color: #000000" href="{{url('terrenos-de-venta-en-guayaquil')}}">Terrenos de venta: Guayaquil</a><br>
          <a style="text-decoration: none; color: #000000" href="{{url('terrenos-de-venta-en-cuenca')}}">Terrenos de venta: Cuenca</a><br>
      </div>
      <div class="col-sm-3 justify-content-center">
          <h6 style="font-weight: bold">Zonas más populares</h6>
          <a style="text-decoration: none; color: #000000" href="{{ url('quito') }}">Quito</a><br>
          <a style="text-decoration: none; color: #000000" href="{{ url('guayaquil') }}">Guayaquil</a><br>
          <a style="text-decoration: none; color: #000000" href="{{ url('cuenca') }}">Cuenca</a><br>
      </div>
  </div>

    <footer class="text-white" style="background-color: #3b4255;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <div class="row">
              <div class="col-sm-4">
                <h5>Cuenca | Ecuador</h5>
                <div id="col1-footer" style="font-size: 15px">
                    <p style="margin-bottom: 5px">Lunes a Viernes 09:00 am a 6:00 pm</p>
                    <p style="margin-bottom: 5px">Sábados 9:00 am a 1:00 pm</p>
                    <p style="margin-bottom: 5px"><a target="_blank" style="color: #ffffff" href="https://goo.gl/maps/JC7FcYDeupTstiHn8"><i class="fas fa-map-marker-alt" style="color: #d71e01"></i> Av. Juan Iñiguez 3-87 y D. Gonzalo Cordero</a></p>
                    <p style="margin-bottom: 5px">Edificio Santa Lucia</p>
                    <p style="margin-bottom: 5px"><i class="fas fa-phone-alt" style="color: #d71e01"></i> 07-412-6004 / 098-384-9073</p>
                    <p><a style="color: #ffffff" href="mailto:info@casacredito.com"><i class="fas fa-envelope" style="color: #d71e01"></i> info@casacredito.com</a></p>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>New York | EE.UU.</h5>
                <div id="col2-footer" style="font-size: 15px">
                    <p style="margin-bottom: 5px">Lunes a Viernes 09:00 am a 6:00 pm</p>
                    <p style="margin-bottom: 5px"><i class="fas fa-map-marker-alt" style="color: #d71e01"></i> 67-03 Roosevelt Avenue <br></p>
                    <p style="margin-bottom: 5px">Woodside, NY 11377</p>
                    <p style="margin-bottom: 5px"><i class="fas fa-phone-alt" style="color: #d71e01"></i> 718-690-3740 / 347-846-0067</p>
                    <p><a style="color: #ffffff" href="mailto:info@casacredito.com"><i class="fas fa-envelope" style="color: #d71e01"></i> info@casacredito.com</a></p>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Síguenos en:</h5>
                <div id="col3-footer" class="d-flex">
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <a href="https://www.facebook.com/CasaCreditoInmobiliaria"><i class="fab fa-facebook-f" style="color: #3b4255"></i></a>
                    </div>
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <a href="https://www.instagram.com/casacreditoinmobiliaria/"><i class="fab fa-instagram" style="color: #3b4255"></i></a>
                    </div>
                    {{-- <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-twitter" style="color: #3b4255"></i>
                    </div>
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-youtube" style="color: #3b4255"></i>
                    </div> --}}
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-whatsapp" style="color: #3b4255"></i>
                    </div>
                </div>
                <div style="margin-top: 75px">
                    <i><p>Ahora con <b style="color: #d71e01">Casa Crédito</b> es fácil ser dueño de su propia casa en Ecuador </p></i>
                </div>
              </div>
          </div>
        </div> 
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #272b34">
            Copyright © 2018 Casa Crédito. All rights reserved. <br>
            <b style="color: #d71e01">Políticas de Privacidad - SEO</b>
        </div>
        <!-- Copyright -->
    </footer>

    <div class="wsapp">
      <a href="https://api.whatsapp.com/send?phone=+593983849073" class="asindeco" target="_blank">
          <img src="{{asset('img/casacredito-whatsapp.svg')}}" alt="Whatsapp Notary Public Near Me" width="50" height="50">
      </a>
    </div>

    @yield('footer')
    <script>
      var navbar = document.querySelector('.navbar');
      var divlogo = document.querySelector('.navbar-brand');
      //var divlogocenter = document.querySelector('.divlogocenter');

      window.addEventListener('load', function(){
        //divlogocenter.style.visibility = "visible";
        //divlogocenter.style.animation = "fade-in-move-down 1s";
      });

      let details = navigator.userAgent;
      let regexp = /android|iphone|kindle|ipad/i;
      var screenWidth = screen.width
  
      // let isMobileDevice = regexp.test(details);
      //   if (screenWidth <= 991) {
      //     navbar.classList.remove('navbar-dark');
      //     navbar.classList.remove('fixed-top');
      //     navbar.classList.add('navbar-light');
      //     divlogo.style.visibility = "visible";
      //     document.getElementById('imglogo').style.width = "60px";
      //     document.getElementById('imglogo').style.height = "50px";
      //   } else {
      //     window.onscroll = function() {
      //     var y = window.scrollY;
      //     if(y > 100){
      //       changeAppearance();
      //     } else {
      //       returnAppearance();
      //     }
      //   };
      // }

      // const changeAppearance = () => {
      //   navbar.classList.remove('navbar-dark');
      //   navbar.classList.add('bg-light');
      //   navbar.style.transition = "0.5s";

      //   divlogo.style.visibility = "visible";
      //   divlogo.style.animation = "fade-in-move-left 1s";

      //   divlogocenter.style.visibility = "hidden";
      //   divlogocenter.style.animation = "fade-in-move-up 1s";
      // }

      // const returnAppearance = () => {
      //   navbar.classList.add('navbar-dark');
      //   navbar.classList.remove('bg-light');

      //   divlogo.style.animation = "fade-in-move-right 1s";
      //   divlogo.style.visibility = "hidden";
     
      //   divlogocenter.style.visibility = "visible";
      //   divlogocenter.style.animation = "fade-in-move-down 1s";
      // }
    </script>
</body>
</html>