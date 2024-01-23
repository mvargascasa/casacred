<div class="col-12 col-sm-10">
  <div class="row pt-4">
    <div class="col">
      <div class="float-right small px-2"></div>
    </div>
  </div><div class="row">{{$tester}}</div>
    <!-- Inicia Propiedad -->   
  @php $ii=0; @endphp 
    @php
      if(isset($_SERVER['HTTP_USER_AGENT'])){
        $useragent= $_SERVER['HTTP_USER_AGENT'];
        $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
      }else{ $ismobile = false; }
    @endphp

    @if(count($listings)>0)
    @foreach($listings as $listing)
        @php $ii++; @endphp 

        @if($ii==9)
        <div class="card row mb-3" style="border-top:1px #FA7B34 solid">
          <div class="row">            
            <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO VENDE CON NOSOTROS')">
                <img style="cursor: pointer" class="img-fluid p-0"  src="@if($ismobile){{asset('img/BANNERS-CASA-CREDITO-VENDE-09_2_.webp')}} @else {{asset('img/vende-tu-propiedad-en-casacredito-web.jpg')}} @endif" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
            </a>
           </div>
        </div>
        @endif
        @if($ii==14)
        <div class="card row align-items-center mb-3" style="border-top:1px #FA7B34 solid">
          <div class="row">
            <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO CREDITOS EN ECUADOR')">
                <img style="cursor: pointer" class="img-fluid p-0" src="@if($ismobile){{asset('img/vende-tu-propiedad-en-casacredito.webp')}} @else {{asset('img/BANNERS-CASA-CREDITO-VENDE-08.webp')}} @endif" alt="Vende tu casa" class="imgdir rounded object-cover services" /> 
            </a>
           </div>
        </div>
        @endif


    <div class="card mb-3 shadow-sm card-listing">
      <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-5 p-0">
            <div class="col p-0 h-100">
                <div class="card h-100" style="border:none">
                  
                  @if($ismobile)
                  <a href="{{route('web.detail', $listing->slug)}}">
                    <div class="d-flex justify-content-center w-100">
                      <div class="position-relative">
                        <img loading="lazy" width="100%" height="250px" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.strtok($listing->images, "|"))) {{asset('uploads/listing/thumb/600/'.strtok($listing->images, '|'))}} @else {{asset('uploads/listing/600/'.strtok($listing->images, '|'))}} @endif" class="d-block" alt="{{$listing->listing_title}}">
                      </div>
                    </div>
                  </a>
                  @else
                    {{-- <div id="carouselControls{{$listing->id}}" class="carousel slide card-img-top" data-ride="carousel"  data-interval="false">
                      <div class="carousel-inner position-relative" style="max-height: 150px;">
                        @php $iiListing=0 @endphp
                          @php
                              $imageVerification = asset('uploads/listing/thumb/600/'. strtok($listing->images, '|'));
                          @endphp
                            @foreach(array_filter(explode("|", $listing->images)) as $img)              
                              <div class="carousel-item @if($iiListing==0) active @endif">
                                <img loading="lazy" class="img-fluid" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$img)) {{url('uploads/listing/thumb/600',$img)}} @else {{url('uploads/listing/600',$img)}} @endif" class="" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                              </div>
                            @endforeach
                      </div>
                      <a class="carousel-control-prev" href="#carouselControls{{$listing->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselControls{{$listing->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div> --}}
                    <div id="carouselControls{{$listing->id}}" class="carousel slide card-img-top h-100" data-ride="carousel"  data-interval="false">
                      <div class="carousel-inner position-relative h-100">
                        @php $iiListing=0 @endphp
                          @php
                              $imageVerification = asset('uploads/listing/thumb/600/'. strtok($listing->images, '|'));
                          @endphp
                            @foreach(array_filter(explode("|", $listing->images)) as $img)              
                              <div class="carousel-item @if($iiListing==0) active @endif">
                                <img loading="lazy" width="100%" height="340px" style="object-fit: cover !important" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$img)) {{url('uploads/listing/thumb/600',$img)}} @else {{url('uploads/listing/600',$img)}} @endif" class="" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                              </div>
                            @endforeach
                      </div>
                      <a class="carousel-control-prev" href="#carouselControls{{$listing->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselControls{{$listing->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  @endif
   
                  {{-- <div class="card-body">
                    <div class="d-flex justify-content-center text-danger">Precio: $ <span class=" font-weight-bold"> {{number_format($listing->property_price, 0, ',', '.')}}</span></div>
                    </div> --}}
                </div>
              </div>
            </div>   
            <div class="col-sm-6 col-md-6 col-lg-7 card border-0">
              <a href="{{route('web.detail',$listing->slug)}}">
                <div class="px-3 py-3 padding-x-mobile">
                  @php
                      $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
                        $bathroom=0;$garage=0;$squarefit=0;
                        if(!empty($listing->heading_details)){
                          $allheadingdeatils=json_decode($listing->heading_details); 
                          foreach($allheadingdeatils as $singleedetails) {
                            unset($singleedetails[0]);
                            for($i=1;$i<=count($singleedetails);$i++) { 
                              if($i%2==0) {  
                                if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49)
                                { 
                                    if(empty($singleedetails[$i])){ $bedroom+=0; }else{
                                    $bedroom+=$singleedetails[$i]; }
                                }
                                if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81)
                                {
                                    if(empty($singleedetails[$i])){ $bathroom+=0; }else{
                                    $bathroom+=$singleedetails[$i]; }
                                }
                                if($singleedetails[$i-1]==43)
                                {
                                    if(empty($singleedetails[$i])){ $garage+=0; }else{
                                    $garage+=$singleedetails[$i]; }
                                }
                              }
                            }
                            $i++;
                          }
                        }
                  @endphp
                  <div class="card-body padding-x-mobile">
                    <p class="h2" style="color: #182741; font-weight: 600">${{ number_format($listing->property_price) }}</p>
                    <p class="m-0" style="color: #182741; font-weight: 400">COD: {{ $listing->product_code }}</p>
                    <p class="m-0" style="color: #182741; font-weight: 500">{{ $listing->listing_title }}</p>
                    <p style="font-size: small">@if(isset($listing->address) && str_contains($listing->address, ',')) {{ $listing->address }} @else {{ $listing->state}}, {{ $listing->city }}, {{ $listing->address != null ? $listing->address : $listing->sector}} @endif</p>
                    <p style="font-size: small">{{ Str::limit($listing->listing_description, 120) }} <a href="{{ route('web.detail',$listing->slug) }}" style="color: blue; font-weight: 400">Más info</a></p>
                    <div class="d-flex" style="gap: 10px">
                      @if($listing->construction_area>0) <div class="items-cards"> <img src="{{asset('img/house.png')}}" width="25">@if($ismobile)<br>@endif<span class="pr-2 items-cards-txt" style="font-weight: 400"> {{$listing->construction_area}} m<sup>2</sup> </span> </div> @endif
                      @if($listing->land_area>0) <div class="items-cards"><img src="{{asset('img/floor.png')}}" width="25"> @if($ismobile)<br>@endif<span class="pr-2 items-cards-txt" style="font-weight: 400"> {{$listing->land_area}} m<sup>2</sup> </span></div> @endif
                      @if($bedroom>0) <div class="items-cards"><img src="{{asset('img/bed-black.png')}}" width="25">@if($ismobile)<br>@endif<span class="pr-2 items-cards-txt" style="font-weight: 400"> {{$bedroom}} HAB.</span></div> @endif
                      @if($bathroom>0) <div class="items-cards"><img src="{{asset('img/bathroom-black.png')}}" width="25">@if($ismobile)<br>@endif<span class="pr-2 items-cards-txt" style="font-weight: 400"> {{$bathroom}} @if($bathroom > 1) BAÑOS @else BAÑO @endif </span></div> @endif
                      @if($garage>0) <div class="items-cards"><img src="{{asset('img/garage-black.png')}}" width="25">@if($ismobile)<br>@endif<span class="pr-2 items-cards-txt" style="font-weight: 400"> {{$garage}} @if($garage > 1) GARAGES @else GARAGE @endif </span></div>  @endif
                    </div>
                  </div>
                  <div class="card-footer bg-white">
                    <div class="d-flex pt-3" style="gap: 10px">
                      <a href="tel:+593983849073" class="btn btn-sm btn-contact" style="border: 1px solid #182741; color: #182741"><img width="20px" height="15px" src="{{asset('img/ECUADOR-04.webp')}}" alt=""> LLAMAR</a>
                      <a href="tel:+17186903740" class="btn btn-sm btn-contact" style="border: 1px solid #182741; color: #182741"><img width="20px" height="15px" src="{{asset('img/USA-05.webp')}}" alt="">  LLAMAR</a>
                      <button data-toggle="modal" data-target="#modalContact" onclick="setInterest('COD {{$listing->product_code}}')" title="Solicitar Información" class="btn btn-sm btn-contact" style="border: 1px solid #182741; color: #182741"><i class="fas fa-envelope-open-text"></i></button>
                      @php
                        $urlwpp = "https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *" . strtoupper($listing->listing_title) . "*. Código: *" . $listing->product_code ."*";
                      @endphp
                      <a onclick="return gtag_report_conversion('{{ $urlwpp }}')" href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *{{strtoupper($listing->listing_title)}}*. Código: *{{$listing->product_code}}*" title="Contactar por Whatsapp" class="btn btn-sm btn-contact" style="border: 1px solid #182741; color: #182741"><i class="fab fa-whatsapp"></i></a>
                    </div>
                  </div>
                  {{-- <div class="text-muted font-weight-bold float-left pb-1">COD:<span class="font-weight-bold text-danger">{{$listing->product_code}}</span> </div>
                  <div class="float-right px-3 py-0" style="color:white;font-size: 13px;background-color: #FA7B34">
                      @foreach ($types as $type) @if ($type->id==$listing->listingtype) {{$type->type_title}} @endif @endforeach
                  </div>                
                  <div class="float-right small px-2" style="color:#FA7B34;font-weight: 500">
                    @foreach ($categories as $cat) @if ($cat->slug==$listing->listingtypestatus) {{$cat->status_title}} @endif @endforeach
                  </div>
                  <br>
                  <h2 class="w-100 h6 font-weight-bold text-truncate"><a class="link-dark link-sindeco" href="{{route('web.detail',$listing->slug)}}">{{$listing->listing_title}}</a></h2>
                  <div class="p-0 small font-weight-bold text-muted">@if(Str::contains($listing->address, ',')){{$listing->address}} @else {{$listing->state}}, {{$listing->city}}, {{$listing->address}}@endif</div>
                  <div class="small lh-sm" style="max-height:50px; overflow: hidden;">{{mb_substr(strip_tags($listing->listing_description),0,200)}}...</div> --}}
                    {{-- <div class="py-2">
                      @if($listing->construction_area>0)<img src="{{asset('img/house.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->construction_area}} m<sup>2</sup> </span> @endif
                      @if($listing->land_area>0)<img src="{{asset('img/floor.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->land_area}} m<sup>2</sup> </span> @endif
                      @if($bedroom>0)<img src="{{asset('img/bed-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bedroom}} </span> @endif
                      @if($bathroom>0)<img src="{{asset('img/bathroom-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bathroom}} </span> @endif
                      @if($garage>0)<img src="{{asset('img/garage-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$garage}} </span> @endif
                    </div> --}}
                </div>
              {{-- <hr>
              <div class="pb-3 float-right">
                <div class="d-block d-sm-none py-1"></div>
                <a href="tel:+593983849073" class="btn btn-outline-danger btn-sm px-2 rounded-pill btncall border shadow-sm" style="font-size:13px;"><img width="20px" height="15px" src="{{asset('img/ECUADOR-04.webp')}}" alt=""> Llamar</a>
                <a href="tel:+17186903740" class="btn btn-outline-danger btn-sm px-2 rounded-pill btncall border shadow-sm" style="font-size:13px;"><img width="20px" height="15px" src="{{asset('img/USA-05.webp')}}" alt=""> Llamar</a>
                <button class="btn btn-danger btn-sm px-2 d-sm-inline-block rounded-pill shadow-sm" 
                data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')" title="Solicitar Información">Contactar</button>
                @php
                  $urlwpp = "https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *" . strtoupper($listing->listing_title) . "*. Código: *" . $listing->product_code ."*";
                @endphp
                <a onclick="return gtag_report_conversion('{{ $urlwpp }}')" href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *{{strtoupper($listing->listing_title)}}*. Código: *{{$listing->product_code}}*" class="btn btn-success btn-sm rounded-circle shadow-sm" title="Contactar por Whatsapp"><i class="fab fa-whatsapp"></i></a>
              </div> --}}
          </a>
        </div>   
      </div>
    </div>        
    @endforeach
    @else
    <div class="text-center p-5 bg-white">
      <p style="font-size: 20px">No hemos encontrado propiedades para la búsqueda</p>
    </div>
    @endif
 <!-- Fin Propiedad -->   

 <!--new design-->

