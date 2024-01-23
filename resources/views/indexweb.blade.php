@extends('layouts.web')
@section('header')
{{-- @if(request()->segment(1) != null && request()->segment(1) != "propiedades") --}}
  @switch(request()->segment(1))
      @case('casas-de-venta-en-ecuador')
      @case('departamentos-de-venta-en-ecuador')
      @case('terrenos-de-venta-en-ecuador')
      @case('casas-de-venta-en-cuenca')
      @case('departamentos-de-venta-en-cuenca')
      @case('terrenos-de-venta-en-cuenca')
      @case('casas-de-venta-en-quito')
      @case('departamentos-de-venta-en-quito')
      @case('terrenos-de-venta-en-quito')
      @case('casas-de-venta-en-guayaquil')
      @case('departamentos-de-venta-en-guayaquil')
      @case('terrenos-de-venta-en-guayaquil')
        @php
            $meta_seo = request()->segment(1);
        @endphp
          @break
      @default 
  @endswitch
{{-- @endif --}}

{{-- <title>@isset($meta_seo){{ ucfirst(str_replace('-', ' ', $meta_seo)) }} - Casa Crédito 🏠 @else Compra, Venta y Alquiler de Propiedades en Ecuador 🏠 @endisset</title> --}}
<title>@if(request()->segment(2)){{ucwords(str_replace("-", " ", request()->segment(2)))}} - Casa Crédito 🏠 @else Encuentre las mejores Propiedades en Venta o Alquiler 🏠 @endif</title>
{{-- <meta name="description" content="@isset($meta_seo)En Casa Crédito contamos con {{ucfirst(str_replace('-', ' ', $meta_seo)) }}. Acceda a nuestro Sitio Web y encuentre la casa de sus sueños. Precios Atractivos, Lugares Ideales 😉 @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endisset"/> --}}
<meta name="description" content="@if(request()->segment(2) != null) En Casa Crédito contamos con {{ucwords(str_replace("-", " ", request()->segment(2)))}}. Acceda a nuestro Sitio Web y encuentre la casa de sus sueños. Precios Atractivos, Lugares Ideales 😉 @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endif">
<meta name="keywords" content="@isset($meta_seo) {{ $keywords }} @else casas en venta, casas en venta guayaquil, casas en venta en guayaquil, casas en venta quito, casas en venta en quito, casas en venta cuenca, casas en venta en cuenca, casas de venta en guayaquil, casas de venta en quito, casas de venta en cuenca, casas en venta en guayaquil baratas, casas en venta en quito baratas, casas en venta en cuenca baratas, departamentos en venta, departamentos en venta en quito, departamentos en venta quito, departamentos en venta guayaquil, departamentos en venta en guayaquil, departamentos en venta cuenca, departamentos en venta en cuenca, venta casas cuenca, venta casas guayaquil, venta casas quito, departamentos en alquiler, departamentos en alquiler quito, departamentos en alquiler guayaquil, departamentos en alquiler cuenca, departamentos de alquiler en quito, departamentos de alquiler en guayaquil, departamentos de alquiler en cuenca, terrenos en venta, terrenos en venta cuenca, terrenos en venta en cuenca, terrenos de venta en cuenca, terrenos en venta quito, terrenos en venta en quito, terrenos de venta en quito, terrenos en venta guayaquil, terrenos en venta en guayaquil, terrenos de venta en guayaquil, venta terrenos cuenca, venta terrenos guayaquil, venta terrenos quito, lotes en venta, lotes en venta en cuenca, lotes en venta en quito, lotes en venta en guayaquil, apartamentos en venta, apartamentos en venta quito, apartamentos en venta guayaquil, apartamentos en venta cuenca @endif">

