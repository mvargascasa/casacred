<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('favicon-grupo-housing.png') }}" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/5.0.0/bootstrap.min.css') }}">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    </noscript>
    <link rel="stylesheet" href="{{ asset('css/font-style.css') }}">
    <script>
        let stylesheet = document.createElement('link');
        stylesheet.href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css";
        stylesheet.rel = 'stylesheet';
        setTimeout(function() {
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
            scriptrecaptcha.src =
                "https://www.google.com/recaptcha/api.js?render=6Le1UsshAAAAAL93VxqsJYCa67mrcNIP1q3C99v5";
            document.getElementsByTagName('head')[0].appendChild(scriptrecaptcha);
        }, 3500);
    </script>


    <link rel="stylesheet" href="{{ asset('css/style.css?x=6') }}">
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

            .whatsapp-group {
                position: fixed;
                bottom: 62px;
                right: 5px;
                z-index: 5000;
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
            }

            .whatsapp-options {
                display: none;
                position: absolute;
                bottom: 60px;
                /* Ajuste para que aparezca justo encima del botón */
                right: 0;
                flex-direction: column;
            }

            .whatsapp-link {
                background-color: white;
                color: #25d366;
                text-decoration: none;
                padding: 8px;
                border-radius: 10px;
                box-shadow: 2px 2px 5px #666;
                margin-top: 5px;
            }

            .whatsapp-link:hover {
                color: #23b258;
            }

            /* Estilos específicos del botón de WhatsApp para mantener el ícono centrado y con el estilo deseado */
            .whatsapp-float {
                background-color: #25d366;
                color: white;
                font-size: 30px;
                /* Tamaño del ícono de WhatsApp */
                border-radius: 50%;
                /* Hacer el botón de WhatsApp completamente circular */
                box-shadow: 2px 2px 5px #666;
                text-decoration: none;
                border: none;
                outline: none;
            }

            .whatsapp-float i {
                transition: color 0.3s;
                /* Suavizar la transición de color del ícono */
            }

            /* Efectos al pasar el mouse sobre ambos botones */
            .whatsapp-float:hover {
                transform: scale(1.5);
            }

            /* Cambio de color específico al hacer hover en el botón de WhatsApp */
            .whatsapp-float:hover {
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
    </style>

    <style>
        #navbar {
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar-light .navbar-nav .nav-link {
            color: white;
            transition: background-color 0.3s, color 0.3s;
        }

        .navbar-light .navbar-brand img {
            filter: brightness(0) invert(1);
        }

        .navbar-light.scrolled .navbar-nav .nav-link {
            color: #182741;
        }

        .navbar-light.scrolled .navbar-nav .nav-link:hover {
            background-color: #182741;
            color: white !important;
        }

        .navbar-light .navbar-nav .nav-link:hover {
            background-color: #182741;
            color: white;
        }

        .navbar-light.scrolled .navbar-brand img {
            filter: none;
        }

        .navbar-light.scrolled {
            background-color: white !important;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('web.index') }}">
                    <img src="{{ asset('img/logo-azul-grupo-housing.png') }}" width="110" height="45"
                        alt="Grupo Housing">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('/propiedades-en-venta')) active @endif"
                                href="/propiedades-en-venta">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Route::is('/propiedades-en-renta')) active @endif"
                                href="/propiedades-en-renta">Rentar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('servicio/vende-tu-casa')) active @endif"
                                href="{{ route('web.servicio', 'vende-tu-casa') }}">Vende</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('blog')) active @endif"
                                href="{{ route('web.blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::is('servicios/nosotros')) active @endif"
                                href="{{ route('web.servicios', 'nosotros') }}">Nosotros</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('INGRESAR') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <div style="background-color: #182741" class="grotesk text-white">
            <div class="custom-container pt-5">
                <div class="row">
                    <div class="col-md-4 column-padding mt-5" style="border-right: 1px solid #ffffff;">
                        <p class="desing-t" style="font-size: 20px ; font-weight: 500;  font-family: 'Sharp Grotesk';">
                            Cuenca | Ecuador</p>
                        <div class="row">
                            <div class="col-6">
                                <p><strong style="font-size: 16px; text-transform: uppercase; font-weight: 500;">Lunes
                                        a Viernes</strong>
                                </p>
                                <p style="font-weight: 100;">9:00am – 18:00pm</p>
                            </div>
                            <div class="col-6">
                                <p><strong
                                        style="font-size: 16px; text-transform: uppercase; font-weight: 500;">Sábados</strong>
                                </p>
                                <p style="font-weight: 100;">9:00am - 13:00pm</p>
                            </div>
                        </div>

                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-map-marker-alt" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff; text-align: justify;"><span
                                        class="desing-t">Oficina:</span><span class="desing-p"> <a target="_blank"
                                            style="color: #ffffff" href="https://maps.app.goo.gl/SUhpWErgoscZV5kd8">
                                            Av. Juan Iñiguez 3-87 y D. Gonzalo
                                            Cordero-Edificio Santa Lucía</a></span></div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-envelope" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff;"><span class="desing-p"><a
                                            href="mailto:info@grupohousing.com"
                                            style="color: #ffffff">info@grupohousing.com</a></span></div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-3">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-phone" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff;"><span class="desing-t">Venta:</span><span
                                        class="desing-p"> <a href="tel:+593983849073" class="asindeco"
                                            style="color: #ffffff !important">
                                            098 384 9073</a></span></div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff;"><span class="desing-t">Renta:</span><span
                                        class="desing-p"> <a href="tel:+593987474637" class="asindeco"
                                            style="color: #ffffff !important">
                                            098 747 4637</a></span></div>
                            </div>
                        </div>
                    </div>


                    <!-- New York, USA -->
                    <div class="col-md-4 column-padding mt-5" style="border-right: 1px solid #ffffff;">
                        <p class="desing-t" style="font-size: 20px">New York | Estados Unidos</p>
                        <div class="row">
                            <div class="col-6">
                                <p><strong style="font-size: 16px; text-transform: uppercase; font-weight: 500;">Lunes
                                        a Viernes</strong></p>
                                <p style="font-weight: 100;">9:00am – 18:00pm</p>
                            </div>
                            <div class="col-6">
                                <p><strong
                                        style="font-size: 16px; text-transform: uppercase; font-weight: 500;">Sábados</strong>
                                </p>
                                <p style="font-weight: 100;">9:00am - 13:00pm</p>
                            </div>
                        </div>
                        <!-- Icon Rows -->
                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-map-marker-alt" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff;"><span class="desing-p"><a target="_blank"
                                            style="color: #ffffff" href="https://g.page/r/Cdf-npU-D1gdEAE">67-03
                                            Roosevelt Avenue Woodside, NY 11377
                                        </a></span></div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-phone" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff;"><span class="desing-p"> <a href="tel:+17186903740"
                                            class="asindeco" style="color: #ffffff !important">
                                            718 690 3740</a></span></div>
                            </div>
                        </div>
                    </div>

                    <!-- New Jersey, USA -->
                    <div class="col-md-4 column-padding mt-5">
                        <p class="desing-t" style="font-size: 20px">New Jersey | Estados Unidos</p>
                        <div class="row">
                            <div class="col-6">
                                <p><strong style="font-size: 16px; text-transform: uppercase; font-weight: 500;">Lunes
                                        a Viernes</strong></p>
                                <p style="font-weight: 100;">9:00am – 18:00pm</p>
                            </div>
                            <div class="col-6">
                                <p><strong
                                        style="font-size: 16px; text-transform: uppercase; font-weight: 500;">Sábados</strong>
                                </p>
                                <p style="font-weight: 100;">9:00am - 13:00pm</p>
                            </div>
                        </div>
                        <!-- Icon Rows -->
                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-map-marker-alt" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">

                                <div style="color: #ffffff;"><span class="desing-p"><a target="_blank"
                                            style="color: #ffffff"
                                            href="https://maps.app.goo.gl/854Wc86FooRbCJZe7">1146 East Jersey St
                                            Elizabeth, NJ 07201
                                        </a></span></div>
                            </div>
                        </div>
                        <div class="row align-items-center mt-2">
                            <div class="col-2 text-center">
                                <span
                                    style="color: #182741; background-color: #ffffff; border-radius: 50%; width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-phone" style="font-size: 18px;"></i>
                                </span>
                            </div>
                            <div class="col-10">
                                <div style="color: #ffffff;"><span class="desing-p"> <a href="tel:+19083810090"
                                            class="asindeco" style="color: #ffffff !important">
                                            908 381 0090</a></span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center mt-4">
                        <a href="https://www.facebook.com/profile.php?id=61555792821989" target="_blank">
                            <span
                                style="color: #182741; background-color: #ffffff; width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px;">
                                <i class="fab fa-facebook-f" style="font-size: 24px;"></i>
                            </span>
                        </a>
                        <a href="https://www.instagram.com/grupo_housing" target="_blank">
                            <span
                                style="color: #182741; background-color: #ffffff; width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px;">
                                <i class="fab fa-instagram" style="font-size: 24px;"></i>
                            </span>
                        </a>
                        <!--<a href="https://www.youtube.com/" target="_blank">
                            <span style="color: #182741; background-color: #ffffff; width: 50px; height: 50px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px;">
                                <i class="fab fa-youtube" style="font-size: 24px;"></i>
                            </span>-->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: #182741" class="text-center py-3 text-white">
            Copyright © 2024. All rights reserved.
            <br><a href="{{ route('web.politicas') }}" style="color: #ffffff; font-weight: 500"> Políticas de
                Privacidad</a> <span style="color: #ffffff">-</span> <a style="color: #ffffff"
                href="{{ route('web.seo') }}">SEO</a>
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

    <div class="whatsapp-group">
        <a href="#" class="whatsapp-float" onclick="toggleWhatsAppMenu(event); return false;">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="whatsapp-options">
            <a href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en una propiedad en venta"
                target="_blank" class="whatsapp-link">Venta</a>
            <a href="https://api.whatsapp.com/send?phone=593987474637&text=Hola, estoy interesado en rentar una propiedad"
                target="_blank" class="whatsapp-link">Renta</a>
        </div>
    </div>

    <div class="telf d-flex">
        <div id="call-usa-ecu" class="bg-danger text-light d-flex" style="margin-right: -105px">
            <div onclick="openDivCallUsaEcu()" style="cursor: pointer; ">
                <i class="fas fa-phone-alt fa-2x bg-danger p-2 text-light"></i>
            </div>
            <div id="diviconsusaecu" style="margin-left: 15px;">
                <a href="tel:+593983849073">
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

        // Otros scripts...
    </script>
    {{-- @livewireScripts --}}
    <script>
        let loaded = false;


        window.addEventListener('load', () => {
            //loadscript();

        })

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
    </script>
    <script>
        function toggleWhatsAppMenu(event) {
            event.stopPropagation(); // Evitar que el clic se propague a document
            var options = document.querySelector('.whatsapp-options');
            var button = document.querySelector('.whatsapp-float');

            if (options.style.display === 'flex') {
                options.style.display = 'none';
                button.classList.remove('whatsapp-float-active');
            } else {
                options.style.display = 'flex';
                button.classList.add('whatsapp-float-active');
            }
        }

        // Evento para cerrar el menú si se hace clic fuera de él
        document.addEventListener('click', function(event) {
            var options = document.querySelector('.whatsapp-options');
            var button = document.querySelector('.whatsapp-float');
            if (event.target.closest('.whatsapp-group') === null) {
                options.style.display = 'none';
                button.classList.remove('whatsapp-float-active');
            }
        });
    </script>
</body>

</html>