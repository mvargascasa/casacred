@extends('layouts.dashtw')

@section('firstscript')
    <title>Propiedad</title>
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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA9HaUDMtwi6jqW1M8avBHmOpspAUFto4"></script>
    <script>
    var newarray = [];
    function initMap() {
      var map;
      var bounds = new google.maps.LatLngBounds();
      var mapOptions = {
          mapTypeId: 'roadmap'
      };
                      
      // Display a map on the web page
      map = new google.maps.Map(document.getElementById("map"), mapOptions);
      map.setTilt(50);
          
      // Multiple markers location, latitude, and longitude

      newarray = @json($nearbyproperties_aux);
      var markers_aux = [];
      var infoWindowContent_aux = [];
      for(let i = 0; i < newarray.length; i++){
        //if(newarray[i]['lat'].includes('-') && newarray[i]['lng'].includes('-')){
          markers_aux[i] = new Array(newarray[i]['listing_title'] + ", EC", newarray[i]['lat'], newarray[i]['lng']);
          infoWindowContent_aux[i] = new Array("<div>Código "+newarray[i]['product_code']+"<p><a target='_blank' href='https://casacredito.com/admin/show-listing/"+newarray[i]['id']+"'>"+newarray[i]['listing_title']+"</a></p><p><a target='_blank' href='https://api.whatsapp.com/send?text=https://maps.google.com/?q="+newarray[i]['lat']+","+newarray[i]['lng']+"'>Enviar Ubicación</a></p></div>");
        //}
      }

    var propertyCoordIsValid = false;
    if("{{$propertie->lat}}".includes('-') && "{{$propertie->lat}}".includes('.') && "{{$propertie->lng}}".includes('-') && "{{$propertie->lng}}".includes('.')){
      markers_aux.unshift(new Array("{{$propertie->listing_title}}, EC", "{{$propertie->lat}}", "{{$propertie->lng}}"));
      infoWindowContent_aux.unshift(new Array("<div>Código {{$propertie->product_code}}<p><a href='https://casacredito.com/admin/show-listing/{{$propertie->id}}'>{{$propertie->listing_title}}</a></p><p><a target='_blank' href='https://api.whatsapp.com/send?text=https://maps.google.com/?q={{$propertie->lat}},{{$propertie->lng}}'>Enviar Ubicación</a></p></div>"));
      propertyCoordIsValid = true;
    }

      //console.log("---------markers aux --------------------");
      //console.log(markers_aux);

      var markers = [
          ['{{$propertie->listing_title}}, EC', '{{$propertie->lat}}', '{{$propertie->lng}}']
          //['Brooklyn Public Library, NY', 40.672587, -73.968146],
          //['Prospect Park Zoo, NY', 40.665588, -73.965336]
      ];
      //console.log("-------------MARKERS--------------");
      //console.log(markers);
                          
      // Info window content
      var infoWindowContent = [
          ['<div class="info_content">' +
          '<h3>{{$propertie->listing_title}}</h3>' +
          '<p>{{$propertie->listing_description}}</p>' + '</div>'],
          // ['<div class="info_content">' +
          // '<h3>Brooklyn Public Library</h3>' +
          // '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
          // '</div>'],
          // ['<div class="info_content">' +
          // '<h3>Prospect Park Zoo</h3>' +
          // '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
          // '</div>']
      ];

      //console.log("-----------------infoWindowContent-------------------");
      //console.log(infoWindowContent);


      //console.log("---------------infoWindowContentAux-------------------")
      //console.log(infoWindowContent_aux);
          
      // Add multiple markers to map
      var infoWindow = new google.maps.InfoWindow(), marker, i;
      
      var icon = {
          url: "https://cdn1.iconfinder.com/data/icons/real-estate-building-flat-vol-3/104/house__location__home__map__Pin-512.png", // url
          scaledSize: new google.maps.Size(40, 40), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(0, 0) // anchor
      };
      // Place each marker on the map  
      for( i = 0; i < markers_aux.length; i++ ) {
          if(i == 0 && propertyCoordIsValid){icon.scaledSize = new google.maps.Size(60, 60);}
          else {icon.scaledSize = new google.maps.Size(40, 40);}
          var position = new google.maps.LatLng(markers_aux[i][1], markers_aux[i][2]);
          bounds.extend(position);
          marker = new google.maps.Marker({
              position: position,
              map: map,
              icon: icon,
              title: markers_aux[i][0]
          });
          
          // Add info window to marker    
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                  infoWindow.setContent(infoWindowContent_aux[i][0]);
                  infoWindow.open(map, marker);
              }
          })(marker, i));

          // Center the map to fit all markers on the screen
          map.fitBounds(bounds);
      }

      // Set zoom level
      var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
          this.setZoom(16);
          google.maps.event.removeListener(boundsListener);
      });
      
  }
  //if(){
    google.maps.event.addDomListener(window, 'load', initMap);
  //}
  
    </script>