<meta property="og:url"                content="{{route('web.index')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="@isset($meta_seo){{ucfirst(str_replace('-', ' ', $meta_seo))}} - Casa Crédito @else Casa Crédito Encuentra la casa de tus sueños. @endisset" />
<meta property="og:description"        content="@isset($meta_seo)En Casa Crédito Contamos con {{ucfirst(str_replace('-', ' ', $meta_seo))}}. Acceda a nuestro sitio web y encuentre la casa de sus sueños. Precios Atractivos, Lugares Ideales 😉 @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endisset" />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />
<style>
  .carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
  }

  .carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
  }
  input[type=range]::-moz-range-thumb {
    box-shadow: 0px 0px 0px #000000;
    border: 1px solid #ff0000;
    height: 18px;
    width: 18px;
    border-radius: 25px;
    background: #ff0000;
    cursor: pointer;
  }
  input[type=range]::-webkit-slider-thumb {
    box-shadow: 0px 0px 0px #000000;
    border: 1px solid #ff0000;
    height: 18px;
    width: 18px;
    border-radius: 25px;
    background: #ff0000;
    cursor: pointer;
  }
  .card-listing:hover{box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px !important;}
  .inputs-on-hover:hover{background-color: #EF4444; color: #ffffff; cursor: pointer}
  #labeldiv1, #labeldiv2, #labeldiv3, #labeldiv4, #labeldiv5, #labeldiv6, #labeldiv7, #labeldiv8, #labeldiv9{cursor: pointer !important;}
  .btncall{color: #000000 !important;}.btncall:hover{color: #ffffff !important}
  .btn-wpp:hover{background-color: green; color: #ffffff}
</style>
@livewireStyles
@endsection

@section('content')
    @php
      $category="";$ptype="";$searchtxt="";
      if(Request()->get('category') != null){$category = Request()->get('category');}
      if(Request()->get('ptype') != null){$ptype = Request()->get('ptype');}
      if(Request()->get('searchtxt') != null){$searchtxt = Request()->get('searchtxt');}

      if(is_numeric(request()->segment(2)) || preg_match('/[0-9]/', request()->segment(2)) == 1) {
        $listing = \App\Models\Listing::select('listing_title')->where('status', 1)->where('product_code', request()->segment(2))->first();
        if($listing){
          $h1 = $listing->listing_title;
        } else {
          $h1 = "Casa Crédito, la mejor opción para Comprar y Vender Propiedades en Ecuador";
        }
      } else {$h1 = ucwords(str_replace("-", " ", request()->segment(2)));}
    @endphp

    <div class="loading show">
      <div class="spin"></div>
    </div>

    <section id="prisection" style="background-size: cover;background-position: 0rem 23%; width: 100%; background-repeat: no-repeat;display: none">
      <div>
        
          <div class="row align-items-center d-flex justify-content-center" style="margin: 0; min-height: 450px;">
    
              <div class="col-12 text-white text-center p-4" style="width: 600px;background:rgba(2, 2, 2, 0.5)">
                <p class="font-weight-bold heading-title" style="font-size: 30px; margin: 0px">Su sueño está aquí</p>
                {{-- <h1 style="font-size: 20px">Compra, Venta y Alquiler de Propiedades</h1> --}}

                <div class="btn-group pb-2">
                  <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_0" autocomplete="off" value="en-venta" @if($category === "en-venta") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)">
                  <label class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">COMPRAR</label>
                  
                  <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_1" autocomplete="off" value="alquilar" @if($category === "alquilar") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)">
                  <label class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">ALQUILAR</label>
                  
                  <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_2" autocomplete="off" value="proyectos" @if($category === "proyectos") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)">
                  <label class="btn btn-outline-danger" for="ftop_category_2" style="width:100px;font-size: 14px">PROYECTOS</label>
                </div>

    
                <div class="input-group mb-3">
                      <select class="form-select" id="ftop_type" style="max-width:170px;">
                            <option value="">Todas</option>	
                            <option value="23" @if($ptype === "23") selected @endif>Casas </option>
                            <option value="24" @if($ptype === "24") selected @endif>Departamentos </option>
                            <option value="25" @if($ptype === "25") selected @endif>Casas Comerciales</option>
                            <option value="26" @if($ptype === "26") selected @endif>Terrenos</option>
                            <option value="29" @if($ptype === "29") selected @endif>Quintas</option>
                            <option value="30" @if($ptype === "30") selected @endif>Haciendas</option>
                            <option value="32" @if($ptype === "32") selected @endif>Locales Comerciales</option>
                            <option value="35" @if($ptype === "35") selected @endif>Oficinas</option>
                            <option value="36" @if($ptype === "36") selected @endif>Suites</option>
                      </select>
                      <input type="text" id="ftop_txt" style="font-size: 14px" placeholder="INGRESE / UBICACIÓN / CÓDIGO" class="form-control" @if($searchtxt != null) value="{{$searchtxt}}" @endif onkeypress="if(event.keyCode==13)top_search()">
                      <button type="button" class="btn btn-danger"  onclick="top_search()">BUSCAR</button>
                </div>       

            </div>
    
        </div>
      </div>
    </section>
    {{-- new filters --}}
    {{-- <div class="sticky-top px-5" style="background-color: #bdbdbd"> --}}
      {{-- <form id="newsearch" action="{{route('web.search', ['category', 'en-venta', 'cuenca'])}}" method="GET" class="sticky-top"> --}}
        <section id="imgheader" style="background-size: cover;background-position: bottom center; width: 100%; background-repeat: no-repeat;">
          <div class="d-flex justify-content-center align-items-center pt-5 pb-4 text-center" style="min-height: 200px; height: 200px">
            <h1 class="h3 @if($ismobile) pt-4 @endif">@if($h1 != null || $h1 != "") {{$h1}} @else Encuentre las mejores Propiedades en Venta o Alquiler en <b class="text-danger font-weight-bold">Casa Crédito</b> @endif</h1>
          </div>
        </section>

      @if($ismobile)
        <section id="bgimage" class="d-flex align-items-center justify-content-center py-3" style="background-size: cover; background-position: left center; width: 100%; background-repeat: no-repeat; height: auto; position: sticky; top: @if($ismobile) 55px @else 0px @endif; z-index: 2">
          <div class="d-flex justify-content-center searchmobile">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              FILTROS <i class="fas fa-search"></i>
            </button>
          </div>
        </section>
      @endif

      @if(!$ismobile)
      <section id="bgimage" class="d-flex align-items-center justify-content-center mb-3" style="background-size: cover; background-position: left center; width: 100%; background-repeat: no-repeat; height: auto; position: sticky; top: 0; z-index: 2">
        <div class="d-inline-flex pt-3 px-5 w-100 justify-content-center mb-3">

          <div class="mx-1">
            <div class="bg-white rounded border border-gray-600" style="height: 33px;margin-top: 1px">
              <input type="text" class="border-0 rounded px-2" style="font-size: 12px; width: 180px; outline: none;padding-top: 7px !important" placeholder="Buscar por sector o código" id="bform_searchtxt"><i class="fas fa-search pl-2 pr-2" style="cursor: pointer; font-size: 12px" onclick="filter_search_aux()"></i>
            </div>
          </div>

          <div class="mx-1">
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
  
          <div class="mx-1">
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
  
          <div class="mx-1">
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

          {{-- <div class="mx-1">
            <div id="div9" class="pattern bg-white rounded p-1 border">
              <label for="category" class="d-flex"><div id="labeldiv9back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv9">Sector</div></label>
            </div>
            <div id="child9" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input type="text" class="border-0 m-1" onkeyup="setcolortodiv9(this)" placeholder="Ubicación  o Código" id="bform_searchtxt"></div>
            </div>
          </div> --}}
  
          <div class="mx-1">
            <div id="div4" class="pattern bg-white rounded p-1 border">
              <label for="bathrooms" class="d-flex"><div id="labeldiv4back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv4">Precio</div></label>
            </div>
            <div id="child4" class="bg-white rounded border p-1 mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div>
                <label for="">Desde</label>
                <div class="input-group input-group-sm">
                  <input type="number" class="form-control" id="bform_fromprice" placeholder="Ej: 90000" onblur="filter_search_aux()">
                </div>
              </div>
              <div>
                <label for="">Hasta</label>
                <div class="input-group input-group-sm">
                  <input type="number" class="form-control" id="bform_uptoprice" placeholder="Ej: 100000" onblur="filter_search_aux()">
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
              <label for="bedrooms" class="d-flex"><div id="labeldiv5back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv5">Habitaciones</div></label>
            </div>
            <div id="child5" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv5');filter_search_aux()" type="text" value="1 habitacion" class="border-0 inputs-on-hover rounded" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5');filter_search_aux()" type="text" value="2 habitaciones" class="border-0 inputs-on-hover rounded" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5');filter_search_aux()" type="text" value="3 habitaciones" class="border-0 inputs-on-hover rounded" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5');filter_search_aux()" type="text" value="4 habitaciones" class="border-0 inputs-on-hover rounded" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv5');filter_search_aux()" type="text" value="5 habitaciones" class="border-0 inputs-on-hover rounded" readonly></div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div6" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_bathrooms">
              <label for="bathrooms" class="d-flex"><div id="labeldiv6back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv6">Baños</div></label>
            </div>
            <div id="child6" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv6');filter_search_aux()" type="text" value="1 baño" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6');filter_search_aux()" type="text" value="2 baños" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6');filter_search_aux()" type="text" value="3 baños" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6');filter_search_aux()" type="text" value="4 baños" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv6');filter_search_aux()" type="text" value="5 baños" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
  
          <div class="mx-1">
            <div id="div7" class="pattern bg-white rounded p-1 border">
              <input type="hidden" id="bform_garage">
              <label for="bathrooms" class="d-flex"><div id="labeldiv7back" class="mt-2 mr-1" style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> <div id="labeldiv7">Garage</div></label>
            </div>
            <div id="child7" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3; ">
              <div><input onclick="setValue(this, 'labeldiv7');filter_search_aux()" type="text" value="1 garage" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv7');filter_search_aux()" type="text" value="2 garage" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv7');filter_search_aux()" type="text" value="3 garage" class="border-0 inputs-on-hover" readonly></div>
              <div><input onclick="setValue(this, 'labeldiv7');filter_search_aux()" type="text" value="4 garage" class="border-0 inputs-on-hover" readonly></div>
            </div>
          </div>
          
          {{-- <div class="mb-3 ml-1">
            <label onclick="filter_search_aux();" class="btn btn-danger px-2 btn-sm rounded-circle"><i class="fas fa-search"></i></label>
          </div> --}}
        </div>
      </section>
      @endif
    {{-- </form> --}}
    {{-- </div> --}}
    {{-- end new filters --}}

    <section class="container">
        <div class="row justify-content-center">
            <div class="col-3 d-none">
              {{-- d-sm-block  --}}
              <div class="card my-4">
                <div class="card-body">
                  <div class="mb-3">
                    <label for="bform_category" class="form-label text-danger  font-weight-bold">TIPO DE BUSQUEDA </label>
                    <select class="form-select form-select-sm mb-3" id="bform_category">
                      <option selected></option>
                      <option value="en-venta">Venta</option>
                      <option value="alquilar">Alquiler</option>
                      <option value="proyectos">Proyectos</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="bform_type" class="form-label text-danger  font-weight-bold">TIPO DE PROPIEDAD</label>
                    <select  class="form-select form-select-sm mb-3" id="bform_type">
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
                  {{-- NUEVO DIV PARA BUSCAR POR ANITGUEDAD --}}
                  <div id="divantiguedad" class="mb-3" style="display: none">
                    <label for="bform_tags" class="form-label text-danger  font-weight-bold">ESTADO</label>
                    <select class="form-select form-select-sm mb-3" id="bform_tags">
                      <option selected></option>
                      <option value="2">Nueva</option>
                      <option value="5">En proyecto</option>
                      <option value="6">Usada</option>
                      <option value="7">Colonial</option>
                    </select>
                  </div>
                  {{-- TERMINA DIV --}}

                  {{-- div para rango de años de construccion --}}
                  <div class="mb-3">
                    <div class="d-flex">
                      <label for="bform_range" class="form-label text-danger font-weight-bold ml-2 mt-2">AÑOS DE CONSTRUCCIÓN</label>
                    </div><br>
                    <div>
                      <span id="rangeValue"></span>
                      <input type="range" class="form-range" min="0" max="4" step="1" id="bform_range" onchange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)">
                    </div>
                  </div>
                  {{-- termina div --}}

                  <div class="mb-3">
                    <label for="bform_province" class="form-label text-danger  font-weight-bold">UBICACIÓN</label>
                    <select class="form-select form-select-sm mb-3" id="bform_province">
                      <option value="" selected>Elige Provincia</option>
                      @foreach($states as $state)
                          <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                      @endforeach
                    </select>
                    {{-- id="bform_city" --}}
                    <select class="form-select form-select-sm mb-3">
                      {{-- cambie el id del select de provincia y ciudad para ocupar los id originales en los nuevos select de los nuevos filtros --}}
                      <option value="" selected>Elige Ciudad</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label for="bform_fromprice" class="form-label text-danger  font-weight-bold">PRECIO</label>
                    <input type="text" value="" id="bform_fromprice" class="form-control" placeholder="Desde $">
                  </div>
                  
                  <div class="mb-3">
                    <input type="text" value="" id="bform_uptoprice" class="form-control" placeholder="Hasta $">
                  </div>
                  
                  <div class="mb-3">
                    <button type="button" class="btn btn-danger px-2" onclick="filter_search()">Buscar</button>
                    <button type="button" class="btn btn-danger px-2" onclick="clear_search()">Limpiar</button>.
                  </div>
                </div>
              </div>
              {{-- <div class="col">
                <h5 class="px-2 text-center">Mas Buscados</h5>
                <div id="carouselExampleControls2" class="carousel slide card-img-top" data-ride="carousel">
                    <div class="carousel-inner  text-center" style="max-height: 500px;cursor: pointer;">
                      <!-- https://casacredito.com/uploads/listing/600/IMG_674-60b94d88c1e28.jpg -->

                        <div class="carousel-item active">                            
                          <div class="card" > <a href="https://casacredito.com/propiedades?searchtxt=Ricaurte">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_674-60b94d88c1e28.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Ricaurte</h5>
                            </div>
                          </div>
                        </div>
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/propiedades?searchtxt=Yunguilla">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_684-60f9cc142c5c2.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Yunguilla</h5>
                            </div>
                          </div>
                        </div>   
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/propiedades?searchtxt=Totoracocha">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_543-60469a976c4a7.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Totoracocha</h5>
                            </div>
                          </div>
                        </div>   
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/propiedades?searchtxt=Baños">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_655-60da2fbb14a6a.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Baños</h5>
                            </div>
                          </div>
                        </div>   
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/propiedades?searchtxt=Racar">
                            <img src="https://casacredito.com/uploads/listing/600/1596045872_gallery.1331.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Racar</h5>
                            </div>
                          </div>
                        </div>   
                        
                        



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
              </div> --}}

              <div class="col mt-3">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="3000">
                  <div class="carousel-inner" style="border-radius: 5px">

                    <div class="carousel-item active">
                      <img src="{{ asset('img/CREDITO-HIPOTECARIO.webp') }}" class="d-block w-100" alt="...">
                      <div class="carousel-caption" style="margin-bottom: 25px">
                        <div class="text-center">
                          <div id="txt_info" style="padding-top: 8rem">
                            <img src="{{ asset('img/ECUADOR-04.webp') }}" width="35px" alt="Creditos Hipotecarios para Ecuatorianos residentes en Estados Unidos">
                            <img src="{{ asset('img/USA-05.webp') }}" width="35px" alt="Creditos Hipotecarios para Ecuatorianos residentes en Estados Unidos">
                          </div>
                          <p class="text-white" style="font-weight: 500; font-size: 15px">Créditos Hipotecarios <br> para migrantes</p>
                        </div>
                      </div>
                      <div class="position-absolute" onclick="setInterest('Créditos Hipotecarios')" data-toggle="modal" data-target="#modalContact" style="bottom: 0; left: 0; width: 100%; background-color: #c30000; height: 60px; cursor: pointer">
                        <div class="position-relative" style="display: flex; justify-content: center; text-align: center">
                          <div class="position-absolute" style="top: 0; margin-top: -20px">
                            <i style="background-color: #c30000; color: #ffffff; padding: 5px; border-radius: 25px" class="fal fa-usd-circle fa-2x"></i>
                            <p class="text-white" style="font-size: 15px; font-weight: 400">Solicite su crédito <u style="font-weight: bold">AQUÍ</u></p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="{{ asset('img/CONSUMO.webp') }}" class="d-block w-100" alt="...">
                      <div class="carousel-caption" style="margin-bottom: 25px">
                        <div class="text-center">
                          <div id="txt_info" style="padding-top: -50px">
                            <img src="{{ asset('img/ECUADOR-04.webp') }}" width="35px" alt="Creditos de consumo para Ecuatorianos residentes en Estados Unidos">
                            <img src="{{ asset('img/USA-05.webp') }}" width="35px" alt="Creditos de consumo para Ecuatorianos residentes en Estados Unidos">
                          </div>
                          <p class="text-white" style="font-weight: 500; font-size: 15px">Créditos de Consumo <br> para migrantes</p>
                        </div>
                      </div>
                      <div class="position-absolute" onclick="setInterest('Créditos de Consumo')" data-toggle="modal" data-target="#modalContact" style="bottom: 0; left: 0; width: 100%; background-color: #c30000; height: 60px; cursor: pointer">
                        <div class="position-relative" style="display: flex; justify-content: center; text-align: center">
                          <div class="position-absolute" style="top: 0; margin-top: -20px">
                            <i style="background-color: #c30000; color: #ffffff; padding: 5px; border-radius: 25px" class="fal fa-usd-circle fa-2x"></i>
                            <p class="text-white" style="font-size: 15px; font-weight: 400">Solicite su crédito <u style="font-weight: bold">AQUÍ</u></p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="carousel-item">
                      <img src="{{ asset('img/CONSTRUCCION.webp') }}" class="d-block w-100" alt="...">
                      <div class="carousel-caption" style="margin-bottom: 25px">
                        <div class="text-center">
                          <div id="txt_info" style="padding-top: -50px">
                            <img src="{{ asset('img/ECUADOR-04.webp') }}" width="35px" alt="Creditos de Construcción para Ecuatorianos residentes en Estados Unidos">
                            <img src="{{ asset('img/USA-05.webp') }}" width="35px" alt="Creditos de Construcción para Ecuatorianos residentes en Estados Unidos">
                          </div>
                          <p class="text-white" style="font-weight: 500; font-size: 15px">Créditos de Construcción <br> para migrantes</p>
                        </div>
                      </div>
                      <div class="position-absolute" onclick="setInterest('Créditos de Construcción')" data-toggle="modal" data-target="#modalContact" style="bottom: 0; left: 0; width: 100%; background-color: #c30000; height: 60px; cursor: pointer">
                        <div class="position-relative" style="display: flex; justify-content: center; text-align: center">
                          <div class="position-absolute" style="top: 0; margin-top: -20px">
                            <i style="background-color: #c30000; color: #ffffff; padding: 5px; border-radius: 25px" class="fal fa-usd-circle fa-2x"></i>
                            <p class="text-white" style="font-size: 15px; font-weight: 400">Solicite su crédito <u style="font-weight: bold">AQUÍ</u></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-3 position-relative">
                <img src="{{ asset('img/VENDA-CON-NOSOTROS-01.webp') }}" class="img-fluid" alt="">
                <div class="position-absolute" style="bottom: 0; left: 0; width: 100%">
                  <button onclick="setInterest('Avalúo de una propiedad');" data-toggle="modal" data-target="#modalAval" id="btnavaluo" class="btn btn-block" style="background-color: #c30000; color: #ffffff; border-radius: 0px">AVALÚE SU PROPIEDAD <i class="fas fa-home"></i></button>
                </div>
              </div>
        </div>   

