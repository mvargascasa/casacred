<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon-new.png')}}" type="image/x-icon" />
  {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">  --}}
  {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/> --}}
  <link rel="stylesheet" href="{{asset('css/5.0.0/bootstrap.min.css')}}">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    </noscript>

  <script>
    let stylesheet = document.createElement('link');
      stylesheet.href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css";
      stylesheet.rel = 'stylesheet';
      setTimeout(function () {
          document.getElementsByTagName('head')[0].appendChild(stylesheet);
      }, 3500);
  </script>

  {{-- SCRIPT DE RECAPTCHA V3 --}}
  {{-- <script id="recaptcha"></script> --}}

  <script>
    setTimeout(() => {
      // let scriptrecaptcha = document.getElementById('recaptcha');
      // scriptrecaptcha.src = "https://www.google.com/recaptcha/api.js?render=6Le1UsshAAAAAL93VxqsJYCa67mrcNIP1q3C99v5";
      let scriptrecaptcha = document.createElement('script');
      scriptrecaptcha.src = "https://www.google.com/recaptcha/api.js?render=6Le1UsshAAAAAL93VxqsJYCa67mrcNIP1q3C99v5";
      document.getElementsByTagName('head')[0].appendChild(scriptrecaptcha);
    }, 3500);

    document.addEventListener('submit', function(e){
      e.preventDefault();
      if(e.target.id != "formhomesearch" && e.target.id != "newsearch"){
        grecaptcha.ready(function() {
            grecaptcha.execute('6Le1UsshAAAAAL93VxqsJYCa67mrcNIP1q3C99v5', {action: 'submit'}).then(function(token) {
              
              let form = e.target;

              let input = document.createElement('input');
              input.type = 'hidden';
              input.name = 'g-recaptcha-response';
              input.value = token;

              form.appendChild(input);

              form.submit();

            });
          });
      } else {
        let form = e.target;
        form.submit();
      }
    });
  </script>
  
  {{-- <link rel="preload" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" as="style" onload="this.rel='stylesheet'"> --}}

  {{-- <link rel="preload" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    </noscript> --}}

  {{-- <link rel="preload" href="{{ asset('css/5.0.0/bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="{{ asset('css/5.0.0/bootstrap.min.css') }}">
    </noscript> --}}

  <link rel="stylesheet" href="{{asset('css/style.css?x=5')}}">
  <meta name="facebook-domain-verification" content="st7nmy30bjdubvp2cuvvhwuk6n2syf" />

  {{-- @livewireStyles --}}
  
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>

<!-- Google Tag Manager -->
<script>
  setTimeout(() => {
    (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      console.log('cargando gtm 5h6gc9z');
      })(window,document,'script','dataLayer','GTM-5H6GC9Z');
  }, 3500);
  </script>
  <!-- End Google Tag Manager -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script id="script_analytics" async></script>
<script>

  setTimeout(() => {
    document.getElementById('script_analytics').src = 'https://www.googletagmanager.com/gtag/js?id=UA-124437679-1';
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-806267889'); //    Adwords
    gtag('config', 'UA-124437679-1');//  Analytics 

  }, 3500);
</script>

<!-- Google tag (gtag.js) -->
<script id="script-analytics-conversions"></script>
<script>
  setTimeout(() => {
    document.getElementById('script-analytics-conversions').src="https://www.googletagmanager.com/gtag/js?id=AW-11250334200";
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-11250334200');

    console.log('script analytics conversions loaded');
  }, 3000);
</script>

<!-- Facebook Pixel Code -->
<script>
  setTimeout(() => {
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '3081509562095231');
    fbq('track', 'PageView');
    console.log('cargando script de facebook...');
  }, 4000);
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=3081509562095231&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

    

<?php };// fin de if url localhost ?>

  @yield('header')
  {{-- <meta name="keywords" content="casas en venta en cuenca, departamentos en venta en cuenca, terrenos en venta en cuenta, lotes en venta en cuenca" /> --}}
