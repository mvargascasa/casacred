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
    var stylesheet = document.createElement('link');
      stylesheet.href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css";
      stylesheet.rel = 'stylesheet';
      setTimeout(function () {
          document.getElementsByTagName('head')[0].appendChild(stylesheet);
      }, 2000);
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
  
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>
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
    console.log('cargando script de analytics...');
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
  }, 3000);
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=3081509562095231&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

    

<?php };// fin de if url localhost ?>

  @yield('header')
  <meta name="keywords" content="casas en venta en cuenca, departamentos en venta en cuenca, terrenos en venta en cuenta, lotes en venta en cuenca" />
<style>
   body {
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
    .wsapp{
        position: fixed;
        bottom: 80px;
        right: 20px;
    }
    @media only screen and (max-width: 600px) {
        .fixed-search{
            position: fixed;
            width: 100%;
        }
        #pLastLabel{
          margin-top: 10px !important;
        }
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
</style>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light navbar-cc bg-white fixed-search" style="z-index: 100;">

            <div class="d-flex flex-grow-1">
                <span class="w-100 d-lg-none d-block pl-4">
                    <a class="navbar-brand" href="{{route('web.index')}}">
                        <img src="{{asset('img/logo_actualizado2.png')}}" width="65" height="35" alt="">
                        </a>
                </span>

                <a class="navbar-brand d-none d-lg-inline-block px-4" href="{{route('web.index')}}">
                    <img src="{{asset('img/logo_actualizado2.png')}}" width="85" height="40" alt="">
                    </a>
                <div class="w-100 text-right">
                    @if(Route::is('web.index') or Route::is('web.detail') ) 
                        <button type="button"  data-toggle="modal" data-target="#modalSearch" class="btn btn-sm btn-outline-secondary d-sm-block d-md-none">
                            Busqueda</button> 
                    @endif
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>

          <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
              <ul class="navbar-nav ml-auto flex-nowrap px-4">
                <li class="nav-item pr-2"> <a class="nav-link @if(Route::is('web.propiedades') or Route::is('web.detail')) active @endif" href="{{route('web.propiedades')}}">Compra</a> </li>
                <li class="nav-item pr-2"> <a class="nav-link @if(Request::is('servicios/asesores-bienes-raices')) active @endif" href="{{route('web.servicio','vende-tu-casa')}}">Vende</a> </li>
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

<div class="bg-white">
<section class="container justify-content-md-center p-4  ">
    <div class="row">
                            <h1 class="text-black-50 pt-2 pb-3">Casas en Venta en Cuenca Ecuador</h1>
                            <div class="col-md-3">
                                <h4>Ecuador</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-ecuador')}}">Casas en Venta en Ecuador</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-ecuador')}}">Departamentos en Venta en Ecuador</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-ecuador')}}">Terrenos en venta en Ecuador</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4>Cuenca</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-cuenca')}}">Casas en Venta en Cuenca</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-cuenca')}}">Departamentos en Venta en Cuenca</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-cuenca')}}">Terrenos en Venta en Cuenca</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4>Quito</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-quito')}}">Casas en Venta en Quito</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-quito')}}">Departamentos en Venta en Quito</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-quito')}}">Terrenos en Venta en Quito</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4>Guayaquil</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a class="alinkred" href="{{url('casas-de-venta-en-guayaquil')}}">Casas en Venta en Guayaquil</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('departamentos-de-venta-en-guayaquil')}}">Departamentos en Venta en Guayaquil</a></li>
                                    <li class="list-group-item"><a class="alinkred" href="{{url('terrenos-de-venta-en-guayaquil')}}">Terrenos en Venta en Guayaquil</a></li>
                                </ul>
                            </div>

        </div>
  </section>
