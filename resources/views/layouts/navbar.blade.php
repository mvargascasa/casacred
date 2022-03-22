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
      html, body{
        max-width: 100% !important;
        overflow-x: hidden !important;
      }

      @media screen and (max-width: 850px){
        .rowconstruye{
          display: none !important;
        }
        .navbar{
          padding-left: 0px !important;
          padding-right: 0px !important; 
        }
      }
    </style>
</head>
<body style="background-color: #ffffff">
      <div class="row p-1 rowconstruye" style="background-color: #3b4255;">
        <div class="col-sm-6"></div>
        <div class="col-12 col-sm-5 d-flex">
          <div>
            <a href="" style="text-decoration: none; color: #ffffff">CONSTRUYE</a>
          </div>
          <div>
            <a href="#" style="text-decoration: none; color: #ffffff; margin-left: 7px; margin-right: 7px">MATERIALES DE CONSTRUCCIÓN</a>
          </div>
          <div>
            <a href="#" style="text-decoration: none; color: #ffffff"><i class="fas fa-sign-out-alt" style="color: #d71e01"></i> MI CUENTA</a>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding-left: 15%; padding-right: 15%">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('web.index')}}">
            <img src="{{asset('casacredito-logo.svg')}}" height="40" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('web.servicios','asesores-bienes-raices')}}">Vende</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('web.servicios','creditos-en-ecuador')}}">Créditos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('web.servicios','nosotros')}}">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('web.notariausa')}}">Notaria USA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn" style="background-color: #fec41a; color: #ffffff" href="#">Proyectos Nuevos</a>
              </li>
            </ul>
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
    
</body>
</html>