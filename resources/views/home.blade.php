@extends('layouts.web')
@section('header')
    <title>Casas en venta en Cuenca Ecuador</title>
    <meta name="description" content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos."/>
    <meta name="keywords" content="Casas en venta en cuenca, Apartamentos en venta en cuenca, terrenos en venta en cuenca, lotes en venta en cuenca, Compra, Casas a crédito, Casas económicas , Casas, Departamento, Terrenos, Locales comerciales, Oficinas, Bodegas, Ecuador, Venta, Arriendo, Oportunidad, Avaluos, Avalous y Catastros, Avaluos de propiedades, Yunguilla, Cuenca, casas bonitas">

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Casa Crédito Encuentra la casa de tus sueños." />
    <meta property="og:description"        content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos." />
    <meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
      html, body {
        max-width: 100% !important;
        overflow-x: hidden !important;
    }
      @media screen and (max-width: 850px){
        #txttitlebanner{font-size: 12px !important;text-align: center !important;}
        #infolistingbanner{font-size: 10px !important;bottom: 0px !important;right: 5px !important;}
        #txtserviciosinmo{
          font-size: 15px !important;
        }
        #inforowconstruye1{
          font-size: 14px !important;
        }
        #inforowconstruye2{
          font-size: 11px !important;
        }
      }
      @media screen and (max-width: 1040px){
        #formtopsearch{
          display: none !important;
        }
        #btnsearch{
          display: block !important;
        }
      }
      .hover-image:hover{
        -webkit-transform: scale(1.1); transform: scale(1.1);
        -webkit-transition: 1s;
      }
      .img-container {
        position: relative;
      }

      .image {
        opacity: 1;
        display: block;
        transition: .5s ease;
        backface-visibility: hidden;
      }

      .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
      }

      .img-container:hover .image {
        opacity: 0.3;
      }

      .img-container:hover .middle {
        opacity: 1;
      }
      .text {
        background-color: #04AA6D;
        color: white;
        font-size: 16px;
        padding: 16px 32px;
      }
      #ftop_txt::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: #ffffff;
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
        padding: 15px 15px;
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
        font-size: 16px;
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
        display: none !important;
      }
      .carousel-inner .row{
        min-height: 600px !important;
      }
      .carousel-inner .row .col-12{
        width: 425px !important;
      }
    }
    #parentBuscador{
      padding-top: 15%;
    }
    #parentBuscador, #searchmobile{
      overflow: auto; /* Recommended in case content is larger than the container */
      margin: 0 auto;
      position: absolute; /* Break it out of the regular flow */
      top: 0;
      left: 0;
      bottom: 0;
      right: 0; /* Set the bounds in which to center it, relative to its parent/container */
    }
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
        <div id="carouselExampleFadeBanner" class="carousel slide carousel-fade"  data-bs-ride="carousel" data-bs-interval="4000">
          <div class="carousel-inner" style="height: @if($ismobile) 70vw; @else 40vw; @endif">
            <div class="carousel-item active" style="position: relative">
              <img class="img-fluid" style="filter: brightness(50%); width: 100vw; @if($ismobile) height: 70vw; @else height: 40vw; @endif" src="{{ asset('img/banner.webp') }}" alt=""> 
              @include('layouts.homesearch')
            </div>
            <div class="carousel-item" style="position: relative">
              <img class="img-fluid" style="filter: brightness(50%); width: 100vw; @if($ismobile) height: 70vw; @else height: 40vw; @endif" src="{{ asset('img/banner1.webp') }}" alt="">
              @include('layouts.homesearch')
            </div>
            <div class="carousel-item" style="position: relative">
              <img class="img-fluid" style="filter: brightness(50%); width: 100vw;@if($ismobile) height: 70vw; @else height: 40vw; @endif" src="{{ asset('img/banner2.webp') }}" alt="">
              @include('layouts.homesearch')
            </div>
            <div class="carousel-item" style="position: relative">
              <img class="img-fluid" style="filter: brightness(50%); width: 100vw; @if($ismobile) height: 70vw; @else height: 40vw; @endif" src="{{ asset('img/banner4.webp') }}" alt="">
              @include('layouts.homesearch')
            </div>
          </div>
        </div> 

        <div class="container @if($ismobile) pt-4 @else pt-5 @endif">
          <p id="txtserviciosinmo" style="font-size: 20px" class="text-center mt-3 mb-5">SERVICIOS <b style="font-weight: 400">INMOBILIARIOS</b> A SU ALCANCE</p>
          <div class="row mr-2 ml-2">
              <div data-aos="fade-up" class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-5">
                <div class="position-relative d-flex justify-content-center">
                  <img style="border-radius: 5px;" class="img-fluid hover-image" src="{{ asset('img/CAS-IDEAL.webp') }}" alt="">
                </div>
                  <div class="text-center mt-5">
                        <a class="btn cta a-btn-services" href="{{ route('web.propiedades') }}">
                          <span>Comprar</span>
                          <svg width="13px" height="10px" viewBox="0 0 13 10">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                          </svg>
                        </a>
                  </div>
              </div>
              <div data-aos="fade-up" class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-5">
                <div class="position-relative d-flex justify-content-center">
                  <img style="border-radius: 5px;" class="img-fluid hover-image" src="{{ asset('img/VENDA-SU-PROPIEDAD.webp') }}" alt="">
                </div>
                  <div class="text-center mt-5">
                      <button class="btn cta a-btn-services" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-whatever="  una propiedad">
                        <span>Vender</span>
                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                          <path d="M1,5 L11,5"></path>
                          <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                      </button>
                  </div>
              </div>
              <div data-aos="fade-up" class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-5">
                <div class="position-relative d-flex justify-content-center">
                  <img style="border-radius: 5px;" class="img-fluid hover-image" src="{{ asset('img/ALQUILE.webp') }}" alt="">
                </div>
                  <div class="text-center mt-5">
                      <button class="btn cta a-btn-services" data-bs-toggle="modal" data-bs-target="#modalAlquiler">
                        <span>Alquilar</span>
                        <svg width="13px" height="10px" viewBox="0 0 13 10">
                          <path d="M1,5 L11,5"></path>
                          <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                      </button>
                  </div>
              </div>
              <div data-aos="fade-up" class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-5">
                <div class="position-relative d-flex justify-content-center">
                  <img style="border-radius: 5px;" class="img-fluid hover-image" src="{{ asset('img/CREDITOS.webp') }}" alt="">
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('web.servicios', 'creditos-en-ecuador') }}" class="btn cta a-btn-services">
                      <span>Solicitar</span>
                      <svg width="13px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                      </svg>
                    </a>
                </div>
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
                  <img style="filter: brightness(80%)" src="{{ asset('uploads/listing/600/' . substr($listing->images, 0, 25) ) }}" class="d-block w-100" alt="...">
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
                  <img width="100%" src="{{ asset('uploads/listing/600/' . substr($listing->images, 0, 25) ) }}" class="card-img-top" alt="...">
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
        <a style="background-color: #2c3144; color: #ffffff; padding: 15px; border-radius: 10px; font-size: 18px" class="btn" href="{{ route('web.propiedades') }}">Ver todas <i style="color: #fcc62e" class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>


    <div data-aos="flip-down" class="row" style="background-color: #2c3144; padding-top: 2%; padding-bottom: 2%">
        <div class="col-sm-12 text-center text-white mt-4 mb-4">
            <h5>¿Quiere vender o rentar su <b style="color: #fcc62e">Propiedad</b>?</h5>
            <p>Escríbanos y lo asesoramos en el proceso</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" style="background-color: #fcc62e">INICIAR</button>
        </div>
    </div>

    <div class="container">
      <div class="row mb-4">
          <h4 class="text-center mt-5 mb-5" style="font-weight: 400">PROYECTOS NUEVOS EN ECUADOR</h4>
          <div data-aos="zoom-in-right" class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-3 position-relative" style="width: 20rem; height: 21rem">
                <div class="img-container">
                    <img class="image" width="100%" height="100%" src="{{ asset('/img/adra.webp') }}" class="card-img-top" alt="Proyecto Adra - Casa Credito Promotora">
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
                    <img class="img-fluid image" src="{{ asset('/img/futuranarancay.webp') }}" class="card-img-top" alt="Proyecto Futura Narancay - Casa Credito Promotora">
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
                    <img class="img-fluid image" src="{{ asset('/img/toscana.webp') }}" class="card-img-top" alt="Proyecto Toscana - Casa Credito Promotora">
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
                <textarea style="border-radius: 10px 10px 10px 10px" name="mensaje" id="mensaje" rows="3" class="form-control" required></textarea>
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
            <h5 class="modal-title" id="exampleModalLongTitle">Vender una propiedad</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ route('web.lead.contact') }}" method="POST">
            @csrf
          <div class="modal-body">
            <input type="hidden" name="interest" value="Vender una propiedad">
            <div class="form-group mt-2">
              <label for="name">Nombre y Apellido</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group mt-2">
              <label for="phone">Teléfono</label>
              <input type="number" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group mt-2">
              <label for="email">Correo electrónico</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mt-2">
              <label for="tipopropiedad">Tipo de propiedad</label>
              @php
                $types = DB::table('listing_types')->get();
              @endphp
              <select class="form-select" name="tipopropiedad">
                <option value="">Seleccione</option>
                @foreach ($types as $type)
                  <option value="{{$type->type_title}}">{{$type->type_title}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mt-2 d-flex">
              <div class="mr-1" style="width: 100%">
                <label for="province">Provincia</label>
                <select name="province" class="form-select" id="selProvincea">
                  <option value="">Seleccione</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province->name}}" data-id="{{ $province->id}}">{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div style="width: 100%">
                <label for="city">Ciudad</label>
                <select class="form-select" name="city" id="selCitya">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn" style="background: #8b0000; color: #ffffff">Enviar</button>
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
          <div class="modal-header" style="background-color: #8b0000; color: #ffffff">
            <h5 class="modal-title" id="modalFiltersLabel">Filtros de Búsqueda</h5>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
              <i class="far fa-times"></i>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('web.propiedades') }}" id="formodalsearch" method="GET">
              <div class="form-group">
                <label for="tipobusqueda" style="font-weight: 400">Tipo de búsqueda</label>
                <select name="type" id="tipobusqueda" class="form-control">
                  <option value="" selected>Seleccione</option>
                  <option value="en-venta">Venta</option>
                  <option value="alquilar">Alquiler</option>
                  <option value="proyectos">Proyecto</option>
                </select>
              </div>
              <div class="form-group mt-2">
                <label for="tipopropiedad" style="font-weight: 400">Tipo de propiedad</label>
                <select name="category" id="tipopropiedad" class="form-control">
                  <option value="" selected>Seleccione</option>
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

              @php
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
              </div>
              <div class="form-group mt-2">
                <label for="preciodesde" style="font-weight: 400">Precio</label>
                <div class="d-flex">
                  <input type="number" id="preciodesde" name="fromprice" placeholder="Desde" class="form-control mr-1">
                  <input type="number" id="preciohasta" name="uptoprice" placeholder="Hasta" class="form-control">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" onclick="document.getElementById('formodalsearch').submit();" class="btn" style="background-color: #8b0000; color: #ffffff">Buscar</button>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('secondsection').style.backgroundImage = "url('img/imgbannermiddle.webp')";
    });
    
    const selProvince = document.getElementById('selProvince');
    const selCity = document.getElementById('selCity');

    const selProvincea = document.getElementById('selProvincea');
    const selCitya = document.getElementById('selCitya');    

    const selProvinceb = document.getElementById('selProvinceb');
    const selCityb = document.getElementById('selCityb');

    const selProvincec = document.getElementById('selProvincec');
    const selCityc = document.getElementById('selCityc');

    selProvince.addEventListener("change", async function() {
      selCity.options.length = 0;
    let id = selProvince.options[selProvince.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
          opt.value = '';
          selCity.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCity.appendChild(opt);
    });
  });

    selProvincea.addEventListener("change", async function() {
      selCitya.options.length = 0;
    let id = selProvincea.options[selProvincea.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
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
</script>
  @livewireScripts
  @stack('scripts')
@endsection