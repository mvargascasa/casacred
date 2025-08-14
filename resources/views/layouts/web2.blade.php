<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('favicon-grupo-housing.png') }}" type="image/x-icon" />
    {{-- <link href="" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/5.0.0/bootstrap.min.css') }}">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    </noscript>
    <link rel="stylesheet" href="{{ asset('css/font-style.css') }}">
    <link rel="canonical" href="{{ Request::url() }}" />


    <link rel="stylesheet" href="{{ asset('css/style.min.css?v=1') }}">
    <meta name="facebook-domain-verification" content="st7nmy30bjdubvp2cuvvhwuk6n2syf" />
    <?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($actual_link, 'localhost') === false){
?>

    <!-- Google Tag Manager -->
    <script>
        setTimeout(() => {
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
                console.log('cargando gtm 5h6gc9z');
            })(window, document, 'script', 'dataLayer', 'GTM-5H6GC9Z');
        }, 3500);
    </script>
    <!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script id="script_analytics" async></script>
    <script>
        setTimeout(() => {
            document.getElementById('script_analytics').src =
                'https://www.googletagmanager.com/gtag/js?id=UA-124437679-1';
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'AW-806267889'); //    Adwords
            gtag('config', 'UA-124437679-1'); //  Analytics 

        }, 3500);
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        setTimeout(() => {
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '3081509562095231');
            fbq('track', 'PageView');
            console.log('cargando script de facebook...');
        }, 4000);
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=3081509562095231&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->



    <?php };// fin de if url localhost ?>

    @yield('header')
    <style>
        html,
        body {
            max-width: 100% !important;
            overflow-x: clip !important;
            background: url('{{ asset('img/fondo-dashboard.jpg') }}');
            background-size: cover;
        }

        .wsapp {
            z-index: 3;
            position: fixed;
            bottom: 70px;
            right: 10px;
        }

        .telf {
            z-index: 3;
            position: fixed;
            bottom: 10px;
            right: 0px;
            animation-duration: 2s;
            animation-name: slideout;
        }

        .dropdown-menu-style {
            width: 250px !important
        }

        @media only screen and (max-width: 600px) {
            .fixed-search {
                position: fixed;
                width: 100%;
            }

            #pLastLabel {
                margin-top: 10px !important;
            }

            .dropdown-menu-style {
                width: auto !important
            }
            .section-info{
                justify-content: start !important;
            }
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* FIREFOX */
        input[type="number"] {

            -moz-appearance: textfield;}input[type="number"]:hover,
            input[type="number"]:focus {
                -moz-appearance: number-input;
            }

            /* OTHER */
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            html,
            body {
                max-width: 100% !important;
                font-family: 'Poppins', sans-serif;
            }

            a {
                text-decoration: none;
                color: #000000;
            }

            @media screen and (max-width: 992px) {
                .divlogocenter {
                    display: none !important;
                }

                .divtwoptionsright {
                    margin-left: 0px !important;
                }
                .cta-nav{
                    display: none !important;
                }
            }

            @media screen and (max-width: 850px) {
                .rowconstruye {
                    display: none !important;
                }

                #col1-footer,
                #col2-footer {
                    font-size: 12px !important;
                }

                #divny {
                    margin-top: 0px !important;
                }
            }

            .item-nav-link:hover {
                background-color: #3b4255 !important;
                color: #ffffff !important;
            }

            .grecaptcha-badge {
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
                from {
                    margin-right: -105px;
                }

                to {
                    margin-right: 0px;
                }
            }

            @keyframes slidein {
                from {
                    margin-right: 0px
                }

                to {
                    margin-right: -105px
                }
            }

            .desing-p {
                font-weight: 100;
                color: #ffffff;
            }

            .desing-t {
                font-weight: 500;
                color: #ffffff;
            }

            .grotesk {
                font-family: 'Sharp Grotesk';
            }

            .custom-container {
                width: 100%;
                max-width: 1500px;
                /* Ajusta este valor según tus necesidades */
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }

            /* Estilos para ajustar el padding interno de cada columna */
            .column-padding {
                padding-left: 40px;
                /* Espacio interno a la izquierda */
                padding-right: 40px;
                /* Espacio interno a la derecha */
            }

    .contact-group {
        position: fixed;
        bottom: 22px;
        right: 10px;
        z-index: 5000;
    }

    .telf-contact{
        margin-bottom: 10px;
    }

    .telf-contact i{
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 25px;
        background-color: #182741;
        border: 1px solid #ffffff93;
        cursor: pointer;
    }

    .container-numbers{
        position: fixed;
        bottom: 170px;
        right: 10px;
        width: 250px;
        z-index: 5000;
    }

    .container-numbers .header{
        background-color: #ffffff;
        padding: 8px 5px;
        border-radius: 10px 10px 0 0;
        font-weight: 600;
        border: 1px solid #0000003f;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .container-numbers .body{
        background-color: #182741;
        text-align: start;
        padding: 8px 5px;
        border-radius: 0 0 10px 10px;
        column-gap: 10px;
    }

    .container-numbers div a span{
        color: #ffffff;
    }

    @keyframes breathe {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
    }

        /*Estilos de animacion del icono latiendo*/
    @keyframes beat {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }

    .whatsapp-float {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #25d366;
        color: white;
        font-size: 30px;
        box-shadow: 2px 2px 5px #666;
        text-decoration: none;
        border: none;
        outline: none;
        transition: transform 0.3s ease, background-color 0.3s ease;
        animation: breathe 2s ease-in-out infinite;
    }

    .icon-close{
        background-color: #b7b7b79c;
        border-radius: 30px;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .whatsapp-float i {
        transition: color 0.3s;
        animation: beat 2s ease-in-out infinite;
        /* Suavizar la transición de color del ícono */
    }

    .whatsapp-float:hover {
        transform: scale(1.1);
        background-color: #ffffff;
        /* Fondo a blanco */
        color: #25d366;
        /* Ícono a verde WhatsApp */
        box-shadow: 0 0 10px #25d366;
        /* Sombra más pronunciada y de color verde */
    }

    .whatsapp-float:hover i {
        color: inherit;
        /* El ícono hereda el color para mantener consistencia */
    }

    .whatsapp-float-active {
        transform: scale(1.5);
        background-color: #ffffff;
        /* Fondo a blanco */
        color: #25d366;
        /* Ícono a verde WhatsApp */
        box-shadow: 0 0 10px #25d366;
        /* Sombra más pronunciada y de color verde */
    }

    /* Animación de entrada (derecha a izquierda) */
    .animacion-contacto {
        animation: deslizarDesdeDerecha 1s forwards ease-out;
    }

    @keyframes deslizarDesdeDerecha {
        from {
            right: -100%; /* Empieza completamente fuera de la derecha */
            opacity: 0; /* Opcional: Empieza invisible */
        }
        to {
            right: 10px; /* Termina en su posición normal */
            opacity: 1; /* Termina visible */
        }
    }

    /* Animación de salida (izquierda a derecha) */
    .animar-salida {
        animation: deslizarHaciaDerecha 1s forwards ease-in;
    }

    @keyframes deslizarHaciaDerecha {
        from {
            right: 0; /* Empieza en su posición normal */
            opacity: 1; /* Empieza visible */
        }
        to {
            right: -100%; /* Termina completamente fuera de la derecha */
            opacity: 0; /* Termina invisible */
        }
    }

    /* Enlace del número de teléfono */
    .phone-number {
        width: 200px;
        background-color: #f7b731;
        color: #0d2345 !important; /* Color del texto */
        font-weight: 400; /* Grosor de la fuente */
        text-decoration: none; /* Sin subrayado */
        z-index: 8000000; /* Asegura que esté encima del video */
    }

    </style>

    <style>
        #navbar {
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar-nav .nav-link{
            font-size: 18px;
        }

        .navbar-nav{
            display: flex;
            gap: 30px !important;
        }

        .logo-white {
            filter: brightness(0) invert(1);
        }
    </style>
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:4986662,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-3" id="navbar" style="background-color: #0d2345;">
            <div class="container-fluid" style="max-width: 85vw; margin: 0 auto; font-family: 'Sharp grotesk'; font-weight: 500; justify-content: space-between;">
        
                <!-- LOGO -->
                <a class="navbar-brand" href="{{ route('web.index') }}">
                    <img src="{{ asset('img/logo-azul-grupo-housing.png') }}"  width="110" height="45" class="logo-white" alt="Grupo Housing">
                </a>
        
                <!-- TOGGLER MOBILE -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- MENÚ CENTRAL -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-light @if (Request::is('/')) active @endif"
                                href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-light @if (Request::is('propiedades/*')) active @endif"
                                href="/propiedades-en-general">Propiedades</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-light @if(Request::is('servicios/construye')) active @endif"
                                href="{{ Route('web.servicios', 'construye') }}">
                                Servicios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-light @if (Request::is('servicios/nosotros')) active @endif"
                                href="{{ route('web.servicios', 'nosotros') }}">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-light @if (Request::is('blog')) active @endif"
                                href="{{ route('web.blog') }}">Blog</a>
                        </li>
                    </ul>
                </div>
        
                <!-- BOTÓN TELÉFONO -->
                <div class="d-flex align-items-center cta-nav">
                    <a class="btn rounded-pill px-4 phone-number" href="tel:+593987595789">
                        098-759-5789
                    </a>
                    @guest
                        <div class="nav-item">
                            <a class="nav-link text-white font-weight-light" href="{{ route('login') }}">
                                <i class="fas fa-user-circle fa-2x"></i>
                            </a>
                        </div>
                    @else
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.index') }}">Dashboard</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
        
            </div>
        </nav>
             
    </header>

    @yield('content')

    <footer style="background-color: #0f2344; font-family: 'Sharp Grotesk', sans-serif; color: #fff; padding: 50px 0 0 0">
        <div style="max-width: 85vw; margin: 0 auto;">
            
            <!-- Barra superior con tres bloques -->
            <div class="section-info" style="background-color: #1c2f54; padding: 20px; border-radius: 15px; display: flex; justify-content: space-around; flex-wrap: wrap; gap: 20px;">
                <!-- Ubicación -->
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; border: 2px solid #ffa500; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-map-marker-alt" style="color: #ffa500; font-size: 22px;"></i>
                    </div>
                    <div>
                        <p style="margin: 0; font-weight: bold;">Ubicación–Ecuador</p>
                        <p style="margin: 0;">Remigio Tamariz y Av. Solano</p>
                    </div>
                </div>
                <!-- Email -->
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; border: 2px solid #ffa500; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-envelope" style="color: #ffa500; font-size: 20px;"></i>
                    </div>
                    <div>
                        <p style="margin: 0; font-weight: bold;">E-mail</p>
                        <p style="margin: 0;"><a href="mailto:info@grupohousing.com" style="color: #fff; text-decoration: none;">info@grupohousing.com</a></p>
                    </div>
                </div>
                <!-- Teléfono -->
                <div style="display: flex; justify-content: center; gap: 15px;">
                    <div style="width: 50px; height: 50px; border: 2px solid #ffa500; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-phone" style="color: #ffa500; font-size: 20px;"></i>
                    </div>
                    <div>
                        <p style="margin: 0; font-weight: bold;">Contacto-Ecuador</p>
                        <p style="margin: 0;"><a href="tel:+593987595789" style="color: #fff; text-decoration: none;">098-759-5789</a></p>
                    </div>
                </div>
            </div>
    
            <!-- Sección inferior -->
            <div style="margin-top: 40px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px;">
                <!-- Logo y redes -->
                <div style="flex: 1; min-width: 220px;">
                    <img src="{{ asset('img/logo-azul-grupo-housing.png') }}" alt="Grupo Housing" style="max-width: 150px; margin-bottom: 20px;" class="logo-white">
                    <div style="display: flex; gap: 15px;">
                        <a href="https://www.facebook.com/profile.php?id=61555792821989" target="_blank" style="color: #fff; font-size: 24px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/grupo_housing" target="_blank" style="color: #fff; font-size: 24px;"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <!-- New York -->
                <div style="flex: 1; min-width: 220px;">
                    <p style="font-weight: light; text-transform: uppercase;" class="m-0">E.E.U.U.</p>
                    <p style="font-size: 18px; font-weight: bold; border-bottom: 3px solid #ffa500; display: inline-block;">New York</p>
                    <p><i class="fas fa-map-marker-alt"></i> 67-03 Roosevelt Avenue<br>Woodside, NY 11377</p>
                    <p><i class="fas fa-phone"></i> 718 690 3740</p>
                </div>
                <!-- New Jersey -->
                <div style="flex: 1; min-width: 220px;">
                    <p style="font-weight: light; text-transform: uppercase;" class="m-0">E.E.U.U.</p>
                    <p style="font-size: 18px; font-weight: bold; border-bottom: 3px solid #ffa500; display: inline-block;">New Jersey</p>
                    <p><i class="fas fa-map-marker-alt"></i> 1146 East Jersey St<br>Elizabeth, NJ 07201</p>
                    <p><i class="fas fa-phone"></i> 908 381 0090</p>
                </div>
                <!-- Horarios -->
                <div style="flex: 1; min-width: 220px;">
                    <br>
                    <p style="font-size: 18px; font-weight: bold; border-bottom: 3px solid #ffa500; display: inline-block;">Horarios</p>
                    <p>Lunes a Viernes<br>9:00am - 18:00pm</p>
                    <p>Sábado<br>9:00am - 13:00pm</p>
                </div>
            </div>
    
            <!-- Copyright -->
            <div style="text-align: center; padding: 20px; margin-top: 30px; font-size: 14px; border-top: 1px solid rgba(255,255,255,0.2);">
                Copyright © 2024. All rights reserved.<br>
                <a href="{{ route('web.politicas') }}" style="color: #fff; font-weight: 500; text-decoration: none;">Políticas de Privacidad</a> -
                <a href="{{ route('web.seo') }}" style="color: #fff; text-decoration: none;">SEO</a>
            </div>
        </div>
    </footer>
    
       



    {{-- <div style="position: fixed; bottom: 10px; right: 10px; z-index: 1000">
  @livewire('chat-bot')
</div> --}}
    <!-- Modal -->
    <div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #182741 !important;">
                    <span class="modal-title" id="modalContactLabel">Complete el siguiente formulario y en breve será
                        contactado.</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('web.sendlead') }}" method="POST" id="mainFormLead">
                        @csrf
                        @include('z-form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAval" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #182741 !important;">
                    <span class="modal-title" id="modalContactLabel">Complete el siguiente formulario y en breve será
                        contactado.</span>
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

    <div class="contact-group">
        <div class="telf-contact" onclick="openContactContainer()">
            <div>
                <i class="fas fa-phone-alt p-2 text-light d-flex justify-content-center align-items-center"></i>
            </div>
        </div>
        <a href="https://api.whatsapp.com/send?phone=593987595789&text=Hola Grupo Housing, estoy interesado en una propiedad" target="_blank" class="whatsapp-float">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <div class="container-numbers" id="containerNumbers" style="display: none">
        <div class="header">
            <span>Contáctate a:</span>
            <div class="icon-close" onclick="openContactContainer()">X</div>
        </div>
        <div class="body">
            <a href="tel:+593987595789">
                <div class="border rounded pb-1 pl-1 mb-1">
                    <img width="45px" height="30px" class="mt-2" src="{{ asset('img/ECUADOR-04.webp') }}"
                        alt="Telefono Grupo Housing">
                    <span>098-759-5789</span>
                </div>
            </a>
            <a href="tel:+17186903740">
                <div class="border rounded pb-1 pl-1">
                    <img width="45px" height="30px" class="mt-2" src="{{ asset('img/USA-05.webp') }}"
                        alt="Telefono Grupo Housing EEUU">
                    <span>718-690-3740</span>
                </div>
            </a>
        </div>
    </div>

    <div class="telf d-none">
        <div id="call-usa-ecu" class="bg-danger text-light d-flex" style="margin-right: -105px">
            <div onclick="openDivCallUsaEcu()" style="cursor: pointer; ">
                <i class="fas fa-phone-alt fa-2x bg-danger p-2 text-light"></i>
            </div>
            <div id="diviconsusaecu" style="margin-left: 15px;">
                <a href="tel:+593987595789">
                    <img width="45px" height="30px" class="mt-2" src="{{ asset('img/ECUADOR-04.webp') }}"
                        alt="Telefono Grupo Housing">
                </a>
                <a href="tel:+17186903740">
                    <img width="45px" height="30px" class="mt-2 ml-1" src="{{ asset('img/USA-05.webp') }}"
                        alt="Telefono Grupo Housing EEUU">
                </a>
            </div>
        </div>
    </div>
    {{-- <script src="{{asset('js/popper.min.js')}}"></script> --}}
    <script id="scriptjquery"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{asset('js/jquery3.6.1.min.js')}}"></script> --}}
    <script id="scriptpopper" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script id="scriptbootstrap52" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script id="scriptbootstrap5"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @yield('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('scroll', function() {
                var navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>

    <script>
        let stylesheet = document.createElement('link');
        stylesheet.href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css";
        stylesheet.rel = 'stylesheet';
        document.getElementsByTagName('head')[0].appendChild(stylesheet);
    </script>

    <script>
        setTimeout(() => {
            // let scriptrecaptcha = document.getElementById('recaptcha');
            // scriptrecaptcha.src = "https://www.google.com/recaptcha/api.js?render=6Le1UsshAAAAAL93VxqsJYCa67mrcNIP1q3C99v5";
            let scriptrecaptcha = document.createElement('script');
            scriptrecaptcha.src =
                "https://www.google.com/recaptcha/api.js?render=6Le1UsshAAAAAL93VxqsJYCa67mrcNIP1q3C99v5";
            document.getElementsByTagName('head')[0].appendChild(scriptrecaptcha);
        }, 3500);
    </script>
    
    <script>
        let loaded = false;
        function openDivCallUsaEcu() {
            let div = document.getElementById('call-usa-ecu');
            if (div.style.marginRight < "0px") {
                div.style.animation = "slideout 1s";
                div.style.marginRight = "0px";
                document.getElementById('diviconsusaecu').style.marginLeft = "0px";
            } else {
                div.style.animation = "slidein 1s";
                div.style.marginRight = "-105px";
                document.getElementById('diviconsusaecu').style.marginLeft = "15px";
            }
        }

        document.getElementById('scriptbootstrap5').addEventListener('load', () => {
            const myModal = new bootstrap.Modal(document.getElementById('modalContact'));
            const moThank = new bootstrap.Modal(document.getElementById('modalThank'));
            const modalAval = new bootstrap.Modal(document.getElementById('modalAval'));
        });

        function sendFormLead(event) {
            event.preventDefault();
            if (document.getElementById('fname').value.length > 2 && document.getElementById('tlf').value.length > 6) {
                let form = document.getElementById('mainFormLead');
                form.submit();
            } else {
                alert('Complete el formulario para enviar información...')
            }
        }

        const setInterest = (interest) => {
            if (interest == "Avalúo de una propiedad") {
                document.getElementById('interest_aval').value = interest;
            } else {
                document.getElementById('interest').value = interest;
            }
        }

        const setInteresCite = (interest) => {
            document.getElementById('interestcite').value = interest;
        }

        const sendFormDetail = async (codPro, event) => {
            event.preventDefault();
            if (document.getElementById('fname').value.length > 3 && document.getElementById('flastname').value
                .length > 2 && document.getElementById('tlf').value.length > 7 && document.getElementById('email')
                .value.length > 12) {
                document.getElementById('interestDetail').value = codPro;
                let form = document.getElementById('formDetailProp');
                form.submit();
            } else {
                alert('Complete los Campos')
            }
        }

        const sendFormLeadAval = async () => {
            if (document.getElementById('name_aval').value == "" || document.getElementById('phone_aval').value ==
                "" || document.getElementById('email_aval').value == "" || document.getElementById('message_aval')
                .value == "" || document.getElementById('type').value == "" || document.getElementById('state')
                .value == "" || document.getElementById('city').value == "") {
                alert('Complete los campos');
            } else {
                modalAval.hide()
                moThank.show()
                var dataForm = new FormData(document.getElementById('formAvaluo'));
                const response = await fetch("{{ route('web.sendleadaval') }}", {
                    body: dataForm,
                    method: 'POST',
                    headers: {
                        "X-CSRF-Token": "{!! csrf_token() !!}"
                    }
                })
                let mensaje = await response.text();
                console.log(mensaje);

                document.getElementById('name_aval').value = "";
                document.getElementById('phone_aval').value = "";
                document.getElementById('email_aval').value = "";
                document.getElementById('message_aval').value = "";
                document.getElementById('type').value = "";
                document.getElementById('state').value = "";
                document.getElementById('city').value = "";
            }
        }

        function loadscript() {
            let scriptjquery = document.getElementById('scriptjquery');
            let scriptpopper = document.getElementById('scriptpopper');
            let scriptbootstrap52 = document.getElementById('scriptbootstrap52');
            let scriptbootstrap5 = document.getElementById('scriptbootstrap5');

            scriptjquery.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js";
            scriptpopper.src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js";
            scriptbootstrap52.src = "https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js";
            scriptbootstrap5.src = "{{ asset('js/5.0.0/bootstrap.min.js') }}";

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

        function openContactContainer() {
            let container = document.getElementById('containerNumbers');

            container.removeEventListener('animationend', handleAnimationEnd);

            if (container.classList.contains('animacion-contacto')) {
                container.classList.remove('animacion-contacto'); // Quita la clase de entrada
                container.classList.add('animar-salida'); // Agrega la clase de salida

                container.addEventListener('animationend', handleAnimationEnd, { once: true });

            } else {
                container.style.display = 'block'; 
                container.classList.remove('animar-salida'); 
                container.classList.add('animacion-contacto'); 
            }
        }

        // Función manejadora del evento 'animationend'
        function handleAnimationEnd(event) {
            let container = document.getElementById('containerNumbers');

            if (event.animationName === 'deslizarHaciaDerecha') {
                container.style.display = 'none'; 
                container.style.right = '-100%';
            }
        }
    </script>
</body>

</html>
