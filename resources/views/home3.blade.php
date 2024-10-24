@extends('layouts.web2')
@section('header')
    <title>Grupo Housing - Propiedades en Venta en Ecuador</title>
    <meta name="description" content="Inmobiliaria en Cuenca especializada en la venta de Casas, Departamentos, Terrenos y más propiedades. @isset($searchtxt) en {{ $searchtxt }}. @else ¡Visítanos y conoce todo nuestro catálogo! @endif ✅"/>
    <meta name="keywords" content="inmobiliaria en cuenca, inmobiliarias en cuenca, inmobiliarias cuenca, inmobiliaria en cuenca ecuador, inmobiliarias en cuenca ecuador, grupo housing, grupo housing inmobiliaria">

    <meta property="og:url"                content="{{ route('web.index') }}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Propiedades en Venta en Ecuador - Grupo Housing" />
    <meta property="og:description"        content="Contamos con un amplio directorio de propiedades dentro del territorio ecuatoriano. Casas, Departamentos, Terrenos en Venta @isset($searchtxt) en {{ $searchtxt }}. @else ¡Visítenos! @endif ✅" />
    <meta property="og:image"              content="{{ asset('img/grupo-housing-og.png') }}" />

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
      /* border-radius: 0px 0px 20px 20px; */
    }
    .card:hover .card-body img{
      filter: invert(100%)
    }
  </style>



<style>
.section-header {
    position: relative;
    height: 75vh; /* La sección ocupa el 75% de la altura de la ventana */
    overflow: hidden; /* Esconde cualquier contenido que sobresalga */
}

/* Estilo para el video de fondo */
.video-header {
    width: 100%; /* Ocupa todo el ancho del contenedor */
    height: 75vh; /* Ocupa el 75% de la altura del contenedor */
    object-fit: cover; /* Cubre todo el área del contenedor sin distorsión */
    transform: translate3d(0, 0, 0); /* Mejora el rendimiento de la animación */
}

/* Contenido superpuesto en el video */
.overlay-content {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centra el contenido */
    text-align: center;
    z-index: 3; /* Asegura que el contenido esté encima del video */
}

/* Contenedor para el buscador */
#parentBuscador {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Centra el contenedor */
    z-index: 2; /* Asegura que esté encima del video pero debajo del overlay-content */
    background: rgba(255, 255, 255, 0); /* Fondo transparente */
    padding: 20px;
    border-radius: 15px; /* Bordes redondeados */
}

/* Estilo interno del contenedor del buscador */
#parentBuscador .col-12 {
    max-width: 800px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.2); /* Fondo semitransparente */
    backdrop-filter: blur(10px); /* Difumina el fondo */
    -webkit-backdrop-filter: blur(10px); /* Difumina el fondo en navegadores WebKit */
    border-radius: 15px; /* Bordes redondeados */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

/* Estilo para el título principal */
.heading-title {
    font-size: 32px; /* Tamaño de fuente grande */
}

/* Estilo para el select elegante */
.elegant-select {
    background-color: rgba(255, 255, 255, 0); /* Fondo transparente */
    color: #182741;
    font-size: 14px;
    appearance: none; /* Remueve estilos por defecto */
    position: relative;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Sombra ligera */
}

/* Estilo para las opciones del select */
.elegant-select option {
    background-color: white; /* Fondo blanco */
    color: #182741;
    font-size: 14px;
}

.btn-all {
  padding: 25px;
  font-size: 18px;
  border-radius: 15px;   
}

/* Estilos para pantallas medianas (tablet y superiores) */
@media (min-width: 768px) {
    #parentBuscador .form-select {
        width: 100%; /* Ancho completo */
        height: 100%; /* Alto completo */
    }
    
    #parentBuscador .filters-block {
        width: 75%; /* Ancho de 75% del contenedor padre */
    }
}