@php
    $state = "";    $type = "";
    if(request()->segment(1) == 'casas-de-venta-en-ecuador'){         $state = "";    $type = "23";}
    if(request()->segment(1) == 'departamentos-de-venta-en-ecuador'){ $state = "";    $type = "24";}
    if(request()->segment(1) == 'terrenos-de-venta-en-ecuador'){      $state = "";    $type = "26";}

    if(request()->segment(1) == 'casas-de-venta-en-cuenca'){        $state = "azuay";    $type = "23";}
    if(request()->segment(1) == 'departamentos-de-venta-en-cuenca'){$state = "azuay";    $type = "24";}
    if(request()->segment(1) == 'terrenos-de-venta-en-cuenca'){     $state = "azuay";    $type = "26";}

    if(request()->segment(1) == 'casas-de-venta-en-quito'){        $state = "pichincha";    $type = "23";}
    if(request()->segment(1) == 'departamentos-de-venta-en-quito'){$state = "pichincha";    $type = "24";}
    if(request()->segment(1) == 'terrenos-de-venta-en-quito'){     $state = "";    $type = "26";}

    if(request()->segment(1) == 'casas-de-venta-en-guayaquil'){         $state = "Guayas";    $type = "23";}
    if(request()->segment(1) == 'departamentos-de-venta-en-guayaquil'){ $state = "Guayas";    $type = "24";}
    if(request()->segment(1) == 'terrenos-de-venta-en-guayaquil'){      $state = "Guayas";    $type = "26";}

    if(request()->segment(1) == 'quito'){      $state = "pichincha";    $type = "";} //nueva busqueda para el footer de la nueva pagina
    if(request()->segment(1) == 'cuenca'){      $state = "azuay";    $type = "";}  //nueva busqueda para el footer de la nueva pagina
    if(request()->segment(1) == 'guayaquil'){      $state = "Guayas";    $type = "";} //nueva busqueda para el footer de la nueva pagina

