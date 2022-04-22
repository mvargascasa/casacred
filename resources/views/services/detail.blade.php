@extends('layouts.web')
@section('header')
<title>Casa Credito - {{$service->page_title}}</title>
<link rel="stylesheet" href="{{asset('css/style-not.css?4')}}">
<meta name="description" content="{{$service->page_seocescription}}"/>
<meta name="keywords"    content="{{$service->page_metatags}}">

<meta property="og:url"                content="{{url('servicios/'.$service->slug)}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Casa Credito - {{$service->page_title}}" />
<meta property="og:description"        content="{{$service->page_seocescription}}" />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

<style>
  @media screen and (max-width: 1400px){#txt_info{padding-top: 5rem !important;}}
  @media screen and (max-width: 1200px){#txt_info{padding-top: 2rem !important;}}
  @media screen and (max-width: 850px){#txt_info{padding-top: 13rem !important;}#card_creditos{margin-left: 7px; margin-right: 7px}}
</style>

@endsection



@section('content') 

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
  
      <div class="row p-4 p-md-5 align-items-end" style="min-height: 450px;background:rgba(2, 2, 2, 0.5)">
  
        <div class="col-12 text-white text-center">
            <p style="text-align:center"><span style="color:#ffffff"><span style="font-size:40px">{{$service->page_title}}</span></span></p> 
          <a href="javascript:void(0)" onclick="setInterest('{{$service->page_title}}')" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
        </div>
  
      </div>
    </div>
  </section>
   

    
<section class="bg-white">
    <div class="container">
        <div class="row py-4">            
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <div class="card my-4">
                    <div class="card-body">
                      <h6 class="card-title text-danger text-uppercase">{{$service->page_title}}</h6> <hr>
                      <p class="card-text">{!!$service->description!!}</p>
                    </div>
                </div>
            </div> 
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="card my-4">
                    <div class="card-body">
                      <h6 class="card-title text-danger text-uppercase">Links</h6> <hr>
                      @foreach ($otros as $otro)
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item" style="border-bottom: 1px #eeeeee  solid;">
                            <div class="d-flex flex-row">
                              <div class="px-1"><img src="{{url('uploads/services',$otro->image)}}"width="30" alt=""></div>
                              <div><a class="link-dark" href="{{url('servicio/'.$otro->slug)}}" style="text-decoration: none;">{{$otro->title}}</a></div>
                            </div>                            
                          </li>
                        </ul>
                      @endforeach
                    </div>
                  </div>

                  @if ($service->page_title === "Créditos Hipotecarios" || $service->page_title === "Créditos de Consumo" || $service->page_title === "Créditos de Construcción")
                  <div id="card_creditos" style="border: none" class="card position-relative">
                    <img class="img-fluid rounded" src="@if($service->page_title === "Créditos Hipotecarios") {{ asset('img/CREDITO-HIPOTECARIO.webp') }} @elseif($service->page_title === "Créditos de Consumo") {{ asset('img/CONSUMO.webp')}} @elseif($service->page_title === "Créditos de Construcción") {{ asset('img/CONSTRUCCION.webp') }} @endif" alt="{{ $service->page_title }} para Ecuatorianos residentes en Estados Unidos">
                    <div class="position-absolute" style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%">
                      <div class="text-center">
                        <div id="txt_info" style="padding-top: 8rem">
                          <img src="{{ asset('img/ECUADOR-04.webp') }}" width="35px" alt="{{ $service->page_title }} para Ecuatorianos residentes en Estados Unidos">
                          <img src="{{ asset('img/USA-05.webp') }}" width="35px" alt="{{ $service->page_title }} para Ecuatorianos residentes en Estados Unidos">
                        </div>
                        <p class="text-white" style="font-weight: 500; font-size: 15px">{{ $service->page_title}} <br> para migrantes</p>
                      </div>
                    </div>
                    <div class="position-absolute" onclick="setInterest('{{$service->page_title}}')" data-toggle="modal" data-target="#modalContact" style="bottom: 0; left: 0; width: 100%; background-color: #c30000; height: 60px; cursor: pointer">
                      <div class="position-relative" style="display: flex; justify-content: center; text-align: center">
                        <div class="position-absolute" style="top: 0; margin-top: -20px">
                          <i style="background-color: #c30000; color: #ffffff; padding: 5px; border-radius: 25px" class="fal fa-usd-circle fa-2x"></i>
                          <p class="text-white" style="font-size: 15px; font-weight: 400">Solicite su crédito <u style="font-weight: bold">AQUÍ</u></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endif
            </div>
        </div>
    </div>
<section>

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
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/services/'.$service->headerimg)}}')";
    });
  </script>
@endsection
