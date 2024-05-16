@extends('layouts.web2')
@section('header')
    <title>Grupo Housing - Propiedades en Venta en Ecuador</title>
    <meta name="description" content="Contamos con un amplio directorio de propiedades dentro del territorio ecuatoriano. Casas, Departamentos, Terrenos en Venta @isset($searchtxt) en {{ $searchtxt }}. @else ¡Visítenos! @endif ✅"/>
    <meta name="keywords" content="inmobiliaria en cuenca, inmobiliarias en cuenca, inmobiliarias cuenca, inmobiliaria en cuenca ecuador, inmobiliarias en cuenca ecuador, grupo housing, grupo housing inmobiliaria">

    <meta property="og:url"                content="{{ route('web.index') }}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Propiedades en Venta en Ecuador - Grupo Housing" />
    <meta property="og:description"        content="Contamos con un amplio directorio de propiedades dentro del territorio ecuatoriano. Casas, Departamentos, Terrenos en Venta @isset($searchtxt) en {{ $searchtxt }}. @else ¡Visítenos! @endif ✅" />
    <meta property="og:image"              content="{{ asset('img/meta-image-social-cc.jpg') }}" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/font-style.css') }}">

    <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

    
    <style>
      @media screen and (max-width: 850px){
        #txtserviciosinmo{font-size: 18px !important;}
        .video-services{width: 90vw; height: auto !important; margin-bottom: 10% !important}
        .section-testimonials{padding-left: 0px !important; padding-right: 0px !important}
        .testimonials-header{margin-left: 0px !important; padding-top: 0px !important; padding-right: 0px !important;}
        .testimonials-card{margin-left: 0px !important; margin-top: 0px !important; width: 100% !important; height: auto !important; padding-top: 20% !important; padding-bottom: 10% !important}
        .pattern-testimonials-card{height: auto !important;}
        .filters-block{display: block !important}.filters-block select{width: 100% !important}.filters-block div{width: 100% !important}

      }
      @media screen and (max-width: 1040px){
        #form-inputs{
          padding-left: 0px !important;
          padding-right: 0px !important;
        }
      }
      #form-inputs{
        padding-left: 10%;
        padding-right: 10%;
      }
      .hover-image:hover{-webkit-transform: scale(1.1); transform: scale(1.1);-webkit-transition: 1s;}
      .img-container {position: relative;}
      .image {opacity: 1;display: block;transition: .5s ease;backface-visibility: hidden;}
      .middle {transition: .5s ease;opacity: 0;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);-ms-transform: translate(-50%, -50%);text-align: center;}
      .img-container:hover .image {opacity: 0.3;}
      .img-container:hover .middle {opacity: 1;}
      .text {background-color: #04AA6D;color: white;font-size: 16px;padding: 16px 32px;}
      #ftop_txt::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        font-size: 14px; 
        opacity: 0.5; /* Firefox */
      }
      #ftop_txt:focus {
        border:1px solid rgb(255, 255, 255);
        box-shadow: 0 0 5px #ffffff;
      }
      .a-btn-services {
        text-decoration: none;
        color: #000000 !important;
      }

      .cta {
        position: relative;
        margin: auto;
        padding: 20px 20px;
        transition: all 0.2s ease;
      }
      .cta:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        border-radius: 28px;
        background: rgba(255, 38, 0, 0.5);
        width: 56px;
        height: 56px;
        transition: all 0.3s ease;
      }
      .cta span {
        position: relative;
        font-size: 15px;
        line-height: 18px;
        font-weight: 900;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        vertical-align: middle;
      }
      .cta svg {
        position: relative;
        top: 0;
        margin-left: 10px;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke: #111;
        stroke-width: 2;
        transform: translateX(-5px);
        transition: all 0.3s ease;
      }
      .cta:hover:before {
        width: 100%;
        background: #ff2600;
      }
      .cta:hover svg {
        transform: translateX(0);
      }
      .cta:active {
        transform: scale(0.96);
      }
      #imglisting1 > img:hover, #imglisting2 > img:hover, #imglisting3 > img:hover{
        filter: brightness(70%) !important;
      }
      @keyframes fade-in-move-left {
      0% {
        opacity: 0;
        transform: translateY(-3rem);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .card:hover{
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    .card:hover > .card-body-listings{
      background-color: #182741;
    }
    .card:hover > .card-body-listings > h2, .card:hover > .card-body-listings > div > p {
      color: #ffffff;
    }
    .card-body-listings > h2, .card-body-listings > div > p{
      color: #182741;
    }
    #secondsection{
      filter: brightness(60%);
    }
    .carousel-item{position:relative;display:none;float:left;width:100%;margin-right:-100%;-webkit-backface-visibility:hidden;backface-visibility:hidden;transition:transform .6s ease-in-out}@media(prefers-reduced-motion:reduce){.carousel-item{transition:none}}.carousel-item-next,.carousel-item-prev,.carousel-item.active{display:block}/!rtl:begin:ignore/.active.carousel-item-end,.carousel-item-next:not(.carousel-item-start){transform:translateX(100%)}.active.carousel-item-start,.carousel-item-prev:not(.carousel-item-end){transform:translateX(-100%)}/!rtl:end:ignore/.carousel-fade .carousel-item{opacity:0;transition-property:opacity;transform:none}.carousel-fade .carousel-item-next.carousel-item-start,.carousel-fade .carousel-item-prev.carousel-item-end,.carousel-fade .carousel-item.active{z-index:1;opacity:1}.carousel-fade .active.carousel-item-end,.carousel-fade .active.carousel-item-start{z-index:0;opacity:0;transition:opacity 0s .6s}@media(prefers-reduced-motion:reduce){.carousel-fade .active.carousel-item-end,.carousel-fade .active.carousel-item-start{transition:none}}
    @media screen and (max-width: 1100px){
      
    }
    @media screen and (max-width: 850px){
      #searchmobile{
        /* padding-top: 26% !important; */
      }
      #txtcasas{
        /* display: none !important; */
      }
      .carousel-inner .row{
        min-height: 600px !important;
      }
      .carousel-inner .row .col-12{
        width: 425px !important;
      }
      .cards-services{
        justify-content: center !important;
      }
      .card-max-width-mobile{
        width: 100% !important;
      }
    }
    #search_lay{
      overflow: auto;
      margin: 0 auto;
      top: 0;
      left: 0;
      bottom: 0px;
      right: 0;
    }
    .lazyLoad {
        width: 100%;
        opacity: 0;
    }

    .visible {
        transition: opacity 1000ms ease;
        opacity: 1;
    }
    /* #ftop_ptype{
      max-width: 170px !important;
    } */
    .carousel-item.active{z-index: 0 !important;opacity: 1 !important}
    ::placeholder {color: #b9babb !important;font-size: 14px}
    .shadow{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;}
    .buttons-services{bottom: 0px !important; background-color: #FEBB19; color: #ffffff;cursor: pointer; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;}
    .buttons-services-mobile{bottom: 0px !important; background-color: #DC3545; color: #ffffff;cursor: pointer; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;}
    .shadow:hover{box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px !important;}
    .cursor{cursor: pointer !important;}
    .card:hover .card-body{
      background-color: #182741;
      color: #ffffff;
      border-radius: 0px 0px 20px 20px;
    }
    .card:hover .card-body img{
      filter: invert(100%)
    }
  </style>



    <style>
      .section-header {
          position: relative;
          height: 700px;
      }

      .video-header {
          width: 100%;
          height: 650px;
          object-fit: cover;
      }

      .overlay-content {
          position: absolute;
          top: 30%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align: center;
          z-index: 3;
      }

      #parentBuscador {
          position: absolute;
          top: 80%;
          left: 50%;
          transform: translate(-50%, -50%);
          z-index: 2; /* Para asegurarse de que está sobre el video */
      }

      #parentBuscador .col-12 {
          max-width: 800px; /* Aumentar el tamaño del contenedor */
          padding: 30px; /* Aumentar el padding */
          background: #182741;
      }
      #parentBuscador .form-select {
          width: auto; /* Ajustar el ancho en dispositivos de escritorio */
      }
      @media (min-width: 768px) {
        #parentBuscador .form-select {
            width: 100%; /* Ajustar el ancho a 25% en dispositivos de escritorio */
        }

        #parentBuscador .filters-block {
            width: 75%; /* Ajustar el ancho del contenedor de filtros a 75% en dispositivos de escritorio */
        }
    }
      @media (max-width: 768px) {
        .video-header {
            max-width: 100%; /* Reducir el ancho del video al 80% del contenedor en pantallas pequeñas */
            height: 500px; /* Ajustar la altura automáticamente */
            margin: 0 auto; /* Centrar el video horizontalmente */
        }

        #parentBuscador .form-select {
            width: 100%; /* Asegurarse de que ocupen todo el ancho en móviles */
            border-radius: 5px 5px 0 0; /* Cambiar el borde redondeado para móviles */
        }

        #parentBuscador .filters-block {
            width: 100%;
        }

        #parentBuscador .rounded-btn-search-mobile {
            border-radius: 0 0 5px 5px; /* Cambiar el borde redondeado para móviles */
        }
        
        .btn-group {
            flex-direction: row; /* Para mantener los botones en una sola fila en móviles */
        }

        .btn-group .btn-check {
            display: none; /* Ocultar el input de radio */
        }

        .btn-group .btn {
            margin: 0 5px; /* Agregar margen entre botones */
            flex: 1 1 auto; /* Asegurarse de que los botones ocupen el mismo espacio */
        }
    }

      .btn-check:active+.btn-outline-light, .btn-check:checked+.btn-outline-light, .btn-outline-light.active, .btn-outline-light.dropdown-toggle.show, .btn-outline-light:active {
          color: #0f1929;
          font-family: 'Sharp grotesk';
          font-weight: 500;
      }
      .btn-outline-light {
          color: #f8f9fa;
          border-color: #f8f9fa;
          font-family: 'Sharp grotesk';
          font-weight: 100;
      }
  </style>  
   
