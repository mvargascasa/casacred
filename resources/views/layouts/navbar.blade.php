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
      }
      @media screen and (max-width: 1334px){
        #buscador{
          display: none !important;
        }
        #btnsearch{
            display: block !important;
        }
      }
      .item-nav-link:hover{
        background-color: #3b4255 !important;
        color: #ffffff !important;
      }
      .navbar-brand{
        transition: 1s;
        visibility: hidden;
      }
      .divlogocenter{
        transition: 1s;
        visibility: hidden;
      }
    </style>
</head>
<body style="background-color: #ffffff">
      {{-- <div class="row p-1 rowconstruye fixed-top" style="background-color: #3b4255;">
        <div class="col-4 col-sm-3 col-md-4 col-lg-5"></div>
        <div class="col-12 col-sm-6 col-md-7 col-lg-6 d-flex">
          <div>
            <a href="#" style="text-decoration: none; color: #ffffff">CONSTRUYE</a>
          </div>
          <div>
            <a href="#" style="text-decoration: none; color: #ffffff; margin-left: 7px; margin-right: 7px">MATERIALES DE CONSTRUCCIÓN</a>
          </div>
          <div>
            <a href="#" style="text-decoration: none; color: #ffffff"><i class="fas fa-sign-out-alt" style="color: #d71e01"></i> MI CUENTA</a>
          </div>
        </div>
        <div class="col-sm-1 col-md-1"></div>
      </div> --}}

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
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
                <a class="nav-link item-nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link item-nav-link" href="{{route('web.notariausa')}}">Notaria USA</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link btn" style="background-color: #fec41a; color: #ffffff" href="#">Proyectos Nuevos</a>
              </li> --}}
            </ul>
            <div class="divlogocenter" style="margin-left: 16%">
              <a href="{{ route('web.home') }}">
                <img width="90px" height="65px" src="{{asset('img/logo_actualizado.png')}}" height="40" alt="">
              </a>
            </div>
            <div class="divtwoptionsright" style="margin-left: 25%">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" target="_blank" href="https://casacreditopromotora.com/socios/construye">Construye</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#"><i class="fas fa-sign-out-alt" style="color: #d71e01"></i> Mi cuenta</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </nav>

    @yield('content')

    <footer class="text-white" style="background-color: #3b4255;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <div class="row">
              <div class="col-sm-4">
                <h5>Cuenca | Ecuador</h5>
                <div style="font-size: 15px">
                    <div>
                        <p style="margin: 0px">Lunes a Viernes 09:00 am a 6:00 pm</p>
                        <p>Sábados 9:00 am a 1:00 pm</p>
                    </div>
                    <div>
                        <p><i class="fas fa-map-marker-alt" style="color: #d71e01"></i> Av. Juan Iñiguez 3-87 y D. Gonzalo Cordero <br> Edificio Santa Lucia</p>
                    </div>
                    <div>
                        <p style="margin: 0px"><i class="fas fa-phone-alt" style="color: #d71e01"></i> 07-412-6004 / 098-384-9073</p>
                        <p><i class="fas fa-envelope" style="color: #d71e01"></i> info@casacredito.com</p>
                    </div>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>New York | EE.UU.</h5>
                <div style="font-size: 15px">
                    <div>
                        <p>Lunes a Viernes 09:00 am a 6:00 pm</p>
                    </div>
                    <div style="margin-top: 35px">
                        <p><i class="fas fa-map-marker-alt" style="color: #d71e01"></i> 67-03 Roosevelt Avenue <br> Woodside, NY 11377</p>
                    </div>
                    <div>
                        <p style="margin: 0px"><i class="fas fa-phone-alt" style="color: #d71e01"></i> 718-690-3740 / 347-846-0067</p>
                        <p><i class="fas fa-envelope" style="color: #d71e01"></i> info@casacredito.com</p>
                    </div>
                </div>
              </div>
              <div class="col-sm-4">
                <h5>Síguenos en:</h5>
                <div class="d-flex">
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-facebook-f" style="color: #3b4255"></i>
                    </div>
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-instagram" style="color: #3b4255"></i>
                    </div>
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-twitter" style="color: #3b4255"></i>
                    </div>
                    <div style="border-radius: 15px; background-color: #ffffff; width: 25px; height: 25px; text-align: center; margin: 3px">
                        <i class="fab fa-youtube" style="color: #3b4255"></i>
                    </div>
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

    @yield('footer')


    <script>
      var navbar = document.querySelector('.navbar');
      var divlogo = document.querySelector('.navbar-brand');
      var divlogocenter = document.querySelector('.divlogocenter');

      window.addEventListener('load', function(){
        divlogocenter.style.visibility = "visible";
        divlogocenter.style.animation = "fade-in-move-down 1s";
      });

      let details = navigator.userAgent;
      let regexp = /android|iphone|kindle|ipad/i;
      var screenWidth = screen.width
  
      let isMobileDevice = regexp.test(details);
        if (screenWidth <= 991) {
          navbar.classList.remove('navbar-dark');
          navbar.classList.remove('fixed-top');
          navbar.classList.add('navbar-light');
          divlogo.style.visibility = "visible";
          document.getElementById('imglogo').style.width = "45px";
          document.getElementById('imglogo').style.height = "35px";
        } else {
          window.onscroll = function() {
          var y = window.scrollY;
          if(y > 100){
            changeAppearance();
          } else {
            returnAppearance();
          }
        };
      }

      const changeAppearance = () => {
        navbar.classList.remove('navbar-dark');
        navbar.classList.add('bg-light');
        navbar.style.transition = "0.5s";

        divlogo.style.visibility = "visible";
        divlogo.style.animation = "fade-in-move-left 1s";

        divlogocenter.style.visibility = "hidden";
        divlogocenter.style.animation = "fade-in-move-up 1s";
      }

      const returnAppearance = () => {
        navbar.classList.add('navbar-dark');
        navbar.classList.remove('bg-light');

        divlogo.style.animation = "fade-in-move-right 1s";
        divlogo.style.visibility = "hidden";
     
        divlogocenter.style.visibility = "visible";
        divlogocenter.style.animation = "fade-in-move-down 1s";
      }
    </script>
</body>
</html>