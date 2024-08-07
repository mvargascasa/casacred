@extends('layouts.web')
@section('header')
<title>{{$listing->product_code}} {{$listing->listing_title}}</title>
@php
    $type = DB::table('listing_types')->select('type_title')->where('id', $listing->listingtype)->first();
    $status;
    switch ($listing->listingtypestatus) {
      case 'en-venta' : $status = 'venta'; break;
      case 'En venta' : $status = 'venta'; break;
      case 'on sale' : $status = 'venta'; break;
      case 'alquilar' : $status = 'alquiler'; break;
      case 'proyectos' : $status = 'proyectos'; break;
    }
@endphp
<meta name="description" content="@isset($listing->meta_description){{$listing->meta_description}} @else {{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}... @endif"/>
<meta name="keywords" content="@isset($listing->keywords) {{$listing->keywords}} @else Casas en venta en cuenca ecuador, Apartamentos en venta en cuenca ecuador, terrenos en venta en cuenca ecuador, lotes en venta en cuenca ecuador, {{ Str::lower($type->type_title) }} en {{ $status }} en {{ strtolower($listing->city . " " . $listing->state) }} @endisset">
<meta name="robots" content="@if($listing->status) index @else noindex @endif">

<meta property="og:url"                content="{{route('web.detail',$listing->slug)}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="{{$listing->listing_title}}" />
<meta property="og:description"        content="{{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}..." />

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

@php $firstImg = array_filter(explode("|", $listing->images)) @endphp
<meta property="og:image"              content="{{url('uploads/listing/600',$firstImg[0]??'')}}" />
<style>
  body{
    background-color: #ffffff;
  }
/* Small devices (landscape phones, 576px and up)*/
@media (min-width: 576px) {  .ccimgpro{max-height:250px ;} }

/* Medium devices (tablets, 768px and up)*/
@media (min-width: 768px) { .ccimgpro{max-height:350px ;}  }

/* Large devices (desktops, 992px and up)*/
@media (min-width: 992px) { .ccimgpro{max-height:450px ;}  }
.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
}
@media screen and (max-width: 1200px){.divEmail{margin-top: 15px !important;}}

/* @media screen and (max-width: 850px){
  #custCarousel .carousel-indicators {
    margin-top: 0px !important;
    margin-bottom: 7% !important; 
}
} */

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
}
.divEmail{
  position: sticky !important;
  top: 10px !important;
}
.formEmail{background-color: rgb(244, 247, 248);box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;}
.formEmail:hover{box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;background-color: rgb(32, 36, 64);color: #ffffff}
.imgprojects{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;}
.inputs input, .inputs textarea{
        font-size: 13px;
      }

      .inputs #btnEnviar{
        background-color: #dc3545;
        text-decoration: none;
        color: #ffffff;
      }

      .inputs #btnWhatsapp{
        background-color: rgb(107, 191, 163);
        text-decoration: none;
        color: #ffffff;
      }
      #textoCondicionesEmail{
        font-size: 13px;
        margin-top: 10px;
      }
      

.carousel-inner img {
    width: 100%;
    height: 100%
}
#custCarousel .carousel-indicators {
    position: static; 
    margin: 0px !important;
}

#custCarousel .carousel-indicators>li {
    width: 100px;
    margin: 2px !important; 
}

#custCarousel .carousel-indicators li img {
    display: block;
    opacity: 0.75;
}

#custCarousel .carousel-indicators li.active img {
    opacity: 1;
}

#custCarousel .carousel-indicators li:hover img {
    opacity: 0.90;
}

