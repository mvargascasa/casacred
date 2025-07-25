@extends('layouts.dashtw')

@section('firstscript')
    <title>Propiedad COD:{{ $propertie->product_code }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  

    <style>
      @media (min-width: 576px) {  .ccimgpro{max-height:250px ;}  }
      /* Medium devices (tablets, 768px and up)*/
      @media (min-width: 768px) { .ccimgpro{max-height:350px ;}  }
      /* Large devices (desktops, 992px and up)*/
      @media (min-width: 992px) { .ccimgpro{max-height:550px ;}  }
      .carousel-control-prev-icon {background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;}
      .carousel-control-next-icon {background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;}
      #carousel-thumbs {background: rgba(255,255,255,.3);bottom: 0;left: 0;padding: 0 50px;right: 0;}
      #carousel-thumbs img {border: 5px solid transparent;cursor: pointer;}
      #carousel-thumbs img:hover {border-color: rgba(255,255,255,.3);}
      #carousel-thumbs .selected img {border-color: #fff;}
      .carousel-control-prev, .carousel-control-next {width: 50px;}
      .modal {transition: opacity 0.25s ease;}
      body.modal-active {overflow-x: hidden;overflow-y: visible !important;}
      #map{width: 100%; height: 100%}
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

@endsection

@section('content')

@php
  $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
	$bathroom=0;$garage=0;$squarefit=0;
  $departments=0;
	if(!empty($propertie->heading_details)){
	  $allheadingdeatils=json_decode($propertie->heading_details); 
    foreach($allheadingdeatils as $singleedetails){ 
			unset($singleedetails[0]);								
      for($i=1;$i<=count($singleedetails);$i++){ 
      if($i%2==0){  
        if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49 || $singleedetails[$i-1]==115) $bedroom+=$singleedetails[$i];
        if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81 || $singleedetails[$i-1]==49) $bathroom+=$singleedetails[$i];
        if($singleedetails[$i-1]==43) $garage+=$singleedetails[$i];	
        if($singleedetails[$i-1]==109 || $singleedetails[$i-1]==110 || $singleedetails[$i-1]==111) $departments+=$singleedetails[$i];								  
      }								   
    }								
	$i++;
	}
  }
@endphp