/* Estilos para pantallas pequeñas (móviles) */
@media (max-width: 768px) {
    #parentBuscador {
        top: 46%;
        left: 50%;
    }
    .section-header {
        height: 100vh; /* Altura completa de la pantalla */
    }
    
    .video-header {
        height: 100vh; /* Altura completa de la pantalla */
    }
    
    #parentBuscador .form-select {
        width: 100%; /* Ancho completo */
        height: 100%; /* Alto completo */
        border-radius: 5px 5px 0 0; /* Bordes superiores redondeados */
    }
    
    #parentBuscador .filters-block {
        width: 100%; /* Ancho completo */
        flex-direction: column; /* Dirección de los elementos en columna */
    }
    
    #parentBuscador .rounded-btn-search-mobile {
        border-radius: 5px; /* Botón con bordes redondeados */
    }
    
    .btn-group {
        flex-direction: row; /* Dirección de los botones en fila */
    }
    
    .btn-group .btn-check {
        display: none; /* Oculta el botón de chequeo */
    }
    
    .btn-group .btn {
        margin: 0 5px; /* Margen entre botones */
        flex: 1 1 auto; /* Flexibilidad de los botones */
    }
    
    .heading-title {
        font-size: 20px; /* Tamaño de fuente reducido */
    }
    
    .btn-outline-light {
        font-size: 16px; /* Tamaño de fuente reducido */
    }
    
    .form-control {
        font-size: 16px; /* Tamaño de fuente reducido */
    }
    
    .btn {
        font-size: 16px; /* Tamaño de fuente reducido */
    }
    .btn-all {
      padding: 15px;
      font-size: 14px; 
    }
}

/* Estilos para pantallas grandes (desktop y superiores) */
@media (min-width: 1200px) {
    #parentBuscador .col-12 {
        max-width: 1000px; /* Máximo ancho de 1000px */
        padding: 40px; /* Padding aumentado */
    }
    
    #parentBuscador .heading-title {
        font-size: 36px; /* Tamaño de fuente aumentado */
    }
    
    #parentBuscador .form-select,
    #parentBuscador .filters-block input {
        font-family: 'Sharp grotesk'; /* Fuente personalizada */
        font-size: 17px; /* Tamaño de fuente aumentado */
        width: 100%; /* Ancho completo */
        height: 100%; /* Alto completo */
    }
}

/* Estilos para el estado activo de los botones */
.btn-check:active + .btn-outline-light,
.btn-check:checked + .btn-outline-light,
.btn-outline-light.active,
.btn-outline-light.dropdown-toggle.show,
.btn-outline-light:active {
    color: #f8f9fa; /* Color de texto claro */
    font-family: 'Sharp grotesk'; /* Fuente personalizada */
    font-weight: 500; /* Peso de fuente medio */
    background-color: #182741; /* Fondo oscuro */
}

.btn:focus {
  outline: none;
  box-shadow: none;
}

/* Estilos básicos para los botones con borde claro */
.btn-outline-light {
    color: #182741; /* Color de texto oscuro */
    border-color: #f8f9fa; /* Color de borde claro */
    font-family: 'Sharp grotesk'; /* Fuente personalizada */
    font-weight: 100; /* Peso de fuente ligero */
    background-color: #f8f9fa; /* Fondo claro */
}
@keyframes fadeInOut {
    0%, 100% { opacity: 0; }
    50% { opacity: 1; }
}

