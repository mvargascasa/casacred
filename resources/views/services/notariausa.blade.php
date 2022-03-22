@extends('layouts.web')
@section('header')
<title>Notaria en Queens New York - CasaCredito</title>
<link rel="stylesheet" href="{{asset('css/style-not.css?4')}}">
<meta name="description" content="Notario Público en Queens New York. Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit."/>
<meta name="keywords" content="">

<meta property="og:url"                content="{{route('web.notariausa')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Notario Público en Queens New York." />
<meta property="og:description"        content="Gestión en Línea en todo EE.UU. Poderes, Apostillas, Traducciones, Autorizaciones de Viaje, Affidavit." />
<meta property="og:image"              content="{{asset('img/meta-notaria-latina-queens-new-york.jpg')}}" />

@endsection



@section('content')

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/slider-01-2.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left top;">
          <div class="carousel-caption">
              <h1 class="tit-not">APOSTILLAS</h1>
              <h5 class="heading-title">Notarizamos Documentos en Línea</h5>
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/slider-02.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left bottom;">
          <div class="carousel-caption">
              <h1 class="tit-not">PODERES GENERALES</h1>
              <h2 class="heading-title">Y ESPECIALES</h2>
              <h5 class="heading-title">Notarizamos Documentos en Línea</h5>  
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
          </div>
        </div>
        <div class="carousel-item"  style="background:rgba(2, 2, 2, 0.5);">
          <img src="{{asset('img/slider-03.jpg')}}" class="d-block w-100" alt="..." 
          style="height: 550px;object-fit: cover; object-position: left bottom;">
          <div class="carousel-caption">
              <h1 class="tit-not">TRADUCCIONES</h1>
              <h5 class="heading-title">Notarizamos Documentos en Línea</h5>
              <a href="javascript:void(0)" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
          </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>

  <div class="p-2" style=" position: absolute;right: 20px;top: 80px;z-index: 1">
    <a class="text-warning" href="tel:+7186903740" style="font-weight: bols;" onclick="gtag_report_conversion('tel:+7186903740');gtag('event', 'click', { 'event_category': 'Seguimiento de llamadas', 'event_label': 'LandingPage', 'value': '0'});">
        <i class="fa fa-phone-square-alt"></i> 718-690-3740
    </a>
    </div>

<section class="border-bottom border-danger">
    <div class="container" >
        <div class="row">
            <div class="col-12 col-sm-6 p-4 my-2">
                <span class="font-weight-bold">¿Por qué elegirnos?</span> <br><br>
                <h4 class="heading-title pb-4">Brindamos el mejor servicio y asesoramiento a latinos en Estados Unidos.</h4>
                <hr class="hrwf">
                <img id="imgdoc" class="mx-2" src="{{asset('img/docverify-approved-enotary-small.png')}}" height="60" alt="">
                <img id="imgnna" class="mx-2" src="{{asset('img/national-notary-association-blue.png')}}" height="50" alt="">
                
            </div>
            <div class="col-12 col-sm-6 p-4 my-4  d-flex align-items-center">
                <span style="font-size:18px; text-indent: 40px;">
                    Somos una notaría autorizada, para autenticar documentos en Estados Unidos, por medio de una Apostilla. Nuestro servicio es realizado bajo normas y reglas estrictamente legales, para que su trabajo sea entregado con la mayor prontitud y satisfacción.
                    <br><br>
                    Brindamos servicios notariales para toda Latinoamérica desde los Estados Unidos.
                </span>
            </div>
        </div>
    </div>
</section>


<section class="bg-white">
    <div class="container">
        <div class="row py-4">
            <div class="col-12 text-center py-4">
                <h2>Nuestros Servicios</h2>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="serviceBox">
                    <h3 class="title">Apostillas</h3>
                    <a class="" href="{{route('web.servicio','apostilla')}}">
                    <div class="service-icon">
                        <img class="service-img pt-3" src="{{asset('img/apostillas.png')}}" width="50" alt="">
                    </div>
                    </a>
                    <p class="description">
                        Autentificamos sus documentos solicitados por entidades de otro país diferente al originario mediante la apostilla de los mismos.
                    </p>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-4">
                <div class="serviceBox">
                    <h3 class="title">Poderes</h3>
                    <a class="" href="{{route('web.servicio','poder-general')}}">
                    <div class="service-icon">
                        <img class="service-img pt-4" src="{{asset('img/poderes.png')}}" width="40" alt="">
                    </div>
                    </a>
                    <p class="description">
                        Gestione sus trámites legales sin estar presente por medio de un apoderado de confianza, una solución para gestionar bienes y trámites importantes.
                    </p>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-4">
                <div class="serviceBox">
                    <h3 class="title">Traducciones</h3>
                    <a class="" href="{{route('web.servicio','traducciones')}}">
                    <div class="service-icon">
                        <img class="service-img pt-4" src="{{asset('img/traducciones.png')}}" width="40" alt="">
                    </div>
                    </a>
                    <p class="description">
                        Transcripción de documentos de un idioma a otro diferente, certificados por un notario para ser presentados frente a las entidades que lo soliciten.
                    </p>
                </div>
            </div>
        </div>
    </div>
<section>


<section class="row m-0 justify-content-md-center py-2 bg-light">

    <div class="col-12 text-center py-4">
      <h2>Más Servicios</h2>
    </div>


    <div class="col col-12 col-md-4 col-lg-3 col-xl-3 pb-4">
        <a href="{{route('web.servicio','apostilla')}}" class="btn btn-gray-red btn-block">Apostillas</a>
        <a href="{{route('web.servicio','affidavit')}}" class="btn btn-gray-red btn-block">Affidávit</a>
        <a href="{{route('web.servicio','certificación')}}" class="btn btn-gray-red btn-block">Certificaciones</a>
        <a href="{{route('web.servicio','poder-especial')}}" class="btn btn-gray-red btn-block">Poderes Especiales</a>
    </div>

    <div class="col col-12 col-md-4 col-lg-3 col-xl-3 pb-4">
        <a href="{{route('web.servicio','poder-general')}}" class="btn btn-gray-red btn-block">Poderes</a>
        <a href="{{route('web.servicio','acuerdos')}}" class="btn btn-gray-red btn-block">Acuerdos</a>
        <a href="{{route('web.servicio','carta-de-invitación')}}" class="btn btn-gray-red btn-block">Cartas de Invitación</a>
        <a href="{{route('web.servicio','revocatoria')}}" class="btn btn-gray-red btn-block">Revocatoria</a>
    </div>

    <div class="col col-12 col-md-4 col-lg-3 col-xl-3 pb-4">
        <a href="{{route('web.servicio','traducciones')}}" class="btn btn-gray-red btn-block">Traducciones</a>
        <a href="{{route('web.servicio','autorización-de-viaje')}}" class="btn btn-gray-red btn-block">Autorizaciones de Viaje</a>
        <a href="{{route('web.servicio','contratos')}}" class="btn btn-gray-red btn-block">Contratos</a>
        <a href="{{route('web.servicio','testamentos')}}" class="btn btn-gray-red btn-block">Testamento</a>
    </div>

  </section>
</div>
@endsection



@section('script')

@endsection
