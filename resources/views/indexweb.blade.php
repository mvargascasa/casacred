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
<title>@if(request()->segment(2)){{ucwords(str_replace("-", " ", request()->segment(2)))}} - Grupo Housing @else Encuentre las mejores Propiedades en Venta o Alquiler 🏠 @endif</title>
{{-- <meta name="description" content="@isset($meta_seo)En Casa Crédito contamos con {{ucfirst(str_replace('-', ' ', $meta_seo)) }}. Acceda a nuestro Sitio Web y encuentre la casa de sus sueños. Precios Atractivos, Lugares Ideales 😉 @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endisset"/> --}}
<meta name="description" content="@if(request()->segment(2) != null) En Grupo Housing contamos con {{ucwords(str_replace("-", " ", request()->segment(2)))}}. Accede a nuestro Sitio Web y encuentra la propiedad que estás buscando. @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endif">
<meta name="keywords" content="@isset($meta_seo) {{ $keywords }} @else casas en venta, casas en venta guayaquil, casas en venta en guayaquil, casas en venta quito, casas en venta en quito, casas en venta cuenca, casas en venta en cuenca, casas de venta en guayaquil, casas de venta en quito, casas de venta en cuenca, casas en venta en guayaquil baratas, casas en venta en quito baratas, casas en venta en cuenca baratas, departamentos en venta, departamentos en venta en quito, departamentos en venta quito, departamentos en venta guayaquil, departamentos en venta en guayaquil, departamentos en venta cuenca, departamentos en venta en cuenca, venta casas cuenca, venta casas guayaquil, venta casas quito, departamentos en alquiler, departamentos en alquiler quito, departamentos en alquiler guayaquil, departamentos en alquiler cuenca, departamentos de alquiler en quito, departamentos de alquiler en guayaquil, departamentos de alquiler en cuenca, terrenos en venta, terrenos en venta cuenca, terrenos en venta en cuenca, terrenos de venta en cuenca, terrenos en venta quito, terrenos en venta en quito, terrenos de venta en quito, terrenos en venta guayaquil, terrenos en venta en guayaquil, terrenos de venta en guayaquil, venta terrenos cuenca, venta terrenos guayaquil, venta terrenos quito, lotes en venta, lotes en venta en cuenca, lotes en venta en quito, lotes en venta en guayaquil, apartamentos en venta, apartamentos en venta quito, apartamentos en venta guayaquil, apartamentos en venta cuenca @endif">

