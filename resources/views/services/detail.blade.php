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
            <div class="col-12 col-sm-9">
                <div class="card my-4">
                    <div class="card-body">
                      <h6 class="card-title text-danger text-uppercase">{{$service->page_title}}</h6> <hr>
                      <p class="card-text">{!!$service->description!!}</p>
                    </div>
                </div>
            </div> 
            <div class="col-12 col-sm-3">
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
            </div>
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