#animatedText {
    display: inline-block; /* Para evitar que ocupe todo el ancho */
    transition: opacity 1s ease-in-out; /* Suave transición de opacidad */
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
      <video class="video-header" src="{{ asset('img/banner-home-video.mp4') }}" alt="Construir" autoplay muted loop playsinline></video>
      <div class="overlay-content text-center text-white">
          <!-- Otros contenidos si es necesario -->
      </div>
      <div id="parentBuscador" class="w-100">
        <div class="row align-items-center d-flex justify-content-center">
            <div class="col-12 text-white text-center p-5">
                <p id="animatedText" class="heading-title mb-3" style="color:#182741; margin-bottom: 10px; font-family: 'Sharp grotesk'; font-weight: 500;">
                    Explora Nuestras Propiedades
                </p>
                <div class="w-100" id="form-inputs">
                    <form id="searchForm" method="GET">
                        @csrf
                        <div class="btn-group mb-3 w-100 d-flex flex-row flex-wrap justify-content-center">
                            <input type="radio" class="btn-check" name="category" id="ftop_category_0" autocomplete="off" value="en-venta" checked>
                            <label class="btn btn-outline-light mb-2 mb-md-0" for="ftop_category_0" style="width: 120px; font-size: 18px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">COMPRAR</label>
                            <input type="radio" class="btn-check" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
                            <label class="btn btn-outline-light mb-2 mb-md-0" for="ftop_category_1" style="width: 120px; font-size: 18px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">RENTAR</label>
                        </div>
    
                        <div class="mb-3 w-100 d-flex flex-column flex-md-row">
                            <div class="col-md-3 p-0">
                                <select name="ptype" id="ftop_ptype" class="elegant-select form-control form-select rounded-select-search-mobile mb-2 mb-md-0">
                                    <option value="">Propiedades</option>
                                    <option data-ids="[23,1]" value="1">Casas</option>
                                    <option data-ids="[24,3]" value="2">Departamentos</option>
                                    <option data-ids="[25,5]" value="3">Casas Comerciales</option>
                                    <option data-ids="[32,6]" value="4">Locales Comerciales</option>
                                    <option data-ids="[35,7]" value="5">Oficinas</option>
                                    <option data-ids="[36,8]" value="6">Suites</option>
                                    <option data-ids="[29,9]" value="7">Quintas</option>
                                    <option data-ids="[30,30]" value="8">Haciendas</option>
                                    <option data-ids="[26,10]" value="8">Terrenos</option>
                                </select>
                            </div>
                            <div class="col-md-9 p-0 d-flex flex-column flex-md-row filters-block">
                                <input type="text" placeholder="INGRESE / UBICACIÓN / CÓDIGO" id="searchtxt" name="searchtxt" class="form-control rounded-0 rounded-input-search-mobile mb-2 mb-md-0" style="border-radius: 0; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); font-size: 18px;">
                                <button type="submit" class="btn rounded-all font-weight-bold text-white rounded-btn-search-mobile mt-2 mt-md-0" style="background-color: #182741; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); font-size: 18px;">BUSCAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<section class="container mt-5" data-aos="zoom-in">
  <h1 id="txtserviciosinmo" style="font-size: 30px; color: #182741;" class="text-center mt-3 @if ($ismobile) mb-3 @else mb-5 @endif"> <span style="font-weight: 100">INMOBILIARIA EN</span> <span style="font-weight: 700;">CUENCA</span></h1>
  <p class="text-center" style="color: #182741">Descubre nuestro excepcional servicio, donde la atención personalizada y la experiencia se unen para satisfacer todas tus necesidades ya sea que estés buscando comprar, vender o alquilar una propiedad.</p>
  <div class="d-flex justify-content-center mt-4">
    <a href="/servicios/nosotros" class="btn" style="background-color: #182741; color: #ffffff">Conoce más sobre nosotros</a>
  </div>
</section>