.carousel-item img {
    width: 50%;
}
.cardsimilarlisting:hover{
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
  .lazyLoad {width: 100%;opacity: 0;}
  .visible {transition: opacity 1000ms ease;opacity: 1;} 

  #carousel-thumbs {
  background: rgba(255,255,255,.3);
  bottom: 0;
  left: 0;
  padding: 0 50px;
  right: 0;
}
#carousel-thumbs img {
  border: 5px solid transparent;
  cursor: pointer;
}
#carousel-thumbs img:hover {
  border-color: rgba(255,255,255,.3);
}
#carousel-thumbs .selected img {
  border-color: #fff;
}
.carousel-control-prev,
.carousel-control-next {
  width: 50px;
}
.card-asesor{box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;}
.icon-phone, .fa-whatsapp, .fa-envelope, .img-profile{transition: transform 0.3s ease;}
.icon-phone:hover{transform: scale(1.5);}
.fa-whatsapp:hover{transform: scale(1.5);}
.fa-envelope:hover{transform: scale(1.5);}
.card-asesor:hover{background-color: #242B40; color: #ffffff}
.card-asesor:hover .img-profile{transform: scale(1.1);}
#calcularcredmobile{z-index: 4;position: fixed;bottom: 0px;left: 0px;}
.bg-orange{background-color: #dc3545;}
.tiktok-embed{width: 100% !important}
.filter-image:hover{filter: brightness(70%)}
</style>
@endsection

@php
    $images = array_filter(explode("|", $listing->images));
    $filexists = false;
    if (file_exists(public_path().'/uploads/listing/thumb/600/'. strtok($listing->images, '|'))) {$filexists=true;}
    $listingtype = DB::table('listing_types')->where('id', $listing->listingtype)->first();
@endphp

@section('content')
@if(!$mobile)
<section class="header-images-desktop mt-4">
  <div class="container">
    <section class="row mx-2">
      <div class="col-12 col-sm-12 col-md-12 col-xl-6 position-relative">
        <article onclick="addactive(0)" class="shadow position-relative filter-image" data-toggle="modal" data-target="#exampleModalToggle" style="cursor: pointer; width: 100%; height: 500px; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('{{ $filexists ? url('uploads/listing/thumb',$images[0]) : url('uploads/listing',$images[0]) }}')"></article>
        @if($listing->video != null)
          <button type="button" class="btn btn-danger position-absolute rounded-pill" style="bottom: -15px; left: 60px" data-bs-toggle="modal" data-bs-target="#video_modal">Ver video <i class="fas fa-video"></i></button>
        @endif
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-xl-6">
        <div class="row align-items-center h-100">
          <div class="col-sm-6 w-100">
            <div class="d-flex mb-3">
              @if(count($images) > 1)
                <article onclick="addactive(1)" class="mr-2 shadow filter-image" data-toggle="modal" data-target="#exampleModalToggle" style="cursor: pointer; width: 100%; height: 242px; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('{{ $filexists ? url('uploads/listing/thumb/600',$images[1]) : url('uploads/listing/600',$images[1]) }}')"></article>
              @endif
              @if(count($images) > 2)
                <article onclick="addactive(2)" class="ml-2 shadow filter-image" data-toggle="modal" data-target="#exampleModalToggle" style="cursor: pointer; width: 100%; height: 242px; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('{{ $filexists ? url('uploads/listing/thumb/600',$images[2]) : url('uploads/listing/600',$images[2]) }}')"></article>
              @endif
            </div>
              <div class="d-flex mt-3">
              @if(count($images)>3)
                <article onclick="addactive(3)" class="mr-2 shadow filter-image" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" style="cursor: pointer; width: 100%; height: 242px; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('{{ $filexists ? url('uploads/listing/thumb/600',$images[3]) : url('uploads/listing/600',$images[3]) }}')"></article>
              @endif
              @if(count($images)>4)
                <article onclick="addactive(4)" class="ml-2 shadow filter-image" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" style="cursor: pointer; width: 100%; height: 242px; background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('{{ $filexists ? url('uploads/listing/thumb/600',$images[4]) : url('uploads/listing/600',$images[4]) }}')"></article>
              @endif
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content bg-transparent border-0">
        <div class="modal-bg-transparent">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              @php $index = 0; @endphp
              @foreach ($images as $img)    
                <div id="img_{{ $index }}" class="carousel-item @if($index == 0) active @endif">
                  <img class="d-block w-100" style="max-height: 90vh !important" data-slide-to="{{ $index }}" src="{{ $filexists ? url('uploads/listing/thumb', $img) : url('uploads/listing', $img)}}" alt="{{ $listingtype->type_title }}@if($listing->listingtypestatus == "en-venta") en venta @elseif($listing->listingtypestatus == "alquilar") de renta @else en proyectos @endif en {{ $listing->address != null ? $listing->address : $listing->sector }}, {{ $listing->city }} - {{ $index }}">
                </div>
                @php $index++; @endphp
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@else
<section>
  <div id="carouselImageMobile" class="carousel slide position-relative" data-ride="carousel">
    <div class="carousel-inner position-relative">
      @php $index = 0; @endphp
      @foreach ($images as $img)    
        <div id="img_{{ $index }}" class="carousel-item @if($index == 0) active @endif">
          <img class="d-block w-100" style="max-height: 90vh !important" data-slide-to="{{ $index }}" src="{{ $filexists ? url('uploads/listing/thumb/600',$img) : url('uploads/listing/600',$img) }}" alt="First slide">
        </div>
        @php $index++; @endphp
      @endforeach
    </div>
    @if($listing->video != null)
      <button type="button" class="btn btn-danger position-absolute rounded-pill" style="bottom: -15px; left: 30px" data-bs-toggle="modal" data-bs-target="#video_modal">Video <i class="fas fa-video"></i></button>
    @endif
    <a class="carousel-control-prev" href="#carouselImageMobile" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselImageMobile" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
@endif


  <div class="container mt-4">
    {{-- <div style="display: none" class="row pt-3">
      aqui
      <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">          
        <h5 class="font-weight-bold">{{$listing->listing_title}}</h5>
        <h6 class="text-muted">{{$listing->address}}</h6>
      </div>
      <div class="col-12 col-sm-3 pb-2">
        <a class="link-light" href="https://www.facebook.com/sharer/sharer.php?u={{route('web.detail',$listing->slug)}}" target="_blank">
          <img src="{{asset('img/casacredito-facebook.svg')}}" alt="Facebook Casacredito" width="30" height="30">
        </a>
        <a class="link-light" href="https://www.instagram.com/inmobiliariacasacredito/" target="_blank">
          <img src="{{asset('img/casacredito-instagram.svg')}}" alt="Instagram Casacredito" width="30" height="30">
        </a>
        <a class="link-light" href="https://api.whatsapp.com/send?text={{route('web.detail',$listing->slug)}}" target="_blank">
          <img src="{{asset('img/casacredito-whatsapp.svg')}}" alt="Whatsapp Casacredito" width="30" height="30">
        </a>
      </div>
    </div> --}}
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">

    <div class="row">
      <div class="col-12 col-sm-12 pb-2">     
        <div class="row pt-3">
          <div class="col-sm-1"></div>
          {{-- <div class="col-sm-5 d-flex">
            <div onclick="history.back();" class="d-flex" style="cursor: pointer">
              <i style="margin-top: 10px; margin-right: 10px" class="fal fa-angle-left"></i><p style="margin-top: 6px; margin-right: 10px">Regresar</p>
            </div>
            <form action="{{ route('web.propiedades') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" id="ftop_txt" name="searchtxt" class="form-control" placeholder="Buscar por dirección, ciudad" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $listing->city }}, {{ $listing->state }}">
                <button class="btn" type="submit" style="background-color: #dc3545; color: #ffffff" class="input-group-text" id="basic-addon2"><i class="fal fa-search"></i></button>
              </div>
            </form>
          </div> --}}
        </div>
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-11">
            {{-- <div id="carouselControls" class="carousel slide card-img-top" data-ride="carousel" data-interval="false">
              <div class="carousel-inner" style="max-height: 450px;">
                @php $iiListing=0 @endphp
                @foreach(array_filter(explode("|", $listing->images)) as $img)
                <div class="carousel-item @if($iiListing==0) active @endif">
                  <img style="width: 100%" src="{{url('uploads/listing',$img)}}"  data-slide-to="{{$iiListing}}" class="d-block w-100 ccimgpro" style="object-fit:contain " alt="{{$listing->listing_title}}-{{$iiListing++}}">
                </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>     --}}

              <div class="row">
                  <div class="col-md-12">
                      {{-- <div id="custCarousel" class="carousel slide" data-ride="carousel">
                          <!-- slides -->
                          <div class="carousel-inner">
                            @php $iiListing=0 @endphp
                            @foreach(array_filter(explode("|", $listing->images)) as $img)
                              <div class="carousel-item @if($iiListing==0) active @endif"> 
                                <img style="width: 100%; height: 100%" data-src="@if($mobile) {{url('uploads/listing/600',$img)}} @else {{url('uploads/listing',$img)}} @endif"  data-slide-to="{{$iiListing}}" class="d-block w-100 ccimgpro lazyLoad" style="object-fit:contain " alt="{{$listing->listing_title}}-{{$iiListing++}}"> 
                              </div>
                            @endforeach
                          </div> <!-- Left right --> <a style="margin-bottom: 30px" class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a style="margin-bottom: 30px" class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                          <ol class="carousel-indicators list-inline">
                            @php $iiListing=0 @endphp
                            @foreach(array_filter(explode("|", $listing->images)) as $img)
                              <li class="list-inline-item @if($iiListing==0) active @endif"> 
                                <div id="carousel-selector-{{$iiListing}}" class="selected" data-slide-to="{{$iiListing}}" data-target="#custCarousel" alt="{{$listing->listing_title}}-{{$iiListing++}}"> 
                                  <img width="100%" height="100%" data-src="{{url('uploads/listing/300/',$img)}}" class="img-fluid lazyLoad" alt="{{ $listing->listing_title }}"> 
                                </div> 
                              </li>
                              @endforeach
                          </ol>
                      </div> --}}

                      {{-- thumbnails carousel prueba --}}
                        {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            @php
                                $filexists = false;
                                if (file_exists(public_path().'/uploads/listing/thumb/600/'. strtok($listing->images, '|'))) {$filexists=true;}
                                //$imageVerification = asset('uploads/listing/thumb/600/'.$img);
                            @endphp
                          <div class="carousel-inner position-relative">
                            @php $iiListing=0 @endphp
                            @foreach (array_filter(explode("|", $listing->images)) as $img)
                              <div class="carousel-item @if($iiListing==0) active @endif" data-slide-number="{{ $iiListing }}">
                                <img style="width: 100%; height: 100%" src="
                                @if($mobile)
                                  @if($filexists)
                                    {{url('uploads/listing/thumb/600',$img)}} 
                                  @else 
                                    {{url('uploads/listing/600',$img)}} 
                                  @endif
                                @else
                                  @if($filexists)
                                    {{url('uploads/listing/thumb', $img)}}
                                  @else
                                    {{url('uploads/listing', $img)}}
                                  @endif
                                @endif
                                  " class="d-block w-100 ccimgpro" alt="..." data-slide-to="{{ $iiListing }}" style="object-fit: contain" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                              </div>
                            @endforeach
                          </div>
                          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div> --}}

                      {{-- @php
                        $arrayImages = [];
                        foreach (array_filter(explode("|", $listing->images)) as $img){
                          array_push($arrayImages, $img);
                        }
                      @endphp

                      <div id="carousel-thumbs" class="carousel slide mt-2" data-ride="carousel" style="margin-left: -20px; margin-right: -20px">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <div class="row mx-0 justify-content-center">
                              @php
                                  if(count($arrayImages) < 6){
                                    $aux = count($arrayImages);
                                  } else {
                                    $aux = 6;
                                  }
                              @endphp
                              @for ($i = 0; $i < $aux; $i++)
                                <div id="carousel-selector-{{ $i }}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%; height: 100%" src="@if($filexists){{url('uploads/listing/thumb/300/'.$arrayImages[$i])}} @else {{ url('uploads/listing/300/', $arrayImages[$i]) }} @endif" class="img-fluid" alt="{{$listing->listing_title}}-{{ $i}}">     
                                  @endisset
                                </div>   
                              @endfor
                            </div>
                          </div>

                          @if(count($arrayImages) > 6)
                          <div class="carousel-item">
                            <div class="row mx-0 justify-content-center">
                              @for ($i = 6; $i < 12; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%; height: 100%" src="@if($filexists){{url('uploads/listing/thumb/300/',$arrayImages[$i])}} @else {{ url('uploads/listing/300/', $arrayImages[$i]) }} @endif" class="img-fluid" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div> 
                          @endif

                          @if(count($arrayImages) > 12)
                          <div class="carousel-item">
                            <div class="row mx-0 justify-content-center">
                              @for ($i = 12; $i < 18; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%; height: 100%" src="@if($filexists){{url('uploads/listing/thumb/300/',$arrayImages[$i])}} @else {{ url('uploads/listing/300/', $arrayImages[$i]) }} @endif" class="img-fluid" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div>
                          @endif

                          @if(count($arrayImages) > 18)
                          <div class="carousel-item">
                            <div class="row mx-0 justify-content-center">
                              @for ($i = 18; $i < 24; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%; height: 100%" src="@if($filexists){{url('uploads/listing/thumb/300/',$arrayImages[$i])}} @else {{ url('uploads/listing/300/', $arrayImages[$i]) }} @endif" class="img-fluid" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div>
                          @endif

                          @if(count($arrayImages) > 24)
                          <div class="carousel-item">
                            <div class="row mx-0 justify-content-center">
                              @for ($i = 24; $i < 30; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%; height: 100%" src="@if($filexists){{url('uploads/listing/thumb/300/',$arrayImages[$i])}} @else {{ url('uploads/listing/300/', $arrayImages[$i]) }} @endif" class="img-fluid" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div>
                          @endif

                        </div>

                        @if(count($arrayImages) > 6)
                        <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                        @endif
                      </div> --}}
                      {{-- termina carousel thumbnails prueba --}}

                  </div>
              </div>

          </div>
        </div>
      </div>
      {{-- <div style="display: none" class="col-12 col-sm-3">
        <div id="carouselExampleControls2" class="carousel slide card-img-top" data-ride="carousel"  data-interval="false">
          <div class="carousel-inner" style="max-height: 500px;">
            @php $gallery4 = array_filter(explode("|", $listing->images));
            $galTotal = count($gallery4);
            $galceil  = ceil($galTotal/4);
            $nextImg=0;
            @endphp
            @for($ic = 0; $ic < $galceil; $ic++) 
            <div class="carousel-item @if($ic==0) active @endif">
              <div class="row">
                @if(isset($gallery4[$nextImg]))
                  <div class="col-3 col-sm-6">
                    <img src="{{url('uploads/listing',$gallery4[$nextImg])}}" onclick="selectPhoto({{$nextImg++}})" style="max-height: 100px;" class="d-block w-100" alt="...">
                  </div>
                @endif
                @if(isset($gallery4[$nextImg]))
                  <div class="col-3 col-sm-6">
                    <img src="{{url('uploads/listing',$gallery4[$nextImg])}}" onclick="selectPhoto({{$nextImg++}})" style="max-height: 100px;" class="d-block w-100" alt="...">
                  </div>
                @endif
                @if(isset($gallery4[$nextImg]))
                  <div class="col-3 col-sm-6">
                    <img src="{{url('uploads/listing',$gallery4[$nextImg])}}" onclick="selectPhoto({{$nextImg++}})" style="max-height: 100px;" class="d-block w-100" alt="...">
                  </div>
                @endif
                @if(isset($gallery4[$nextImg]))
                  <div class="col-3 col-sm-6">
                    <img src="{{url('uploads/listing',$gallery4[$nextImg])}}" onclick="selectPhoto({{$nextImg++}})" style="max-height: 100px;" class="d-block w-100" alt="...">
                  </div>
                @endif
              </div>
            </div>
            @endfor
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev" style="width: 10%;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next" style="width: 10%;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> --}}
        <div style="display: none">
          <div><p class="font-weight-bold pt-4">COD: {{$listing->product_code}}</p></div>
            <button type="button" class="btn btn-danger btn-block btn-lg py-2 font-weight-bold">PRECIO: ${{number_format($listing->property_price)}}</button>
            <p class="pt-4">Datos Principales</p> 
            @php
              $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
							$bathroom=0;$garage=0;$squarefit=0;
							if(!empty($listing->heading_details)){
							  $allheadingdeatils=json_decode($listing->heading_details); 
                foreach($allheadingdeatils as $singleedetails){ 
							    unset($singleedetails[0]);								
                  for($i=1;$i<=count($singleedetails);$i++){ 
                    if($i%2==0){  
                      if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49) $bedroom+=$singleedetails[$i];
                      if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81 || $singleedetails[$i-1]==49) $bathroom+=$singleedetails[$i];
                      if($singleedetails[$i-1]==43) $garage+=$singleedetails[$i];									  
                    }								   
                  }								
								$i++;
							  }
              }
            @endphp
            {{-- <div class="pb-2">
              @if($listing->construction_area>0)<img src="{{asset('img/house.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$listing->construction_area}}m<sup>2</sup> </span> @endif
              @if($listing->land_area>0)<img src="{{asset('img/floor.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$listing->land_area}}m<sup>2</sup> </span> @endif
              @if($bedroom>0)<img src="{{asset('img/bed-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bedroom}} </span> @endif
              @if($bathroom>0)<img src="{{asset('img/bathroom-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$bathroom}} </span> @endif
              @if($garage>0)<img src="{{asset('img/garage-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$garage}} </span> @endif
            </div> --}}
            {{-- @isset ($listing->listyears)
              @php
                $years_construction = DB::table('listing_years')->select('description')->where('id', $listing->listyears)->get();
              @endphp
              <div class="pb-2 d-flex">
                <p class="pt-1"><b style="font-weight: 500">Años de construcción:</b> <br> {{ $years_construction[0]->description }}</p>
              </div>
            @endisset   --}}
          </div>

          @php
            $countarrayimages = 0;
            foreach (array_filter(explode("|", $listing->images)) as $image) {
              $countarrayimages++;
            }    
          @endphp

          <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-12 col-sm-11">
              {{-- @if($listing->listingtypestatus != "alquilar")
              <div class="row align-items-center border border-danger ml-0 rounded mb-3 py-2">
                <label><i class="fas fa-money-check-edit-alt text-danger"></i> *El <b class="text-danger font-weight-bold">valor aproximado</b> de la cuota mensual para la propiedad es de <b class="font-weight-normal" id="totalinfo"></b></label>
              </div>
              @endif --}}
              <div class="row">
                <div class="col-12 col-sm-9 mb-1">
                  <p style="margin: 0px; color: #dc3545; font-size: 20px; font-weight: 600;">PRECIO: ${{ number_format($listing->property_price) }}</p>
                </div>
                <div class="col-12 col-sm-3 d-flex mb-1">
                  <span style="background-color: #dc3545; color: #ffffff; border-radius: 5px;padding: 5px; font-weight: 600; height: 40px;" class="d-flex align-items-center">CÓDIGO: {{ $listing->product_code }}</span>
                </div>
              </div>
              <div class="mt-2">
                <label style="background-color: #f9a322; color: #ffffff; padding-left: 3px; padding-right: 3px; border-radius: 5px; font-weight: 500; font-size: 13px">{{ $listingtype->type_title}}</label>
                <label style="background-color: #dc3545; color: #ffffff; padding-left: 3px; padding-right: 3px; border-radius: 5px; font-weight: 500; font-size: 13px">@if($listing->listingtypestatus == "en-venta") Venta @elseif($listing->listingtypestatus == "alquilar") Alquilar @else Proyectos @endif</label>
              </div>
              <div class="mt-4">
                <h1 class="h6" style="font-weight: 500">{{$listing->listing_title}}</h1>
                <p style="font-weight: 400"><i style="color: #dc3545" class="fas fa-map-marker-alt"></i> Sector: @if(Str::contains($listing->address, ',')){{$listing->address}} @else {{$listing->state}}, {{$listing->city}}, {{$listing->address != null ? $listing->address : $listing->sector}}@endif</p>
              </div>
              <div>
                <div class="row">
                    @if($listing->land_area > 0)
                      <div class="col-sm-6 d-flex">
                        <i style="font-size: 20px; margin-right: 5px" class="far fa-ruler-combined"></i>
                        <p>Área de Terreno: {{ $listing->land_area }} m<sup>2</sup></p>
                        {{-- @if($listingtype->type_title == "Terrenos") Área de Terreno: @else Área de Terreno: @endif {{ $listing->land_area}} --}}
                      </div>
                    @endif
                  @if($bathroom > 0)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-bath"></i>
                      <p>{{ $bathroom}} @if($bathroom > 1) baños @else baño @endif</p>
                    </div>
                  @endif
                  @if($listing->construction_area > 0)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-arrows-alt"></i>
                      <p>Área de Construcción: {{ $listing->construction_area}} m<sup>2</sup></p>
                    </div>
                  @endif
                  @if($listing->Front > 0)
                  <div class="col-sm-6 d-flex">
                    <i style="font-size: 20px; margin-right: 5px" class="far fa-arrow-to-top"></i>
                    <p>Frente: {{ $listing->Front }} m</p>
                  </div>
                  @endif
                  @if($listing->Fund > 0)
                  <div class="col-sm-6 d-flex">
                    <i style="font-size: 20px; margin-right: 5px" class="far fa-arrow-to-bottom"></i>
                    <p>Fondo: {{ $listing->Fund }} m</p>
                  </div>
                  @endif
                  @if ($bedroom > 0)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-bed"></i>
                      <p>{{ $bedroom}} @if($bedroom > 1) habitaciones @else habitación @endif</p>
                    </div>
                  @endif
                  @if ($garage > 0)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-car-garage"></i>
                      <p>{{ $garage }} @if($garage > 1) parqueaderos @else parqueadero @endif</p>
                    </div>
                  @endif
                </div>
              </div>
              <div style="border: none" class="card my-4">
                <div class="card-body" style="margin: -16px">
                  <h2 class="card-title text-danger h6">Descripción de la propiedad</h2>
                  <p class="card-text">{!!$listing->listing_description!!}</p>
                </div>
              </div>
              @if(is_array(json_decode($listing->heading_details)))
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h2 class="card-title text-danger pt-3 h6">Detalles</h2>
                    @foreach(json_decode($listing->heading_details) as $dets)
                      @isset($dets[0])        
                      <span class="font-weight-bold">{{$dets[0]}}</span><br>
                      @endisset
                      <div class="row" style="padding-left: 7px">
                        <?php unset($dets[0]); $printControl=0; ?>   
                        {{-- @php dd($dets); @endphp      --}}
                        {{-- @foreach($dets as $det) --}}
                        @for ($i = 1; $i < count($dets); $i++)
                          @if($printControl==0)
                            <?php $printControl=1; ?>
                            <div class="col-lg-3 col-md-4 col-6 p-1">
                              <span class="text-muted small">@foreach ($details as $detail) @if($detail->id==$dets[$i]) {{$detail->charac_titile}}  @if($detail->id==$dets[$i] && $detail->id == 86) <span class="bg-danger text-white px-2"> {{ $dets[$i+1]}}</span> @endif @endif  @endforeach</span>
                            </div>
                          @else                
                            <?php $printControl=0; ?>
                          @endif
                        @endfor
                        {{-- @endforeach     --}}
                      </div> 
                    @endforeach  
                  </div>
                </div>
              @endif     
              @if( count(array_filter(explode(",", $listing->listinglistservices)))>0 )
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h2 class="card-title text-danger h6">Servicios</h2>
                    <div class="row" style="padding-left: 7px">
                      @foreach(array_filter(explode(",", $listing->listinglistservices)) as $serv)
                        <div class="col-lg-3 col-md-4 col-6 p-1">
                          {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                          <span class="text-muted small">@foreach ($services as $service) @if($service->id==$serv) {{$service->charac_titile}} @endif  @endforeach</span>
                        </div>
                      @endforeach    
                    </div> 
                  </div>
                </div>
              @endif
              @if( count(array_filter(explode(",", $listing->listingcharacteristic)))>0 )
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h2 class="card-title text-danger h6">Beneficios</h2>
                    <div class="row" style="padding-left: 7px">
                      @foreach(array_filter(explode(",", $listing->listingcharacteristic)) as $bene)
                        <div class="col-lg-3 col-md-4 col-6 p-1">
                          {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                          <span class="text-muted small">@foreach ($benefits as $benef) @if($benef->id==$bene) {{$benef->charac_titile}} @endif  @endforeach</span>
                        </div>
                      @endforeach    
                    </div> 
                  </div>
                </div>
              @endif
              @if( count(array_filter(explode(",", $listing->listinggeneralcharacteristics)))>0 )
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h2 class="card-title text-danger h6">Características Generales</h2>
                    <div class="row" style="padding-left: 7px">
                      @foreach(array_filter(explode(",", $listing->listinggeneralcharacteristics)) as $lgc)
                        <div class="col-lg-3 col-md-4 col-6 p-1">
                          {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                          <span class="text-muted small">@foreach ($generalcharacteristics as $gc) @if($gc->id==$lgc) {{$gc->title}} @endif @if($gc->id==$lgc && $lgc == 8 && $listing->num_pisos > 0)<b class="bg-orange text-white px-1">{{$listing->num_pisos}}</b> @endif @if($gc->id==$lgc && $lgc == 7 && $listing->niv_constr > 0)<b class="bg-orange text-white px-1"> {{$listing->niv_constr}}</b> @endif @if($gc->id==$lgc && $lgc == 15 && $listing->pisos_constr > 0)<b class="bg-orange text-white px-1"> {{$listing->pisos_constr}}</b> @endif  @endforeach</span>
                        </div>
                      @endforeach    
                    </div> 
                  </div>
                </div>
              @endif
              @if( count(array_filter(explode(",", $listing->listingenvironments)))>0 )
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h2 class="card-title text-danger h6">Ambientes</h2>
                    <div class="row" style="padding-left: 7px">
                      @foreach(array_filter(explode(",", $listing->listingenvironments)) as $lenv)
                        <div class="col-lg-3 col-md-4 col-6 p-1">
                          {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                          <span class="text-muted small">@foreach ($environments as $environment) @if($environment->id==$lenv) {{$environment->title}} @endif  @endforeach</span>
                        </div>
                      @endforeach    
                    </div> 
                  </div>
                </div>
              @endif
            </div>
            <div>
              {{-- <div style="display: none" class="card my-4">
                <div id="formMsjLead" class="card-body">
                  <h6 class="card-title text-danger">SOLICITAR INFORMACION</h6> <hr>
                  <form id="formDetailProp">
                    <div class="mb-3">
                      <input id="fname" name="fname" type="text" class="form-control  form-control-sm" placeholder="Nombres y Apellidos">
                      <input type="hidden" id="interestDetail" name="interest">
                    </div>
                    <div class="mb-3">
                      <input id="tlf" name="tlf" type="text" class="form-control  form-control-sm" placeholder="Teléfono">
                    </div>
                    <div class="mb-3">
                      <input id="email" name="email" type="email" class="form-control  form-control-sm" placeholder="Email">
                    </div>
                    <div class="mb-3">
                      <input id="message" name="message" type="text" class="form-control  form-control-sm" placeholder="Mensaje">
                    </div>
                  </form>
                  <div class="mb-3">
                    <button type="button" class="btn btn-danger btn-block" onclick="sendFormDetail({{$listing->product_code}})">Enviar Mensaje</button>
                  </div>        
                </div> 
                <div id="thankMsjLead" class="card-body d-none">
                  <h6 class="card-title text-danger">¡Gracias por Contactarnos!</h6> <hr>
                  En breve le atenderemos.
                </div>
              </div>    --}}
              {{-- <div style="display: none" class="card my-4">
                <div class="card-body">
                  <h6 class="card-title text-danger">CONTÁCTANOS</h6> <hr>        
                  <div class="d-flex justify-content-center">
                      <img src="{{asset('img/1535640124.png')}}" class="rounded-circle border border-1" width="150" alt="">
                  </div>
                  <div class="d-flex justify-content-center py-2 font-weight-bold">Casa Crédito</div>
                  <div class="d-flex justify-content-center text-muted">098-384-9073</div>
                  <div class="d-flex justify-content-center text-muted">718-690-3740</div>
                  <div class="d-flex justify-content-center text-muted">ventas@casacredito.com</div>
                </div>
              </div> --}}
            </div>
          </div>
          {{-- @if($listing->video)
            <div class="text-center mb-4">
              <div>
                <video class="video" width="@if($mobile) 100% @else 40% @endif" height="@if($mobile) 100% @else 40% @endif" autoplay muted loop controls></video>
              </div>
            </div>
          @endif --}}
          @if($listing->status)
          <div class="container">
            <p class="text-center" style="font-weight: 400; font-size:20px">Compartir</p>
            <div class="d-flex justify-content-center">
              <p title="Compartir en Facebook" style="cursor: pointer" id="shareToFacebook"><i class="fab fa-facebook" style="color: #0165E1;font-size:30px"></i></p>
              {{-- <p title="Compartir en Twitter" id="shareToTwitter" style="cursor: pointer"><i class="fab fa-twitter ml-3" style="color: #1DA1F2;font-size:30px"></i></p> --}}
              <p title="Compartir por WhatsApp" id="shareToWpp" style="cursor: pointer"><i class="fab fa-whatsapp ml-3" style="color: #25D366;font-size:30px"></i></p>
            </div>
          </div>
          @endif
        </div>
      </div>
      
      {{-- aqui --}}
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
        {{-- @if($listing->video)
        <div class="mt-3">
          <video class="shadow rounded video" width="100%" height="100%" autoplay muted loop controls></video>
        </div>
        @endif --}}
        <div class="divEmail d-flex justify-content-center" style="margin-top: @if($mobile) 0%; @else 5%; @endif">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-12">
              <div class="formEmail rounded">
                <div style="padding-top: 20px; padding-left: 15px; padding-right: 15px; padding-bottom: 15px;">
                  <p style="font-weight: 500">Quiero más información de esta propiedad</p>
                  <form action="{{ route('web.sendlead') }}" method="POST" id="formDetailProp" class="inputs">
                    @csrf
                  <div class="mb-3 d-flex">
                    <input style="font-size: 12px" type="text" class="form-control mr-1" id="fname" name="fname" placeholder="Nombre">
                    <input style="font-size: 12px" type="text" class="form-control mr-1" id="flastname" name="flastname" placeholder="Apellido">
                    <input type="hidden" id="interestDetail" name="interest">
                  </div>
                  <div class="mb-3">
                    <input style="font-size: 12px" type="text" class="form-control" id="tlf" name="tlf" placeholder="Teléfono">
                  </div>
                  <div class="mb-3">
                    <input style="font-size: 12px" type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="mb-3">
                    <textarea class="form-control" name="message" id="message" rows="4">Hola, me interesa este inmueble y quiero que me contacten. Gracias</textarea>
                  </div>
                  <div class="d-grid gap-2">
                    <button id="btnEnviar" type="button" class="btn btn-block mb-1"  onclick="sendFormDetail({{$listing->product_code}}, event)">Enviar</button>
                    <a id="btnWhatsapp" target="_blank" class="btn btn-block" href="https://wa.me/+593983849073/?text=Me interesa esta propiedad con código: {{ $listing->product_code}}">Contactar por Whatsapp <i id="iconwpp" class="fab fa-whatsapp"></i></a>
                  </div>
                </form>
                  <p id="textoCondicionesEmail">Al enviar está aceptando los términos de Uso y la Política de privacidad</p>
                </div>
              </div>
              <div id="thankMsjLead" class="card-body d-none my-2">
                <p class="card-title text-danger h6">¡Gracias por Contactarnos!</p> <hr>
                En breve le atenderemos.
              </div>
            </div>
            {{-- <div class="col-12 mt-3">
              <button type="button" class="btn btn-block" style="background-color: #dc3545; color: #ffffff" data-toggle="modal" data-target="#exampleModal">
                Calcular Monto <i class="fal fa-usd-circle"></i>
              </button>
            </div> --}}

            {{-- calcular credito --}}
            {{-- @if(!$mobile)
              @if($listing->listingtypestatus != "alquilar")
              <div class="container mt-3">
                <div class="border rounded py-3">
                  <p class="text-center text-muted mt-2">Calcule su crédito</p>
                  <div>
                    <div class="d-flex">
                      <input class="form-control ml-3 mr-1" id="valuecred" type="number" value="{{$listing->property_price*0.70}}" placeholder="$ Monto">
                      <select class="form-select mr-3 ml-1" id="anios">
                        <option value="">Años</option>
                        @for ($i = 5; $i < 21; $i++)
                        <option value="{{$values[$i]}}" @if($i==20) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                    </div>
                    <div class="text-center py-3">
                      <button class="btn btn-danger" onclick="calcularcredito()">Calcular</button>
                    </div>
                    <div class="text-center">
                      <p>*Precio Referencial Aproximado:</p>
                      <label class="font-weight-normal" style="font-size: 20px" id="totalcred"></label>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endif --}}

            @if($user->profile_photo_path != null && $user->status == 1)
            
            <div class="container">
              <div class="text-center border px-3 mt-3 rounded py-3 card-asesor">
                <img class="rounded-circle img-profile" width="170px" height="170px" src="{{asset('uploads/profiles/'.$user->profile_photo_path)}}" alt="Imagen de perfil">
                <p class="mt-3 mb-0" style="font-weight: 200">{{$user->name}}</p>
                <p class="font-weight-normal m-0" style="font-size: small">@if($user->role == "ASESOR") Asesor Inmobiliario @else Gestor Inmobiliario @endif</p> 
                <hr>
                <div class="row">
                  <div class="col-sm-4 col-4">
                    <a href="tel:+593983849073">
                      <i class="fas fa-phone-alt text-light p-2 rounded-circle icon-phone border border-white" style="background-color: #242B40"></i>
                    </a>
                  </div>
                  <div class="col-sm-4 col-4">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *{{$listing->product_code}}* - *{{$listing->listing_title}}* y deseo que me contacten. Gracias 😊%0A{{url()->current()}}">
                      <i class="fab fa-whatsapp text-light p-2 rounded-circle border border-white" style="background-color: #242B40"></i>
                    </a>
                  </div>
                  <div class="col-sm-4 col-4">
                    <a href="mailto:ventas@casacredito.com">
                      <i class="fas fa-envelope text-light p-2 rounded-circle border border-white" style="background-color: #242B40"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endif

            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-12">
              <div class="mt-3" style="position: relative">
                <img width="100%" height="100%" style="filter: brightness(50%); border-radius: 12px" class="img-fluid lazyLoad imgprojects" data-src="{{ asset('img/toscana.webp') }}" alt="">
                <div class="text-center" style="position: absolute; top: 0; left: 0; color: #ffffff; margin: 12px">
                  <p style="font-weight: 600">Conozca los proyectos de vivienda en Cuenca</p>
                </div>
                <div style="position: absolute; bottom: 0; width: 100%;">
                  <a class="btn btn-sm btn-warning btn-block" style="width: 90%; margin-left: 16px; margin-bottom: 10px" href="https://casacreditopromotora.com/proyectos">Ver proyectos</a>
                </div>
              </div>
            </div>
            
          </div>
          {{-- <div id="carouselProyectos" class="carousel slide mt-3" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" style="position: relative">
                <img class="d-block w-100" style="filter: brightness(70%)" src="{{ asset('img/adra.webp') }}" alt="First slide">
                <div class="text-center" style="position: absolute; top: 0; left: 0; color: #ffffff">
                  <p>Conoce los proyectos de vivienda en Cuenca</p>
                </div>
                <div style="position: absolute; bottom: 0; width: 100%;" class="text-center">
                  <a class="btn btn-sm btn-warning btn-block" href="#">Ver proyectos</a>
                </div>
              </div>
              <div class="carousel-item" style="position: relative">
                <img class="d-block w-100" style="filter: brightness(70%)" src="{{ asset('img/toscana.webp') }}" alt="Second slide">
                <div style="position: absolute; top: 0; left: 0; color: #ffffff">
                  <p>Conoce los proyectos de vivienda en Cuenca</p>
                </div>
              </div>
              <div class="carousel-item" style="position: relative">
                <img class="d-block w-100" style="filter: brightness(70%)" src="{{ asset('img/futuranarancay.webp') }}" alt="Third slide">
                <div style="position: absolute; top: 0; left: 0; color: #ffffff">
                  <p>Conoce los proyectos de vivienda en Cuenca</p>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </div>

      @php
          $listingsSimilar = \App\Models\Listing::select('listing_title', 'images', 'property_price', 'heading_details', 'city', 'state', 'country', 'slug', 'listingtype')->where('city', $listing->city)->where('status', 1)->where('listingtype', $listing->listingtype)->inRandomOrder()->limit(4)->get();
      @endphp

      @if(count($listingsSimilar)>0)
      <div class="row mt-5 justify-content-center" data-aos="zoom-in">
        <h3 class="text-center mb-5 h5">Propiedades similares</h3>
        <p>Más {{ $listingtype->type_title }}@if($listing->listingtypestatus == "en-venta") en venta @elseif($listing->listingtypestatus == "alquilar") en renta @else en proyectos @endif en {{ $listing->city }} </p>
        @foreach ($listingsSimilar as $listing_s)
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-2 d-flex justify-content-center text-center">
          <a style="text-decoration: none; color: #000000" href="{{ route('web.detail', $listing_s->slug) }}">
            <div data-aos="zoom-in" class="card cardsimilarlisting" style="width: 18rem;">
              @php
                  $imageVerification = asset('uploads/listing/thumb/600'. strtok($listing_s->images, '|'));
              @endphp
              <img class="card-img-top lazyLoad" width="100%" height="100%" data-src="@if(file_exists($imageVerification)) {{asset('uploads/listing/thumb/600/'. strtok($listing_s->images, '|')) }} @else {{ asset('uploads/listing/600/'. strtok($listing_s->images, '|')) }} @endif" alt="{{ $listing_s->listing_title}}">
              <div class="card-body">
                <p style="margin: 0px" class="card-title h5">${{ number_format($listing_s->property_price) }}</p>
                @php
                  $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
                  $bathroom=0;$garage=0;$squarefit=0;
                  if(!empty($listing_s->heading_details)){
                    $allheadingdeatils=json_decode($listing_s->heading_details); 
                    foreach($allheadingdeatils as $singleedetails){ 
                      unset($singleedetails[0]);								
                      for($i=1;$i<=count($singleedetails);$i++){ 
                        if($i%2==0){  
                          if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49) $bedroom+=$singleedetails[$i];
                          if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81 || $singleedetails[$i-1]==49) $bathroom+=$singleedetails[$i];
                          if($singleedetails[$i-1]==43) $garage+=$singleedetails[$i];									  
                        }								   
                      }								
                    $i++;
                    }
                  }
                @endphp
                @if ($bedroom > 0 || $bathroom > 0)
                <p style="font-size: 15px; margin: 0px" class="card-text">@if($bedroom > 0){{ $bedroom }} @if($bedroom > 1) habitaciones @else habitación @endif @endif @if($bathroom > 0) {{ $bathroom }} @if($bathroom > 1) baños @else baño @endif @endif</p>
                @endif
                <p style="font-size: 15px; margin: 0px" class="card-text">@isset($listing_s->country) {{ $listing_s->country }} | @endisset {{ $listing_s->state }} | {{ $listing_s->city }}</p>
              </div>
            </div>
          </a>
          </div>
          @endforeach
      </div>
      @endif

        </div>
        {{-- @if(isset($mobile) && $mobile==true)
          <div style="width: 200px; position: fixed; bottom: 10px; right: 25px; height: 60px;">
            <button class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#modalContact" 
            style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informaci&oacute;n</button>
          </div>
        @endif --}}
      </div>

      @if($mobile)
        @if($listing->listingtypestatus != "alquilar")
        <div id="calcularcredmobile" class="bg-danger p-2 w-100">
          <div class="position-absolute px-2" style="top: -15px; left: -5px" onclick="this.parentElement.style.display = 'none';">
            <i class="fas fa-times-circle bg-light rounded-circle" style="font-size: 20px"></i>
          </div>
          <label class="text-light mb-2" style="font-size: 14px;"><i class="fas fa-money-check-edit-alt"></i> Calcule su crédito</label>
          <div class="d-flex input-group input-group-sm">
            <input id="valuecred" type="number" class="w-25 mr-1 rounded bg-light border border-light" placeholder="$ Monto" value="{{$listing->property_price*0.70}}">
            <select id="anios" class="rounded bg-light border border-light">
              <option value="">Años</option>
              @for ($i = 5; $i < 21; $i++)
                  <option value="{{$values[$i]}}" @if($i == 20) selected @endif>{{$i}} años</option>
              @endfor
            </select>
            <button onclick="calcularcredito()" class="btn btn-danger border border-light ml-1">Calcular</button>
            <div class="d-flex align-items-center ml-2 text-light">
              <label style="font-size: 20px">= <b id="totalcred" class="font-weight-bold"></b></label>
            </div>
          </div>
        </div>
        @endif
      @endif

      {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center" style="border: none; background-color: #dc3545; color: #ffffff">
              <h5 class="modal-title text-center" id="exampleModalLabel">Calcular Monto <i class="fal fa-usd-circle"></i></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                <div class="form-group">
                  <label for="price">Precio de la propiedad:</label>
                  <input type="text" name="price" id="price" class="form-control" value="{{ $listing->property_price }}" disabled>
                </div>
                <div class="form-group">
                  <label for="entrada">Entrada mínima:</label>
                  <input type="text" name="entrada" id="entrada" class="form-control">
                </div>
                <div class="d-flex mt-2">
                  <div class="form-group mr-1">
                    <label for="anios">Plazo en años:</label>
                    <input type="number" name="anios" id="anios" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="anios">Interés:</label>
                    <input type="number" name="anios" id="anios" class="form-control">
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn mt-2" style="background-color: #dc3545; color: #ffffff" onclick="calcular();">Calcular</button>
                </div>
                <div id="divtotal" class="form-group mt-2 text-center" style="display: none">
                  <label for="total" style="font-size: 20px">Su total es:</label>
                  <p id="total" style="font-weight: 500"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

<!-- Video Modal -->
<div class="modal fade" id="video_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body border-0 text-center position-relative">
        <video oncontextmenu="return false;" class="video img-fluid" autoplay muted loop controls controlslist="nodownload"></video>
        <button type="button" class="btn btn-danger rounded-pill text-center position-absolute" style="top: 0px; right: 6px" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    function calcularcredito(){
      let value = document.getElementById('valuecred');
      let anios = document.getElementById('anios');
      if(value && anios){
        // let value = document.getElementById('valuecred').value;
        // let anios = document.getElementById('anios').value;
        value = value.value;
        anios = anios.value;
        if(value != "" && anios != ""){
          if(value < {{$listing->property_price*0.30}}){
            alert('El monto solicitado no puede ser menor al 30% del valor de la propiedad');
          } else {
            let total = value * anios / 100;
            let validate = total.toString().includes('.');
            if(!validate) total = total + ".00";
            document.getElementById('totalcred').innerHTML = "$"+total;
            document.getElementById('totalinfo').innerHTML = "$"+total;
          }
        } else {
          alert('Por favor, complete los campos')
        }
      }
    }

    calcularcredito();

    function setsrcvideo(){
      let video = document.querySelector('.video');
      if(video) video.src = "{{asset('uploads/video/'.$listing->video)}}";
    }

    setTimeout(() => {
      setsrcvideo();
    }, 3000);
    //     var myCarousel = document.querySelector('#carouselControls');
    //     var carousel = new bootstrap.Carousel(myCarousel);
    
    // var selectPhoto = (nro) => {
    //     carousel.to(nro)
    // };

    // const options2 = { style: 'currency', currency: 'USD' };
    // const numberFormat2 = new Intl.NumberFormat('en-US', options2);


    // function getMinEntrada(){
    //   let precio = parseInt(document.getElementById('price').value);
    //   let entrada = precio * 0.3;

    //   document.getElementById('entrada').value = entrada;
    //   return entrada;
    // }

    // function calcular(){
    //   let plazo_anios = document.getElementById('anios').value;
    //   if(plazo_anios != ""){
    //     let entrada = parseInt(document.getElementById('entrada').value);
    //     let precio = document.getElementById('price').value;
  
    //     if(entrada < getMinEntrada()){
    //       alert('La entrada no puede ser menor a ' + getMinEntrada())
    //     } else {
    //       let valor = precio - entrada;
    //       let total = valor/plazo_anios;

    //       total = currencyFormat(total);
  
    //       document.getElementById('total').innerHTML = total;
    //       document.getElementById('divtotal').style.display = 'block';
    //     }
    //   }else{
    //     alert("El campo 'Plazo en años' esta vacio");
    //   }
    // }

    // function currencyFormat(num) {
    //   return "$" + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    // }

    // getMinEntrada();

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
    var targets = document.querySelectorAll('.lazyLoad');
    // Instanciamos un nuevo observador.
    var observer = new IntersectionObserver(onScrollEvent);
    // Y se lo aplicamos a cada una de las
    // imágenes.
    targets.forEach(function(entry) {
        observer.observe(entry);
    });

    //compartir propiedad
    let shareLink = window.location.href;
    document.getElementById('shareToFacebook').addEventListener('click', () => {window.open('https://www.facebook.com/sharer/sharer.php?u=' + shareLink, 'facebook-share-dialog', 'width=626, height=436');});
    //document.getElementById('shareToTwitter').addEventListener('click', () => {window.open('https://twitter.com/intent/tweet?url='+shareLink)});
    document.getElementById('shareToWpp').addEventListener('click', () => {window.open('https://api.whatsapp.com/send?text='+shareLink, '_blank')});

    const addactive = (id) => {
      let images = document.querySelectorAll('.active');
      images.forEach(element => { element.classList.remove('active'); });
      let image = document.getElementById('img_'+id);
      image.classList.add('active');
    }

</script>
@endsection