@endsection

@section('content')
@php
$listing = \App\Models\Listing::where('product_code', 1503)->first();
$image = explode("|", $listing->images);

$bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
$bathroom=0;
   
 if(!empty($listing->heading_details)){
   $allheadingdeatils=json_decode($listing->heading_details); 
   foreach($allheadingdeatils as $singleedetails){ 
     unset($singleedetails[0]);				
     for($i=1;$i<=count($singleedetails);$i++){ 
       if($i%2==0){  
         if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49) $bedroom+=$singleedetails[$i];
         if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81 || $singleedetails[$i-1]==49) $bathroom+=$singleedetails[$i];									  
       }								   
     }								
   $i++;
   }
 }
@endphp

<section class="section-header">
  <div class="position-relative">
      <video class="video-header"  src="{{ asset('img/banner-video-hd.mp4') }}" alt="Construir" autoplay muted loop></video>
      <div class="overlay-content text-center text-white" style="margin-top: 250px;">
          <a href="{{ route('web.servicios', 'construye') }}" class="btn btn-outline-light px-3">Leer más</a>
      </div>
  </div>
  @include('layouts.homesearch')
</section>







  <section class="container" style="margin-top: 120px;" data-aos="zoom-in">
      <section class="d-flex justify-content-center mt-5">
        <a href="/propiedades-en-general" class="btn" style="background-color: #182741; color: #ffffff">Ver todas las propiedades</a>
      </section>
  </section>


    <section class="container mt-5 pb-5" data-aos="zoom-in">
      <h2 id="txtserviciosinmo" style="font-size: 30px; color: #182741; font-family: 'Sharp Grotesk'" class="text-center mt-3 @if ($ismobile) mb-3 @else mb-5 @endif"> <span style="font-weight: 100">SERVICIOS</span> <span style="font-weight: 700;">INMOBILIARIOS</span></h2>
      <p class="text-center" style="color: #182741">Descubre nuestro excepcional servicio, donde la atención personalizada y la experiencia se unen para satisfacer todas tus necesidades ya sea que estés buscando comprar, vender o alquilar una propiedad.</p>
      
      <section class="row pt-5">
        <div class="col-sm-1"></div>
        <article class="col-sm-6">
          <video class="border video-services" width="650" height="500" autoplay muted>
            <source src="{{ asset('img/video-familia.mp4') }}" type="video/mp4">
          </video>
        </article>
        <article class="col-sm-4">

          <article data-aos="fade-up" class="row mb-3">
            <section class="d-flex justify-content-center">
              <div class="border py-4" style="border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 300px">
                <section class="d-flex justify-content-center">
                  <p class="h5 mr-2" style="font-family: 'Sharp Grotesk'"> <span style="font-weight: 100">TENEMOS LA</span> <br> <span class="h3" style="font-weight: 500">CASA IDEAL</span></p>
                  <img width="50px" height="50px" class="ml-2" src="{{ asset('img/comprar.png') }}" alt="Casas de Venta en Cuenca">
                </section>
                <section class="d-flex justify-content-end mt-2 pr-5">
                  <a href="/casas-en-venta-en-cuenca" class="btn btn-sm text-white px-4" style="background-color: #182741; border-radius: 10px">Comprar</a>
                </section>
              </div>
            </section>
          </article>

          <article data-aos="fade-up" class="row mb-3">
            <section class="d-flex justify-content-center">
              <div class="border py-4" style="border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 300px">
                <section class="d-flex justify-content-center">
                  <p class="h5 mr-2"> <span style="font-weight: 100">VENDA SU</span> <br> <span class="h3" style="font-weight: 500">PROPIEDAD</span></p>
                  <img width="50px" height="50px" class="ml-2" src="{{ asset('img/comprar.png') }}" alt="Casas de Venta en Cuenca">
                </section>
                <section class="d-flex justify-content-end mt-2 pr-5">
                  <button class="btn btn-sm text-white px-4" style="background-color: #182741; border-radius: 10px" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Vender</button>
                </section>
              </div>
            </section>
          </article>

          <article data-aos="fade-up" class="row mb-3">
            <section class="d-flex justify-content-center">
              <div class="border py-4" style="border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 300px">
                <section class="d-flex justify-content-center">
                  <p class="h5 mr-2"> <span style="font-weight: 100">ALQUILE CON</span> <br> <span class="h3" style="font-weight: 500">NOSOTROS</span></p>
                  <img width="50px" height="50px" class="ml-2" src="{{ asset('img/comprar.png') }}" alt="Casas de Venta en Cuenca">
                </section>
                <section class="d-flex justify-content-end mt-2 pr-5">
                  <button data-bs-toggle="modal" data-bs-target="#modalAlquiler" class="btn btn-sm text-white px-4" style="background-color: #182741; border-radius: 10px">Alquilar</button>
                </section>
              </div>
            </section>
          </article>

        </article>
        <div class="col-sm-1"></div>
      </section>
      
      <section class="row mr-2 ml-2 pb-5">
      </section>
  </section>

  <section class="container py-5" style="padding-top: 7%">
    <section class="row">
      <section class="col-sm-1"></section>
      <section class="col-sm-5 pr-5">
        <h2 style="font-family: 'Sharp Grotesk'; font-weight: 500">Contáctanos</h2>
        <p class="mt-3">Confía en nosotros para hacer realidad tus sueños inmobiliarios</p>
        <p style="font-weight: 500">Proporciónanos tus datos y te contactaremos</p>
        <form action="{{ route('send.lead.form.home') }}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <input type="text" class="form-control border-0" name="names" placeholder="Nombre y Apellido*" style="background-color: #EEEEF0" required>
          </div>
          <div class="form-group mb-3">
            <input type="number" class="form-control border-0" name="phone" placeholder="Teléfono*"  style="background-color: #EEEEF0" required>
          </div>
          <div class="form-group mb-4">
            <textarea id="message" rows="3" class="form-control border-0" name="message" placeholder="Mensaje"  style="background-color: #EEEEF0" required></textarea>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn rounded-pill px-4" style="background-color: #182741; color: #ffffff; font-family: 'Sharp Grotesk'; font-weight: 200">ENVIAR</button>
          </div>
        </form>
      </section>
      <section class="col-sm-5">
        <div style="height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/departamento.webp') }}')"></div>
      </section>
      <section class="col-sm-1"></section>
    </section>
  </section>



    <section data-aos="flip-down" class="row py-5" style="background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/housing-word.png') }}')">
        <div class="col-sm-12 text-center text-white mt-4 mb-4">
            <p class="h3" style="font-family: 'Sharp Grotesk'"><span style="font-weight: 300">¿QUIERES VENDER O RENTAR </span> <span style="font-weight: 500">UNA PROPIEDAD?</span></p>
            <p class="text-center" style="font-family: 'Sharp Grotesk'"><span style="font-weight: 300">Nuestro equipo experto esta aquí</span> <span style="font-weight: 500"> para guiarte en cada paso del proceso</span> </p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn px-4" style="border-radius: 10px; background-color: #8C98B4; color: #ffffff">Leer más</button>
        </div>
    </section>

    <section class="container px-5 section-testimonials" style="padding-top: 7%; padding-bottom: 7%">
      <section class="row">
        <section class="col-sm-6 d-flex justify-content-end">
          <article style="width: 500px; height: 500px; background-position: center center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/oficinasnuevas.jpg') }}')"></article>
        </section>
        <section class="col-sm-6">
          <div style="height: 300px" class="d-flex justify-content-center align-items-center">
            <article class="pr-5 pt-5 testimonials-header" style="margin-left: -80px">
              <h2 class="text-center" style="font-family: 'Sharp Grotesk'">TESTIMONIOS</h2>
              <p class="text-center" style="font-family: 'Sharp Grotesk'">Descubre lo que dicen nuestros clientes <br> satisfechos</p>
            </article>
          </div>
          <div class="pattern-testimonials-card" style="height: 200px;">
            <div class="border p-4 bg-white rounded testimonials-card" style="width: 600px; height: 250px; margin-left: -100px; margin-top: 30px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
              <div class="d-flex">
                <img width="50px" height="50px" style="filter: invert(80%)" src="{{ asset('img/comillas.png') }}" alt="">
                <div style="height: 250px;" class="d-flex rounded align-items-center">
                  <div class="px-4 pb-5 pt-4">
                    <p style="font-family: 'Sharp Grotesk'">El equipo ofrece un servicio confiable y transparente. Su compromiso es encontrar la mejor opción para cada cliente, brindando asesoramiento personalizado en todo momento. ¡Una excelente elección para comprar, vender o alquilar tu propiedad!</p>
                    <div class="d-flex justify-content-between">
                      <p style="font-weight: 500; font-family: 'Sharp Grotesk'">Sebastian Velez</p>
                      <p>@for ($i = 0; $i < 5; $i++)<i class="fas fa-star text-warning"></i>@endfor</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>

    {{-- DIV MODAL PARA FORMULARIO DE CONTACTO --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <form action="{{ route('web.lead.contact') }}" method="POST">
          @csrf
        <div class="modal-content">
          <div class="modal-header" style="background-color: #8b0000; color: #ffffff">
            <p class="modal-title h6" id="exampleModalLabel">Complete el formulario y nos contactaremos con usted</p>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
          </div>
          <div class="modal-body">
              @csrf
              <div class="form-group mb-2">
                <input type="hidden" name="interest" value="Venta o Renta de Propiedad">
                <label for="nombre" class="mb-2 text-muted">Nombre y Apellido</label>
                <input style="border-radius: 10px 10px 10px 10px" type="text" name="nombre" id="nombre" class="form-control" required>
              </div>
              <div class="form-group mb-2">
                <label for="telefono" class="mb-2 text-muted">Teléfono</label>
                <input style="border-radius: 10px 10px 10px 10px" type="number" name="telefono" id="telefono" class="form-control" required>
              </div>
              <div class="form-group mb-2">
                <label for="email" class="mb-2 text-muted">Correo electrónico</label>
                <input style="border-radius: 10px 10px 10px 10px" type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group mb-1">
                <label for="mensaje" class="mb-2 text-muted">Comentario</label>
                <textarea style="border-radius: 10px 10px 10px 10px" name="mensaje" id="mensaje" rows="3" class="form-control" placeholder="ej: Me interesa vender y/o rentar una propiedad ubicada en..." required></textarea>
              </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn" style="background-color: #8b0000; color: #ffffff">Enviar</button>
          </div>
        </div>
        </form>
      </div>
    </div>

    @php
      $provinces = DB::table('info_states')->where('country_id', 63)->get();
    @endphp

    {{-- modal para solicitar servicio vender --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #182741; color: #ffffff">
            <p class="modal-title h5" id="exampleModalLongTitle">Venda su propiedad con nosotros</p>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="demo-form" action="{{ route('web.lead.contact') }}" method="POST">
            @csrf
          <div class="modal-body">
            <label class="text-muted font-weight-bolder">Por favor, complete el siguiente formulario y un asesor inmobiliario se contactará lo antes posible</label>
            <input type="hidden" name="interest" value="Vender una propiedad">
            <div class="row">
              <div class="col-sm-6 col-6">
                <div class="form-group mt-2">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" id="name" class="form-control" required>
                </div>
              </div>
              <div class="col-sm-6 col-6">
                <div class="form-group mt-2">
                  <label for="name">Apellido</label>
                  <input type="text" name="lastname" id="lastname" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="phone">Teléfono</label>
              <input type="number" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group mt-2">
              <label for="email">Correo electrónico</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mt-3">
              <label for="tipopropiedad" class="font-weight-bolder">¿Qué tipo de propiedad necesita vender?</label>
              @php
                $types = DB::table('listing_types')->get();
              @endphp
              <select class="form-select mt-1" name="tipopropiedad">
                <option value="">Seleccione</option>
                @foreach ($types as $type)
                  <option value="{{ $type->type_title }}">{{ $type->type_title }}</option>
                @endforeach
              </select>
            </div>
            <div class="mt-3">
              <label class="text-gray font-weight-bolder">¿En donde se encuentra ubicada su propiedad?</label>
              <div class="form-group d-flex">
                <div class="mr-1" style="width: 100%">
                  {{-- <label for="province">Provincia</label> --}}
                  <select name="province" class="form-select mt-1" id="selProvincea">
                    <option value="">Provincia</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div style="width: 100%">
                  {{-- <label for="city">Ciudad</label> --}}
                  <select class="form-select mt-1" name="city" id="selCitya">
                    <option value="">Ciudad</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button class="btn" type="submit" style="background: #182741; color: #ffffff">Enviar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    {{-- termina modal --}}

    {{-- modal para servicio alquiler --}}
    <div class="modal fade" id="modalAlquiler" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #182741; color: #ffffff">
            <p class="modal-title h5" id="exampleModalLongTitle">Alquilar una propiedad</p>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div>
            <div class="d-flex mt-2 mr-3 ml-3">
              <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
              <label class="btn btn-outline-secondary btn-block" for="success-outlined" style="border-radius: 0px" onclick="showbuscar(this);">Buscar un alquiler</label>
              <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
              <label class="btn btn-outline-secondary btn-block" for="danger-outlined" style="border-radius: 0px" onclick="showalquilar(this);">Poner en alquiler</label>
            </div>
          </div>
          <div id="body1">
            <form action="{{ route('web.lead.contact') }}" method="POST">
              @csrf
            <div class="modal-body">
              <input type="hidden" name="interest" id="interest" value="Busca Alquiler">
              <div class="form-group">
                <label for="">Nombre y Apellido</label>
                <input type="text" id="nameb1" name="name" class="form-control" required>
              </div>
              <div class="form-group mt-2">
                <label for="">Teléfono</label>
                <input type="number" id="phoneb1" name="phone" class="form-control" required>
              </div>
              <div class="form-group mt-2">
                  <label for="state">Provincia</label>
                  <select class="form-select" name="state" id="selProvinceb" required>
                    <option value="">Seleccione</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group mt-2">
                  <label for="city">Ciudad</label>
                  <select class="form-select" name="city" id="selCityb" required>
                    <option value="">Seleccione</option>
                  </select>
              </div>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn" style="background-color: #182741; color: #ffffff">Ver opciones</button>
            </div>
            </form>
          </div>
          <div id="body2" style="display: none">
            <form action="{{ route('web.lead.contact') }}" method="POST">
              @csrf
            <div class="modal-body">
              <input type="hidden" name="interest" value="Poner en Alquiler">
              <div class="form-group">
                <label for="">Nombre y Apellido</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="form-group mt-2">
                <label for="">Teléfono</label>
                <input type="number" class="form-control" name="phone" required>
              </div>
              <div class="form-group mt-2">
                <label for="">Tipo de propiedad</label>
                <select class="form-select" name="type" id="">
                  <option value="">Seleccione</option>
                  @foreach ($types as $type)
                      <option value="{{ $type->type_title }}">{{ $type->type_title }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group mt-2 d-flex">
                <div class="mr-1" style="width: 100%">
                  <label for="province">Provincia</label>
                  <select name="province" class="form-select" id="selProvincec">
                    <option value="">Seleccione</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div style="width: 100%">
                  <label for="city">Ciudad</label>
                  <select class="form-select" name="city" id="selCityc">
                    <option value="">Seleccione</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="submit" class="btn btn-primary" style="background-color: #182741; color: #ffffff">Enviar</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    @if (session('emailsend'))
      @php
        echo "
          <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
          <script>
            swal('Hemos enviado su información', 'Nos pondremos en contacto lo antes posible!', 'success');
          </script>
        ";    
      @endphp
    @endif
@endsection

@section('script')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
                                                                        @stack('scripts')
                                                                        <script>
                                                                            AOS.init();
                                                                        </script>

                                                                        

                                                                        <script>
                                                                            window.addEventListener('load', (event) => {
                                                                                //document.getElementById('secondsection').style.backgroundImage = "url('img/imgbannermiddle.webp')";
                                                                            });

                                                                            let inpSearchTxt = document.getElementById('ftop_txt');
                                                                            if (inpSearchTxt) {
                                                                                inpSearchTxt.addEventListener("keypress", function(event) {
                                                                                    if (event.keyCode == 13) {
                                                                                        search();
                                                                                    }
                                                                                })
                                                                            }

                                                                            function onSubmit(token) {
                                                                                document.getElementById("demo-form").submit();
                                                                            }

                                                                            function limpiarCampos() {
                                                                                document.getElementById('searchtxt').value = "";
                                                                                document.getElementById('order').value = "";
                                                                                document.getElementById('tipobusqueda').value = "";
                                                                                document.getElementById('tipopropiedad').value = "";
                                                                                document.getElementById('preciodesde').value = "";
                                                                                document.getElementById('preciohasta').value = "";
                                                                                document.getElementById('superfdesde').value = "";
                                                                                document.getElementById('superfhasta').value = "";
                                                                            }

                                                                            // const selProvince = document.getElementById('selProvince');
                                                                            // const selCity = document.getElementById('selCity');

                                                                            const selProvincea = document.getElementById('selProvincea');
                                                                            const selCitya = document.getElementById('selCitya');

                                                                            const selProvinceb = document.getElementById('selProvinceb');
                                                                            const selCityb = document.getElementById('selCityb');

                                                                            const selProvincec = document.getElementById('selProvincec');
                                                                            const selCityc = document.getElementById('selCityc');

                                                                            //   selProvince.addEventListener("change", async function() {
                                                                            //     selCity.options.length = 0;
                                                                            //   let id = selProvince.options[selProvince.selectedIndex].dataset.id;
                                                                            //   const response = await fetch("{{ url('getcities') }}/"+id );
                                                                            //   const cities = await response.json();

                                                                            //   var opt = document.createElement('option');
                                                                            //         opt.appendChild( document.createTextNode('Elige Ciudad') );
                                                                            //         opt.value = '';
                                                                            //         selCity.appendChild(opt);
                                                                            //   cities.forEach(city => {
                                                                            //         var opt = document.createElement('option');
                                                                            //         opt.appendChild( document.createTextNode(city.name) );
                                                                            //         opt.value = city.name;
                                                                            //         selCity.appendChild(opt);
                                                                            //   });
                                                                            // });

                                                                            selProvincea.addEventListener("change", async function() {
                                                                                selCitya.options.length = 0;
                                                                                let id = selProvincea.options[selProvincea.selectedIndex].dataset.id;
                                                                                const response = await fetch("{{ url('getcities') }}/" + id);
                                                                                const cities = await response.json();

                                                                                var opt = document.createElement('option');
                                                                                opt.appendChild(document.createTextNode('Ciudad'));
                                                                                opt.value = '';
                                                                                selCitya.appendChild(opt);
                                                                                cities.forEach(city => {
                                                                                    var opt = document.createElement('option');
                                                                                    opt.appendChild(document.createTextNode(city.name));
                                                                                    opt.value = city.name;
                                                                                    selCitya.appendChild(opt);
                                                                                });
                                                                            });

                                                                            selProvinceb.addEventListener("change", async function() {
                                                                                selCityb.options.length = 0;
                                                                                let id = selProvinceb.options[selProvinceb.selectedIndex].dataset.id;
                                                                                const response = await fetch("{{ url('getcities') }}/" + id);
                                                                                const cities = await response.json();

                                                                                var opt = document.createElement('option');
                                                                                opt.appendChild(document.createTextNode('Elige Ciudad'));
                                                                                opt.value = '';
                                                                                selCityb.appendChild(opt);
                                                                                cities.forEach(city => {
                                                                                    var opt = document.createElement('option');
                                                                                    opt.appendChild(document.createTextNode(city.name));
                                                                                    opt.value = city.name;
                                                                                    selCityb.appendChild(opt);
                                                                                });
                                                                            });

                                                                            selProvincec.addEventListener("change", async function() {
                                                                                selCityc.options.length = 0;
                                                                                let id = selProvincec.options[selProvincec.selectedIndex].dataset.id;
                                                                                const response = await fetch("{{ url('getcities') }}/" + id);
                                                                                const cities = await response.json();

                                                                                var opt = document.createElement('option');
                                                                                opt.appendChild(document.createTextNode('Elige Ciudad'));
                                                                                opt.value = '';
                                                                                selCityc.appendChild(opt);
                                                                                cities.forEach(city => {
                                                                                    var opt = document.createElement('option');
                                                                                    opt.appendChild(document.createTextNode(city.name));
                                                                                    opt.value = city.name;
                                                                                    selCityc.appendChild(opt);
                                                                                });
                                                                            });


                                                                            function showbuscar(btn) {
                                                                                document.getElementById('body1').style.display = "block";
                                                                                document.getElementById('body2').style.display = "none";
                                                                            }

                                                                            function showalquilar(btn) {
                                                                                document.getElementById('body1').style.display = "none";
                                                                                document.getElementById('body2').style.display = "block";
                                                                            }

                                                                            function onScrollEvent(entries, observer) {
                                                                                entries.forEach(function(entry) {
                                                                                    if (entry.isIntersecting) {
                                                                                        var attributes = entry.target.attributes;
                                                                                        var src = attributes['data-src'].textContent;
                                                                                        entry.target.src = src;
                                                                                        entry.target.classList.add('visible');
                                                                                    }
                                                                                });
                                                                            }

                                                                            // Utilizamos como objetivos todos los
                                                                            // elementos que tengan la clase lazyLoad,
                                                                            // que vimos en el HTML de ejemplo.
                                                                            var targets = document.querySelectorAll('.lazyLoad');

                                                                            // Instanciamos un nuevo observador.
                                                                            var observer = new IntersectionObserver(onScrollEvent);

                                                                            // Y se lo aplicamos a cada una de las
                                                                            // imágenes.
                                                                            targets.forEach(function(entry) {
                                                                                observer.observe(entry);
                                                                            });
                                                                        </script>
                                                                        <script>
                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                const searchForm = document.getElementById('searchForm');
                                                                                if (searchForm) {
                                                                                    searchForm.addEventListener('submit', function(event) {
                                                                                        event.preventDefault(); // Evitar el envío del formulario.

                                                                                        // Capturar los elementos del formulario y sus valores.
                                                                                        const typeSelect = document.getElementById('ftop_ptype');
                                                                                        const searchInput = document.getElementById('searchtxt');
                                                                                        const check1 = document.getElementById('ftop_category_0');
                                                                                        const check2 = document.getElementById('ftop_category_1');

                                                                                        // Establecer la categoría basada en qué checkbox está seleccionado.
                                                                                        let category = "general"; // Valor por defecto.
                                                                                        if (check1.checked) category = "venta";
                                                                                        if (check2.checked) category = "renta";

                                                                                        // Obtener el nombre del tipo de propiedad seleccionado o usar 'propiedades' como valor por defecto.
                                                                                        let typeName = typeSelect.options[typeSelect.selectedIndex].text.toLowerCase().replace(
                                                                                            /\s+/g, '-');
                                                                                        if (!typeSelect.value || typeName === 'tipo-de-propiedad') {
                                                                                            typeName = 'propiedades';
                                                                                        }

                                                                                        const searchTerm = searchInput.value.trim();
                                                                                        let queryParams = '';
                                                                                        if (searchTerm) {
                                                                                            queryParams = `?searchTerm=${encodeURIComponent(searchTerm)}`;
                                                                                        }

                                                                                        // Construir la URL final y redireccionar.
                                                                                        window.location.href = `/${typeName}-en-${category}${queryParams}`;
                                                                                    });
                                                                                }
                                                                            });
                                                                        </script>
@endsection