<section style="background-color: #182741" class="mt-5">
  <section class="py-5 container">
    <h2 style="color: #ffffff" class="text-center"> <span style="font-weight: 200">PROPIEDADES</span> <span style="font-weight: 600">DEL MES</span></h2>
    <p class="text-center" style="color: #ffffff">Descubra nuestras propiedades destacadas</p>
    <section class="row mt-5">
      @foreach ($properties_of_the_month as $propertie)
        @php
          $imagesPropertie = explode('|', $propertie->images);
        @endphp
        <article class="col-sm-4 rounded-0 mb-3">
          <div class="card h-100 border-0" data-aos="flip-left">
            <div id="carouselExampleControls{{$loop->index}}" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @foreach ($imagesPropertie as $image)
                  <div class="carousel-item @if($loop->index == 0) active @endif">
                    <img @if($loop->index > 0) loading="lazy" @endif src="{{ asset('uploads/listing/thumb/600/'.$image) }}" class="d-block w-100 card-img-top" alt="">
                  </div>
                @endforeach
              </div>
             <button class="carousel-control-prev btn" type="button" data-target="#carouselExampleControls{{ $loop->index }}" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </button>
              <button class="carousel-control-next btn" type="button" data-target="#carouselExampleControls{{$loop->index}}" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </button>
            </div>
            <div class="card-body h-full">
              <p class="text-muted m-0">Ubicación</p>
              <p>{{ $propertie->state . ' | ' ?? '' }} {{ $propertie->city . ' | ' ?? '' }} {{ $propertie->address ?? ''}}</p>
              <h5 class="card-title">{{ $propertie->listing_title }}</h5>
              <div class="row justify-content-center mt-4 h-full align-items-center">
                @if($propertie->bedroom > 0)
                  <div class="col-sm-4 col-4 text-center">
                    <img src="{{ asset('img/bed-black.png') }}" alt="{{ $propertie->listing_title}} de {{$propertie->bedroom}} dormitorios">
                    <p>{{ $propertie->bedroom > 1 ? $propertie->bedroom . ' dormitorios' : $propertie->bedroom . ' dormitorio'}}</p>
                  </div>
                @endif
                @if($propertie->bathroom >0)
                  <div class="col-sm-4 col-4 text-center">
                    <img src="{{ asset('img/bathroom-black.png') }}" alt="{{ $propertie->listing_title}} de {{$propertie->bathroom}} baños">
                    <p>{{ $propertie->bathroom > 1 ? $propertie->bathroom . ' baños' : $propertie->bathroom . ' baño'}}</p>
                  </div>
                @endif
                @if($propertie->garage > 0)
                  <div class="col-sm-4 col-4 text-center">
                    <img src="{{ asset('img/garage-black.png') }}" alt="{{ $propertie->listing_title}} con {{$propertie->garage}} parqueadero">
                    <p>{{ $propertie->garage > 1 ? $propertie->garage . ' garage' : $propertie->garage . ' garage'}}</p>
                  </div>
                @endif
              </div>
              <div class="d-flex justify-content-end align-items-end" style="height: fit-content !important">
                <a href="/propiedad/{{$propertie->slug}}" class="btn btn-outline-light" style="font-weight: 400">Ver propiedad</a>
              </div>
            </div>
           </div>
        </article>
      @endforeach
    </section>

    <section class="d-flex justify-content-center mt-5">
      <a class="btn btn-light btn-lg" href="/propiedades-en-general">Ver todas las propiedades</a>
    </section>
  </section>
</section>

<div class="container mt-5" data-aos="zoom-in">
  
  <div class="row mt-5 justify-content-center">
    <h2 class="text-center" style="color: #182741"><span style="font-weight: 200">NUESTROS</span> <span style="font-weight: 600">SERVICIOS</span></h2>
    <p class="text-center mb-5" style="color: #182741">Conozca todos los servicios que nuestra inmobiliaria ofrece</p>
    <div class="col-md-4">
      <article data-aos="fade-up" class="mb-3">
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
    </div>
    <div class="col-md-4">
      <article data-aos="fade-up" class="mb-3">
        <section class="d-flex justify-content-center">
          <div class="border py-4" style="border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 300px">
            <section class="d-flex justify-content-center">
              <p class="h5 mr-2"> <span style="font-weight: 100">RENTE CON</span> <br> <span class="h3" style="font-weight: 500">NOSOTROS</span></p>
              <img width="50px" height="50px" class="ml-2" src="{{ asset('img/comprar.png') }}" alt="Casas de Venta en Cuenca">
            </section>
            <section class="d-flex justify-content-end mt-2 pr-5">
              <button data-bs-toggle="modal" data-bs-target="#modalAlquiler" class="btn btn-sm text-white px-4" style="background-color: #182741; border-radius: 10px">Alquilar</button>
            </section>
          </div>
        </section>
      </article>
    </div>
    <div class="col-md-4 d-flex justify-content-center">
      <article data-aos="fade-up" class="mb-3">
        <section class="d-flex justify-content-center">
          <div class="border py-4" style="border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width: 300px">
            <section class="d-flex justify-content-center">
              <p class="h5 mr-2"> <span style="font-weight: 100">CONSTRUYE CON</span> <br> <span class="h3" style="font-weight: 500">NOSOTROS</span></p>
              <img width="50px" height="50px" class="ml-2" src="{{ asset('img/comprar.png') }}" alt="Casas de Venta en Cuenca">
            </section>
            <section class="d-flex justify-content-end mt-2 pr-5">
              <a href="{{ route('web.servicios', 'construye') }}" class="btn btn-sm text-white px-4" style="background-color: #182741; border-radius: 10px">Construye</a>
            </section>
          </div>
        </section>
      </article>
    </div>
    <!-- Agrega más columnas según sea necesario -->
  </div>