<meta property="og:url"                content="{{route('web.index')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="@isset($meta_seo){{ucfirst(str_replace('-', ' ', $meta_seo))}} - Grupo Housing @else Grupo Housing Encuentra la casa de tus sueños. @endisset" />
<meta property="og:description"        content="@isset($meta_seo)En Grupo Housing Contamos con {{ucfirst(str_replace('-', ' ', $meta_seo))}}. Accede a nuestro sitio web y encuentra la propiedad que estás buscando. @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endisset" />
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
  .btn-contact:hover{ background-color: #182741; color: #ffffff !important}
  .items-cards-txt{ font-size: 14px}
  @media screen and (max-width: 580px){
    .items-cards-txt{ font-size: 12px !important}
    .items-cards > img { width: 20px !important}
    .items-cards{text-align: center}
    .padding-x-mobile{padding-left: 0px !important; padding-right: 0px !important}
  }
  .filters-style{
    height: 35px; border-radius: 10px; border: 1px solid #182741; padding-left: 5%; appearance: none; background-image: url('{{ asset('img/arrow-down.svg') }}'); background-size: 20px; background-position: right 10px center; background-repeat: no-repeat;
  }
  .inputs-style{height: 35px; border-radius: 10px; border: 1px solid #182741; padding-left: 5%; width: auto}
  details {
    transition: all 2s ease; /* Establece la transición */
    max-height: 25px;
    overflow: hidden;
  }
  details[open] {
    max-height: 1000px; /* Altura máxima para abrir lentamente */
  }
</style>
@livewireStyles
@endsection

@section('content')
    @php
      // $category="";$ptype="";$searchtxt="";
      // if(Request()->get('category') != null){$category = Request()->get('category');}
      // if(Request()->get('ptype') != null){$ptype = Request()->get('ptype');}
      // if(Request()->get('searchtxt') != null){$searchtxt = Request()->get('searchtxt');}

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
    {{-- new filters --}}
        <section>
          <div class="d-flex justify-content-center align-items-center text-center" style="min-height: 150px; height: 150px">
            <h1 style="color: #182741; ">@if($h1 != null || $h1 != "") {{$h1}} @else <span style="font-weight: 100">Propiedades en Venta o Alquiler en</span> <b style="font-weight: 600">Grupo Housing</b> @endif</h1>
          </div>
        </section>

    <section class="container">
        

@php
    //$state = "";    $type = "";
    // if(request()->segment(1) == 'casas-de-venta-en-ecuador'){         $state = "";    $type = "23";}
    // if(request()->segment(1) == 'departamentos-de-venta-en-ecuador'){ $state = "";    $type = "24";}
    // if(request()->segment(1) == 'terrenos-de-venta-en-ecuador'){      $state = "";    $type = "26";}

    // if(request()->segment(1) == 'casas-de-venta-en-cuenca'){        $state = "azuay";    $type = "23";}
    // if(request()->segment(1) == 'departamentos-de-venta-en-cuenca'){$state = "azuay";    $type = "24";}
    // if(request()->segment(1) == 'terrenos-de-venta-en-cuenca'){     $state = "azuay";    $type = "26";}

    // if(request()->segment(1) == 'casas-de-venta-en-quito'){        $state = "pichincha";    $type = "23";}
    // if(request()->segment(1) == 'departamentos-de-venta-en-quito'){$state = "pichincha";    $type = "24";}
    // if(request()->segment(1) == 'terrenos-de-venta-en-quito'){     $state = "";    $type = "26";}

    // if(request()->segment(1) == 'casas-de-venta-en-guayaquil'){         $state = "Guayas";    $type = "23";}
    // if(request()->segment(1) == 'departamentos-de-venta-en-guayaquil'){ $state = "Guayas";    $type = "24";}
    // if(request()->segment(1) == 'terrenos-de-venta-en-guayaquil'){      $state = "Guayas";    $type = "26";}

    // if(request()->segment(1) == 'quito'){      $state = "pichincha";    $type = "";} //nueva busqueda para el footer de la nueva pagina
    // if(request()->segment(1) == 'cuenca'){      $state = "azuay";    $type = "";}  //nueva busqueda para el footer de la nueva pagina
    // if(request()->segment(1) == 'guayaquil'){      $state = "Guayas";    $type = "";} //nueva busqueda para el footer de la nueva pagina

@endphp

@php
    // $category = ""; $type = ""; $searchtxt = ""; $city = ""; $state = ""; $segments = [];
    // $segment2 = request()->segment(2);
    // $segment3 = request()->segment(3);
    // if($segment2){
    //   if(!is_numeric($segment2) && preg_match('/[0-9]/', $segment2) == 0){
    //     $segments = explode("-", $segment2);
    //     //$city = end($segments);
    //     if(($segments[0] == "casas" && $segments[1] == "comerciales") || ($segments[0] == "locales" && $segments[1] == "comerciales")){
    //       $type = $segments[0] . " " . $segments[1];
    //       $category = $segments[3];
    //     } else {
    //       $type = $segments[0];
    //       $category = $segments[2];
    //     }
    //   } else {
    //     $searchtxt = $segment2;
    //   }
    // }
    // if($segment3) $searchtxt = $segment3;
    // if($city != "ecuador"){
    //   $city_aux = DB::table('info_cities')->where('name', 'LIKE', "%$city%")->get();
    //   $id_state;
    //   if(count($city_aux)>0){
    //     foreach ($city_aux as $c) {if(($c->state_id >= 1022 && $c->state_id <= 1043) || ($c->state_id == 3979 || $c->state_id == 3980)) $id_state = $c->state_id;}
    //   }
    //   $state = DB::table('info_states')->select('name')->where('id', $id_state)->where('country_id', '63')->first();
    //   $state = $state->name;
    // }
@endphp
          @livewire('proplist', ['category' => $operacion, 'type' => $type, 'searchtxt' => $text])
   

    </section>

    
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
    //inp_fromprice.addEventListener('keydown', () => {setBgColorDivBack4(inp_fromprice);});
    //inp_uptoprice.addEventListener('keydown', () => {setBgColorDivBack4(inp_uptoprice);});

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
          //document.getElementById('bgimage').style.backgroundImage = "url({{asset('img/backimagesearch.webp')}})";
          //document.getElementById('imgheader').style.backgroundImage = "url({{asset('img/imgback1.webp')}})";

          let slug = "{{request()->segment(2)}}";
          if(isNaN(slug)){
            let arrayslug = slug.split("-");
            if((arrayslug[0] == "casas" && arrayslug[1] == "comerciales") || (arrayslug[0] == "locales" && arrayslug[1] == "comerciales")){
              //document.getElementById("bform_category").value = arrayslug[3];
              // document.getElementById("labeldiv3").innerHTML = arrayslug[3].charAt(0).toUpperCase() + arrayslug[3].slice(1).toLowerCase();
              // document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";
              // document.getElementById("bform_type").value = arrayslug[0] + " " + arrayslug[1];
              // document.getElementById("labeldiv8").innerHTML = arrayslug[0].charAt(0).toUpperCase() + arrayslug[0].slice(1).toLowerCase() + " " + arrayslug[1];
              // document.getElementById('labeldiv8back').style.backgroundColor="#5EBA7D";
              // if(arrayslug[5]){
              //   if(arrayslug[5] != "ecuador"){
              //     document.getElementById('bform_city').value = arrayslug[5];
              //     document.getElementById('labeldiv2').innerHTML = arrayslug[5].charAt(0).toUpperCase() + arrayslug[5].slice(1).toLowerCase();
              //     document.getElementById('labeldiv2back').style.backgroundColor="#5EBA7D";
              //     getState(arrayslug[5]);
              //   }
              // }
            } else {
              //document.getElementById("bform_category").value = arrayslug[2].charAt(0).toUpperCase() + arrayslug[2].slice(1).toLowerCase();
              // document.getElementById("labeldiv3").innerHTML = arrayslug[2].charAt(0).toUpperCase() + arrayslug[2].slice(1).toLowerCase();
              // document.getElementById('labeldiv3back').style.backgroundColor="#5EBA7D";
              // document.getElementById("bform_type").value = arrayslug[0].charAt(0).toUpperCase() + arrayslug[0].slice(1).toLowerCase();
              // document.getElementById("labeldiv8").innerHTML = arrayslug[0].charAt(0).toUpperCase() + arrayslug[0].slice(1).toLowerCase();
              // document.getElementById('labeldiv8back').style.backgroundColor="#5EBA7D";
              // if(arrayslug[4]){
              //   if(arrayslug[4] != "ecuador"){
              //     document.getElementById('bform_city').value = arrayslug[4];
              //     document.getElementById('labeldiv2').innerHTML = arrayslug[4].charAt(0).toUpperCase() + arrayslug[4].slice(1).toLowerCase();
              //     document.getElementById('labeldiv2back').style.backgroundColor="#5EBA7D";
              //     getState(arrayslug[4]);
              //   }
              // }
            }
          }
        //}
        //document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";
        let category = new URLSearchParams(window.location.search).get('category');
        changeImageBanner(category);
        var range = new URLSearchParams(window.location.search).get('range');
        //if(range) rangeSlide(range);
        //else {rangeSlide("0");document.getElementById('bform_range').value = 0};
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        if(urlParams.has('category')) setCategoryOnLoadIfRequestQueryHas(urlParams.get('category'));
        else setCategoryOnLoadIfRequestQueryHas('undefined');

        // if(document.getElementById('ftop_type').value){
        //   let text;
        //   switch (document.getElementById('ftop_type').value) {
        //     case "23": text = "Casas"; break;
        //     case "24": text = "Departamentos"; break;
        //     case "25": text = "Casas Comerciales"; break;
        //     case "26": text = "Terrenos"; break;
        //     case "29": text = "Quintas"; break;
        //     case "30": text = "Haciendas"; break;
        //     case "32": text = "Locales Comerciales"; break;
        //     case "35": text = "Oficinas"; break;
        //     case "36": text = "Suites"; break;
        //     default:
        //       break;
        //   }
        //   //bform_category
        //   //bform_type
        //   document.getElementById('bform_type').value = document.getElementById('ftop_type').value;
        //   document.getElementById('labeldiv8').innerHTML=text;document.getElementById('labeldiv8back').style.backgroundColor="#5EBA7D";
        // }
    });

    const changeImageBanner = (category = "en-venta") => {
      if (category) {
        switch (category) {
          case "en-venta": document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";break;
          case "alquilar": document.getElementById('prisection').style.backgroundImage = "url('img/RENTAS.webp')";break;
          case "proyectos": document.getElementById('prisection').style.backgroundImage = "url('img/PROYECTOS.webp')";break;
        }
      } else {
        //document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";
      }
    }

  // selState.addEventListener("change", async function() {
  //   selCities.options.length = 0;
  //   let id = selState.options[selState.selectedIndex].dataset.id;
  //   const response = await fetch("{{url('getcities')}}/"+id );
  //   const cities = await response.json();
    
  //   var opt = document.createElement('option');
  //         opt.appendChild( document.createTextNode('Ciudad') );
  //         opt.value = '';
  //         selCities.appendChild(opt);
  //   cities.forEach(city => {
  //         var opt = document.createElement('option');
  //         opt.appendChild( document.createTextNode(city.name) );
  //         opt.value = city.name;
  //         selCities.appendChild(opt);
  //   });
  // });

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

  // type.addEventListener("change", function(){
  //   let divantiguedad = document.getElementById('divantiguedad');
  //   if (type.value != "26") {
  //     divantiguedad.style.display = "block"
  //   } else {
  //     divantiguedad.style.display = "none";
  //     tag.value = "";
  //   }
  // });

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

  // modState.addEventListener("change", async function() {
  //   modCities.options.length = 0;
  //   let id = modState.options[modState.selectedIndex].dataset.id;
  //   const response = await fetch("{{url('getcities')}}/"+id );
  //   const cities = await response.json();
    
  //   var opt = document.createElement('option');
  //         opt.appendChild( document.createTextNode('Elige Ciudad') );
  //         opt.value = '';
  //         modCities.appendChild(opt);
  //   cities.forEach(city => {
  //         var opt = document.createElement('option');
  //         opt.appendChild( document.createTextNode(city.name) );
  //         opt.value = city.name;
  //         modCities.appendChild(opt);
  //   });
  // });

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
        //document.getElementById('rangeValue').innerHTML = stringyearsconstruction;
    }
</script>
    @livewireScripts
    @stack('scripts')
@endsection