{{-- @php $ii=0; @endphp

@php
  if(isset($_SERVER['HTTP_USER_AGENT'])){
    $useragent= $_SERVER['HTTP_USER_AGENT'];
    $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
  }else{ $ismobile = false; }
@endphp

@if(count($listings)>0)
  <section class="row">
    <h2 style="font-weight: 400; font-size: x-large" class="mb-3">Se encontraron {{ count($listings) }} propiedades</h2>
    @foreach($listings as $listing)
    @php $ii++; @endphp
    <article class="col-sm-4 mb-4">
      <div class="card rounded-0">
        <div>
          <a href="{{route('web.detail', $listing->slug)}}">
            <div class="d-flex justify-content-center w-100 position-relative">
              <img class="d-block img-fluid w-100" src="@if(file_exists(public_path().'/uploads/listing/thumb/300/'.strtok($listing->images, "|"))) {{asset('uploads/listing/thumb/300/'.strtok($listing->images, '|'))}} @else {{asset('uploads/listing/300/'.strtok($listing->images, '|'))}} @endif" alt="{{$listing->listing_title}}">
              <div class="position-absolute d-flex" style="bottom: 10px; left: 10px;">
              </div>
            </div>
          </a>
          <div>
            <div class="mt-3 px-3">
              <h2 class="small">{{ $listing->listing_title}}</h2>
              <p class="small"><i class="fas fa-map-marker-alt text-danger"></i> {{ $listing->state}}, {{ $listing->city}}, {{$listing->address}}</p>
              <div class="row">
                @php
                  $bedroom=0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
                  $bathroom=0;$garage=0;$squarefit=0;
                  if(!empty($listing->heading_details)){
                    $allheadingdeatils=json_decode($listing->heading_details); 
                    foreach($allheadingdeatils as $singleedetails) {
                      unset($singleedetails[0]);
                      for($i=1;$i<=count($singleedetails);$i++) { 
                        if($i%2==0) {  
                          if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49)
                          { 
                            if(empty($singleedetails[$i])){ $bedroom+=0; }else{
                            $bedroom+=$singleedetails[$i]; }
                          }
                            if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81)
                          {
                            if(empty($singleedetails[$i])){ $bathroom+=0; }else{
                            $bathroom+=$singleedetails[$i]; }
                          }
                            if($singleedetails[$i-1]==43)
                          {
                            if(empty($singleedetails[$i])){ $garage+=0; }else{
                              $garage+=$singleedetails[$i]; }
                          }
                        }
                      }
                      $i++;
                    }
									}    
                @endphp
                <div class="py-2 d-flex">
                  @if($listing->construction_area>0)<img src="{{asset('img/house.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->construction_area}} m<sup>2</sup> </span> @endif
                  @if($listing->land_area>0)<img src="{{asset('img/floor.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->land_area}} m<sup>2</sup> </span> @endif
                  @if($bedroom>0)<img src="{{asset('img/bed-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bedroom}} </span> @endif
                  @if($bathroom>0)<img src="{{asset('img/bathroom-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bathroom}} </span> @endif
                  @if($garage>0)<img src="{{asset('img/garage-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$garage}} </span> @endif
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <p class="mt-2 h5" style="font-weight: 500">${{ number_format($listing->property_price) }}</p>
                <p class="px-2 py-1 mt-1">COD: <span class="font-weight-bold">{{ $listing->product_code}}</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer bg-white py-3">
          <div class="d-flex justify-content-end">
            <div class="mr-1">
              <a href="tel:+593983849073" class="btn btn-outline-danger btn-sm px-2 rounded-pill btncall border shadow-sm" style="font-size:13px;"><img width="20px" height="15px" src="{{asset('img/ECUADOR-04.webp')}}" alt=""> Llamar</a>
            </div>
            <div class="mx-1">
              <a href="tel:+17186903740" class="btn btn-outline-danger btn-sm px-2 rounded-pill btncall border shadow-sm" style="font-size:13px;"><img width="20px" height="15px" src="{{asset('img/USA-05.webp')}}" alt=""> Llamar</a>
            </div>
            <div class="mx-1">
              <button class="btn btn-danger btn-sm px-2 d-sm-inline-block rounded-pill shadow-sm" 
              data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')" title="Solicitar Información"><i class="fas fa-envelope"></i></button>
            </div>
              @php
                $urlwpp = "https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *" . strtoupper($listing->listing_title) . "*. Código: *" . $listing->product_code ."*";
              @endphp
              <div class="d-flex align-items-center ml-1">
                <a onclick="return gtag_report_conversion('{{ $urlwpp }}')" href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *{{strtoupper($listing->listing_title)}}*. Código: *{{$listing->product_code}}*" class="btn btn-sm rounded-circle border shadow-sm btn-wpp" title="Contactar por Whatsapp"><i class="fab fa-whatsapp" style="font-size: 18px"></i></a>
              </div>
          </div>
        </div>
      </div>
    </article>
    @endforeach
  </section>