<style>
   html, body {
        max-width: 100% !important;
        overflow-x: clip !important;
    }
    .wsapp{
        z-index: 3;
        position: fixed;
        bottom: 70px;
        right: 10px;
    }
    .telf{
        z-index: 3;
        position: fixed;
        bottom: 10px;
        right: 0px;
        animation-duration: 2s;
        animation-name: slideout;
    }
    .dropdown-menu-style{width: 250px !important}
    @media only screen and (max-width: 600px) {
        .fixed-search{
            position: fixed;
            width: 100%;
        }
        #pLastLabel{
          margin-top: 10px !important;
        }
        .dropdown-menu-style{width: auto !important}
    }
    input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
      /* FIREFOX */
      input[type="number"] {-moz-appearance: textfield;}input[type="number"]:hover,input[type="number"]:focus {-moz-appearance: number-input;}
      /* OTHER */
      input[type=number]::-webkit-inner-spin-button,input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}

      html, body{
        max-width: 100% !important;
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
      .grecaptcha-badge{
        visibility: hidden !important;
      }
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu a::after {
      transform: rotate(-90deg);
      position: absolute;
      right: 6px;
      top: .8em;
    }

    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-left: .1rem;
      margin-right: .1rem;
    }

    @keyframes slideout {
      from {margin-right: -105px;}
      to {margin-right: 0px;}
    }

    @keyframes slidein{
      from{margin-right: 0px}
      to{margin-right: -105px}
    }
</style>
</head>
<body>

 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H6GC9Z"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  @php
      $array = [];
      //$categories_navbar = \App\Models\NavbarItems::select('name')->distinct()->get();
      // $categories_navbar = json_decode($categories_navbar);
      $navbar_items = \App\Models\NavbarItems::select('name', 'category_name', 'items')->get();
      foreach ($navbar_items as $navbar_item) {
        if(array_key_exists($navbar_item->name, $array)) array_push($array[$navbar_item->name], );
        else $array[$navbar_item->name] = array($navbar_item->category_name => $navbar_item->items); 
      }
      //dd($array);
  @endphp

    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-cc bg-white shadow-sm" style="z-index: 100;">

            <div class="d-flex flex-grow-1">
                <span class="w-100 d-lg-none d-block pl-1">
                    <a class="navbar-brand" href="{{route('web.index')}}">
                        <img src="{{asset('img/LOGO CASA CREDITO.png')}}" width="110" height="45" alt="casa credito inmobiliaria">
                    </a>
                </span>

                <a class="navbar-brand d-none d-lg-inline-block px-4" href="{{route('web.index')}}">
                    <img src="{{asset('img/LOGO CASA CREDITO.png')}}" width="130" height="50" alt="casa credito inmobiliaria">
                    </a>
                <div class="w-100 text-right">
                    {{-- @if(Route::is('web.index') or Route::is('web.detail') ) 
                        <button type="button"  data-toggle="modal" data-target="#modalSearch" class="btn btn-sm btn-outline-secondary d-sm-block d-md-none">
                            Busqueda</button> 
                    @endif --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

          <div class="collapse navbar-collapse flex-grow-1 text-left" id="myNavbar">
              <ul class="navbar-nav ml-auto flex-nowrap px-4">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Comprar
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle test" href="#">Casas en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'casas-en-venta-en-cuenca')}}">Casas en Venta en Cuenca</a></li>
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'casas-en-venta-en-quito')}}">Casas en Venta en Quito</a></li>
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'casas-en-venta-en-guayaquil')}}">Casas en Venta en Guayaquil</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Departamentos en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'departamentos-en-venta-en-cuenca')}}">Departamentos en Venta en Cuenca</a></li>
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'departamentos-en-venta-en-quito')}}">Departamentos en Venta en Quito</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Terrenos en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'terrenos-en-venta-en-cuenca')}}">Terrenos en Venta en Cuenca</a></li>
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'terrenos-en-venta-en-quito')}}">Terrenos en Venta en Quito</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Locales Comerciales en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'locales-comerciales-en-venta-en-cuenca')}}">Locales Comerciales en Venta en Cuenca</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Quintas en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'quintas-en-venta-en-cuenca')}}">Quintas en Venta en Cuenca</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Haciendas en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'haciendas-en-venta-en-cuenca')}}">Haciendas en Venta en Cuenca</a></li>
                      </ul>
                    </li>
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Casas Comerciales en Venta</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'casas-comerciales-en-venta-en-cuenca')}}">Casas Comerciales en Venta en Cuenca</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Alquilar
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">Departamentos en Alquiler</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('web.propiedades', 'departamentos-de-alquiler-en-cuenca')}}">Departamentos en Alquiler en Cuenca</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicio/vende-tu-casa')) active @endif" href="{{route('web.servicio','vende-tu-casa')}}">Vende</a> </li>
                <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/creditos-en-ecuador')) active @endif" href="{{route('web.servicios','creditos-en-ecuador')}}">Creditos</a> </li>
                <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/construye')) active @endif" href="{{route('web.servicios','construye')}}">Construye</a> </li>
                <li class="nav-item pr-2"> <a class="nav-link @if(Route::is('web.notariausa') ) active @endif" href="{{route('web.notariausa')}}">Notaría USA</a> </li>
                <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('blog')) active @endif" href="{{route('web.blog')}}">Blog</a></li>
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
        