</div>
<footer>
  <div style="background-color: #2C3144; color: #ffffff">
    <div class="container">
        <div class="row">           
            <div class="col-12 col-md-4 p-4 small">
                    <h5>Cuenca | Ecuador</h5>
                        
                        <p class="text-dark-50">Lunes a Viernes 9:00 am&nbsp;a 6:00 pm</p>
                        
                        <p class="text-dark-50">Sábados 9:00 am a 1:00 pm</p>
                        
                        <p style="margin: 0px;" class="text-dark-50"><b style="font-weight: 500; color: #ffffff; margin: 0px">Oficina Créditos:</b><a target="_blank" style="color: #ffffff" href="https://g.page/r/CV7pH0E3AVo_EBA"> Av. Juan Iñiguez 3-87 y D. Gonzalo Cordero - Edificio Santa Lucia</a></p>                        

                        <p class="text-dark-50 mt-2"><b style="font-weight: 500; color: #ffffff">Oficina Ventas:</b> Av. Fray Vicente Solano y Remigio Tamariz Crespo</p>
                        
                        <p><a href="tel:+59372810825" class="asindeco" style="color: #ffffff !important"> 07-412-6004</a>&nbsp;/ 
                            <a href="tel:+593983849073" class="asindeco" style="color: #ffffff !important"> 098-384-9073</a>&nbsp;&nbsp;</p>
                        
                        <p><a href="mailto:info@casacredito.com" class="asindeco" style="color: #ffffff !important">info@casacredito.com</a></p>
            </div>
            <div class="col-12 col-md-4 p-4 small">
                    <h5>New York | EE.UU.</h5>
                        <p class="text-dark-50">Lunes a Viernes 9:00 am a 6:00 pm</p>

                        <p class="text-dark-50">Sábados y Domingos 9:00 am a 4:00 pm</p>

                        <p class="text-dark-50"><a target="_blank" style="color: #ffffff" href="https://g.page/r/Cdf-npU-D1gdEAE">
                          67-03 Roosevelt Avenue<br>
                          Woodside, NY 11377
                        </a></p>

                        <p><a style="color: #ffffff !important" href="tel:+17186903740" class="asindeco">718-690-3740</a>&nbsp;</p>
                        {{-- <p><a href="tel:+13478460067" class="asindeco">347-846-0067</a>&nbsp;</p> --}}

                        <p><a style="color: #ffffff !important" href="mailto:info@casacredito.com" class="asindeco">info@casacredito.com</a></p>
            </div>
            <div class="col-12 col-md-4 p-4">
                <h5>Síguenos en:</h5>
                
                <div class="d-flex mt-3">
                  <a href="https://www.facebook.com/CasaCreditoInmobiliaria" class="asindeco px-1" target="_blank">
                    {{-- <img src="{{asset('img/casacredito-facebook.svg')}}" alt="Facebook Notary Public Near Me" width="40" height="40"> --}}
                    <i style="background-color: #c30000; color: #ffffff; padding: 10px; padding-left: 13px; padding-right: 13px; border-radius: 25px" class="fab fa-facebook-f"></i>
                  </a>
                  
                  <a href="https://www.instagram.com/inmobiliariacasacredito/" class="asindeco px-1" target="_blank">
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
                  
                  <a href="https://api.whatsapp.com/send?phone=+593983849073  " class="asindeco px-1" target="_blank">
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
 <!-- Modal -->
 <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
  


  <div class="modal fade" id="modalThank" tabindex="-1" aria-labelledby="modalThankLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalThankLabel">¡Gracias por Contactarnos!</h5>
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
    <a href="https://api.whatsapp.com/send?phone=+593983849073" class="asindeco" target="_blank">
        <img src="{{asset('img/casacredito-whatsapp.svg')}}" alt="Whatsapp Notary Public Near Me" width="50" height="50">
    </a>
  </div>
<script src="{{asset('js/5.0.0/popper.min.js')}}"></script>
<script src="{{asset('js/5.0.0/bootstrap.min.js')}}"></script>

@yield('script')
<script>
    const  myModal = new bootstrap.Modal(document.getElementById('modalContact'));
    const  moThank = new bootstrap.Modal(document.getElementById('modalThank'));
    const modalAval = new bootstrap.Modal(document.getElementById('modalAval'));
    const sendFormLead = async() =>{
        
        if( document.getElementById('fname').value.length>2 && document.getElementById('tlf').value.length>6 ){
                myModal.hide()     
                moThank.show()
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
    
    const sendFormDetail = async(codPro) =>{
        if(document.getElementById('fname').value.length>3 && document.getElementById('tlf').value.length>7 && document.getElementById('email').value.length>12){
                //document.getElementById('formMsjLead').classList.toggle('d-none');
                document.getElementById('thankMsjLead').classList.toggle('d-none');
                document.getElementById('interestDetail').value = codPro;
                var dataForm = new FormData(document.getElementById('formDetailProp'));
                const response = await fetch("{{route('web.sendlead')}}",
                { body: dataForm, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}" }  })
                let mensaje = await response.text();
                document.getElementById('fname').value = "";
                document.getElementById('tlf').value = "";
                document.getElementById('email').value = "";
                document.getElementById('message').value = "Hola, me interesa este inmueble y quiero que me contacten. Gracias";
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
</script>
</body>
</html>
