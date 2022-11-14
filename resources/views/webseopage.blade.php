@extends('layouts.web')
@section('header')
<title>{{$seopage->title_google}}</title>
<meta name="description" content="{{$seopage->meta_description}}">
<style>
  .inputs-on-hover:hover{background-color: #EF4444; color: #ffffff; cursor: pointer}
  #labeldiv1, #labeldiv2, #labeldiv3, #labeldiv4, #labeldiv5, #labeldiv6, #labeldiv7, #labeldiv8{cursor: pointer !important;}
  .font-size-12{font-size: 14px}
  .card-listing:hover{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;}
  .btncall{color: #000000 !important;}.btncall:hover{color: #ffffff !important}
</style>
@livewireStyles
@endsection

@php
    if(isset($_SERVER['HTTP_USER_AGENT'])){
      $useragent= $_SERVER['HTTP_USER_AGENT'];
      $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
    }else{ $ismobile = false; }
@endphp

@section('content')

    {{-- <section id="bg-header" style="background: rgba(8, 8, 8, 0.449); background-size: cover;background-position: center; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;"> --}}
      <div class="row justify-content-center pt-5">
        <div class="pt-4">
          <h1 class="text-center">{{$seopage->title}}</h1>
          <p class="text-center">{{$seopage->description}}</p>
          <div class="container">
            <div class="mx-5 text-center">
                {!!$seopage->info_header!!}
            </div>
          </div>
        </div>
      </div>

      @if($ismobile)
      {{-- <div class="d-flex justify-content-center"> --}}
        <section id="bgimage" class="d-flex align-items-center justify-content-center py-3" style="background-size: cover; background-position: left center; width: 100%; background-repeat: no-repeat; height: auto; position: sticky; top: @if($ismobile) 55px @else 0px @endif; z-index: 2">
          <div class="d-flex justify-content-center searchmobile">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              FILTROS
            </button>
          </div>
        </section>
      {{-- </div> --}}
      @endif
    {{-- </section> --}}
    @if(!$ismobile)
    <section id="bgimage" class="d-flex align-items-center justify-content-center" style="background-size: cover; background-position: left center; width: 100%; background-repeat: no-repeat; height: auto; position: sticky; top: 0; z-index: 1">
      <div class="searchdesktop">
        <div class="d-flex justify-content-center pt-3 px-5 w-100">
          <div class="mx-1">
            <div id="div1" class="pattern bg-white rounded p-1 border" style="cursor: pointer !important">
              <input type="hidden" id="bform_province" name="state">
              <label for="states" class="d-flex"><div id="labeldiv1back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius:25px"></div> <div id="labeldiv1" class="font-weight-bolder">Provincia</div></label>
            </div>
            <div id="child1" class="overflow-auto position-absolute bg-white rounded p-1 border mt-1" style="display: none; position: absolute; z-index: 3;">
              @foreach ($states as $state)
              {{-- <div class="row"> --}}
                <div>
                  <input class="border-0 inputs-on-hover" type="text" onclick="setValue(this, 'labeldiv1')" value="{{$state->name}}" data-id="{{$state->id}}" readonly>  
                </div>
              {{-- </div> --}}
              @endforeach
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div2" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_city" name="city">
              <label for="states" class="d-flex"><div id="labeldiv2back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius:25px"></div> <div id="labeldiv2" class="font-weight-bolder">Ciudad</div></label>
            </div>
            <div id="child2" class="h-auto bg-white rounded p-1 border mt-1" style="display: none; position: absolute; z-index: 3;">
              <div class="d-flex align-items-center">
                <div>
                  {{-- <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div>  --}}
                  <label class="ml-1">Ciudad</label>
                </div>
              </div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div3" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_category">
              <label for="category" class="d-flex"><div id="labeldiv3back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv3" class="font-weight-bolder">Tipo de Búsqueda</div></label>
            </div>
            <div id="child3" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv3');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Venta" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv3');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Alquiler" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv3');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Proyectos" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div8" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_type">
              <label for="category" class="d-flex"><div id="labeldiv8back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv8" class="font-weight-bolder">Tipo de Propiedad</div></label>
            </div>
            <div id="child8" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Casas" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Departamentos" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Casas Comerciales" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Terrenos" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Quintas" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Haciendas" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Locales Comerciales" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Oficinas" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Suites" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div4" class="pattern bg-white rounded p-1 border">
              <label for="bathrooms" class="d-flex"><div id="labeldiv4back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv4" class="font-weight-bolder">Precio</div></label>
            </div>
            <div id="child4" class="bg-white rounded border p-1 mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div>
                <label for="">Desde</label>
                <div class="input-group input-group-sm">
                  <input type="number" class="form-control" id="bform_fromprice" placeholder="Ej: 90000">
                </div>
              </div>
              <div>
                <label for="">Hasta</label>
                <div class="input-group input-group-sm">
                  <input type="number" class="form-control" id="bform_uptoprice" placeholder="Ej: 100000">
                </div>
              </div>
            </div>
          </div>
  
          {{-- <div>
            <select class="form-select form-select-sm" name="" id="bform_province">
              <option value="">Provincia</option>
              @foreach ($states as $state)
                <option value="{{$state->id}}">{{$state->name}}</option>  
              @endforeach
            </select>
          </div>
  
          <div class="ml-1">
            <select class="form-select form-select-sm" name="" id="bform_city">
              <option value="">Ciudad</option>
            </select>
          </div> --}}
  
          <div class="mx-1">
            <div id="div5" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_bedrooms">
              <label for="bedrooms" class="d-flex"><div id="labeldiv5back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv5" class="font-weight-bolder">Habitaciones</div></label>
            </div>
            <div id="child5" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="2 habitaciones" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="3 habitaciones" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="4 habitaciones" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="5 habitaciones" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div6" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_bathrooms">
              <label for="bathrooms" class="d-flex"><div id="labeldiv6back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv6" class="font-weight-bolder">Baños</div></label>
            </div>
            <div id="child6" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="2 baños" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="3 baños" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="4 baños" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="5 baños" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div7" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_garage">
              <label for="bathrooms" class="d-flex"><div id="labeldiv7back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv7" class="font-weight-bolder">Garage</div></label>
            </div>
            <div id="child7" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="2 garages" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="3 garages" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="4 garages" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
          
          <div class="mb-3 ml-1">
            {{-- <label class="btn btn-danger px-2 btn-sm rounded-circle" onclick="filter_search()"><i class="fas fa-search"></i></label> --}}
            <label class="btn btn-danger px-2 btn-sm rounded-circle" onclick="filter_search_aux()"><i class="fas fa-search"></i></label>
            {{-- <label class="btn btn-danger px-2 btn-sm rounded-circle" onclick="clear_search()"><i class="fas fa-trash-alt"></i></label> --}}
          </div>
        </div>
      </div>
    </section>
    @endif

    <div class="container">

        {{-- header --}}
        @php
            $category = ""; $type = ""; $city = ""; $state = ""; $segments = [];
            $segment2 = request()->segment(2);
            if($segment2){
              if(!is_numeric($segment2)){
                $segments = explode("-", $segment2);
                $city = end($segments);
                if(($segments[0] == "casas" && $segments[1] == "comerciales") || ($segments[0] == "locales" && $segments[1] == "comerciales")){
                  $type = $segments[0] . " " . $segments[1];
                  $category = $segments[3];
                } else {
                  $type = $segments[0];
                  $category = $segments[2];
                }
              } else {
                $searchtxt = $segment2;
              }
            }
            if($city != "ecuador"){
              $city_aux = DB::table('info_cities')->where('name', 'LIKE', "%$city%")->get();
              $id_state;
              if(count($city_aux)>0){
                foreach ($city_aux as $c) {if(($c->state_id >= 1022 && $c->state_id <= 1043) || ($c->state_id == 3979 || $c->state_id == 3980)) $id_state = $c->state_id;}
              }
              $state = DB::table('info_states')->select('name')->where('id', $id_state)->where('country_id', '63')->first();
              $state = $state->name;
            }
        @endphp

        <div class="row justify-content-center">
          @livewire('proplist', ['category' => $category, 'type' => $type, 'state' => $state, 'city' => $city])
        </div>

        {{-- listando propiedades --}}
        {{-- @foreach ($listings as $listing)
        <div class="card row mb-3 shadow-sm card-listing mx-5" style="border-top:1px #FA7B34 solid">
            <div class="row pr-0">
                <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                  <div class="col p-0">
                      <div class="card" style="border:none">
                        
                        <div id="carouselControls{{$listing->id}}" class="carousel slide card-img-top" data-ride="carousel"  data-interval="false">
                          <div class="carousel-inner" style="max-height: 150px;">
                            @php $iiListing=0 @endphp
                            @if($ismobile==true)
                                @php 
                                  $firstImg = array_filter(explode("|", $listing->images)); 
                                  $imageVerification = asset('uploads/listing/thumb/600/'.$firstImg[0]); 
                                @endphp
                                <div class="carousel-item @if($iiListing==0) active @endif">
                                  <img loading="lazy" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$firstImg[0])) {{url('uploads/listing/thumb/600',$firstImg[0]??'')}} @else {{url('uploads/listing/600',$firstImg[0]??'')}} @endif" class="d-block w-100" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                                </div>
                            @else
                              @php
                                  $imageVerification = asset('uploads/listing/thumb/600/'. strtok($listing->images, '|'));
                              @endphp
                                @foreach(array_filter(explode("|", $listing->images)) as $img)              
                                  <div class="carousel-item @if($iiListing==0) active @endif">
                                    <img loading="lazy" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$img)) {{url('uploads/listing/thumb/600',$img)}} @else {{url('uploads/listing/600',$img)}} @endif" class="d-block w-100" alt="{{$listing->listing_title}}-{{$iiListing++}}">
                                  </div>
                                @endforeach
                            @endif
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
         
                        <div class="card-body">
                          <div class="d-flex justify-content-center text-danger">Precio: $ <span class=" font-weight-bold"> {{number_format($listing->property_price, 0, ',', '.')}}</span></div>
                          </div>
                      </div>
                  </div>
                </div>   
              <div class="col-sm-6 col-md-6 col-lg-8"> 
                  <div onclick="window.location.href('{{route('web.detail',$listing->slug)}}');return false;" style="cursor:pointer;">
                    
                    <div class="text-muted font-weight-bold float-left pb-1">COD:<span class="font-weight-bold text-danger">{{$listing->product_code}}</span> </div>
                    <div class="float-right px-3 py-0" style="color:white;font-size: 13px;background-color: #FA7B34">
                        @foreach ($types as $type) @if ($type->id==$listing->listingtype) {{$type->type_title}} @endif @endforeach
                      </div>                
                      <br>
                      <div class="w-100  font-weight-bold text-truncate"><a class="link-dark link-sindeco" href="{{route('web.detail',$listing->slug)}}">{{$listing->listing_title}}</a></div>
                    <div class="p-0 small font-weight-bold text-muted">@if(Str::contains($listing->address, ',')){{$listing->address}} @else {{$listing->state}}, {{$listing->city}}, {{$listing->address}}@endif</div>
                    <div class="small lh-sm" style="max-height:50px; overflow: hidden;">{{mb_substr(strip_tags($listing->listing_description),0,200)}}...</div>
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
                      <div class="py-2">
                        @if($listing->construction_area>0)<img src="{{asset('img/house.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->construction_area}} m<sup>2</sup> </span> @endif
                        @if($listing->land_area>0)<img src="{{asset('img/floor.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$listing->land_area}} m<sup>2</sup> </span> @endif
                        @if($bedroom>0)<img src="{{asset('img/bed-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bedroom}} </span> @endif
                        @if($bathroom>0)<img src="{{asset('img/bathroom-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$bathroom}} </span> @endif
                        @if($garage>0)<img src="{{asset('img/garage-black.png')}}" width="15"><span class="text-danger font-weight-bold small pr-2"> {{$garage}} </span> @endif
                      </div>
                </div>
                <div class="py-2">
                  <button class="btn btn-outline-secondary btn-sm px-1 d-none d-sm-inline-block" 
                data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informacion</button>
                 
                <button class="btn btn-danger btn-sm px-1 d-block d-sm-none" 
                data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('COD {{$listing->product_code}}')"><i class="fas fa-comment"></i> Solicitar Informacion</button>
                <div class="d-block d-sm-none py-1"></div>
                <a href="tel:+593983849073  " class="btn btn-outline-secondary btn-sm px-1" style="font-size:13px;"><i class="fas fa-phone"></i> LLamar Ecuador</a>
                  <a href="tel:+17186903740" class="btn btn-outline-secondary btn-sm px-1" style="font-size:13px;"><i class="fas fa-phone"></i> Estados Unidos</a>
                </div>
              </div>   
            </div>
          </div>
          @endforeach --}}

        {{-- @if(!$seopage->category == 0)
        <div class="d-flex justify-content-center">
            {{$listings->links()}}
        </div>
        @else --}}
        <div class="mx-5">
          @if(isset($seopage->similarlinks_g) && count(json_decode($seopage->similarlinks_g))>0)
              <h2>{{$seopage->subtitle_if_general}}</h2>
              <div class="row mt-2 mb-4">
                @php
                  $array = json_decode($seopage->similarlinks_g);
                @endphp
                @foreach ($array as $similarlink_g)
                  @php
                    $position = strpos($similarlink_g, '|');
                  @endphp
                  <div class="col-sm-4 my-2">
                    <a style="color: #C30000; font-weight: 500" href="{{substr($similarlink_g, $position+1)}}">{{substr($similarlink_g, 0, $position)}}</a>  
                  </div>  
                @endforeach
              </div>
            @endif
        </div>
        {{-- @endif --}}
        {{-- section footer --}}
        <div class="row">
            <div>
                {!! $seopage->info_footer !!}
            </div>

            {{-- links --}}
            @if(isset($seopage->similarlinks) && count(json_decode($seopage->similarlinks))>0)
            <hr>
              <p class="display-6">También te puede interesar</p>
              <div class="row mt-2 mb-4">
                @php
                  $array = json_decode($seopage->similarlinks);
                @endphp
                @foreach ($array as $similarlink)
                  @php
                    $position = strpos($similarlink, '|');
                  @endphp
                  <div class="col-sm-4 my-2">
                    <a style="color: #C30000; font-weight: 500" href="{{substr($similarlink, $position+1)}}">{{substr($similarlink, 0, $position)}}</a>  
                  </div>  
                @endforeach
              </div>
            @endif
        </div>
    </div>


    <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-labelledby="modalSearchLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-white" style="background-color: darkred !important;">
            <span class="modal-title" id="modalSearchLabel">Busqueda Avanzada</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" style="color: #FFF !important;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
    
                
            <div class="col mb-3">
              <label for="mform_searchtxt" class="form-label text-danger font-weight-bold">PALABRA CLAVE</label>
              <input type="text" value="" id="mform_searchtxt" class="form-control form-control-sm" placeholder="">
            </div>
    
              <div class="row">
                <div class="col mb-3">
                  <label for="mform_category" class="form-label text-danger font-weight-bold small">BUSQUEDA </label>
                  <select class="form-select form-select-sm" id="mform_category">
                    <option selected></option>
                    <option value="en-venta">Venta</option>
                    <option value="alquilar">Alquiler</option>
                    <option value="proyectos">Proyectos</option>
                  </select>
                </div>
                <div class="col mb-3">
                  <label for="mform_type" class="form-label text-danger  font-weight-bold small">PROPIEDAD</label>
                  <select  class="form-select form-select-sm" id="mform_type">
                        <option value="" selected></option>            
                        <option value="23">Casas </option>
                        <option value="24">Departamentos </option>
                        <option value="25">Casas Comerciales</option>
                        <option value="26">Terrenos</option>
                        <option value="29">Quintas</option>
                        <option value="30">Haciendas</option>
                        <option value="32">Locales Comerciales</option>
                        <option value="35">Oficinas</option>
                        <option value="36">Suites</option>
                    </select>
                </div>
              </div>
    
              <div>
                <label for="mform_province" class="form-label text-danger font-weight-bold">UBICACIÓN</label>
              </div>
    
              <div class="row">
                <div class="col mb-3">
                  <select class="form-select form-select-sm" id="mform_province">
                    <option value="" selected>Elige Provincia</option>
                    @foreach($states as $state)
                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                  </select>              
                </div>
                <div class="col mb-3">
                  <select class="form-select form-select-sm" id="mform_city">
                    <option value="" selected>Elige Ciudad</option>
                  </select>
                </div>
              </div>
                
                <div class="col">
                  <label for="mform_fromprice" class="form-label text-danger  font-weight-bold">PRECIO</label>
                </div>
    
              <div class="row">
                <div class="col mb-3">
                  <input type="text" value="" id="mform_fromprice" class="form-control form-control-sm" placeholder="Desde $">
                </div>
                
                <div class="col mb-3">
                  <input type="text" value="" id="mform_uptoprice" class="form-control form-control-sm" placeholder="Hasta $">
                </div>
              </div>  
    
                <div class="d-flex mb-3">
                  <button type="button" class="btn btn-light px-2 mx-2" onclick="clear_search()">Limpiar</button>
                  <button type="button" class="btn btn-danger px-4 mx-2" onclick="modal_search()">Buscar</button>
                </div>
                
    
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal -->
    @if($ismobile)
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white text-center">
            <h5 class="modal-title" id="exampleModalLabel">Busca la propiedad de tus sueños</h5>
            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
          </div>
          <div class="modal-body">
            <div class="row my-2">
              <label class="text-secondary font-size-12">¿En donde está buscando su propiedad?</label>
              <div class="col-sm-6 col-6 mt-1">
                <div>
                  <div id="div1" class="pattern bg-white rounded p-1 border" style="cursor: pointer !important">
                    <input type="hidden" id="bform_province" name="state">
                    <label for="states" class="d-flex"><div id="labeldiv1back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius:25px"></div> <div id="labeldiv1">Provincia</div></label>
                  </div>
                  <div id="child1" class="overflow-auto position-absolute bg-white rounded p-1 border mt-1" style="display: none; position: absolute; z-index: 3;">
                    @foreach ($states as $state)
                    {{-- <div class="row"> --}}
                      <div>
                        <input class="border-0 inputs-on-hover" type="text" onclick="setValue(this, 'labeldiv1')" value="{{$state->name}}" data-id="{{$state->id}}" readonly>  
                      </div>
                    {{-- </div> --}}
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-6 mt-1">
                <div>
                  <div id="div2" class="pattern bg-white rounded p-1 border">
                    <input type="hidden" id="bform_city" name="city">
                    <label for="states" class="d-flex"><div id="labeldiv2back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius:25px"></div> <div id="labeldiv2">Ciudad</div></label>
                  </div>
                  <div id="child2" class="h-auto bg-white rounded p-1 border mt-1" style="display: none; position: absolute; z-index: 3;">
                    <div class="d-flex align-items-center">
                      <div>
                        {{-- <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div>  --}}
                        <label class="ml-1">Ciudad</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-2">
              <label class="text-secondary font-size-12">Categoría</label>
              <div class="col-sm-12 col-12 mt-1">
                <div>
                  <div id="div3" class="pattern bg-white rounded p-1 border">
                    <input type="hidden" id="bform_category">
                    <label for="category" class="d-flex"><div id="labeldiv3back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv3">Tipo de Búsqueda</div></label>
                  </div>
                  <div id="child3" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
                    <div><input onclick="setValue(this, 'labeldiv3');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Venta" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv3');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Alquiler" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv3');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Proyectos" class="border-0 inputs-on-hover" readonly></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="text-secondary font-size-12">¿Qué tipo de propiedad está buscando?</label>
              <div class="col-sm-12 col-12 mt-1">
                <div class="mx-1">
                  <div id="div8" class="pattern bg-white rounded p-1 border">
                    <input type="hidden" id="bform_type">
                    <label for="category" class="d-flex"><div id="labeldiv8back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv8">Tipo de Propiedad</div></label>
                  </div>
                  <div id="child8" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Casas" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Departamentos" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Casas Comerciales" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Terrenos" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Quintas" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Haciendas" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Locales Comerciales" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Oficinas" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv8');changeLocationWithSlug(document.getElementById('bform_city').value);" type="text" value="Suites" class="border-0 inputs-on-hover" readonly></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row my-2">
              <label class="text-secondary font-size-12">Presupuesto que se adapte a sus necesidades</label>
              <div class="col-sm-12 col-12 mt-1">
                <div>
                  <div id="div4" class="pattern bg-white rounded p-1 border">
                    <label for="bathrooms" class="d-flex"><div id="labeldiv4back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv4">Precio</div></label>
                  </div>
                  <div id="child4" class="bg-white rounded border p-1 mt-1" style="display: none; position: absolute; z-index: 3; ">
                    <div>
                      <label for="">Desde</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="bform_fromprice" placeholder="Ej: 90000">
                      </div>
                    </div>
                    <div>
                      <label for="">Hasta</label>
                      <div class="input-group input-group-sm">
                        <input type="number" class="form-control" id="bform_uptoprice" placeholder="Ej: 100000">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="text-secondary font-size-12">Detalles de la propiedad</label>
              <div class="col-sm-6 col-6 mt-1">
                <div>
                  <div id="div5" class="pattern bg-white rounded p-1 border">
                    <input type="hidden" id="bform_bedrooms">
                    <label for="bedrooms" class="d-flex"><div id="labeldiv5back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv5">Habitaciones</div></label>
                  </div>
                  <div id="child5" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="2 habitaciones" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="3 habitaciones" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="4 habitaciones" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="5 habitaciones" class="border-0 inputs-on-hover" readonly></div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-6 mt-1">
                <div>
                  <div id="div6" class="pattern bg-white rounded p-1 border">
                    <input type="hidden" id="bform_bathrooms">
                    <label for="bathrooms" class="d-flex"><div id="labeldiv6back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv6">Baños</div></label>
                  </div>
                  <div id="child6" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="2 baños" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="3 baños" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="4 baños" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="5 baños" class="border-0 inputs-on-hover" readonly></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row my-2">
              <div class="col-sm-6 col-6 mt-1">
                <div>
                  <div id="div7" class="pattern bg-white rounded p-1 border">
                    <input type="hidden" id="bform_garage">
                    <label for="bathrooms" class="d-flex"><div id="labeldiv7back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv7">Garage</div></label>
                  </div>
                  <div id="child7" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="2 garages" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="3 garages" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="4 garages" class="border-0 inputs-on-hover" readonly></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" onclick="filter_search_aux()" data-bs-dismiss="modal">Buscar <i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    @endif
