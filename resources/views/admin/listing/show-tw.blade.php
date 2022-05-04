@extends('layouts.dashtw')

@section('firstscript')
    <title>Propiedad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

<div class="container overflow-scroll mx-auto mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-sm-8">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            @php $iiListing=0 @endphp
            @foreach (array_filter(explode("|", $propertie->images)) as $img)
              <div class="carousel-item @if($iiListing==0) active @endif" data-bs-slide-number="{{ $iiListing }}">
                <img class="img-fluid" src="https://casacredito.com/uploads/listing/{{$img}}" data-slide-to="{{ $iiListing }}" class="d-block w-100" alt="{{$propertie->listing_title}}-{{$iiListing++}}">
              </div>
            @endforeach
            {{-- <div class="carousel-item active">
              <img class="img-fluid" src="https://casacredito.com/uploads/listing/IMG_813-625d9de2332d9.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img class="img-fluid" src="https://casacredito.com/uploads/listing/IMG_813-625dc95c31200.jpg" class="d-block w-100" alt="...">
            </div> --}}
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
      </div>
    </div>
  </div>

  <div class="row d-flex justify-content-center mt-3">
    <div class="col-sm-9">
      <div>
        <h4>{{ $propertie->listing_title }}</h4>
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
          <p style="font-weight: 400">Sector: {{$propertie->address}}</p>
        </div>
        <div>
          <h5>Características:</h5>
          <div class="row mt-3">
            @isset($listing->land_area)
                <div class="col-sm-6 d-flex">
                  <i style="font-size: 20px; margin-right: 5px" class="far fa-ruler-combined"></i>
                  <p>@if($listingtype->type_title == "Terrenos") Área Total: @else Área Interior: @endif {{ $listing->land_area}} m<sup>2</sup></p>
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
                <i style="font-size: 20px; margin-right: 5px" class="fas fa-bed"></i>
                <p>{{ $bedroom}} @if($bedroom > 1) habitaciones @else habitación @endif</p>
              </div>
            @endif
            @if ($garage > 0)
              <div class="col-sm-6 d-flex">
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
    </div>
  
  </div>

</div>
    
    
@endsection

@section('endscript')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection