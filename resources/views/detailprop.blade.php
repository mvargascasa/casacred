@extends('layouts.web')
@section('header')
<title>{{$listing->product_code}} {{$listing->listing_title}} - CasaCredito</title>
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
<meta name="description" content="{{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}..."/>
<meta name="keywords" content="Casas en venta en cuenca ecuador, Apartamentos en venta en cuenca ecuador, terrenos en venta en cuenca ecuador, lotes en venta en cuenca ecuador, {{ $type->type_title }} en {{ $status }} en {{ strtolower($listing->city . " " . $listing->state) }}">

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
@media (min-width: 576px) {  .ccimgpro{max-height:250px ;}  }

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
.formEmail{
  background-color: rgb(244, 247, 248);
}
.inputs input, .inputs textarea{
        font-size: 13px;
      }

      .inputs #btnEnviar{
        background-color: rgb(224, 81, 78);
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
</style>
@endsection

@section('content')
  <div class="container">
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
          <div class="col-sm-5 d-flex">
            <div onclick="history.back();" class="d-flex" style="cursor: pointer">
              <i style="margin-top: 10px; margin-right: 10px" class="fal fa-angle-left"></i><p style="margin-top: 6px; margin-right: 10px">Regresar</p>
            </div>
            <form action="{{ route('web.propiedades') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" id="ftop_txt" name="searchtxt" class="form-control" placeholder="Buscar por dirección, ciudad" aria-label="Recipient's username" aria-describedby="basic-addon2" value="{{ $listing->city }}, {{ $listing->state }}">
                <button class="btn" type="submit" style="background-color: #dc3545; color: #ffffff" class="input-group-text" id="basic-addon2"><i class="fal fa-search"></i></button>
              </div>
            </form>
          </div>
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
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          @php $iiListing=0 @endphp
                          @foreach (array_filter(explode("|", $listing->images)) as $img)
                            <div class="carousel-item @if($iiListing==0) active @endif" data-slide-number="{{ $iiListing }}">
                              <img style="width: 100%; height: 100%" data-src="{{ url('uploads/listing', $img) }}" class="d-block w-100 ccimgpro lazyLoad" alt="..." data-slide-to="{{ $iiListing }}" style="object-fit: contain" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                            </div>
                          @endforeach
                        </div>
                      </div>

                      @php
                        $arrayImages = [];
                        foreach (array_filter(explode("|", $listing->images)) as $img){
                          array_push($arrayImages, $img);
                        }
                      @endphp

                      <div id="carousel-thumbs" class="carousel slide mt-2" data-ride="carousel" style="margin-left: -20px; margin-right: -20px">
                        <div class="carousel-inner justify-content-center">
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
                                    <img style="width: 100%;" data-src="{{ url('uploads/listing/300/', $arrayImages[$i]) }}" class="img-fluid lazyLoad" alt="{{$listing->listing_title}}-{{ $i}}">     
                                  @endisset
                                </div>   
                              @endfor
                            </div>
                          </div>

                          @if(count($arrayImages) > 6)
                          <div class="carousel-item">
                            <div class="row mx-0">
                              @for ($i = 6; $i < 12; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%;" data-src="{{ url('uploads/listing/300/', $arrayImages[$i]) }}" class="img-fluid lazyLoad" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div> 
                          @endif

                          @if(count($arrayImages) > 12)
                          <div class="carousel-item">
                            <div class="row mx-0">
                              @for ($i = 12; $i < 18; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%;" data-src="{{ url('uploads/listing/300/', $arrayImages[$i]) }}" class="img-fluid lazyLoad" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div>
                          @endif

                          @if(count($arrayImages) > 18)
                          <div class="carousel-item">
                            <div class="row mx-0">
                              @for ($i = 18; $i < 24; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%;" data-src="{{ url('uploads/listing/300/', $arrayImages[$i]) }}" class="img-fluid lazyLoad" alt="{{$listing->listing_title}}-{{$i}}">  
                                  @endisset
                                </div>
                              @endfor
                            </div>
                          </div>
                          @endif

                          @if(count($arrayImages) > 24)
                          <div class="carousel-item">
                            <div class="row mx-0">
                              @for ($i = 24; $i < 30; $i++)
                                <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-slide-to="{{$i}}" data-target="#myCarousel">
                                  @isset($arrayImages[$i])
                                    <img style="width: 100%;" data-src="{{ url('uploads/listing/300/', $arrayImages[$i]) }}" class="img-fluid lazyLoad" alt="{{$listing->listing_title}}-{{$i}}">  
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
                      </div>
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
          <div><h5 class="font-weight-bold pt-4">COD: {{$listing->product_code}}</h5></div>
            <button type="button" class="btn btn-danger btn-block btn-lg py-2 font-weight-bold">PRECIO: ${{number_format($listing->property_price)}}</button>
            <h6 class="pt-4">Datos Principales</h6> 
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
            @isset ($listing->listyears)
              @php
                $years_construction = DB::table('listing_years')->select('description')->where('id', $listing->listyears)->get();
              @endphp
              <div class="pb-2 d-flex">
                <p class="pt-1"><b style="font-weight: 500">Años de construcción:</b> <br> {{ $years_construction[0]->description }}</p>
              </div>
            @endisset  
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
              <div class="row">
                <div class="col-7 col-sm-9">
                  <p style="margin: 0px; color: #dc3545; font-size: 20px; font-weight: 600;">PRECIO: ${{ number_format($listing->property_price) }}</p>
                </div>
                <div class="col-5 col-sm-3 d-flex justify-content-end">
                  <label style="background-color: #dc3545; color: #ffffff; border-radius: 5px;padding: 5px; font-weight: 600">CÓDIGO: {{ $listing->product_code }}</label>
                </div>
              </div>
              @php
                  $listingtype = DB::table('listing_types')->where('id', $listing->listingtype)->first();
              @endphp
              <div class="mt-2">
                <label style="background-color: #f9a322; color: #ffffff; padding-left: 3px; padding-right: 3px; border-radius: 5px; font-weight: 500; font-size: 13px">{{ $listingtype->type_title}}</label>
                <label style="background-color: #dc3545; color: #ffffff; padding-left: 3px; padding-right: 3px; border-radius: 5px; font-weight: 500; font-size: 13px">@if($listing->listingtypestatus == "en-venta") Venta @elseif($listing->listingtypestatus == "alquilar") Alquilar @else Proyectos @endif</label>
              </div>
              <div class="mt-2">
                <h6 style="font-weight: 500">{{$listing->listing_title}}</h6>
                <p style="font-weight: 400"><i style="color: #dc3545" class="fas fa-map-marker-alt"></i> Sector: {{$listing->address}}</p>
              </div>
              <div>
                <div class="row">
                  @isset($listing->land_area)
                      <div class="col-sm-6 d-flex">
                        <i style="font-size: 20px; margin-right: 5px" class="far fa-ruler-combined"></i>
                        <p>Área Interior: {{ $listing->land_area}} m<sup>2</sup></p>
                      </div>
                  @endisset
                  @if($bathroom > 0)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-bath"></i>
                      <p>{{ $bathroom}} @if($bathroom > 1) baños @else baño @endif</p>
                    </div>
                  @endif
                  @isset($listing->construction_area)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-arrows-alt"></i>
                      <p>Área Total: {{ $listing->construction_area}} m<sup>2</sup></p>
                    </div>
                  @endisset
                  @if ($bedroom > 0)
                    <div class="col-sm-6 d-flex">
                      <i style="font-size: 20px; margin-right: 5px" class="fas fa-bath"></i>
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
                  <h6 class="card-title text-danger">Descripción de la propiedad</h6>
                  <p class="card-text">{!!$listing->listing_description!!}</p>
                </div>
              </div>
              @if(is_array(json_decode($listing->heading_details)))
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h6 class="card-title text-danger pt-3">Detalles</h6>
                    @foreach(json_decode($listing->heading_details) as $dets)
                      @isset($dets[0])        
                      <span class="font-weight-bold">{{$dets[0]}}</span><br>
                      @endisset
                      <div class="row" style="padding-left: 7px">
                        <?php unset($dets[0]); $printControl=0; ?>        
                        @foreach($dets as $det)
                          @if($printControl==0)
                            <?php $printControl=1; ?>                          
                            <div class="col-lg-3 col-md-4 col-6 p-1">
                              {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                              <span class="text-muted small">@foreach ($details as $detail) @if($detail->id==$det) {{$detail->charac_titile}} @endif  @endforeach</span>
                            </div>
                          @else                
                            <?php $printControl=0; ?>      
                          @endif
                        @endforeach    
                      </div> 
                    @endforeach  
                  </div>
                </div>
              @endif     
              @if( count(array_filter(explode(",", $listing->listinglistservices)))>0 )
                <div style="border: none" class="card my-4">
                  <div class="card-body" style="margin: -16px">
                    <h6 class="card-title text-danger">Servicios</h6>
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
                    <h6 class="card-title text-danger">Beneficios</h6>
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
        </div>
      </div>
      
      {{-- aqui --}}
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3">
        <div class="divEmail d-flex justify-content-center" style="margin-top: @if($mobile) 0%; @else 22%; @endif">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-12">
              <div class=" formEmail rounded">
                <div style="padding-top: 20px; padding-left: 15px; padding-right: 15px; padding-bottom: 15px;">
                  <p style="font-weight: 500">Quiero más información de esta propiedad</p>
                  <form id="formDetailProp" class="inputs">
                  <div class="mb-3 d-flex">
                    <input style="font-size: 12px" type="text" class="form-control mr-1" id="fname" name="fname" placeholder="Nombre y Apellido">
                    <input type="hidden" id="interestDetail" name="interest">
                    <input style="font-size: 12px" type="text" class="form-control" id="tlf" name="tlf" placeholder="Teléfono">
                  </div>
                  <div class="mb-3">
                    <input style="font-size: 12px" type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="mb-3">
                    <textarea class="form-control" name="message" id="message" rows="4">Hola, me interesa este inmueble y quiero que me contacten. Gracias</textarea>
                  </div>
                  <div class="d-grid gap-2">
                    <button id="btnEnviar" type="button" class="btn btn-block mb-1"  onclick="sendFormDetail({{$listing->product_code}})">Enviar</button>
                    <a id="btnWhatsapp" target="_blank" class="btn btn-block" href="https://wa.me/+593983849073/?text=Me interesa esta propiedad con código: {{ $listing->product_code}}">Contactar por Whatsapp <i id="iconwpp" class="fab fa-whatsapp"></i></a>
                  </div>
                </form>
                  <p id="textoCondicionesEmail">Al enviar está aceptando los términos de Uso y la Política de privacidad</p>
                </div>
              </div>
              <div id="thankMsjLead" class="card-body d-none">
                <h6 class="card-title text-danger">¡Gracias por Contactarnos!</h6> <hr>
                En breve le atenderemos.
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-12">
              <div class="mt-3" style="position: relative">
                <img width="100%" height="100%" style="filter: brightness(50%); border-radius: 12px" class="img-fluid lazyLoad" data-src="{{ asset('img/toscana.webp') }}" alt="">
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
      <div class="row mt-5 justify-content-center" data-aos="zoom-in">
        <h5 class="text-center mb-5">Propiedades similares</h5>
        @foreach ($listingsSimilar as $listing_s)
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-2 d-flex justify-content-center text-center">
          <a style="text-decoration: none; color: #000000" href="{{ route('web.detail', $listing_s->slug) }}">
            <div data-aos="zoom-in" class="card cardsimilarlisting" style="width: 18rem;">
              <img class="card-img-top lazyLoad" width="100%" height="100%" data-src="{{ asset('uploads/listing/600/'. strtok($listing_s->images, '|')) }}" alt="{{ $listing_s->listing_title}}">
              <div class="card-body">
                <h5 style="margin: 0px" class="card-title">${{ number_format($listing_s->property_price) }}</h5>
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

        </div>
        {{-- @if(isset($mobile) && $mobile==true)
          <div style="width: 200px; position: fixed; bottom: 10px; right: 25px; height: 60px;">
            <button class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#modalContact" 
            style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informaci&oacute;n</button>
          </div>
        @endif --}}
      </div>
@endsection

@section('script')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    //     var myCarousel = document.querySelector('#carouselControls');
    //     var carousel = new bootstrap.Carousel(myCarousel);
    
    // var selectPhoto = (nro) => {
    //     carousel.to(nro)
    // };

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

</script>
@endsection
