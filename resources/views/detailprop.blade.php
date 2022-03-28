@extends('layouts.web')
@section('header')
<title>{{$listing->product_code}} {{$listing->listing_title}} - CasaCredito</title>
<meta name="description" content="{{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}..."/>
<meta name="keywords" content="Casas en venta en cuenca ecuador, Apartamentos en venta en cuenca ecuador, terrenos en venta en cuenca ecuador, lotes en venta en cuenca ecuador">

<meta property="og:url"                content="{{route('web.detail',$listing->slug)}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="{{$listing->listing_title}}" />
<meta property="og:description"        content="{{mb_substr(trim(strip_tags($listing->listing_description)),0,180)}}..." />

@php $firstImg = array_filter(explode("|", $listing->images)) @endphp
<meta property="og:image"              content="{{url('uploads/listing/600',$firstImg[0]??'')}}" />
<style>
/* Small devices (landscape phones, 576px and up)*/
@media (min-width: 576px) {  .ccimgpro{max-height:250px ;}  }

/* Medium devices (tablets, 768px and up)*/
@media (min-width: 768px) { .ccimgpro{max-height:350px ;}  }

/* Large devices (desktops, 992px and up)*/
@media (min-width: 992px) { .ccimgpro{max-height:450px ;}  }
.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row pt-3">
        <div class="col-12 col-sm-9 ">          
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
    </div>
    <div class="row">
        <div class="col-12 col-sm-9  pb-2">           
                
            <div id="carouselControls" class="carousel slide card-img-top" data-ride="carousel" data-interval="false">
                <div class="carousel-inner" style="max-height: 450px;">
                  @php $iiListing=0 @endphp
                  @foreach(array_filter(explode("|", $listing->images)) as $img)
                          <div class="carousel-item @if($iiListing==0) active @endif">
                            <img src="{{url('uploads/listing',$img)}}"  data-slide-to="{{$iiListing}}" class="d-block w-100 ccimgpro" style="object-fit:contain " alt="{{$listing->listing_title}}-{{$iiListing++}}">
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
              </div>           

        </div>
        <div class="col-12 col-sm-3">

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
              </div>

              
          
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
              <div class="pb-2">
                @if($listing->construction_area>0)<img src="{{asset('img/house.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$listing->construction_area}}m<sup>2</sup> </span> @endif
                @if($listing->land_area>0)<img src="{{asset('img/floor.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$listing->land_area}}m<sup>2</sup> </span> @endif
                @if($bedroom>0)<img src="{{asset('img/bed-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bedroom}} </span> @endif
                @if($bathroom>0)<img src="{{asset('img/bathroom-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$bathroom}} </span> @endif
                @if($garage>0)<img src="{{asset('img/garage-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-1"> {{$garage}} </span> @endif
              </div>

              @isset ($listing->listyears)
                @php
                    $years_construction = DB::table('listing_years')->select('description')->where('id', $listing->listyears)->get();
                @endphp
                <div class="pb-2 d-flex">
                  <p class="pt-1"><b style="font-weight: 500">Años de construcción:</b> <br> {{ $years_construction[0]->description }}</p>
                </div>
              @endisset
              
        </div>
    </div>
<div class="row">
  <div class="col-12 col-sm-9">
    <div class="card my-4">
      <div class="card-body">
        <h6 class="card-title text-danger">DESCRIPCIONES</h6> <hr>
        <p class="card-text">{!!$listing->listing_description!!}</p>
      </div>
    </div>
        @if(is_array(json_decode($listing->heading_details)))
    <div class="card my-4">
      <div class="card-body">
        <h6 class="card-title text-danger pt-4">DETALLES</h6> <hr>
        
        @foreach(json_decode($listing->heading_details) as $dets)
                <span class="p-4 font-weight-bold">{{$dets[0]}}</span><br>
                <div class="row m-2 p-2 border border-light rounded">
                <?php unset($dets[0]); $printControl=0; ?>        
                @foreach($dets as $det)
                    @if($printControl==0)
                      <?php $printControl=1; ?>                          
                      <div class="col-lg-3 col-md-4 col-12 p-1">
                          <i class="fas fa-check px-2 text-muted"></i>
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
        <div class="card my-4">
          <div class="card-body">
            <h6 class="card-title text-danger">SERVICIOS</h6> <hr>
            <div class="row m-2 p-2 border border-light rounded">
            @foreach(array_filter(explode(",", $listing->listinglistservices)) as $serv)
                          <div class="col-lg-3 col-md-4 col-12 p-1">
                              <i class="fas fa-check px-2 text-muted"></i>
                              <span class="text-muted small">@foreach ($services as $service) @if($service->id==$serv) {{$service->charac_titile}} @endif  @endforeach</span>
                          </div>
            @endforeach    
          </div> 
        </div>
      </div>
        @endif


        @if( count(array_filter(explode(",", $listing->listingcharacteristic)))>0 )
        <div class="card my-4">
          <div class="card-body">
        <h6 class="card-title text-danger">BENEFICIOS</h6> <hr>
        <div class="row m-2 p-2 border border-light rounded">
            @foreach(array_filter(explode(",", $listing->listingcharacteristic)) as $bene)
                          <div class="col-lg-3 col-md-4 col-12 p-1">
                              <i class="fas fa-check px-2 text-muted"></i>
                              <span class="text-muted small">@foreach ($benefits as $benef) @if($benef->id==$bene) {{$benef->charac_titile}} @endif  @endforeach</span>
                          </div>
            @endforeach    
          </div> 
        </div>
      </div>
        @endif
        
  </div>
  <div class="col-12 col-sm-3">
    
    <div class="card my-4">

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

    </div>
    
   

    
    <div class="card my-4">
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
    </div>

  </div>
</div>

</div>

    @if(isset($mobile) && $mobile==true)
        <div style="width: 200px; position: fixed; bottom: 10px; right: 25px; height: 60px;">
          <button class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#modalContact" 
          style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informaci&oacute;n</button>
        </div>
    @endif

@endsection

@section('script')
<script>
        var myCarousel = document.querySelector('#carouselControls')
        var carousel = new bootstrap.Carousel(myCarousel)
    
    var selectPhoto = (nro) => {
        carousel.to(nro)
    }
</script>
@endsection