{{-- <div>
  {{$navbar_items}}
</div>
<div>
  {{$categories_navbar}}
</div> --}}
{{-- !Request::is('propiedades/*') --}}

{{-- @if(!Request::is('/') && !Request::is('propiedades/*')) --}}
{{-- <div class="bg-white">
<section class="container justify-content-md-center p-4  ">
    <div class="row">
                            <h2 class="text-black-50 pt-2 pb-3">También te puede interesar</h2>
                            <div class="col-md-3">
                                <h3>Ecuador</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-ecuador')}}">Casas en Venta en Ecuador</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-ecuador')}}">Departamentos en Venta en Ecuador</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-ecuador')}}">Terrenos en venta en Ecuador</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3>Cuenca</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-cuenca')}}">Casas en Venta en Cuenca</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-cuenca')}}">Departamentos en Venta en Cuenca</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-cuenca')}}">Terrenos en Venta en Cuenca</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3>Quito</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-quito')}}">Casas en Venta en Quito</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-quito')}}">Departamentos en Venta en Quito</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-quito')}}">Terrenos en Venta en Quito</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h3>Guayaquil</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-guayaquil')}}">Casas en Venta en Guayaquil</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-guayaquil')}}">Departamentos en Venta en Guayaquil</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-guayaquil')}}">Terrenos en Venta en Guayaquil</a></li>
                                </ul>
                            </div>
        </div>
  </section>
</div> --}}
{{-- @endif --}}

<footer>
  <div style="background-color: #2C3144; color: #ffffff">
    <div class="container">
        <div class="row">           
            <div class="col-12 col-md-4 p-4">
                    <p style="font-size: 20px; font-weight: 500">Cuenca | Ecuador</p>
                        
                        <p class="text-dark-50">Lunes a Viernes 9:00 am&nbsp;a 6:00 pm</p>
                        
                        <p class="text-dark-50">Sábados 9:00 am a 1:00 pm</p>
                        
                        <p class="text-dark-50 mt-2"><b style="font-weight: 500; color: #ffffff"><i class="fas fa-map-marker-alt"></i> Sucursal 1:</b><a href="https://g.page/r/CRcVix2z3D8lEAE" style="color: #ffffff" target="_blank"> Av. Fray Vicente Solano 3-54 y Remigio Tamariz Crespo</a></p>
                        
                        <p style="margin: 0px;" class="text-dark-50"><b style="font-weight: 500; color: #ffffff; margin: 0px"><i class="fas fa-map-marker-alt"></i> Sucursal 2:</b><a target="_blank" style="color: #ffffff" href="https://g.page/r/CV7pH0E3AVo_EBA"> Av. Juan Iñiguez 3-87 y D. Gonzalo Cordero - Edificio Santa Lucia</a></p>                        
                        
                        <p><a href="tel:+072889395" class="asindeco" style="color: #ffffff !important"><i class="fas fa-phone"></i>  07-288-9355</a>&nbsp;/ 
                            <a href="tel:+593983849073" class="asindeco" style="color: #ffffff !important"> 098-384-9073</a>&nbsp;&nbsp;</p>
                        
                        <p><a href="mailto:info@casacredito.com" class="asindeco" style="color: #ffffff !important"><i class="fas fa-envelope"></i> info@casacredito.com</a></p>
            </div>
            <div class="col-12 col-md-4 p-4">
                    <p style="font-size: 20px; font-weight: 500">New York | EE.UU.</p>
                        <p class="text-dark-50">Lunes a Viernes 9:00 am a 6:00 pm</p>

                        <p class="text-dark-50">Sábados 9:00 am a 4:00 pm</p>

                        <p class="text-dark-50"><a target="_blank" style="color: #ffffff" href="https://g.page/r/Cdf-npU-D1gdEAE">
                          <i class="fas fa-map-marker-alt"></i> 67-03 Roosevelt Avenue<br>
                          Woodside, NY 11377
                        </a></p>

                        <p><a style="color: #ffffff !important" href="tel:+17186903740" class="asindeco"><i class="fas fa-phone"></i> 718-690-3740</a>&nbsp;</p>
                        {{-- <p><a href="tel:+13478460067" class="asindeco">347-846-0067</a>&nbsp;</p> --}}

                        <p style="font-size: 20px; font-weight: 500">New Jersey | EE.UU.</p>

                        <p class="text-dark-50"><a target="_blank" style="color: #ffffff" href="https://g.page/r/CVNRV-zNuJiZEAE">
                          <i class="fas fa-map-marker-alt"></i> 1146 East Jersey St Elizabeth, NJ 07201
                        </a></p>
                        <p><a style="color: #ffffff !important" href="tel:+19083810090" class="asindeco"><i class="fas fa-phone"></i> 908-381-0090</a></p>

                        <p><a style="color: #ffffff !important" href="mailto:info@casacredito.com" class="asindeco"><i class="fas fa-envelope"></i> info@casacredito.com</a></p>
            </div>
            <div class="col-12 col-md-4 p-4">
                <p style="font-size: 20px; font-weight: 500">Síguenos en:</p>
                
                <div class="d-flex mt-3">
                  <a href="https://www.facebook.com/CasaCreditoInmobiliaria" class="asindeco px-1" target="_blank">
                    {{-- <img src="{{asset('img/casacredito-facebook.svg')}}" alt="Facebook Notary Public Near Me" width="40" height="40"> --}}
                    <i style="background-color: #c30000; color: #ffffff; padding: 10px; padding-left: 13px; padding-right: 13px; border-radius: 25px" class="fab fa-facebook-f"></i>
                  </a>
                  
                  <a href="https://www.instagram.com/casacreditoinmobiliaria/" class="asindeco px-1" target="_blank">
                    {{-- <img src="{{asset('img/casacredito-instagram.svg')}}" alt="Whatsapp Notary Public Near Me" width="40" height="40"> --}}
                    <i style="background-color: #c30000; color: #ffffff; padding: 10px; padding-left: 11px; padding-right: 11px; border-radius: 25px" class="fab fa-instagram"></i>
                  </a>
                  
                  <a href="https://twitter.com/casacreditoinmo" class="asindeco px-1" target="_blank">
                    {{-- <img src="{{asset('img/casacredito-messenger.svg')}}" alt="Messenger Notary Public Near Me" width="40" height="40"> --}}
                    <i style="background-color: #c30000; color: #ffffff; padding: 10px; padding-left: 10px; padding-right: 10px; border-radius: 25px" class="fab fa-twitter"></i>
                  </a>

                  <a href="https://www.youtube.com/channel/UCts4TtYN76icfwxH7eRaCEw" class="asindeco px-1" target="_blank">
                    <i style="background-color: #c30000; color: #ffffff; padding: 10px; padding-left: 10px; padding-right: 10px; border-radius: 25px" class="fab fa-youtube"></i>
                  </a>
                  
                  <a href="https://api.whatsapp.com/send?phone=593983849073" class="asindeco px-1" target="_blank">
                    {{-- <img src="{{asset('img/casacredito-whatsapp.svg')}}" alt="Whatsapp Notary Public Near Me" width="40" height="40"> --}}
                    <i style="background-color: #c30000; color: #ffffff; padding: 10px; padding-left: 11px; padding-right: 11px; border-radius: 25px" class="fab fa-whatsapp"></i>
                  </a>
                </div>
                
                <p id="pLastLabel" style="margin-top: 15px" class="text-dark-50"><i class="text-white">Ahora con <b style="color: #C30000; font-weight: 500">Casa Credito</b> es fácil ser dueño de su propia casa en Ecuador.</i></p>

                
            </div>
        </div>
    </div>
  </div>
    <div style="background-color: #2c3144" class="text-center navfoot py-3 text-white">Copyright ©2018 Casa Crédito . All rights reserved.
        <br><a href="{{route('web.politicas')}}" style="color: #c30000"> Políticas de Privacidad</a> <span  style="color: #c30000">-</span>  <a  style="color: #c30000" href="{{route('web.seo')}}">SEO</a>
    </div>
</footer>

