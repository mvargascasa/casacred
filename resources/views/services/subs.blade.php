@extends('layouts.web')
@section('header')
<title>{{$service->page_title}}</title>
<link rel="stylesheet" href="{{asset('css/style-not.css?4')}}">
<meta name="description" content="{{$service->page_seocescription}}"/>
<meta name="keywords"    content="{{$service->page_metatags}}">

<meta property="og:url"                content="{{url('servicios/'.$service->slug)}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="{{$service->page_title}}" />
<meta property="og:description"        content="{{$service->page_seocescription}}" />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

@endsection



@section('content') 

<section id="prisection" style="background-size: cover;background-position: center top; background-repeat: no-repeat;">
    <div>
  
      <div class="row p-4 p-md-5 align-items-end" style="min-height: @if($ismobile) 310px @else 450px @endif; background:rgba(2, 2, 2, 0.5)">
  
        <div class="col-12 text-white text-center">
                        {!!$service->headertxt!!}  
          <a href="javascript:void(0)" onclick="setInterest('{{$service->page_title}}')" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
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

            @foreach ($services as $serv)   
            <div class="col-12 col-sm-12 col-md-4 py-2">
                <div class="serviceBox">
                    <h3 class="title">{{$serv->title}}</h3>
                    <a class="" href="{{url('servicio/'.$serv->slug)}}">
                    <div class="service-icon">
                        <img class="service-img pt-3" src="{{url('uploads/services',$serv->image)}}" width="60" alt="">
                    </div>
                    </a>
                    <p class="description"> {!!mb_substr(strip_tags($serv->description),0,100)!!}... </p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
<section>

@endsection



@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/services/'.$service->headerimg)}}')";
    });
  </script>
@endsection