@endif --}}

<!--end new design-->
 
 @if($listings->count()<6)
 <div class="card row mb-3 justify-center" style="border-top:1px #FA7B34 solid">
   <div class="row">
     <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO CREDITOS EN ECUADOR')">
         <img style="cursor: pointer;" class="img-fluid p-0"  src="@if($ismobile){{asset('img/BANNERS-CASA-CREDITO-VENDE-09_2_.webp')}} @else {{asset('img/BANNERS-CASA-CREDITO-VENDE-08.webp')}} @endif" alt="Creditos para Migrantes" /> 
     </a>
    </div>
 </div>
@endif
@if($listings->count()<11)
<div class="card row mb-3" style="border-top:1px #FA7B34 solid">
 <div class="row">            
   <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO VENDE CON NOSOTROS')">
       <img style="cursor: pointer" class="img-fluid p-0"  src="@if($ismobile){{asset('img/vende-tu-propiedad-en-casacredito.webp')}} @else {{asset('img/vende-tu-propiedad-en-casacredito-web.jpg')}} @endif" alt="Vende tu casa con nosotros" class="imgdir rounded object-cover h-40 w-full" /> 
   </a>
  </div>
</div>
@endif

 <div class="row pt-4">
  <div class="col">
    <div class="float-right small px-2" onclick="upscroll()">{{$listings->onEachSide(0)->links()}}</div>
  </div>