@endsection

@section('script')
    <script>
      window.addEventListener('load', (event) => {
        //set image background in search div
        document.getElementById('bgimage').style.backgroundImage = "url({{asset('img/backimagesearch.jpg')}})";
        let slug = "{{request()->segment(2)}}";
          if(isNaN(slug)){
            let arrayslug = slug.split("-");
            if((arrayslug[0] == "casas" && arrayslug[1] == "comerciales") || (arrayslug[0] == "locales" && arrayslug[1] == "comerciales")){
              document.getElementById("bform_category").value = arrayslug[3];
              document.getElementById("labeldiv3").innerHTML = arrayslug[3].charAt(0).toUpperCase() + arrayslug[3].slice(1).toLowerCase();
              document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";
              document.getElementById("bform_type").value = arrayslug[0] + " " + arrayslug[1];
              document.getElementById("labeldiv8").innerHTML = arrayslug[0].charAt(0).toUpperCase() + arrayslug[0].slice(1).toLowerCase() + " " + arrayslug[1];
              document.getElementById('labeldiv8back').style.backgroundColor="#5EBA7D";
              if(arrayslug[5]){
                if(arrayslug[5] != "ecuador"){
                  document.getElementById('bform_city').value = arrayslug[5];
                  document.getElementById('labeldiv2').innerHTML = arrayslug[5].charAt(0).toUpperCase() + arrayslug[5].slice(1).toLowerCase();
                  document.getElementById('labeldiv2back').style.backgroundColor="#5EBA7D";
                  getState(arrayslug[5]);
                }
              }
            } else {
              document.getElementById("bform_category").value = arrayslug[2].charAt(0).toUpperCase() + arrayslug[2].slice(1).toLowerCase();
              document.getElementById("labeldiv3").innerHTML = arrayslug[2].charAt(0).toUpperCase() + arrayslug[2].slice(1).toLowerCase();
              document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";
              document.getElementById("bform_type").value = arrayslug[0].charAt(0).toUpperCase() + arrayslug[0].slice(1).toLowerCase();
              document.getElementById("labeldiv8").innerHTML = arrayslug[0].charAt(0).toUpperCase() + arrayslug[0].slice(1).toLowerCase();
              document.getElementById('labeldiv8back').style.backgroundColor="#5EBA7D";
              if(arrayslug[4]){
                if(arrayslug[4] != "ecuador"){
                  document.getElementById('bform_city').value = arrayslug[4];
                  document.getElementById('labeldiv2').innerHTML = arrayslug[4].charAt(0).toUpperCase() + arrayslug[4].slice(1).toLowerCase();
                  document.getElementById('labeldiv2back').style.backgroundColor="#5EBA7D";
                  getState(arrayslug[4]);
                }
              }
            }
          }
      });

      async function getState(city){
        const response = await fetch("{{url('getstate')}}/"+city);
        const state = await response.json();
        //console.log(state);
        if(state){
          //console.log(state.name);
          document.getElementById('bform_province').value = state.name.toLowerCase();
          document.getElementById('labeldiv1').innerHTML = state.name;
          document.getElementById('labeldiv1back').style.backgroundColor="#5EBA7D";
        } 
        else {
          document.getElementById('bform_province').value = "";
          document.getElementById('labeldiv1').innerHTML = "Provincia";
        }

      }

      function setValue(object, label){  
        document.getElementById(label).innerHTML = object.value;
        document.getElementById(label+"back").style.backgroundColor = "#5EBA7D";
        document.getElementById('child'+label.substring(8)).style.display = "none";

        let divpattern = document.getElementById(label.substring(5));
        let inputhidden = divpattern.firstElementChild;
        
        // if(label === "labeldiv8"){
        //     inputhidden.value = object.dataset.id;
        // } else {
            switch (object.value) {
                case "Venta": inputhidden.value = "en-venta";break;
                case "Alquiler": inputhidden.value = "alquiler"; break;
                case "Casas": inputhidden.value = 23; break;
                case "Departamentos": inputhidden.value = 24; break;
                case "Casas Comerciales": inputhidden.value = 25; break;
                case "Terrenos": inputhidden.value = 26; break;
                case "Quintas": inputhidden.value = 29; break;
                case "Haciendas": inputhidden.value = 30; break;
                case "Locales Comerciales": inputhidden.value = 32; break;
                case "Oficinas": inputhidden.value = 35; break;
                case "Suites": inputhidden.value = 36; break;
                case "ON": inputhidden.value = "A"; break;
                case "OFF": inputhidden.value = "D"; break;
                default: inputhidden.value = object.value; break;
            }
        //}

        // if(object.value === "Venta") inputhidden.value = "en-venta";
        // else if(object.value === "Alquiler") inputhidden.value = "alquilar";
        // else inputhidden.value = object.value;
        if(label === "labeldiv1") getCities(object.dataset.id);
    }

    const selCity = document.getElementById('child2');

    async function getCities(id){
        let labeldiv2 = document.getElementById('labeldiv2');
        document.getElementById('labeldiv2back').style.backgroundColor = "#EF4444";
        labeldiv2.innerHTML = "Ciudad";
        //selCity.options.length = 0;
        selCity.innerHTML = "";
        const response = await fetch("{{url('getcities')}}/"+id );
        const cities = await response.json();
    
        var opt = document.createElement('input');
        //   opt.appendChild( document.createTextNode('Ciudad') );
        //   opt.value = 'Ciudad';
        //   selCity.appendChild(opt);
        cities.forEach(city => {
          var opt = document.createElement('input');
          var saltolinea = document.createElement('br');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          opt.readOnly = true;
          opt.addEventListener("click", function(){
            setValue(opt, 'labeldiv2');
            changeLocationWithSlug(city.name);
          });
          opt.classList.add('w-auto', 'm-0', 'rounded', 'pl-1', 'border-0', 'inputs-on-hover');
          selCity.appendChild(opt);
          selCity.appendChild(saltolinea);
      });
    }

    document.querySelectorAll('.pattern').forEach(item => {
        item.addEventListener('click', event => {
            eventsClick(item.id);
        });
    });

    function eventsClick(iditem){
        openmaxminprice(iditem);
        const divpriceinputs = document.getElementById('child'+iditem.substring(3));
        const divlabelprecio = document.getElementById(iditem);
        document.addEventListener("click", (event) => {
        const isClickDivPriceInputs = divpriceinputs.contains(event.target);
        const isClickDivLabelPrecio = divlabelprecio.contains(event.target);
            if (!isClickDivPriceInputs && !isClickDivLabelPrecio) {
                if(divpriceinputs.style.display === "block") divpriceinputs.style.display = "none";
            }
        });
    }

    function openmaxminprice(iditem){
        let divpriceminmax = document.getElementById('child'+iditem.substring(3));
        if(divpriceminmax.style.display == "none") {divpriceminmax.style.display = "block";}
        else if(divpriceminmax.style.display == "block") {divpriceminmax.style.display = "none"};
    }

    // document.getElementById('btnsubmit').addEventListener("click", function(event){
    //   event.preventDefault();
      
    // });

    function changeLocationWithSlug(city){
      if(!city) city = "ecuador";
      let category = document.getElementById('bform_category').value;
      if(!category) category = "venta";
      let type = document.getElementById('bform_type').value;
      if(!type) type = "casas";
      if(isNaN(type)) {
        type = type.toLowerCase();
        type = type.replace(/\s/g, "-");
      }
      else {
        type = getTypePropertieById(type);
        type = type.replace(/\s/g, "-");
      }
      let slug = type.toLowerCase() + "-en-" + category.toLowerCase() + "-en-" + city.toLowerCase();
      let url = "{{route('web.propiedades', ':slug')}}";
      url = url.replace(":slug", slug);
      window.location.href = url;
    }

    function getTypePropertieById(categoryid){
  let category = "";
  switch (categoryid) {
      case "23": category = "casas"; break;
      case "24": category = "departamentos"; break;
      case "25": category = "casas Comerciales"; break;
      case "26": category = "terrenos"; break;
      case "29": category = "quintas"; break;
      case "30": category = "haciendas"; break;
      case "32": category = "locales Comerciales"; break;
      case "35": category = "oficinas"; break;
      case "36": category = "suites"; break;
      default: break;
    }
    return category;
}
    </script>
    @livewireScripts
    @stack('scripts')
@endsection