</div>


<section class="container py-5" style="padding-top: 50%">
  <section class="row justify-content-center">
    <section class="col-12 col-md-5 mb-4 mb-md-0" data-aos="fade-down-right">
      <h2 style="font-family: 'Sharp Grotesk'; font-weight: 500">Contáctanos</h2>
      <p class="mt-3">Confía en nosotros para hacer realidad tus sueños inmobiliarios. <span style="font-weight: 500">Grupo Housing</span> es una Inmobiliaria en Cuenca especializada en la venta de propiedades.</p>
      <p style="font-weight: 500">Proporciónanos tus datos y te contactaremos</p>
      <form action="{{ route('send.lead.form.home') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
          <input type="text" class="form-control border-0" name="names" placeholder="Nombre y Apellido*" style="background-color: #EEEEF0" required>
        </div>
        <div class="form-group mb-3">
          <input type="number" class="form-control border-0" name="phone" placeholder="Teléfono*" style="background-color: #EEEEF0" required>
        </div>
        <div class="form-group mb-4">
          <textarea id="message" rows="3" class="form-control border-0" name="message" placeholder="Mensaje" style="background-color: #EEEEF0" required></textarea>
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn rounded-pill px-4" style="background-color: #182741; color: #ffffff; font-family: 'Sharp Grotesk'; font-weight: 200">ENVIAR</button>
        </div>
      </form>
    </section>
    <section class="col-12 col-md-5" data-aos="fade-down-left">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d418.8387504677744!2d-79.00756951531508!3d-2.905844540079929!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd19a25164240f%3A0x4f30ec335c0d9314!2sGrupo%20Housing!5e0!3m2!1ses!2sec!4v1716215971719!5m2!1ses!2sec" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
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
        <section class="col-sm-6 d-flex justify-content-end" data-aos="fade-down-right">
          <article style="width: 500px; height: 500px; background-position: center center; background-repeat: no-repeat; background-size: cover; background-image: url('{{ asset('img/oficinasnuevas.jpg') }}')"></article>
        </section>
        <section class="col-sm-6">
          <div style="height: 300px" class="d-flex justify-content-center align-items-center" data-aos="fade-down-right">
            <article class="pr-5 pt-5 testimonials-header" style="margin-left: -80px">
              <h2 class="text-center" style="font-family: 'Sharp Grotesk'">TESTIMONIOS</h2>
              <p class="text-center" style="font-family: 'Sharp Grotesk'">Descubre lo que dicen nuestros clientes <br> satisfechos</p>
            </article>
          </div>
          <div class="pattern-testimonials-card" style="height: 200px;" data-aos="fade-up-left">
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
    document.addEventListener('DOMContentLoaded', function() {
        var video = document.querySelector('.video-header');
        if (video) {
            video.play().catch(function(error) {
                console.log('Auto-play was prevented: ', error);
            });
        }
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const texts = [
        "Explora Nuestras Propiedades",
        "Construyendo futuros, una propiedad a la vez",
        "Tu aliado en el mercado inmobiliario",
        "Deja que te guiemos a tu nuevo hogar"
    ];

    let index = 0;
    const animatedText = document.getElementById('animatedText');

    setInterval(() => {
        animatedText.style.opacity = 0; // Primero baja la opacidad
        setTimeout(() => {
            index = (index + 1) % texts.length;
            animatedText.textContent = texts[index];
            animatedText.style.opacity = 1; // Luego sube la opacidad
        }, 1000); // Tiempo para cambiar el texto
    }, 5000); // Cambia el texto cada 5 segundos
});

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
