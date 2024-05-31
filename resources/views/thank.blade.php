@extends('layouts.web')

@section('header')
    <title>Gracias por enviar su información | Casa Crédito</title>
    <meta name="description" content="En Casa Crédito contamos con un amplio catálogo de propiedades. Visite nuestro portal web o nuestras redes sociales para más información ✅">
    <meta name="robots" content="noindex">

    <style>
        @media screen and (max-width: 580px){
            .card-info{width: 100% !important}
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script id="script_analytics_nuevo"></script>
    <script>
        setTimeout(() => {
        document.getElementById('script_analytics_nuevo').src="https://www.googletagmanager.com/gtag/js?id=AW-11250334200";
        }, 3000);
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-11250334200');
    </script>

    <!-- Event snippet for Formulario Casa credito conversion page --> 
    <script> gtag('event', 'conversion', {'send_to': 'AW-11250334200/jN3KCPfWtPAYEPjzyfQp'}); </script>
@endsection

@section('content')
<section class="container">
    <section class="d-flex justify-content-center py-5">
        <section class="d-flex align-items-center justify-content-center py-5 bg-white shadow px-5 w-50 card-info">
            <div class="text-center">
                <img src="{{ asset('img/email_726623.png') }}" alt="">
                <p class="font-weight-bold mt-4">GRACIAS POR ENVIAR SU INFORMACIÓN</p>
                <hr>
                <p>La información recopilada a través del formulario de contacto se utilizará exclusivamente con el propósito de responder a la consulta o solicitud del usuario. No compartiremos, venderemos ni divulgaremos esta información a terceros sin el consentimiento explícito del usuario.</p>
            </div>
        </section>
    </section>
    <section>
        <section class="bg-danger text-white d-flex align-items-center justify-content-center pt-4 pb-1 px-4">
            <p style="font-size: large">¿Desea saber más información? Visite nuestras <span class="font-weight-bold">redes sociales</span> o visite nuestro <span class="font-weight-bold">sitio web</span></p>
        </section>
    </section>
    <section class="row py-5">
        <div class="col-sm-12">
            <div class="d-flex justify-content-center align-items-center gap-3">
                <a target="_blank" class="mr-2" href="https://www.facebook.com/profile.php?id=61558563860180">
                    <img src="{{ asset('img/facebook_5968764.png') }}" alt="">
                </a>
                <a target="_blank" class="ml-2 mr-2" href="https://www.instagram.com/grupo_housing/">
                    <img src="{{ asset('img/instagram_3955024.png') }}" alt="">
                </a>
                <a target="_blank" class="ml-2 mr-2" href="https://www.tiktok.com/@grupo.housing?lang=es">
                    <img src="{{ asset('img/tiktok_3116491.png') }}" alt="">
                </a>
                <a target="_blank" class="ml-2" href="https://api.whatsapp.com/send?phone=593983849073&text=Hola,%20deseo%20que%20me%20contacten%20a%20este%20n%C3%BAmero%20de%20tel%C3%A9fono%20y%20me%20ayuden%20con%20m%C3%A1s%20informaci%C3%B3n">
                    <img src="{{ asset('img/whatsapp_733585.png') }}" alt="">
                </a>
            </div>
        </div>
    </section>
    <hr>
    <section class="row py-5 mb-3">
        <div class="col-sm-12 d-flex justify-content-center">
            <a class="btn btn-danger rounded-pill py-2" style="font-size: large" href="{{ route('web.servicios', 'nosotros') }}">Más información sobre Casa Crédito</a>
        </div>
    </section>
</section>
@endsection

@section('script')
    <script>
        // window.addEventListener('load', function(){
        //     document.getElementById('prisection').style.backgroundImage = "url('img/thanks-image.jpg')";
        // });
    </script>
@endsection