{{-- <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000">
  @livewire('chat-bot')
</div> --}}
 <!-- Modal -->
 <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: darkred !important;">
          <span class="modal-title" id="modalContactLabel">Complete el siguiente formulario y en breve será contactado.</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="mainFormLead">
                @include('z-form')
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalAval" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: darkred !important;">
          <span class="modal-title" id="modalContactLabel">Complete el siguiente formulario y en breve será contactado.</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="formAvaluo">
                @include('aval-form')
            </form>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="modal fade" id="modalcite" tabindex="-1" role="dialog" aria-labelledby="modalcitelabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header text-white" style="background-color: darkred !important;">
          <span class="modal-title font-weight-bolder" id="modalcitelabel"><i class="fas fa-calendar-check"></i> Agende una cita en línea</span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @include('cite-form')
        </div>
      </div>
    </div>
  </div> --}}
  


  <div class="modal fade" id="modalThank" tabindex="-1" aria-labelledby="modalThankLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title h5" id="modalThankLabel">¡Gracias por Contactarnos!</p>
          <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close">
            <i class="far fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
            En breve le atenderemos.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
        </div>
      </div>
    </div>
  </div>

  <div class="wsapp">
    <a href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, deseo que me contacten a este número de teléfono y me ayuden con más información" class="asindeco" target="_blank">
      <img src="{{asset('img/whatsapp-logo.png')}}" alt="Whatsapp Casa Credito" width="50px" height="50px">
    </a>
  </div>
  <div class="telf d-flex">
    <div id="call-usa-ecu" class="bg-danger text-light d-flex" style="margin-right: -105px">
      <div onclick="openDivCallUsaEcu()" style="cursor: pointer; ">
        <i class="fas fa-phone-alt fa-2x bg-danger p-2 text-light"></i>
        {{-- <img src="{{asset('img/call-icon.webp')}}" alt="Numero Casa Credito" width="50" height="50"> --}}
      </div>
      <div id="diviconsusaecu" style="margin-left: 15px;">
        <a href="tel:+593983849073">
          <img width="45px" height="30px" class="mt-2" src="{{asset('img/ECUADOR-04.webp')}}" alt="telefono casa credito ecuador"> 
          {{-- <img src="{{asset('img/call-icon.webp')}}" alt="Numero Casa Credito" width="50" height="50"> --}}
        </a>
        <a href="tel:+17186903740">
          <img width="45px" height="30px" class="mt-2 ml-1" src="{{asset('img/USA-05.webp')}}" alt="telefono casa credito estados unidos">
          {{-- <img src="{{asset('img/call-icon.webp')}}" alt="Numero Casa Credito" width="50" height="50"> --}}
        </a>
      </div>
    </div>
  </div>
{{-- <script src="{{asset('js/popper.min.js')}}"></script> --}}
<script id="scriptjquery" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="{{asset('js/jquery3.6.1.min.js')}}"></script> --}}
<script id="scriptpopper" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script id="scriptbootstrap52" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script id="scriptbootstrap5"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('script')
{{-- @livewireScripts --}}
<script>

    let loaded = false;


    window.addEventListener('load', () => {
      //loadscript();
      
    })

    function openDivCallUsaEcu(){
      let div = document.getElementById('call-usa-ecu');
      if(div.style.marginRight < "0px") { div.style.animation = "slideout 1s"; div.style.marginRight = "0px";document.getElementById('diviconsusaecu').style.marginLeft = "0px";} 
      else {div.style.animation = "slidein 1s";div.style.marginRight = "-105px"; document.getElementById('diviconsusaecu').style.marginLeft = "15px";}
    }

    document.getElementById('scriptbootstrap5').addEventListener('load', () => {
      const myModal = new bootstrap.Modal(document.getElementById('modalContact'));
      const moThank = new bootstrap.Modal(document.getElementById('modalThank'));
      const modalAval = new bootstrap.Modal(document.getElementById('modalAval'));
    });

    const sendFormLead = async() =>{

        if( document.getElementById('fname').value.length>2 && document.getElementById('tlf').value.length>6 ){
                //myModal.hide();
                $("#modalContact").modal('hide');
                //moThank.show();
                $("#modalThank").modal('toggle');
                var dataForm = new FormData(document.getElementById('mainFormLead'));
                const response = await fetch("{{route('web.sendlead')}}",
                { body: dataForm, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}" }  })
                let mensaje = await response.text();
                console.log(mensaje);
        }else{
          alert('Complete el formulario para enviar información...')
        }
    }

    const setInterest = (interest) =>{
      if (interest == "Avalúo de una propiedad") {
        document.getElementById('interest_aval').value = interest;
      } else {
        document.getElementById('interest').value = interest;
      }
    }

    const setInteresCite = (interest) => {
      document.getElementById('interestcite').value = interest;
    }
    
    const sendFormDetail = async(codPro, element) =>{
        if(document.getElementById('fname').value.length>3 && document.getElementById('flastname').value.length>2 && document.getElementById('tlf').value.length>7 && document.getElementById('email').value.length>12){
                //document.getElementById('formMsjLead').classList.toggle('d-none');
                //document.getElementById('thankMsjLead').classList.toggle('d-none');
                document.getElementById('interestDetail').value = codPro;
                var dataForm = new FormData(document.getElementById('formDetailProp'));
                let icon = document.createElement('i');
                icon.classList.add('fa', 'fa-spinner', 'fa-spin', 'ml-2');
                element.appendChild(icon);
                const response = await fetch("{{route('web.sendlead')}}",
                { body: dataForm, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}" }  })
                let status = await response.status;
                if(status == 200){
                  swal("Información Enviada!", "Un asesor lo contáctara en breve", "success");
                  element.removeChild(icon);
                  document.getElementById('fname').value = "";
                  document.getElementById('flastname').value = "";
                  document.getElementById('tlf').value = "";
                  document.getElementById('email').value = "";
                  document.getElementById('message').value = "Hola, me interesa este inmueble y quiero que me contacten. Gracias";
                } else {
                  swal("Algo salio mal!", "Por favor, recargue la página e intentelo de nuevo", "error");
                }
        }else{
            alert('Complete los Campos')
        }
    }

    const sendFormLeadAval = async() =>{
      if (document.getElementById('name_aval').value == "" || document.getElementById('phone_aval').value == "" || document.getElementById('email_aval').value == "" || document.getElementById('message_aval').value == "" || document.getElementById('type').value == "" || document.getElementById('state').value == "" || document.getElementById('city').value == "") {
        alert('Complete los campos');
      } else {
        modalAval.hide()     
        moThank.show()
        var dataForm = new FormData(document.getElementById('formAvaluo'));
        const response = await fetch("{{route('web.sendleadaval')}}",
        { body: dataForm, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}" }  })
        let mensaje = await response.text();
        console.log(mensaje);

        document.getElementById('name_aval').value = "";
        document.getElementById('phone_aval').value = "";
        document.getElementById('email_aval').value = "";
        document.getElementById('message_aval').value ="";
        document.getElementById('type').value = "";
        document.getElementById('state').value = "";
        document.getElementById('city').value = "";
      }
    }

    // function openItems(div){
    //   let divsubitems = document.getElementById('sub'+div);
    //   if(divsubitems.style.display == "none") divsubitems.style.display = "block";
    //   else divsubitems.style.display = "none";
    //   openSubItems('subdiv'+div);
    // }

    // function openSubItems(div){
    //   let divsubitems = document.getElementById(div);
    //   if(divsubitems.style.display == "none") divsubitems.style.display = "block";
    //   else divsubitems.style.display = "none";
    // }

    document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

      // close all inner dropdowns when parent is closed
      document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
        everydropdown.addEventListener('hidden.bs.dropdown', function () {
          // after dropdown is hidden, then find all submenus
            this.querySelectorAll('.submenu').forEach(function(everysubmenu){
              // hide every submenu as well
              everysubmenu.style.display = 'none';
            });
        })
      });

  document.querySelectorAll('.dropdown-menu a').forEach(function(element){
    element.addEventListener('click', function (e) {
        let nextEl = this.nextElementSibling;
        if(nextEl && nextEl.classList.contains('submenu')) {	
          // prevent opening link if link needs to open dropdown
          e.preventDefault();
          if(nextEl.style.display == 'block'){
            nextEl.style.display = 'none';
          } else {
            nextEl.style.display = 'block';
          }

        }
    });
  })
}
// end if innerWidth
});

  function loadscript(){
    let scriptjquery = document.getElementById('scriptjquery');
    let scriptpopper = document.getElementById('scriptpopper');
    let scriptbootstrap52 = document.getElementById('scriptbootstrap52');
    let scriptbootstrap5 = document.getElementById('scriptbootstrap5');

    scriptjquery.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js";
    scriptpopper.src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js";
    scriptbootstrap52.src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js";
    scriptbootstrap5.src = "{{asset('js/5.0.0/bootstrap.min.js')}}";

    loaded = true;
  }

  setTimeout(() => {
    loadscript();
  }, 3000);

  setTimeout(() => {
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');


        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass("show");
        });
        return false;
      });
  }, 3500);
</script>
</body>
</html>