@endsection

@section('content')

@php
  $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
	$bathroom=0;$garage=0;$squarefit=0;
	if(!empty($propertie->heading_details)){
	  $allheadingdeatils=json_decode($propertie->heading_details); 
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

<div class="container overflow-scroll mx-auto mt-3 pb-3 relative">

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

  <div class="row d-flex justify-content-center">
    <div class="col-sm-8">
      
      @if ($propertie->images != null)
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @php $iiListing=0 @endphp
              @foreach (array_filter(explode("|", $propertie->images)) as $img)
                @php
                  $imageVerification = asset('uploads/listing/thumb/600/'.$img);    
                @endphp
                <div class="carousel-item @if($iiListing==0) active @endif" data-slide-number="{{ $iiListing }}">
                  <img style="width: 100%; height: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email != "info@casacredito.com"){{url('uploads/listing/thumb',$img)}} @else {{url('uploads/listing', $img)}} @endif" class="d-block w-100 ccimgpro" alt="..." data-slide-to="{{ $iiListing }}" style="object-fit: contain" alt="{{$propertie->listing_title}}-{{$iiListing++}}">
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
                    <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email != "info@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{ $i}}">     
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
                    <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email != "info@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
                    <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email != "info@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
                    <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email != "info@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
                    <img style="width: 100%" src="@if(@getimagesize($imageVerification) && Auth::user()->email != "info@casacredito.com"){{ url('uploads/listing/thumb/300/', $arrayImages[$i]) }} @else {{url('uploads/listing/300',$arrayImages[$i])}} @endif" class="img-fluid" alt="{{$propertie->listing_title}}-{{$i}}">  
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
    <div class="col-sm-9">
      <div class="border rounded p-1">
        <h6 class="text-muted mb-1"><i class="fas fa-info-circle"></i> Subido por <b>{{$user->name}}</b> el <b>{{$propertie->created_at->format('d-M-y')}}</b></h6>
      </div>
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
              ${{ number_format($propertie->property_price) }}
            </div>
          </div>
          <div class="col-sm-6 d-flex justify-content-end">
            <label style="background-color: #dc3545; color: #ffffff; border-radius: 5px;padding: 5px; font-weight: 600">CÓDIGO: {{ $propertie->product_code }}</label>
          </div>
        </div>
        <div class="d-flex mt-2">
          <img style="width: 25px; height: 25px" src="{{ asset('img/ubicacion.png') }}" alt="">
          <p style="font-weight: 400">Sector: @if(Str::contains($propertie->address, ',')) {{$propertie->address}} @else {{ $propertie->state }}, {{$propertie->city}}, {{Str::ucfirst(Str::lower($propertie->address))}} @endif</p>
        </div>
        <div class="mt-4">
          <h5 style="font-weight: 500">Características:</h5>
          <div class="row mt-2">
              @if($propertie->land_area > 0)
                <div class="col-sm-6 d-flex mt-3 mb-3">
                  <i style="font-size: 20px; margin-right: 5px" class="fas fa-compress-arrows-alt"></i>
                  <p> Área Interior: {{ $propertie->land_area}} m<sup>2</sup></p>
                </div>
              @endif
            @if($propertie->construction_area > 0)
              <div class="col-sm-6 d-flex mt-3 mb-3">
                <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-arrows-alt"></i>
                <p>Área Total: {{ $propertie->construction_area}} m<sup>2</sup></p>
              </div>
            @endif
            @if($propertie->Front > 0)
              <div class="col-sm-6 d-flex mt-3 mb-3">
                <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-alt"></i>
                <p> Frente: {{ $propertie->Front}} m<sup>2</sup></p>
              </div>
            @endif
            @if($propertie->Fund > 0)
              <div class="col-sm-6 d-flex mt-3 mb-3">
                <i style="font-size: 20px; margin-right: 5px" class="fas fa-expand-alt"></i>
                <p> Fondo: {{ $propertie->Fund}} m<sup>2</sup></p>
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
          </div>
        </div>
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
      {{-- <a target="_blank" href="{{$propertie->ubication_url}}">Ver ubicación en Google Maps</a> --}}
    </div>
  </div>
  {{-- <div class="mx-5" id="map"></div> --}}
  <div class="flex justify-center">
    @if(Auth::user()->role == 'administrator')
    <a class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" style="text-decoration: none;" href="{{ route('home.tw.edit', $propertie) }}">Editar Propiedad</a>
    <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Ver Historial</button>
    @endif
    <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" data-bs-toggle="modal" data-bs-target="#modalSendEmail">Compartir</button>
    <button type="button" class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full mr-1" data-bs-toggle="modal" data-bs-target="#modalMap">Ver Mapa</button>
  </div>
</div>

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
      <p class="text-blue-700 mt-2">https://casacredito.com/propiedad/{{$propertie->slug}}</p>
      <p class="text-sm font-semibold">{{$propertie->listing_title}}</p>
    </div>
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
          <div class="mx-1">
            <input type="checkbox" name="similarwpp{{$i++}}" value="{{$similar_propertie->slug}}|{{$similar_propertie->listing_title}}">
          </div>
        </div>
      @endforeach
    </div>
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
          <p class="text-blue-700 mt-2">https://casacredito.com/propiedad/{{$propertie->slug}}</p>
          <p class="text-sm font-semibold">{{$propertie->listing_title}}</p>
        </div>
      </div>
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
            <div class="mx-1">
              <input type="checkbox" name="similar{{$i++}}" value="{{$similar_propertie->product_code}}">
            </div>
          </div>
        @endforeach
      </div>
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
<div id="map" class="flex text-center justify-center items-center modal-body relative p-4" style="height: 400px"></div>
<div
  class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-center p-4 border-t border-gray-200 rounded-b-md">
  <button type="button" class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
</div>
@endsection

@section('endscript')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

  var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }

    function setLinkToShare(){
      var link = "https://api.whatsapp.com/send?text=";
      var message = "Reciba un cordial saludo de Casa Crédito 👋🏻🏠 Le hacemos llegar la propiedad en la que se encuentra interesado.%0A*https://casacredito.com/propiedad/{{$propertie->slug}}*%0A";
      var firstparagraph = false;
      for (let i = 0; i < 10; i++) {if(document.querySelector("input[name='similarwpp"+i+"']").checked) firstparagraph = true;}
      
      for (let i = 0; i < 10; i++) {
        if(document.querySelector("input[name='similarwpp"+i+"']").checked){
          if(firstparagraph == true && i == 0)message += "%0ATambién adjuntamos enlaces a propiedades similares a la búsqueda:";
          let value = document.querySelector("input[name='similarwpp"+i+"']").value;
          let index = value.indexOf("|");
          let linklisting = value.substring(0, index);
          let title = value.substring(index+1);
          message += "%0A✅"+title+"%0Ahttps://casacredito.com/propiedad/"+linklisting+"%0A";
        }
      }
      message += "%0A_*Casa Crédito, Haciendo sus sueños realidad*_%0A"
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
</script>
@endsection