@endphp

@php
    $category = ""; $type = ""; $searchtxt = ""; $city = ""; $state = ""; $segments = [];
    $segment2 = request()->segment(2);
    $segment3 = request()->segment(3);
    if($segment2){
      if(!is_numeric($segment2) && preg_match('/[0-9]/', $segment2) == 0){
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
    if($segment3) $searchtxt = $segment3;
    if($city != "ecuador"){
      $city_aux = DB::table('info_cities')->where('name', 'LIKE', "%$city%")->get();
      $id_state;
      //dd($city_aux);
      if(count($city_aux)>0){
        foreach ($city_aux as $c) {if(($c->state_id >= 1022 && $c->state_id <= 1043) || ($c->state_id == 3979 || $c->state_id == 3980)) $id_state = $c->state_id;}
      }
      //dd($id_state);
      $state = DB::table('info_states')->select('name')->where('id', $id_state)->where('country_id', '63')->first();
      //dd($state);
      $state = $state->name;
    }
@endphp
          {{-- @livewire('proplist', ['state' => $state,'type' => $type]) --}}
          @livewire('proplist', ['category' => $category, 'type' => $type, 'searchtxt' => $searchtxt, 'state' => $state, 'city' => $city])

          {{-- inicia div proplist --}}
          {{-- <div class="col-12 col-sm-10">
            <div class="row pt-4">
              <div class="col">
                <div class="float-right small px-2"></div>
              </div>
            </div>
            <div class="row">{{$tester}}</div>
              <!-- Inicia Propiedad -->   
              @php $ii=0; @endphp 
          
              @foreach($listings as $listing)
                  @php $ii++; @endphp 
          
                  @if($ii==9)
                  <div class="card row mb-3" style="border-top:1px #FA7B34 solid">
                    <div class="row">            
                      <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO VENDE CON NOSOTROS')">
                          <img style="cursor: pointer" class="img-fluid p-0"  src="{{asset('img/vende-tu-propiedad-en-casacredito-web.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
                      </a>
                     </div>
                  </div>
                  @endif
                  @if($ii==14)
                  <div class="card row mb-3" style="border-top:1px #FA7B34 solid">
                    <div class="row">
                      <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO CREDITOS EN ECUADOR')">
                          <img style="cursor: pointer" class="img-fluid p-0" src="{{asset('img/BANNERS-CASA-CREDITO-VENDE-08.webp')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
                      </a>
                     </div>
                  </div>
                  @endif
          
          
              <div class="card row mb-3 shadow-sm card-listing" style="border-top:1px #FA7B34 solid">
                <div class="row pr-0">
                    <div class="col-sm-6 col-md-6 col-lg-4 p-0">
                      <div class="col p-0">
                          <div class="card" style="border:none">
                            
                            <div id="carouselControls{{$listing->id}}" class="carousel slide card-img-top" data-ride="carousel"  data-interval="false">
                              <div class="carousel-inner" style="max-height: 150px;">
                                @php $iiListing=0 @endphp
                                  @php
                                      $imageVerification = asset('uploads/listing/thumb/600/'. strtok($listing->images, '|'));
                                  @endphp
                                    @foreach(array_filter(explode("|", $listing->images)) as $img)              
                                      <div class="carousel-item @if($iiListing==0) active @endif">
                                        <img loading="lazy" src="@if(file_exists(public_path().'/uploads/listing/thumb/600/'.$img)) {{url('uploads/listing/thumb/600',$img)}} @else {{url('uploads/listing/600',$img)}} @endif" class="d-block w-100" alt="{{$listing->listing_title}}-{{$iiListing++}}">
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
                          <div class="float-right small px-2" style="color:#FA7B34;font-weight: 500">
                            @foreach ($categories as $cat) @if ($cat->slug==$listing->listingtypestatus) {{$cat->status_title}} @endif @endforeach
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
                                            $garage+=intval($singleedetails[$i]); }
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
              @endforeach
           <!-- Fin Propiedad -->   
           
           @if($listings->count()<6)
           <div class="card row mb-3" style="border-top:1px #FA7B34 solid">
             <div class="row">
               <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO CREDITOS EN ECUADOR')">
                   <img style="cursor: pointer" class="img-fluid p-0"  src="{{asset('img/BANNERS-CASA-CREDITO-VENDE-08.webp')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
               </a>
              </div>
           </div>
          @endif
          @if($listings->count()<11)
          <div class="card row mb-3" style="border-top:1px #FA7B34 solid">
           <div class="row">            
             <a data-toggle="modal" data-target="#modalContact" style="font-size:13px;" onclick="setInterest('ANUNCIO VENDE CON NOSOTROS')">
                 <img style="cursor: pointer" class="img-fluid p-0"  src="{{asset('img/vende-tu-propiedad-en-casacredito-web.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
             </a>
            </div>
          </div>
          @endif

          
          @if(count($listings)>1)
           <div class="row pt-4">
            <div class="col">
              <div class="float-right small px-2" onclick="upscroll()">{{$listings->onEachSide(0)->links()}}</div>
              <div class="float-right small px-2">{{$listings->links()}}</div>
            </div>
          </div>
          @endif
          
          </div> --}}

          {{-- termina div proplist --}}
    </div>

    </section>

    
 <!-- Modal -->
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
                <div>
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

            <label class="mt-2 text-secondary font-size-12 font-weight-bolder">Búsqueda Avanzada</label>
            <hr style="margin: 0px">
            <div class="row my-2">
              <label class="text-secondary font-size-12">¿Algún sector en específico?</label>
              <div class="col-sm-12 col-12 mt-1">
                <div>
                  <div><input type="text" class="border rounded px-1 w-100 py-1" placeholder="Ingrese una ubicación o código" id="bform_searchtxt"></div>
                </div>
              </div>            
            </div>

            <div class="row my-2">
              <label class="text-secondary font-size-12">Presupuesto</label>
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
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="1 habitacion(es)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="2 habitacion(es)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="3 habitacion(es)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="4 habitacion(es)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv5')" type="text" value="5 habitacion(es)" class="border-0 inputs-on-hover" readonly></div>
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
                    <div><i class="fa-light fa-bath"></i><input onclick="setValue(this, 'labeldiv6')" type="text" value="1 baño(s)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="2 baño(s)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="3 baño(s)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="4 baño(s)" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv6')" type="text" value="5 baño(s)" class="border-0 inputs-on-hover" readonly></div>
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
                  <div id="child7" class="bg-white rounded border p-1 w-auto mt-1" style="display: none; position: absolute; z-index: 3;">
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="1 garage" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="2 garage" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="3 garage" class="border-0 inputs-on-hover" readonly></div>
                    <div><input onclick="setValue(this, 'labeldiv7')" type="text" value="4 garage" class="border-0 inputs-on-hover" readonly></div>
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

    @if(session('citesend'))
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        swal("Información enviada con éxito", "En breve un asesor se contactará con usted", "success");
      </script>
    @endif
@endsection

@section('script')
<script>
function setCategoryOnLoadIfRequestQueryHas(object_value){
  //const queryString = window.location.search;
  //const urlParams = new URLSearchParams(queryString);
  if(object_value){
    switch (object_value) {
      case "en-venta":document.getElementById('labeldiv3').innerHTML="Venta";document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";document.getElementById('bform_category').value = object_value;break;
      case "alquilar":document.getElementById('labeldiv3').innerHTML="Alquiler";document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";document.getElementById('bform_category').value = object_value;break;
      case "proyectos": document.getElementById('labeldiv3').innerHTML="Proyectos";document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";document.getElementById('bform_category').value = object_value;break;
      default:
        break;
    }
  }
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

function setcolortodiv9(input){
    if(input.value.length > 0) document.getElementById('labeldiv9back').style.backgroundColor = "#5EBA7D";
    else document.getElementById('labeldiv9back').style.backgroundColor = "#EF4444";
}

function search(){
  //filter_properties();
  // let state = document.getElementById('bform_province').value;
  // state = state.toLowerCase();
  // let city = document.getElementById('bform_city').value;
  // city = city.toLowerCase();//if(city) city = "-en-"+city.toLowerCase();
  // let category = document.getElementById('bform_type').value;
  // if(category){
  //   switch (category) {
  //     case "23": category = "casas"; break;
  //     case "24": category = "departamentos"; break;
  //     case "25": category = "casas Comerciales"; break;
  //     case "26": category = "terrenos"; break;
  //     case "29": category = "quintas"; break;
  //     case "30": category = "haciendas"; break;
  //     case "32": category = "locales Comerciales"; break;
  //     case "35": category = "oficinas"; break;
  //     case "36": category = "suites"; break;
  //     default: break;
  //   }
  // }
  // let type = document.getElementById('bform_category').value;
  // let url = `{{route('web.propiedades', ['$seopage->slug', '8', '8', '1'])}}`;
  // url = url.replace(':category', category);
  // url = url.replace(':type', type);
  // url = url.replace(':state', state);
  // url = url.replace(':city', city);
  //alert(category + " " + type + " " +city);
  // alert(url);
  //window.location.href = url;
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
                case "Venta": inputhidden.value = "venta";break;
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

    let inp_uptoprice = document.getElementById('bform_uptoprice');
    let inp_fromprice = document.getElementById('bform_fromprice');
    inp_fromprice.addEventListener('keydown', () => {setBgColorDivBack4(inp_fromprice);});
    inp_uptoprice.addEventListener('keydown', () => {setBgColorDivBack4(inp_uptoprice);});

    function setBgColorDivBack4(input){
      if(input.value.length > 1){
        document.getElementById("labeldiv4back").style.backgroundColor = "#5EBA7D";
      } else {
        document.getElementById("labeldiv4back").style.backgroundColor = "#EF4444";
      }
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

  const selState  = document.getElementById('bform_province');
  const selCities = document.getElementById('bform_city');

  const selStateAvaluo = document.getElementById('state');
  const selCityAvaluo = document.getElementById('city');

  const modState  = document.getElementById('mform_province');
  const modCities = document.getElementById('mform_city');

  const type = document.getElementById('bform_type');
  const tag = document.getElementById('bform_tags'); 

  window.addEventListener('load', (event) => {
          //set bgimage in the div search
          document.getElementById('bgimage').style.backgroundImage = "url({{asset('img/backimagesearch.webp')}})";
          document.getElementById('imgheader').style.backgroundImage = "url({{asset('img/imgback1.webp')}})";

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
        //}
        //document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";
        let category = new URLSearchParams(window.location.search).get('category');
        changeImageBanner(category);
        var range = new URLSearchParams(window.location.search).get('range');
        if(range) rangeSlide(range);
        else {rangeSlide("0");document.getElementById('bform_range').value = 0};
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if(urlParams.has('category')) setCategoryOnLoadIfRequestQueryHas(urlParams.get('category'));
        else setCategoryOnLoadIfRequestQueryHas('undefined');

        if(document.getElementById('ftop_type').value){
          let text;
          switch (document.getElementById('ftop_type').value) {
            case "23": text = "Casas"; break;
            case "24": text = "Departamentos"; break;
            case "25": text = "Casas Comerciales"; break;
            case "26": text = "Terrenos"; break;
            case "29": text = "Quintas"; break;
            case "30": text = "Haciendas"; break;
            case "32": text = "Locales Comerciales"; break;
            case "35": text = "Oficinas"; break;
            case "36": text = "Suites"; break;
            default:
              break;
          }
          //bform_category
          //bform_type
          document.getElementById('bform_type').value = document.getElementById('ftop_type').value;
          document.getElementById('labeldiv8').innerHTML=text;document.getElementById('labeldiv8back').style.backgroundColor="#5EBA7D";
        }
    });

    const changeImageBanner = (category = "en-venta") => {
      if (category) {
        switch (category) {
          case "en-venta": document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";break;
          case "alquilar": document.getElementById('prisection').style.backgroundImage = "url('img/RENTAS.webp')";break;
          case "proyectos": document.getElementById('prisection').style.backgroundImage = "url('img/PROYECTOS.webp')";break;
        }
      } else {
        document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";
      }
    }

  selState.addEventListener("change", async function() {
    selCities.options.length = 0;
    let id = selState.options[selState.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Ciudad') );
          opt.value = '';
          selCities.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCities.appendChild(opt);
    });
  });

  selStateAvaluo.addEventListener("change", async function() {
    selCityAvaluo.options.length = 0;
    let id = selStateAvaluo.options[selStateAvaluo.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
          opt.value = '';
          selCityAvaluo.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCityAvaluo.appendChild(opt);
    });
  });

  type.addEventListener("change", function(){
    let divantiguedad = document.getElementById('divantiguedad');
    if (type.value != "26") {
      divantiguedad.style.display = "block"
    } else {
      divantiguedad.style.display = "none";
      tag.value = "";
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

  modState.addEventListener("change", async function() {
    modCities.options.length = 0;
    let id = modState.options[modState.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
          opt.value = '';
          modCities.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          modCities.appendChild(opt);
    });
  });

  const rangeSlide = (value) => {
        let stringyearsconstruction;
        switch (value) {
            case "0":stringyearsconstruction = "Entre 0 a 5 años";break;
            case "1":stringyearsconstruction = "Entre 5 a 10 años";break;
            case "2":stringyearsconstruction = "Entre 10 a 15 años";break;
            case "3":stringyearsconstruction = "Entre 15 a 20 años";break;
            case "4":stringyearsconstruction = "Más de 20 años";break;
            default:break;
        }
        document.getElementById('rangeValue').innerHTML = stringyearsconstruction;
    }
</script>
    @livewireScripts
    @stack('scripts')
@endsection