<div class="container overflow-scroll mt-3 pb-3 relative">

  @if(session('status'))
  <div id="alert" class="absolute top-0 right-0 z-10">
    <div class="@if(session('status') == true) bg-green-400 @else bg-red-400 @endif rounded p-2 mb-3 font-semibold inline-flex">
      <p>
        @if(session('status')==true)<i class="fas fa-check"></i> Se ha enviado el correo @else <i class="fas fa-exclamation-circle"></i> Hubo un error al enviar el correo @endif
      </p>
      <i style="cursor: pointer" onclick="document.getElementById('alert').classList.add('hidden')" class="far fa-times-circle ml-2"></i>
    </div>
  </div>
  @endif

  <section class="row">
    <div class="col-sm-8">
      <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
          <section class="d-flex justify-content-between mb-3">
            @if(Auth::user()->email == "seo@casacredito.com" || Auth::user()->email == "info@casacredito.com" || Auth::user()->email == "developer2@casacredito.com" || Auth::user()->email == "marketing@casacredito.com")
            <div class="mb-2">
              <div>
                <form action="{{route('home.user.watermark')}}" method="POST">
                  @csrf
                  <input type="hidden" name="watermark" value="{{$propertie->id}}">
                  <button type="submit">
                    @if(Auth::user()->watermark)
                    <i class="far fa-eye"></i>
                    @else
                    <i class="far fa-eye-slash"></i>
                    @endif
                  </button>
                </form>
              </div>
            </div>
            @endif
  
            <div>
              <a class="btn btn-success rounded-pill btn-sm" href="{{ route('download.images', $propertie->id) }}"><i class="fas fa-download"></i>Download Images</a>
            </div>
          </section>
          
          @php
            //$propertie->images != null ? $imageVerification = file_exists(asset('uploads/listing/thumb/600/'.explode('|', $propertie->images)[0])) : $imageVerification = null;
            if($propertie->images != null){
              if(file_exists(asset('uploads/listing/thumb/600/'.explode('|', $propertie->images)[0]))){
                $imageVerification = true;
              } else {
                $imageVerification = null;
              }
            }   
          @endphp
          
          @if ($propertie->images != null)
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                @php $iiListing=0 @endphp
                  @foreach (array_filter(explode("|", $propertie->images)) as $img)
                    <div class="carousel-item @if($iiListing==0) active @endif" data-slide-number="{{ $iiListing }}">
                      <img style="width: 100%; height: 100%" data-src="@if($imageVerification && !Auth::user()->watermark){{asset('uploads/listing/thumb/'.$img)}} @else {{asset('uploads/listing/'.$img)}} @endif" class="d-block w-100 ccimgpro lazy" alt="{{ $img }}" data-slide-to="{{ $iiListing }}" style="object-fit: contain" alt="{{$propertie->listing_title}}-{{$iiListing++}}">
                    </div>
                  @endforeach
              </div>
              <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          @else
            <div class="flex items-center content-center justify-center p-3">
              <p class="text-red-600 text-lg font-semibold">No hemos encontrado imágenes para esta propiedad</p>
            </div>
          @endif
          
          @php
            $arrayImages = [];
            foreach (array_filter(explode("|", $propertie->images)) as $img){
              array_push($arrayImages, $img);
            }
          @endphp
    
          <div id="carousel-thumbs" class="carousel slide mt-2" data-bs-ride="carousel" style="margin-left: -20px; margin-right: -20px">
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
                    <div id="carousel-selector-{{ $i }}" class="thumb col-2 col-sm-2 px-0 selected" data-bs-slide-to="{{$i}}" data-bs-target="#myCarousel">
                      @isset($arrayImages[$i])
                        <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email == "seo@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{ $i}}">     
                      @endisset
                    </div>   
                  @endfor
                </div>
              </div>
    
              @if(count($arrayImages) > 6)
              <div class="carousel-item">
                <div class="row mx-0 justify-content-center">
                  @for ($i = 6; $i < 12; $i++)
                    <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-bs-slide-to="{{$i}}" data-bs-target="#myCarousel">
                      @isset($arrayImages[$i])
                        <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email == "seo@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
                    <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-bs-slide-to="{{$i}}" data-bs-target="#myCarousel">
                      @isset($arrayImages[$i])
                        <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email == "seo@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
                    <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-bs-slide-to="{{$i}}" data-bs-target="#myCarousel">
                      @isset($arrayImages[$i])
                        <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email == "seo@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
                    <div id="carousel-selector-{{$i}}" class="thumb col-2 col-sm-2 px-0 selected" data-bs-slide-to="{{$i}}" data-bs-target="#myCarousel">
                      @isset($arrayImages[$i])
                        <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email == "seo@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
                        @endisset
                    </div>
                  @endfor
                </div>
              </div>
              @endif
    
            </div>
    
            @if(count($arrayImages) > 6)
            <a class="carousel-control-prev" href="#carousel-thumbs" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-thumbs" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            @endif
          </div>
        </div>
      </div>
    
      @php
          $user = \App\Models\User::where('id', $propertie->user_id)->first();
      @endphp
    
      <div class="row d-flex justify-content-center mt-3">
        <div class="col-sm-12">
          {{-- @if($user)
          <div class="border rounded p-1">
            <h6 class="text-muted mb-1"><i class="fas fa-info-circle"></i> Subido por <b>{{$user->name}}</b> el <b>{{$propertie->created_at->format('d-M-y')}}</b></h6>
          </div>
          @endif --}}
          <div class="mt-3">
            <h3 style="font-weight: 500" class="mt-2 mb-2">{{ $propertie->listing_title }}</h3>
            @php
              $listingtype = DB::table('listing_types')->where('id', $propertie->listingtype)->first();
            @endphp
            <div>
              <label style="background-color: #f9a322; color: #ffffff; padding-left: 3px; padding-right: 3px; border-radius: 5px; font-weight: 500; font-size: 13px">{{ $listingtype->type_title}}</label>
              <label style="background-color: #dc3545; color: #ffffff; padding-left: 3px; padding-right: 3px; border-radius: 5px; font-weight: 500; font-size: 13px">@if($propertie->listingtypestatus == "en-venta") Venta @elseif($propertie->listingtypestatus == "alquilar") Alquilar @else Proyectos @endif</label>
            </div>
            <div class="row mt-2">
              <div class="col-sm-6">
                <div style="margin: 0px; color: #dc3545; font-size: 20px; font-weight: 700;">
                  @if($propertie->customized_price)
                    {{ $propertie->customized_price }}
                  @else
                    ${{ number_format($propertie->property_price) }}
                  @endif
                </div>
              </div>
              <div class="col-sm-6 d-flex justify-content-end">
                <label style="background-color: #dc3545; color: #ffffff; border-radius: 5px;padding: 5px; font-weight: 600">CÓDIGO: {{ $propertie->product_code }}</label>
              </div>
            </div>
            <div class="mt-2">
              <p class="d-flex fw-bold"><img style="width: 25px; height: 25px" src="{{ asset('img/ubicacion.png') }}" alt=""> Ubicación</p>
              @if(Str::contains($propertie->address, ','))
                <p class="mt-2 ml-2" style="font-weight: 400"> {{$propertie->address}}</p>
              @else
                <p class="mt-2 ml-2" style="font-weight: 400">{{ $propertie->state }}, {{$propertie->city}}@if($propertie->sector != null), {{ $propertie->sector}} @endif </p>
                <p class="text-muted fw-bold ml-2" style="font-size: small">Sector: @if($propertie->address != null && !Str::contains($propertie->address, ',')) {{ $propertie->address}} @else SIN SECTOR @endif</p>
              @endif
            </div>
            {{-- <div class="mt-4">
              <h5 style="font-weight: 500">Características:</h5>
              
            </div> --}}
          </div>
          <div style="border: none" class="card my-4">
            <div class="card-body" style="margin: -16px">
              <h6 class="card-title text-danger">Descripción de la propiedad</h6>
              <p class="card-text">{!!$propertie->listing_description!!}</p>
            </div>
          </div>
          @if(is_array(json_decode($propertie->heading_details)))
            <div style="border: none" class="card my-4">
              <div class="card-body" style="margin: -16px">
                <h6 class="card-title text-danger pt-3">Detalles</h6>
                @foreach(json_decode($propertie->heading_details) as $dets)
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
          @if( count(array_filter(explode(",", $propertie->listinglistservices)))>0 )
            <div style="border: none" class="card my-4">
              <div class="card-body" style="margin: -16px">
                <h6 class="card-title text-danger">Servicios</h6>
                <div class="row" style="padding-left: 7px">
                  @foreach(array_filter(explode(",", $propertie->listinglistservices)) as $serv)
                    <div class="col-lg-3 col-md-4 col-6 p-1">
                      {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                      <span class="text-muted small">@foreach ($services as $service) @if($service->id==$serv) {{$service->charac_titile}} @endif  @endforeach</span>
                    </div>
                  @endforeach    
                </div> 
              </div>
            </div>
          @endif
          @if( count(array_filter(explode(",", $propertie->listingcharacteristic)))>0 )
            <div style="border: none" class="card my-4">
              <div class="card-body" style="margin: -16px">
                <h6 class="card-title text-danger">Beneficios</h6>
                <div class="row" style="padding-left: 7px">
                  @foreach(array_filter(explode(",", $propertie->listingcharacteristic)) as $bene)
                    <div class="col-lg-3 col-md-4 col-6 p-1">
                      {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                      <span class="text-muted small">@foreach ($benefits as $benef) @if($benef->id==$bene) {{$benef->charac_titile}} @endif  @endforeach</span>
                    </div>
                  @endforeach    
                </div> 
              </div>
            </div>
          @endif
          @if( count(array_filter(explode(",", $propertie->listinggeneralcharacteristics)))>0 )
            <div style="border: none" class="card my-4">
              <div class="card-body" style="margin: -16px">
                <h6 class="card-title text-danger">Características Generales</h6>
                <div class="row" style="padding-left: 7px">
                  @foreach(array_filter(explode(",", $propertie->listinggeneralcharacteristics)) as $gc)
                    <div class="col-lg-3 col-md-4 col-6 p-1">
                      {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                      <span class="text-muted small">@foreach ($general_characteristics as $general_characteristic) @if($general_characteristic->id==$gc){{$general_characteristic->title}}@endif @if($general_characteristic->id==$gc && $gc == 8 && $propertie->num_pisos > 0)<b class="bg-red-800 text-white px-1">{{$propertie->num_pisos}}</b> @endif @if($general_characteristic->id==$gc && $gc == 7 && $propertie->niv_constr > 0)<b class="bg-red-800 text-white px-1"> {{$propertie->niv_constr}}</b> @endif @if($general_characteristic->id==$gc && $gc == 15 && $propertie->pisos_constr > 0)<b class="bg-red-800 text-white px-1"> {{$propertie->pisos_constr}}</b> @endif @endforeach</span>
                    </div>
                  @endforeach    
                </div> 
              </div>
            </div>
          @endif
          @if( count(array_filter(explode(",", $propertie->listingenvironments)))>0 )
            <div style="border: none" class="card my-4">
              <div class="card-body" style="margin: -16px">
                <h6 class="card-title text-danger">Ambientes</h6>
                <div class="row" style="padding-left: 7px">
                  @foreach(array_filter(explode(",", $propertie->listingenvironments)) as $le)
                    <div class="col-lg-3 col-md-4 col-6 p-1">
                      {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                      <span class="text-muted small">@foreach ($environments as $environment) @if($environment->id==$le) {{$environment->title}} @endif  @endforeach</span>
                    </div>
                  @endforeach    
                </div> 
              </div>
            </div>
          @endif
          {{-- <a target="_blank" href="{{$propertie->ubication_url}}">Ver ubicación en Google Maps</a> --}}
        </div>
      </div>
      {{-- <div class="mx-5" id="map"></div> --}}
      
    </div>
    <div class="col-sm-4">
      <div class="sticky-top">
        <div class="card border-light shadow-sm mb-3 mt-4">
          <div class="card-header text-white" style="background-color: @if($propertie->property_by == "Casa Credito") #DC3545 @elseif($propertie->property_by == "Housing") #1C2444 @elseif($propertie->property_by == "Promotora") #AC3837 @endif">Información</div>
          <div class="card-body">
            @if($user)
              <div class="row mb-2">
                <p class="text-muted m-0"><i class="fas fa-info-circle"></i> Subido por <b>{{$user->name}}</b> el <b>{{$propertie->created_at->format('d-M-y')}}</b></p>
              </div>
            @endif
            <div class="row">
              <h5 class="card-title" style="font-weight: 900">Características</h5>
              <div class="col-sm-6 mb-2">
                <p class="m-0"><span style="font-weight: 500">Tipo:</span> @if($propertie->listingtypestatus == "en-venta") Venta @elseif($propertie->listingtypestatus == "alquilar") Alquilar @else Proyectos @endif</p>
              </div>
              <div class="col-sm-6 mb-2">
                <p class="m-0"><span style="font-weight: 500">Categoría:</span> {{ $listingtype->type_title}}</p>
              </div>
              @if($propertie->land_area > 0)
                <div class="col-sm-6 d-flex mt-2">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-compress-arrows-alt"></i>
                  <p class="m-0"><span style="font-weight: 500">Área del Terreno:</span> {{ $propertie->land_area}} m<sup>2</sup></p>
                </div>
              @endif
              @if($propertie->construction_area > 0)
                <div class="col-sm-6 d-flex mt-2">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-arrows-alt"></i>
                  <p class="m-0" style="font-weight: 500">Área de Construcción: {{ $propertie->construction_area}} m<sup>2</sup></p>
                </div>
              @endif
              @if($propertie->Front > 0)
                <div class="col-sm-6 d-flex mt-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-alt"></i>
                  <p class="m-0"> <span style="font-weight: 500">Frente:</span> {{ $propertie->Front}} m<sup>2</sup></p>
                </div>
              @endif
              @if($propertie->Fund > 0)
                <div class="col-sm-6 d-flex mt-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-alt"></i>
                  <p class="m-0"> <span style="font-weight: 500">Fondo:</span> {{ $propertie->Fund}} m<sup>2</sup></p>
                </div>
              @endif
              @if ($bedroom > 0)
                <div class="col-sm-6 d-flex mt-3 mb-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-bed"></i>
                  <p>{{ $bedroom }} @if($bedroom > 1) habitaciones @else habitación @endif</p>
                </div>
              @endif
              @if($bathroom > 0)
                <div class="col-sm-6 d-flex mt-3 mb-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-bath"></i>
                  <p>{{ $bathroom}} @if($bathroom > 1) baños @else baño @endif</p>
                </div>
              @endif
              @if ($garage > 0)
                <div class="col-sm-6 d-flex mt-3 mb-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-car"></i>
                  <p>{{ $garage }} @if($garage > 1) parqueaderos @else parqueadero @endif</p>
                </div>
              @endif
              @if ($departments > 0)
                <div class="col-sm-6 d-flex mt-3 mb-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-building"></i>
                  <p>{{ $departments }} @if($departments > 1) departamentos @else departamento @endif</p>
                </div>
              @endif
            </div>
            @if($propertie->aliquot != null && $propertie->aliquot > 0)
              <div class="row mb-3">
                <h5 class="card-title fw-bold">Alicuota</h5>
                <p>${{ $propertie->aliquot }}</p>
              </div>
            @endif   

          @if($propertie->is_dual_operation)
            <div class="row mt-4">
              <div class="bg-danger rounded text-white fw-bold w-auto ml-3 py-1">
                @if($propertie->listingtypestatus == "en-venta")
                  <span>Esta propiedad también está en renta</span>
                @else
                  <span>Esta propiedad también está a la venta</span>
                @endif
              </div>
            </div>
          @endif

          </div>
          <div class="row">
          </div>
        </div>
        <div class="flex justify-center">
          @if(Auth::user()->role == 'administrator')
          <a class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" style="text-decoration: none;" href="@if($propertie->property_by == "Housing"){{ route('admin.housing.property.edit', $propertie) }} @elseif($propertie->property_by == "Promotora") {{ route('admin.promotora.property.edit', $propertie) }} @elseif($propertie->property_by == "Casa Credito") {{ route('home.tw.edit', $propertie) }} @endif">Editar</a>
          <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Historial</button>
          @endif
          <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" data-bs-toggle="modal" data-bs-target="#modalSendEmail">Compartir</button>
          <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" data-bs-toggle="modal" data-bs-target="#modalMap">Mapa</button>
        </div>

        {{-- Unidades --}}
        @if(isset($units) && count($units)>0)
          <div class="mt-3" style="height: 450px; overflow-y: auto">
            <h2 class="h3 font-weight-bold text-center py-2" style="background-color: #dc3545; color: #ffffff">Unidades del proyecto</h2>
            @foreach ($units as $unit)
            <div>
              <div class="col mt-3">
                <div class="card border rounded shadow-sm p-2">
                    <div class="card-body p-2">
                        <h6 class="card-title mb-1">{{ $unit->name }}</h6>
                        @if($unit->unit_number)
                          <strong class="text-muted d-block mb-1">Unidad #{{ $unit->unit_number ?? '-' }}</strong>
                        @endif
                        <div class="mb-1">
                            @if($unit->floor)
                              <strong>Piso:</strong> {{ $unit->floor ?? '-' }}<br>
                            @endif
                            @if($unit->area_m2)
                              <strong>Área:</strong> {{ $unit->area_m2 ?? '-' }} m²<br>
                            @endif
                            @if($unit->bedrooms)
                              <strong>Hab:</strong> {{ $unit->bedrooms ?? '-' }} <br>
                            @endif
                            @if($unit->bathrooms)
                              <strong>Baños:</strong> {{ $unit->bathrooms ?? '-' }}<br>
                            @endif
                            @if($unit->price)
                              <strong>Precio:</strong> ${{ number_format($unit->price ?? 0, 2) }}
                            @endif
                        </div>
                        @if($unit->description)
                          <div>
                            <strong>Detalles:</strong>
                            <p>{{ $unit->description }}</p>
                          </div>
                        @endif
                        <span class="badge bg-{{ $unit->status === 'available' ? 'success' : 'secondary' }}">
                            {{ ucfirst($unit->status) }}
                        </span>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
    </div>

  </section>



<!-- Modal -->
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable relative w-auto pointer-events-none">
<div
class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
<div
  class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
  <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Historial de Propiedad {{$propertie->product_code}}</h5>
  <button type="button"
    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
    data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body relative p-4">
  @if(count($comments)>0)
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Fecha
            </th>
            <th scope="col" class="py-3 px-6">
                Tipo de Cambio
            </th>
            <th scope="col" class="py-3 px-6">
                Cambio Efectuado
            </th>
            <th scope="col" class="py-3 px-6">
                Comentario
            </th>
            <th scope="col" class="py-3 px-6">
                Usuario
            </th>
        </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{date_format(date_create($comment->created_at), 'Y/m/d')}}
            </th>
            <td class="py-2 px-6">
              @if($comment->type == "status") Estado @elseif($comment->type == "plan") Plan @elseif($comment->type == "available") Disponibilidad @endif
            </td>
            <td class="py-2 px-6">
              @if($comment->type == "status" && $comment->value == 0)  Se desactivo la propiedad @elseif($comment->type == "status" && $comment->value == 1) Se activo la propiedad @elseif($comment->type == "plan" && $comment->value == 1) Se activo la propiedad Gratis @elseif($comment->type == "available" && $comment->value == 2) La propiedad ya no está disponible @endif
            </td>
            <td class="py-2 px-6">
              {{$comment->comment}}
            </td>
            <td class="flex justify-center">
              @if($comment->user_id != null) 
              @php
                  $user = \App\Models\User::find($comment->user_id);
              @endphp
              {{$user->name}}
              @else - @endif
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
    @else
      <p>No hemos encontrado comentarios de esta propiedad</p>
    @endif
</div>
<div
  class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-center p-4 border-t border-gray-200 rounded-b-md">
  <button type="button" class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable relative w-auto pointer-events-none">
<div
class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
<div
  class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
  <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Historial de Propiedad {{$propertie->product_code}}</h5>
  <button type="button"
    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
    data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body relative p-4">
  @if(count($comments)>0)
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                Fecha
            </th>
            <th scope="col" class="py-3 px-6">
                Tipo de Cambio
            </th>
            <th scope="col" class="py-3 px-6">
                Cambio Efectuado
            </th>
            <th scope="col" class="py-3 px-6">
                Comentario
            </th>
        </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              {{date_format(date_create($comment->created_at), 'Y/m/d')}}
            </th>
            <td class="py-2 px-6">
              @if($comment->type == "status") Estado @elseif($comment->type == "plan") Plan @elseif($comment->type == "available") Disponibilidad @endif
            </td>
            <td class="py-2 px-6">
              @if($comment->type == "status" && $comment->type == 0) Se desactivo la propiedad @elseif($comment->type == "plan" && $comment->value == 1) Se activo la propiedad Gratis @elseif($comment->type == "available" && $comment->value == 2) La propiedad ya no está disponible @endif
            </td>
            <td class="py-2 px-6">
              {{$comment->comment}}
            </td>
        </tr>
      @endforeach
    </tbody>
</table>
    @else
      <p>No hemos encontrado comentarios de esta propiedad</p>
    @endif
</div>
<div
  class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-center p-4 border-t border-gray-200 rounded-b-md">
  <button type="button" class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>

{{-- modal envio de correo --}}
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="modalSendEmail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-scrollable relative w-auto pointer-events-none">
<div
class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
<div
  class="modal-header flex flex-shrink-0 items-center justify-between border-b border-gray-200 rounded-t-md">
  <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Compartir por:</h5>
  <button type="button"
    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
    data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body relative pr-4 pl-4">
  <div id="linksshare" class="flex justify-center">
    <div class="mx-2" style="cursor: pointer">
      <i class="fab fa-whatsapp fa-2x hover:text-blue-600" onclick="document.getElementById('sharetowpp').classList.remove('hidden');document.getElementById('linksshare').classList.add('hidden');"></i>
    </div>
    <div class="mx-2" style="cursor: pointer">
      <i class="fas fa-envelope fa-2x hover:text-blue-600" onclick="document.getElementById('sharetomail').classList.remove('hidden');document.getElementById('linksshare').classList.add('hidden');"></i>
    </div>
  </div>
  <div id="sharetowpp" class="hidden">
    <div class="mt-2">
      <img class="w-full h-60" src="{{asset('/uploads/listing/600/'. strtok($propertie->images, '|'))}}" alt="cargando imagen...">
      <p class="text-blue-700 mt-2">https://grupohousing.com/propiedad/{{$propertie->slug}}</p>
      <p class="text-sm font-semibold">{{$propertie->listing_title}}</p>
    </div>
    @if (count($similarProperties)>0)
    <div class="mt-3">
      <h6 class="text-gray-500 text-xs">Propiedades similares</h6>
      @php $i=0; @endphp
      @foreach ($similarProperties as $similar_propertie)
        <div class="border mb-2 flex">
          <img width="100px" height="70px" src="{{asset('/uploads/listing/300/'.strtok($similar_propertie->images, '|'))}}" alt="No se puedo cargar la imagen">
          <div class="text-xs mx-1">
            @if($similar_propertie->status == 0)
              <span class="text-red-600 font-semibold">
                Propiedad desactivada | Agendar cita en oficina
              </span>
            @endif
            <p>{{$similar_propertie->listing_title}} - {{$similar_propertie->product_code}}</p>
            <p>@if(Str::contains($similar_propertie->address, ',')){{ Str::limit($similar_propertie->address, 30, '...')}} @else {{Str::limit($similar_propertie->state . ', ' . $similar_propertie->city . ', ' . $similar_propertie->address, 30, '...') }} @endif</p>
            <p class="text-red-600">${{number_format($similar_propertie->property_price)}}</p>
            <div class="flex justify-end">
              <a href="{{ route('admin.show.listing', $similar_propertie) }}" class="bg-green-700 text-white px-2 py-1 shadow-md">Ver propiedad</a>
            </div>
          </div>
          @if($similar_propertie->status == 1)
            <div class="mx-1">
              <input type="checkbox" name="similarwpp{{$i++}}" value="{{$similar_propertie->slug}}|{{$similar_propertie->listing_title}}">
            </div>
          @endif
        </div>
      @endforeach
    </div>
    @else
    <div class="mt-3 text-xs text-gray-600">
      No hemos encontrado propiedades similares
    </div>
    @endif
    <div class="flex justify-center mt-4">
      <button type="button" onclick="document.getElementById('sharetowpp').classList.remove('block');document.getElementById('sharetowpp').classList.add('hidden');document.getElementById('linksshare').classList.remove('hidden');document.getElementById('linksshare').classList.add('block');" class="bg-white font-bold rounded px-2 py-1"><i class="fas fa-arrow-left"></i> Regresar</button>
      <button id="btnsharewpp" onclick="setLinkToShare()" class="bg-red-500 hover:bg-red-700 text-white font-bold rounded px-2 py-1">Compartir <i class="fas fa-arrow-right"></i></button>
    </div>
  </div>
  <div id="sharetomail" class="hidden">
    <form action="{{route('web.send.email.interested')}}" method="POST">
    @csrf
    <input type="hidden" name="propertie" value="{{$propertie->product_code}}">
    <div class="mt-2">
      <label for="interestname" class="text-xs text-gray-600">Ingrese el nombre del destinatario:</label>
      <input onkeyup="setNameInterest(this)" class="shadow-md appearance-none border rounded w-full py-1 px-3 text-gray-700" type="text" name="interestname" id="interestname" required>
    </div>
    <div class="mt-2">
      <label for="interestemail" class="text-xs text-gray-600">Ingrese el correo del destinatario:</label>
      <input class="shadow-md appearance-none border rounded w-full py-1 px-3 text-gray-700" type="email" name="interestemail" id="interestemail" required>
    </div>
    <div class="mt-2">
      <p class="text-xs text-gray-600">Texto a enviar</p>
      <div class="border text-xs p-3 rounded mt-2">
        <p>
          Estimado/a <b id="tagb_nameinterest"></b> reciba un cordial saludo de Casa Crédito. Le hacemos llegar el enlace de la propiedad en la que se encuentra interesado
        </p>
        <div class="mt-2">
          <img class="w-full h-60" src="{{asset('/uploads/listing/600/'. strtok($propertie->images, '|'))}}" alt="cargando imagen...">
          <p class="text-blue-700 mt-2">https://grupohousing.com/propiedad/{{$propertie->slug}}</p>
          <p class="text-sm font-semibold">{{$propertie->listing_title}}</p>
        </div>
      </div>
      @if(count($similarProperties)>0)
      <div class="mt-3">
        <h6 class="text-gray-500 text-xs">Propiedades similares</h6>
        @php $i=0; @endphp
        @foreach ($similarProperties as $similar_propertie)
          <div class="border mb-2 flex">
            <img width="100px" height="70px" src="{{asset('/uploads/listing/300/'.strtok($similar_propertie->images, '|'))}}" alt="No se puedo cargar la imagen">
            <div class="text-xs mx-1">
              <p>{{$similar_propertie->listing_title}} - {{$similar_propertie->product_code}}</p>
              <p>@if(Str::contains($similar_propertie->address, ',')){{ Str::limit($similar_propertie->address, 30, '...')}} @else {{Str::limit($similar_propertie->state . ', ' . $similar_propertie->city . ', ' . $similar_propertie->address, 30, '...') }} @endif</p>
              <p class="text-red-600">${{number_format($similar_propertie->property_price)}}</p>
            </div>
            @if($similar_propertie->status == 1)
              <div class="mx-1">
                <input type="checkbox" name="similar{{$i++}}" value="{{$similar_propertie->product_code}}">
              </div>
            @endif
          </div>
        @endforeach
      </div>
      @else
      <div class="mt-3 text-xs text-gray-600">
        No hemos encontrado propiedades similares
      </div>
      @endif
    </div>
    <div class="flex justify-center mt-4">
      <button type="button" onclick="document.getElementById('sharetomail').classList.remove('block');document.getElementById('sharetomail').classList.add('hidden');document.getElementById('linksshare').classList.remove('hidden');document.getElementById('linksshare').classList.add('block');" class="bg-white font-bold rounded px-2 py-1"><i class="fas fa-arrow-left"></i> Regresar</button>
      <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold rounded px-2 py-1">Enviar <i class="fas fa-arrow-right"></i></button>
    </div>
    </form>
  </div>
</div>
</div>
</div>
</div>    

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
id="modalMap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable relative w-auto pointer-events-none">
<div
class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
<div
  class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
  <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalLabel">Ubicación de Propiedad {{$propertie->product_code}}</h5>
  <button type="button"
    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
    data-bs-dismiss="modal" aria-label="Close"></button>
</div>
@if(!Str::contains($propertie->lat, '-') || !Str::contains($propertie->lat, '.') || !Str::contains($propertie->lng, '-') || !Str::contains($propertie->lng, '.'))
<div class="m-3">
  <p class="text-red-600">La propiedad <b>{{$propertie->product_code}}</b> no tiene una ubicación válida.</p>
</div>
@endif
<div id="mapleaflet" style="height: 400px; width: 100%"></div>
<div
  class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-center p-4 border-t border-gray-200 rounded-b-md">
  <button type="button" class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
@endsection

@section('endscript')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

    function formatCurrency(number, currencySymbol = '$', decimalSeparator = '.', thousandsSeparator = ',') {
      const options = {
        style: 'currency',
        currency: 'USD', // Puedes cambiar esto a la moneda que necesites
        currencyDisplay: 'symbol', // Puedes cambiar esto a 'code' o 'name'
      };

      const formatter = new Intl.NumberFormat('en-US', options); // Puedes cambiar 'en-US' a la configuración regional que necesites

      let formattedNumber = formatter.format(number);

      // Reemplazar separadores de miles y decimales
      formattedNumber = formattedNumber.replace(/\./g, '#TEMP#').replace(/,/g, '.').replace(/#TEMP#/g, ',');

      return formattedNumber.replace('USD', currencySymbol); // Reemplazar el símbolo de moneda USD con el deseado
    }

    // 1️⃣ Inicializar el mapa en una ubicación por defecto
    let map = L.map("mapleaflet").setView(['{{$propertie->lat}}', '{{$propertie->lng}}'], 14); // Latitud y longitud de Nueva York como ejemplo

    // 2️⃣ Agregar el mapa base de OpenStreetMap
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    let iconoPersonalizado = L.icon({
      iconUrl: "/img/icon-house.png", // Reemplaza con tu icono
      iconSize: [32, 32],
    });

    let marker = L.marker(['{{$propertie->lat}}', '{{$propertie->lng}}'], { icon: iconoPersonalizado }).addTo(map);
    marker.bindPopup(`
      <div style='display:flex; gap:10px; align-items:center'>
        <div>
          <img src='/uploads/listing/300/{{ explode('|', $propertie->images)[0] }}'>
        </div>
        <div>
          <a style='color:#000' href='/admin/show-listing/{{ $propertie->id}}'>
            <b>COD: {{$propertie->product_code}}</b>
            <br>
            <p class='m-0'>{{ $propertie->listing_title}}</p>  
          </a>
          <a target='_blank' href='https://api.whatsapp.com/send?text=Ubicación de propiedad *{{ $propertie->product_code }}* %0A https://maps.google.com/?q={{$propertie->lat}},{{$propertie->lng}}' class='btn btn-success btn-sm text-white mt-2'>
            Compartir ubicación
          </a>
        </div>
      </div>
      `);

      let circle = L.circle(['{{$propertie->lat}}', '{{$propertie->lng}}'], {
          color: '#182741',
          fillColor: '#182741',
          fillOpacity: 0.3,
          radius: 2000
      }).addTo(map);

    let arraySimilarProperties = @json($similarProperties);

    arraySimilarProperties.forEach(similarPropertie => {
      let markerSimilar = L.marker([similarPropertie.lat, similarPropertie.lng]).addTo(map);

      let imageUrl = 'https://grupohousing.com/img/logo-azul-grupo-housing.png';

      if (similarPropertie.images) {
        let imageArray = similarPropertie.images.split('|');
        if (imageArray.length > 0 && imageArray[0] !== '') {
          imageUrl = `/uploads/listing/300/${imageArray[0]}`;
        }
      }

      markerSimilar.bindPopup(`
        <div style='display:flex; gap:10px; align-items:center'>
          <div>
            <img src='${imageUrl}' alt='Imagen propiedad' width='100'>
          </div>
          <div>
            <a style='color:#000' href='/admin/show-listing/${similarPropertie.id}'>
              <b>COD: ${similarPropertie.product_code}</b>
              <p class='m-0 mt-1 mb-1'>${similarPropertie.listing_title}</p>
              <span class='text-muted fw-bold'>${formatCurrency(similarPropertie.property_price)}</span>
            </a>
          </div>
        </div>
      `);
    })

    let checkModal = setInterval(() => {
        let modal = document.getElementById('modalMap');
        if (modal && modal.style.display !== 'none' && modal.clientHeight > 0) {
            console.log('Modal detectado abierto');
            clearInterval(checkModal);
            setTimeout(() => {
                map.invalidateSize();
                marker.openPopup();
            }, 100);
        }
    }, 100);

  var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }

    function setLinkToShare(){
      let link = "https://api.whatsapp.com/send?text=";
      let message = "https://grupohousing.com/propiedad/{{$propertie->slug}}";
      message += "%0AReciba un cordial saludo de Grupo Housing 👋🏻🏠 Le hacemos llegar la propiedad en la que se encuentra interesado.%0A"
      let firstparagraph = false;
      for (let i = 0; i < {{count($similarProperties)}}; i++) {
        if(document.querySelector("input[name='similarwpp"+i+"']").checked) firstparagraph = true;
      }
      
      for (let i = 0; i < {{count($similarProperties)}}; i++) {
        if(document.querySelector("input[name='similarwpp"+i+"']").checked){
          if(firstparagraph == true && i == 0)message += "%0ATambién adjuntamos enlaces a propiedades similares a la búsqueda:";
          let value = document.querySelector("input[name='similarwpp"+i+"']").value;
          let index = value.indexOf("|");
          let linklisting = value.substring(0, index);
          let title = value.substring(index+1);
          message += "%0A✅"+title+"%0Ahttps://grupohousing.com/propiedad/"+linklisting+"%0A";
        }
      }
      message += "%0A_*Grupo Housing, Haciendo sus sueños realidad*_%0A"
      window.open(link+message, '_blank');
    }
    
    // const overlay = document.querySelector('.modal-overlay')
    // overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };

    function setNameInterest(object){
      let tagb_name = document.getElementById('tagb_nameinterest');
      tagb_name.innerHTML = object.value;
    }
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }

    document.addEventListener("DOMContentLoaded",function(){var e;if("IntersectionObserver"in window){e=document.querySelectorAll(".lazy");var n=new IntersectionObserver(function(e,t){e.forEach(function(e){if(e.isIntersecting){var t=e.target;t.src=t.dataset.src,t.classList.remove("lazy"),n.unobserve(t)}})});e.forEach(function(e){n.observe(e)})}else{var t;function r(){t&&clearTimeout(t),t=setTimeout(function(){var n=window.pageYOffset;e.forEach(function(e){e.offsetTop<window.innerHeight+n&&(e.src=e.dataset.src,e.classList.remove("lazy"))}),0==e.length&&(document.removeEventListener("scroll",r),window.removeEventListener("resize",r),window.removeEventListener("orientationChange",r))},20)}e=document.querySelectorAll(".lazy"),document.addEventListener("scroll",r),window.addEventListener("resize",r),window.addEventListener("orientationChange",r)}});
</script>
@endsection