@extends('layouts.web')
@section('header')
@php
    if(isset($_GET['searchtxt'])){ $searchtxt = $_GET['searchtxt'];}
@endphp
    <title>Casa Crédito Inmobiliaria</title>
    <meta name="description" content="Contamos con un amplio directorio de propiedades dentro del territorio ecuatoriano. Venta y Alquiler de Casas, Departamentos y Terrenos @isset($searchtxt) en {{ $searchtxt }}. @else ¡Visítenos! @endif ✅"/>
    <meta name="keywords" content="inmobiliaria en cuenca, inmobiliarias en cuenca, inmobiliaria en cuenca ecuador, casas en venta, venta casas cuenca, casas en venta cuenca, casas en venta en cuenca, casas de venta en cuenca, departamentos en venta, venta departamentos cuenca, departamentos en venta cuenca, departamentos de venta en cuenca, departamentos en venta en cuenca, departamentos en alquiler, departamentos en alquiler cuenca, departamentos de alquiler en cuenca, terrenos en venta, venta terrenos cuenca, venta terrenos cuenca azuay, terrenos en venta en cuenca, terrenos de venta en cuenca, lotes en venta en cuenca, cuenca venta de terrenos, alquiler de propiedades, alquilar casa cuenca, alquiler de casa cuenca, alquilar departamento cuenca, alquiler departamento cuenca, apartamentos en venta cuenca, apartamentos de alquiler en cuenca, casas en venta en cuenca baratas, casas de venta en cuenca nuevas">

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Encuentra la casa de tus sueños - Casa Crédito" />
    <meta property="og:description"        content="Contamos con un amplio directorio de propiedades dentro del territorio ecuatoriano. Venta y Alquiler de Casas, Departamentos y Terrenos. ¡Visítenos! ✅" />
    <meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

    <style>
      html, body {
        max-width: 100% !important;
        overflow-x: hidden !important;
      }
      @media screen and (max-width: 850px){
        #txttitlebanner{font-size: 12px !important;text-align: center !important;}
        #infolistingbanner{font-size: 10px !important;bottom: 0px !important;right: 5px !important;}
        #txtserviciosinmo{font-size: 15px !important;}
        #inforowconstruye1{font-size: 14px !important;}
        #inforowconstruye2{font-size: 11px !important;}
      }
      @media screen and (max-width: 1040px){
        #formtopsearch{display: none !important;}
        #btnsearch{display: block !important;}
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
    #secondsection{
      filter: brightness(60%);
    }
    .btn:focus{
      box-shadow: none !important;
      outline: none !important;
    }
    .carousel-item{position:relative;display:none;float:left;width:100%;margin-right:-100%;-webkit-backface-visibility:hidden;backface-visibility:hidden;transition:transform .6s ease-in-out}@media(prefers-reduced-motion:reduce){.carousel-item{transition:none}}.carousel-item-next,.carousel-item-prev,.carousel-item.active{display:block}/*!rtl:begin:ignore*/.active.carousel-item-end,.carousel-item-next:not(.carousel-item-start){transform:translateX(100%)}.active.carousel-item-start,.carousel-item-prev:not(.carousel-item-end){transform:translateX(-100%)}/*!rtl:end:ignore*/.carousel-fade .carousel-item{opacity:0;transition-property:opacity;transform:none}.carousel-fade .carousel-item-next.carousel-item-start,.carousel-fade .carousel-item-prev.carousel-item-end,.carousel-fade .carousel-item.active{z-index:1;opacity:1}.carousel-fade .active.carousel-item-end,.carousel-fade .active.carousel-item-start{z-index:0;opacity:0;transition:opacity 0s .6s}@media(prefers-reduced-motion:reduce){.carousel-fade .active.carousel-item-end,.carousel-fade .active.carousel-item-start{transition:none}}
    @media screen and (max-width: 1100px){
      #parentBuscador{
        padding-top: 7% !important;
      }
    }
    @media screen and (max-width: 850px){
      #searchmobile{
        padding-top: 26% !important;
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
    }
    #parentBuscador{
      padding-top: 11%;
    }
    /* #parentBuscador, #searchmobile{
      overflow: auto;
      margin: 0 auto;
      top: 0;
      left: 50px;
      bottom: 0;
      right: 0;
    } */
    #search_lay{
      overflow: auto;
      margin: 0 auto;
      top: 0;
      left: 0;
      bottom: 0;
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
    #ftop_ptype{
      max-width: 170px !important;
    }
    .carousel-item.active{z-index: 0 !important;opacity: 1 !important}
    ::placeholder {color: #b9babb !important;font-size: 14px}
    .shadow{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;}
    .buttons-services{bottom: 0px !important; background-color: #FEBB19; color: #ffffff;cursor: pointer; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;}
    .buttons-services-mobile{bottom: 0px !important; background-color: #DC3545; color: #ffffff;cursor: pointer; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;}
    .shadow:hover{box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px !important;}
    .cursor{cursor: pointer !important;}
    </style>
    @livewireStyles
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
  <div class="position-relative">
    @if(!$ismobile)
    <a class="text-light" href="tel:+593983849073">
      <div class="position-absolute mr-2 mt-2 px-1 rounded-pill font-weight-normal" style="top: 0; right: 0; z-index: 3; font-size: 16px;">
        {{-- <i class="fas fa-phone mr-1 text-light"></i>098-384-9073 --}}
        <img width="20px" height="15px" src="{{asset('img/ECUADOR-04.webp')}}" alt="telefono casa credito inmobiliaria"> 098-384-9073
      </div>
    </a>
    <a class="text-light" href="tel:+17186903740">
      <div class="position-absolute mr-2 mt-2 px-1 rounded-pill font-weight-normal" style="top: 30px; right: 0; z-index: 3; font-size: 16px">
        {{-- <i class="fas fa-phone mr-1 text-light"></i>098-384-9073 --}}
        <img width="20px" height="13px" src="{{asset('img/USA-05.webp')}}" alt="telefono casa credito inmobiliaria usa" class="mr-1"> 718-690-3740 
      </div>
    </a>
    @endif
    <div>
      <div id="carouselExampleFadeBanner" class="carousel slide carousel-fade"  data-ride="carousel" data-interval="4000">
          <div class="carousel-inner" style="height: @if($ismobile) 70vw; @else 36vw; @endif">
            @php
              $count = 0;
            @endphp
              @for ($i = 1; $i < 5; $i++)
                <div class="carousel-item @if($count === 0) active @endif">
                  <img class="img-fluid lazyLoad" style="filter: brightness(50%); width: 100%; @if($ismobile) height: 20rem; @else height: 40vw; @endif" data-src="{{ asset('img/banner'. $i .'.webp') }}" alt="Compra, Venta y Alquiler de Casas, Departamentos y Terrenos en Cuenca Ecuador">   
                  {{-- width: 100vw; @if($ismobile) height: 70vw; @else height: 40vw; @endif --}}
                  {{-- @include('layouts.homesearch') --}}
                  @php $count++; @endphp
                </div>
                @endfor
              </div>
            </div> 
          </div>
          <div id="search_lay" class="position-absolute" style="top: 0; opacity: 1 !important; z-index: 1;">
            @include('layouts.homesearch')
          </div>
  </div>
        <div class="@if($ismobile) pt-2 @else container pt-5 @endif">
          <p id="txtserviciosinmo" style="font-size: 20px" class="text-center mt-3 @if($ismobile) mb-3 @else mb-5 @endif">SERVICIOS <b style="font-weight: 400">INMOBILIARIOS</b> A SU ALCANCE</p>
          <div class="row mr-2 ml-2">
              <div data-aos="fade-up" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 @if($ismobile) mb-4 @else mb-5 @endif">
                <a href="{{route('web.propiedades', 'casas-en-venta-en-cuenca')}}">
                  <div class="position-relative d-flex justify-content-center shadow rounded cursor">
                    <img style="border-radius: 5px;"  width="100rem" height="100rem" class="img-fluid lazyLoad" data-src="{{ asset('img/CAS-IDEAL.webp') }}" alt="Compra y Venta de Casas en Cuenca Ecuador">
                    @if(!$ismobile)
                      <div class="text-center position-absolute p-1 rounded mb-2 fw-bold buttons-services">
                        Comprar una propiedad <i class="fas fa-arrow-circle-right"></i>
                            {{-- <a class="btn cta a-btn-services" href="{{ route('web.propiedades') }}">
                              <span>Comprar</span>
                              <svg width="12px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                              </svg>
                            </a> --}}
                      </div>
                      @endif
                  </div>
                  @if($ismobile)
                  <div class="text-center p-1 rounded mb-2 fw-bold buttons-services-mobile mt-3" style="font-size: 12px">
                    Comprar una propiedad <i class="fas fa-arrow-circle-right"></i>
                  </div>
                  @endif
                </a>
              </div>
              <div data-aos="fade-up" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 @if($ismobile) mb-4 @else mb-5 @endif">
                <div class="position-relative d-flex justify-content-center shadow rounded cursor" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                  <img style="border-radius: 5px;" width="100rem" height="100rem" class="img-fluid lazyLoad" data-src="{{ asset('img/VENDA-SU-PROPIEDAD.webp') }}" alt="Venda su propiedad con nosotros">
                  @if(!$ismobile)
                    <div class="text-center position-absolute p-1 rounded mb-2 fw-bold buttons-services">
                        Vender una propiedad <i class="fas fa-arrow-circle-right"></i>
                      {{-- <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-whatever="  una propiedad">
                          <span>Vender</span>
                          <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                          </svg>
                        </button> --}}
                    </div>
                  @endif
                </div>
                @if($ismobile)
                <div class="text-center mt-3 p-1 rounded mb-2 fw-bold buttons-services-mobile" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                  Vender una propiedad <i class="fas fa-arrow-circle-right"></i>
                </div>
                @endif
              </div>
              <div data-aos="fade-up" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 @if($ismobile) mb-4 @else mb-5 @endif">
                <div class="position-relative d-flex justify-content-center shadow rounded cursor" data-bs-toggle="modal" data-bs-target="#modalAlquiler">
                  <img style="border-radius: 5px;" width="100rem" height="100rem" class="img-fluid lazyLoad" data-src="{{ asset('img/ALQUILE.webp') }}" alt="Alquiler de viviendas o departamentos">
                  @if(!$ismobile)
                    <div class="text-center mt-5 position-absolute p-1 rounded mb-2 fw-bold buttons-services">
                        Alquilar una propiedad <i class="fas fa-arrow-circle-right"></i> 
                      {{-- <button class="btn cta a-btn-services" data-bs-toggle="modal" data-bs-target="#modalAlquiler">
                          <span>Alquilar</span>
                          <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                          </svg>
                        </button> --}}
                    </div>
                  @endif
                </div>
                @if($ismobile)
                  <div class="text-center mt-3 p-1 rounded mb-2 fw-bold buttons-services-mobile" style="font-size: 12px" data-bs-toggle="modal" data-bs-target="#modalAlquiler">
                    Alquilar una propiedad <i class="fas fa-arrow-circle-right"></i> 
                  </div>
                @endif
              </div>
              <div data-aos="fade-up" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 @if($ismobile) mb-4 @else mb-5 @endif">
                <a href="{{route('web.servicios', 'creditos-en-ecuador')}}">
                  <div class="position-relative d-flex justify-content-center shadow rounded cursor">
                    <img style="border-radius: 5px;" width="100rem" height="100rem" class="img-fluid lazyLoad" data-src="{{ asset('img/CREDITOS.webp') }}" alt="Creditos para ecuatorianos en el extranjero">
                    @if(!$ismobile)
                      <div class="text-center mt-5 position-absolute p-1 rounded mb-2 fw-bold buttons-services">
                          Solicitar un crédito <i class="fas fa-arrow-circle-right"></i>
                        {{-- <a href="{{ route('web.servicios', 'creditos-en-ecuador') }}" class="btn cta a-btn-services">
                            <span>Solicitar</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                              <path d="M1,5 L11,5"></path>
                              <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                          </a> --}}
                      </div>
                    @endif
                  </div>
                </a>
                @if($ismobile)
                <a href="{{route('web.servicios', 'creditos-en-ecuador')}}">
                  <div class="text-center mt-3 p-1 rounded mb-2 fw-bold buttons-services-mobile" style="font-size: 12px">
                    Solicitar un crédito <i class="fas fa-arrow-circle-right"></i>
                  </div>
                </a>
                @endif
            </div>
          </div>
      </div>
        <div data-aos="zoom-out" class="position-relative d-flex justify-content-center align-items-center mt-4 mb-5">
          <section id="secondsection" style="@if($ismobile) height: 13rem; @else height: 32rem; @endif background-size: cover;background-position: 10% 40%; width: 100%; background-repeat: no-repeat;">
          </section>
          <div class="text-center text-white position-absolute" style="margin-top: 10%">
            <div>
              <p id="inforowconstruye1" style="font-weight: 300; margin: 0; font-size: 23px">¿Necesita construir una vivienda propia?</p>
              <p id="inforowconstruye2" style="font-weight: 600; margin: 0; margin-bottom: 10px; font-size: 19px">Conozca más sobre nuestros servicios</p>
            </div>
            <a href="{{ route('web.servicios', 'construye') }}" class="btn btn-outline-light" style="border-radius: 25px; width: 40%">Leer más</a>
          </div>
        </div>
      @php
        $listings = \App\Models\Listing::select('listingtype', 'property_price', 'construction_area', 'heading_details', 'address', 'images', 'slug')->where('product_code', 1661)->orWhere('product_code', 1658)->orWhere('product_code', 1650)->orWhere('product_code', 1621)->get();
      @endphp

    <div style="margin-left: auto; margin-right: auto" class="mb-5">
      <p style="font-size: 20px; font-weight: 500" class="mt-5 mb-5 text-center">Propiedades destacadas</p>
      @if ($ismobile)
        <div id="carouselExampleFade" class="carousel slide carousel-fade ml-3 mr-3 position-relative" data-bs-ride="carousel">
          <ol class="carousel-indicators position-absolute" style="margin-left: 5px; width: 120px !important; bottom: 50px !important;">
            @foreach ($listings as $listing)
              <li data-bs-target="#carouselExampleFade" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : ''}}"></li>  
            @endforeach
          </ol>
          <div class="carousel-inner">
            @foreach ($listings as $listing)
              <div class="carousel-item {{ $loop->first ? 'active' : ' '}}">
                <div class="position-relative">
                  <img style="filter: brightness(80%)" width="100%" height="100%" data-src="{{ asset('uploads/listing/600/' . substr($listing->images, 0, 25) ) }}" class="d-block w-100 lazyLoad" alt="{{$listing->slug}}">
                  <div class="position-absolute" style="bottom: 5px; right: 5px;">
                    <a class="btn btn-sm btn-outline-light" href="{{ route('web.detail', $listing->slug) }}">Ver propiedad</a>
                  </div>
                </div>
                <div class="float-right mt-3">
                  <p style="font-weight: 400; margin: 0px; text-align: end">
                    @php echo str_replace("ñ", "Ñ",(strtoupper(str_replace(",", " |", $listing->address)))) @endphp
                  </p>
                  @php
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
                  <p style="margin: 0px">{{ $bedroom }} @if($bedroom > 1) dormitorios @else dormitorio @endif | {{ $bathroom }} @if($bathroom > 1) baños @else baño @endif | {{ $listing->construction_area}} m<sup>2</sup></p>
                </div>
              </div>
            @endforeach
          </div>
          <button style="height: 50px; margin-top: 25%" class="carousel-control-prev btn" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
            <span class="visually-hidden"><i style="color: #ffffff;font-weight:bold; font-size: 20px" class="far fa-angle-left"></i></span>
          </button>
          <button style="height: 50px; margin-top: 25%" class="carousel-control-next btn" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
            <span class="visually-hidden"><i style="color: #ffffff; font-size: 20px" class="far fa-angle-right"></i></span>
          </button>
        </div>
        @else
        <div data-aos="zoom-in" class="row justify-content-center">
          @foreach ($listings as $listing)
            <div class="card mb-4" style="width: 18rem; margin-right: 8px; margin-left: 8px; padding-left: 0px; padding-right: 0px">
              <a style="color: #000000" href="{{ route('web.detail', $listing->slug) }}">
                <div class="position-relative">
                  {{-- {{ asset('uploads/listing/600/' . substr($listing1->images, 0, 25) ) }} --}}
                  <img width="100%" src="{{ asset('uploads/listing/600/' . substr($listing->images, 0, 25) ) }}" class="card-img-top" alt="{{$listing->slug}}-image">
                  @php
                      $type = DB::table('listing_types')->select('type_title')->where('id', $listing->listingtype)->get();
                  @endphp
                  <label class="position-absolute" style="top: 10px; left: 10px; background-color: #3377cc; padding: 2px 5px 2px 5px; border-radius: 5px; color: #ffffff; font-weight: 400; font-size: 13px">{{ strtoupper($type[0]->type_title) }}</label>
                </div>
                <div class="card-body">
                  <h5 style="margin: 0px" class="card-title">${{ number_format($listing->property_price) }}</h5>
                  @php
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
                  <p style="font-size: 14px; margin: 0px" class="card-text">{{ $bedroom }} @if($bedroom > 1) dormitorios @else dormitorio @endif | {{ $bathroom }} @if($bathroom > 1) baños @else baño @endif | {{ $listing->construction_area}} m<sup>2</sup></p>
                  <p style="font-size: 14px; margin: 0px" class="card-text">@if($listing->slug == "totoracocha-en-venta-casa-nueva-recien-terminada-75579") {{ str_replace(",", " |", ucwords(strtolower($listing->address))) }} @else {{ str_replace(",", " |", $listing->address) }} @endif</p>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      @endif
      <div class="d-flex justify-content-center mt-3">
        <a style="background-color: #2c3144; color: #ffffff; padding: 15px; border-radius: 10px; font-size: 18px" class="btn" href="{{ route('web.propiedades') }}">Ver todas las propiedades <i style="color: #fcc62e" class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>


    <div data-aos="flip-down" class="row" style="background-color: #2c3144; padding-top: 2%; padding-bottom: 2%">
        <div class="col-sm-12 text-center text-white mt-4 mb-4">
            <h5>¿Quiere vender o rentar su <b style="color: #fcc62e">Propiedad</b>?</h5>
            <p>Escríbanos y lo asesoramos en el proceso</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="btn" style="background-color: #fcc62e">INICIAR</button>
        </div>
    </div>

    <div class="container">
      <div class="row mb-4">
          <h4 class="text-center mt-5 mb-5" style="font-weight: 400">PROYECTOS NUEVOS EN ECUADOR</h4>
          <div data-aos="zoom-in-right" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-3 position-relative" style="width: 20rem; height: 21rem">
                <div class="img-container">
                    <img class="img-fluid image lazyLoad" width="100%" height="100%" data-src="{{ asset('/img/adra_50.webp') }}" class="card-img-top" alt="Departamentos de Venta en Cuenca Ecuador - Proyecto Adra">
                  <div class="middle">
                    <div class="link">
                      <a href="https://casacreditopromotora.com/proyectos/Adra">Ver proyecto</a>
                    </div>
                  </div>
                </div>
                  <div class="position-absolute" style="top: 5px; left: 5px; background-color: #2c314484; padding: 5px; font-size: 11px; border-radius: 7px; color: #ffffff;">
                    Departamentos
                  </div>
                  <div class="card-body">
                    <p style="font-size: 12px; margin-bottom: 6px" class="card-text fw-bold">Edificio Vista Linda, Cuenca</p>
                    <h5>Adra</h5>
                    <p style="font-size: 13px" class="card-title text-muted">Desde USD 99.000</p>
                  </div>
                </div>
          </div>
          <div data-aos="zoom-in" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-3 position-relative" style="width: 20rem; height: 21rem">
                <div class="img-container">
                    <img class="img-fluid image lazyLoad" width="100%" height="100%" data-src="{{ asset('/img/futuranarancay_50.webp') }}" class="card-img-top" alt="Departamentos de Venta en Cuenca Ecuador - Futura Narancay">
                    <div class="middle">
                      <div class="link">
                        <a href="https://casacreditopromotora.com/proyectos/Futura Narancay">Ver proyecto</a>
                      </div>
                    </div>
                </div>
                  <div class="position-absolute" style="top: 5px; left: 5px; background-color: #2c314484; padding: 5px; font-size: 11px; border-radius: 7px; color: #ffffff;">
                    Departamentos
                  </div>
                  <div class="card-body">
                    <p style="font-size: 12px; margin-bottom: 6px" class="card-text fw-bold">Narancay, Cuenca</p>
                    <h5>Futura Narancay</h5>
                    <p style="font-size: 13px" class="card-title text-muted">Desde USD 78.000</p>
                  </div>
                </div>
          </div>
          <div data-aos="zoom-in-left" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-2 position-relative" style="width: 20rem; height: 21rem">
                <div class="img-container">
                    <img class="img-fluid image lazyLoad" width="100%" height="100%" data-src="{{ asset('/img/toscana_50.webp') }}" class="card-img-top" alt="Condominios, Casas nuevas de venta en Cuenca - Proyecto Toscana">
                    <div class="middle">
                      <div class="link">
                        <a href="https://casacreditopromotora.com/proyectos/Toscana">Ver proyecto</a>
                      </div>
                    </div>
                </div>  
                  <div class="position-absolute" style="top: 5px; left: 5px; background-color: #2c314484; padding: 5px; font-size: 11px; border-radius: 7px; color: #ffffff;">
                    Condominios
                  </div>
                  <div class="card-body">
                    <p style="font-size: 12px; margin-bottom: 6px" class="card-text fw-bold">Challuabamba, Cuenca</p>
                    <h5>Toscana</h5>
                    <p style="font-size: 13px" class="card-title text-muted">Desde USD 150.000</p>
                  </div>
                </div>
          </div>
          <div class="d-flex justify-content-center mt-3">
              <a style="background-color: #2c3144; color: #ffffff; padding: 15px; border-radius: 10px; font-size: 13px" class="btn" href="https://casacreditopromotora.com/proyectos">VISITE NUESTRO CATÁLOGO DE PROYECTOS EN <b style="color: #fcc62e;">ECUADOR </b><i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
      </div>
    </div>

    {{-- DIV MODAL PARA FORMULARIO DE CONTACTO --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered">
        <form action="{{ route('web.lead.contact') }}" method="POST">
          @csrf
        <div class="modal-content">
          <div class="modal-header" style="background-color: #8b0000; color: #ffffff">
            <h6 class="modal-title" id="exampleModalLabel">Complete el formulario y nos contactaremos con usted</h6>
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
          <div class="modal-header" style="background-color: #8b0000; color: #ffffff">
            <h5 class="modal-title" id="exampleModalLongTitle">Venda su propiedad con nosotros</h5>
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
                  <option value="{{$type->type_title}}">{{$type->type_title}}</option>
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
                    <option value="{{ $province->name}}" data-id="{{ $province->id}}">{{ $province->name }}</option>
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
            <button class="btn" type="submit" style="background: #8b0000; color: #ffffff">Enviar</button>
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
          <div class="modal-header" style="background-color: #8b0000; color: #ffffff">
            <h5 class="modal-title" id="exampleModalLongTitle">Alquilar una propiedad</h5>
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
            <form action="{{ route('web.lead.contact')}}" method="POST">
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
                    <option value="{{ $province->name}}" data-id="{{ $province->id}}">{{ $province->name }}</option>
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
              <button type="submit" class="btn" style="background-color: #8b0000; color: #ffffff">Ver opciones</button>
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
                    <option value="{{ $province->name}}" data-id="{{ $province->id}}">{{ $province->name }}</option>
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
              <button type="submit" class="btn btn-primary" style="background-color: #8b0000; color: #ffffff">Enviar</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    {{-- termina modal --}}

    {{-- DIV PARA MODAL DE FILTROS DE BUSQUEDA --}}
    <div class="modal fade" id="modalFilters" tabindex="-1" aria-labelledby="modalFiltersLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #771d1d; color: #ffffff">
            <h5 class="modal-title" id="modalFiltersLabel">Busqueda</h5>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
              <i class="far fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('web.propiedades') }}" id="formodalsearch" method="GET">
              <div class="form-group">
                <label class="text-muted" style="font-size: 13px" for="searchtxt">Ciudad / Sector / Código</label>
                <input type="text" name="psearchtxt" id="searchtxt" class="form-control" style="font-size: 10px">
              </div>
              <div class="form-group mt-2" style="width: 50% !important">
                <label for="order" class="text-muted" style="font-size: 12px">Ordenar por</label>
                <select name="order" id="order" class="form-select" style="font-size: 12px; background-color: #e9e9ed">
                  <option value="">Más Recientes</option>
                  <option value="maxprice">Precio más alto</option>
                  <option value="minprice">Precio más bajo</option>
                </select>
              </div>
              <div class="d-flex mt-2">
                <div class="form-group" style="width: 100%; margin-right: 5px">
                  <label for="tipobusqueda" style="font-weight: 400; font-size: 12px" class="text-muted">Tipo de búsqueda</label>
                  <select name="type" id="tipobusqueda" class="form-select" style="font-size: 12px; background-color: #e9e9ed">
                    <option value="" selected></option>
                    <option value="venta">Comprar</option>
                    <option value="alquilar">Alquilar</option>
                  </select>
                </div>
                <div class="form-group" style="width: 100%">
                  <label for="tipopropiedad" style="font-weight: 400; font-size: 12px" class="text-muted">Categoria</label>
                  <select name="pcategory" id="tipopropiedad" class="form-select" style="font-size: 12px; background-color: #e9e9ed">
                    <option value="" selected></option>
                    <option value="Casas">Casas</option>
                    <option value="Departamentos">Departamentos</option>
                    <option value="Casas Comerciales">Casas Comerciales</option>
                    <option value="Terrenos">Terrenos</option>
                    <option value="Quintas">Quintas</option>
                    <option value="Haciendas">Haciendas</option>
                    <option value="Locales Comerciales">Locales Comerciales</option>
                    <option value="Oficinas">Oficinas</option>
                    <option value="Suites">Suites</option>
                  </select>
                </div>
              </div>

              {{-- @php
                  $states = DB::table('info_states')->select('id', 'name')->where('country_id',63)->orderBy('name')->get();
              @endphp

              <div class="form-group mt-2">
                <div class="d-flex">
                  <div class="mr-1" style="width: 100%">
                    <label for="selProvince" style="font-weight: 400">Provincia</label>
                    <select name="state" id="selProvince" class="form-control">
                      <option value="">Seleccione</option>
                      @foreach ($states as $state)
                      <option value="{{ $state->name}}" data-id="{{ $state->id}}">{{ $state->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div style="width: 100%">
                    <label for="city" style="font-weight: 400">Ciudad</label>
                    <select name="city" id="selCity" class="form-control">
                      <option value="">Seleccione</option>
                    </select>
                  </div>
                </div> 
              </div> --}}
              <div class="form-group mt-2">
                <label for="preciodesde" style="font-weight: 400; font-size: 12px" class="text-muted">Precio</label>
                <div class="d-flex">
                  <input type="number" id="preciodesde" name="fromprice" placeholder="Desde" class="form-control mr-1" style="font-size: 12px">
                  <input type="number" id="preciohasta" name="uptoprice" placeholder="Hasta" class="form-control" style="font-size: 12px">
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="preciodesde" style="font-weight: 400; font-size: 12px" class="text-muted">Superficie</label>
                <div class="d-flex">
                  <input type="number" id="superfdesde" name="superf" placeholder="Desde" class="form-control mr-1" style="font-size: 12px">
                  <input type="number" id="superfhasta" name="supert" placeholder="Hasta" class="form-control" style="font-size: 12px">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-center" style="border: none">
            <div class="d-flex" style="width: 100%">
              <div style="width: 100%; height: 100%; margin-right: 1px;">
                <button type="button" class="btn btn-block" style="background-color: #ffffff; border: 1px solid #e7eaed; font-size: 13px" onclick="limpiarCampos();">Limpiar Campos</button>
              </div>
              <div style="width: 100%; height: 100%">
                <button type="button" onclick="document.getElementById('formodalsearch').submit();" class="btn btn-block" style="background-color: #8b0000; color: #ffffff; font-size: 13px">BUSCAR</button>
              </div>
            </div>
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
{{-- <script  src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}
<script  src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
  AOS.init();
</script>
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('secondsection').style.backgroundImage = "url('img/imgbannermiddle.webp')";
    });

    function onSubmit(token) {
      document.getElementById("demo-form").submit();
    }

    function limpiarCampos(){
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
  //   const response = await fetch("{{url('getcities')}}/"+id );
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
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Ciudad') );
          opt.value = '';
          selCitya.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCitya.appendChild(opt);
    });
  });

  selProvinceb.addEventListener("change", async function() {
      selCityb.options.length = 0;
    let id = selProvinceb.options[selProvinceb.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
          opt.value = '';
          selCityb.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCityb.appendChild(opt);
    });
  });

  selProvincec.addEventListener("change", async function() {
      selCityc.options.length = 0;
    let id = selProvincec.options[selProvincec.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
          opt.value = '';
          selCityc.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCityc.appendChild(opt);
    });
  });

  function showbuscar(btn){
        document.getElementById('body1').style.display = "block";
        document.getElementById('body2').style.display = "none";
    }

    function showalquilar(btn){
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

    //Enviar formulario cuando de click en uno de los radio button
    const btnradio_search = () => {
      document.getElementById('formhomesearch').submit();
    }

    function search(){
      //filter_properties();
      let check1 = document.getElementById('ftop_category_0');
      let check2 = document.getElementById('ftop_category_1');
      let check3 = document.getElementById('ftop_category_2');
      let category;
      let selType = document.getElementById('ftop_ptype').value;
      let inpSearchTxt = document.getElementById('ftop_txt').value;
      let url; let slug;
      selType = getTypePropertieById(selType);
      selType = selType.replace(/\s/g, "-").toLowerCase();
      //alert(selType);
      if(check1.checked) category = "en-venta";
      if(check2.checked) category = "en-alquiler";
      if(check3.checked) category = "en-proyectos";
      slug = selType + "-" + category + "-en-ecuador";
      if(inpSearchTxt){
        if(isNaN(inpSearchTxt)){
          url = "{{route('web.propiedades', [':slug', ':ubication'])}}";
          url = url.replace(':slug', slug);
          url = url.replace(':ubication', inpSearchTxt);
        } else {
          url = "{{route('web.propiedades', ':code')}}";
          url = url.replace(':code', inpSearchTxt);
          // url = url.replace(':ubication', inpSearchTxt);
        }
      } else {
        url = "{{route('web.propiedades', ':slug')}}";
        url = url.replace(':slug', slug);
      }
      // if(!inpSearchTxt){
      //   alert('campo vacio');
      // } else {
      //   if(isNaN(inpSearchTxt)) alert("its a string");
      //   else alert("its a number");
      // }
      window.location.href = url;
    }

    function getTypePropertieById(categoryid){
      let category = "";
      switch (categoryid) {
          case "23": category = "casas"; break;
          case "24": category = "departamentos"; break;
          case "25": category = "casas Comerciales"; break;
          case "26": category = "terrenos"; break;
          case "29": category = "quintas"; break;
          case "30": category = "haciendas"; break;
          case "32": category = "locales Comerciales"; break;
          case "35": category = "oficinas"; break;
          case "36": category = "suites"; break;
          default: break;
        }
        return category;
    }
    
</script>
  {{-- @livewireScripts
  @stack('scripts') --}}
@endsection