</div>

</div>


@push('scripts')
<script>
  
const upscroll = () => {
        window.scrollTo(0,0)
}

  let verified = false;
  let scriptloaded = document.getElementById('scriptjquery');
  if(scriptloaded && scriptloaded.src != "") verified = true;

  let modSearch = document.getElementById('modalSearch');
  if(modSearch && verified) modSearch = new bootstrap.Modal(modSearch); 
  
    var bform_range;
    let rangebform_range = document.getElementById('bform_range');
    if(rangebform_range){
      rangebform_range.addEventListener('change', function(){ //si hay algun cambio en el range de anios de construccion, se manda en la variable para filtrarla
        bform_range = document.getElementById('bform_range').value; //Nueva variable para filtrar por años de construccion
      });
    }

    //funcion que envia el valor del input radio button al hacerlo click
    function btnradio_search(btnradio){
      @this.set('category', btnradio.value);
      changeImageBanner(btnradio.value);
    }

    function filter_search_aux(){
        let bform_category  = document.getElementById('bform_category').value;
        let bform_type      = document.getElementById('bform_type').value;
        let bform_province  = document.getElementById('bform_province').value;
        let bform_city      = document.getElementById('bform_city').value;
        let bform_fromprice = document.getElementById('bform_fromprice').value;
        let bform_uptoprice = document.getElementById('bform_uptoprice').value;
        let bform_bedrooms  = document.getElementById('bform_bedrooms').value;
        let bform_bathrooms = document.getElementById('bform_bathrooms').value;
        let bform_garage    = document.getElementById('bform_garage').value;
        let bform_searchtxt = document.getElementById('bform_searchtxt').value;

        console.log(bform_category);
        console.log(bform_type);
        console.log(bform_province);
        console.log(bform_city);
        console.log(bform_searchtxt);
        console.log(bform_uptoprice);
        console.log(bform_fromprice);
        console.log(bform_bedrooms);
        console.log(bform_bathrooms);
        console.log(bform_garage);

        @this.set('category', bform_category);
        @this.set('type', bform_type);
        @this.set('state', bform_province);
        @this.set('city', bform_city);
        @this.set('fromprice', bform_fromprice);
        @this.set('uptoprice', bform_uptoprice);
        @this.set('bedrooms', bform_bedrooms);
        @this.set('bathrooms', bform_bathrooms);
        @this.set('garage', bform_garage);
        @this.set('searchtxt', bform_searchtxt);
    }

    function filter_search(){

        let bform_category  = document.getElementById('bform_category').value;
        let bform_type      = document.getElementById('bform_type').value;
        let bform_province  = document.getElementById('bform_province').value;
        let bform_city      = document.getElementById('bform_city').value;
        let bform_fromprice = document.getElementById('bform_fromprice').value;
        let bform_uptoprice = document.getElementById('bform_uptoprice').value;
        let bform_tags      = document.getElementById('bform_tags').value; //Nueva variable para filtrar por estado 
        let bform_bedrooms  = document.getElementById('bform_bedrooms').value;
        let bform_bathrooms = document.getElementById('bform_bathrooms').value;

        @this.set('category', bform_category);
        @this.set('type', bform_type);
        @this.set('state', bform_province);
        @this.set('city', bform_city);
        @this.set('fromprice', bform_fromprice);
        @this.set('uptoprice', bform_uptoprice);
        @this.set('searchtxt', '');
        @this.set('pressButtom', 1);

        @this.set('tags', bform_tags); //envio la variable para conectarla con la creada en la clase
        @this.set('bedrooms', bform_bedrooms);
        @this.set('bathrooms', bform_bathrooms);

        if (this.bform_range) {
          @this.set('range', this.bform_range); //envio la variable para conectarla con la creada en la clase
        }
    }
    
    function top_search(){
      
      let check1 = document.getElementById('ftop_category_0');
      let check2 = document.getElementById('ftop_category_1');
      let check3 = document.getElementById('ftop_category_2');

      let tform_type = document.getElementById('ftop_type').value;  
      let tform_txt  = document.getElementById('ftop_txt').value;  
      let tform_category = '';
      
      // let bandera_tform_ptype = document.body.contains(document.getElementById('ftop_ptype'));

      // if(bandera_tform_ptype){
      //   let tform_ptype = document.getElementById('ftop_ptype').value//new variable
      //   @this.set('ptype', tform_ptype);
      // }

      let bandera_tform_pstate = document.body.contains(document.getElementById('selProvinceb'));

      if(bandera_tform_pstate){
        let tform_pstate = document.getElementById('selProvinceb').value;
        @this.set('pstate', tform_pstate);
      }

      if(check1.checked){tform_category=check1.value;changeImageBanner(tform_category);}
      if(check2.checked){tform_category=check2.value;changeImageBanner(tform_category);}
      if(check3.checked){tform_category=check3.value;changeImageBanner(tform_category);}

      document.getElementById('bform_category').value = '';
      document.getElementById('bform_type').value = '';
      document.getElementById('bform_province').value = '';
      document.getElementById('bform_city').value = '';
      document.getElementById('bform_fromprice').value = '';
      document.getElementById('bform_uptoprice').value = ''; 


        @this.set('category', tform_category);
        @this.set('searchtxt', tform_txt);
        @this.set('type', tform_type);
        @this.set('state', '');
        @this.set('city', '');
        @this.set('fromprice', '');
        @this.set('uptoprice', '');
        @this.set('pressButtom', 1);
    }
    
    function modal_search(){
      
      let mform_searchtxt = document.getElementById('mform_searchtxt').value;
      let mform_category  = document.getElementById('mform_category').value;
      let mform_type      = document.getElementById('mform_type').value;
      let mform_province  = document.getElementById('mform_province').value;
      let mform_city      = document.getElementById('mform_city').value;
      let mform_fromprice = document.getElementById('mform_fromprice').value;
      let mform_uptoprice = document.getElementById('mform_uptoprice').value;  

        @this.set('searchtxt', mform_searchtxt);
        @this.set('category', mform_category);
        @this.set('type', mform_type);
        @this.set('state', mform_province);
        @this.set('city', mform_city);
        @this.set('fromprice', mform_fromprice);
        @this.set('uptoprice', mform_uptoprice);
        @this.set('pressButtom', 1);
        
        modSearch.hide();
    }    
    
    function clear_search(){      
      document.getElementById('mform_searchtxt').value='';
      document.getElementById('mform_category').value='';
      document.getElementById('mform_type').value='';
      document.getElementById('mform_province').value='';
      document.getElementById('mform_city').value='';
      document.getElementById('mform_fromprice').value='';
      document.getElementById('mform_uptoprice').value='';


      document.getElementById('bform_tags').value = '';
      document.getElementById('bform_range').value = '';

      document.getElementById('bform_category').value = '';
      document.getElementById('bform_type').value = '';
      document.getElementById('bform_province').value = '';
      document.getElementById('bform_city').value = '';
      document.getElementById('bform_fromprice').value = '';
      document.getElementById('bform_uptoprice').value = '';

      //window.location.replace('https://casacredito.com/propiedades?');
      window.location.replace('http://casacredito.test/propiedades?');
    }

</script>
@endpush