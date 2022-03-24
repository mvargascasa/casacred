@extends('layouts.web')
@section('header')
<title>Casas en venta Cuenca Ecuador - Casa Crédito Encuentra la casa de tus sueños</title>
<meta name="description" content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos."/>
<meta name="keywords" content="Casas en venta en cuenca, Apartamentos en venta en cuenca, terrenos en venta en cuenca, lotes en venta en cuenca">

<meta property="og:url"                content="{{route('web.index')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Casa Crédito Encuentra la casa de tus sueños." />
<meta property="og:description"        content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos." />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />
<style>
  .carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
  }

  .carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='darkorange' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
  }
</style>
@livewireStyles
@endsection

@section('content')

    <section id="prisection" style="background-size: cover;background-position: left top; width: 100%; background-repeat: no-repeat;">
      <div>
        
          <div class="row align-items-center d-flex justify-content-center" style="margin: 0; min-height: 450px;">
    
              <div class="col-12 text-white text-center p-4" style="width: 600px;background:rgba(2, 2, 2, 0.5)">
                <h1 class="font-weight-bold heading-title" >Su sueño está aquí</h1>
                <h6>Casas, departamentos, Terrenos, Casas Comerciales, Quintas</h6>

                <div class="btn-group pb-2">
                  <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_0" autocomplete="off" value="en-venta">
                  <label class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">VENTA</label>
                  
                  <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_1" autocomplete="off" value="alquilar">
                  <label class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">ALQUILER</label>
                  
                  <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_2" autocomplete="off" value="proyectos">
                  <label class="btn btn-outline-danger" for="ftop_category_2" style="width:100px;font-size: 14px">PROYECTO</label>
                </div>
    
                <div class="input-group mb-3">
                      <select class="form-select" id="ftop_type" style="max-width:200px;">
                            <option value="">Todas</option>	
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
                      <input type="text" id="ftop_txt" class="form-control" onkeypress="if(event.keyCode==13)top_search()">
                      <button type="button" class="btn btn-danger"  onclick="top_search()">BUSCAR</button>
                </div>       

            </div>
    
        </div>
      </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-3 d-none d-sm-block">
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
                    <label for="bform_tags" class="form-label text-danger  font-weight-bold">ANTIGUEDAD</label>
                    <select class="form-select form-select-sm mb-3" id="bform_tags">
                      <option selected></option>
                      <option value="2">Nueva</option>
                      <option value="5">En proyecto</option>
                      <option value="6">Usada</option>
                      <option value="7">Colonial</option>
                    </select>
                  </div>
                  {{-- TERMINA DIV --}}
                  <div class="mb-3">
                    <label for="bform_province" class="form-label text-danger  font-weight-bold">UBICACIÓN</label>
                    <select class="form-select form-select-sm mb-3" id="bform_province">
                      <option value="" selected>Elige Provincia</option>
                      @foreach($states as $state)
                          <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                      @endforeach
                    </select>
                    <select class="form-select form-select-sm mb-3" id="bform_city">
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
                    <button type="button" class="btn btn-danger px-2">Limpiar</button>.
                  </div>
                </div>
              </div>
              <div class="col">
                <h5 class="px-2 text-center">Mas Buscados</h5>
                <div id="carouselExampleControls2" class="carousel slide card-img-top" data-ride="carousel">
                    <div class="carousel-inner  text-center" style="max-height: 500px;cursor: pointer;">
                      <!-- https://casacredito.com/uploads/listing/600/IMG_674-60b94d88c1e28.jpg -->

                        <div class="carousel-item active">                            
                          <div class="card" > <a href="https://casacredito.com/?searchtxt=Ricaurte">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_674-60b94d88c1e28.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Ricaurte</h5>
                            </div>
                          </div>
                        </div>
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/?searchtxt=Yunguilla">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_684-60f9cc142c5c2.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Yunguilla</h5>
                            </div>
                          </div>
                        </div>   
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/?searchtxt=Totoracocha">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_543-60469a976c4a7.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Totoracocha</h5>
                            </div>
                          </div>
                        </div>   
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/?searchtxt=Baños">
                            <img src="https://casacredito.com/uploads/listing/600/IMG_655-60da2fbb14a6a.jpg" class="card-img-top" alt="..."></a>
                            <div class="card-body text-center">
                              <h5 class="card-title">Baños</h5>
                            </div>
                          </div>
                        </div>   
                    
                        <div class="carousel-item">
                          <div class="card" > <a href="https://casacredito.com/?searchtxt=Racar">
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

@endphp

          @livewire('proplist', ['state' => $state,'type' => $type])
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

@endsection

@section('script')
<script>
  const selState  = document.getElementById('bform_province');
  const selCities = document.getElementById('bform_city');

  const modState  = document.getElementById('mform_province');
  const modCities = document.getElementById('mform_city');

  const type = document.getElementById('bform_type');    

  window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";
    });

  selState.addEventListener("change", async function() {
    selCities.options.length = 0;
    let id = selState.options[selState.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Elige Ciudad') );
          opt.value = '';
          selCities.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCities.appendChild(opt);
    });
  });

  type.addEventListener("change", function(){
    let divantiguedad = document.getElementById('divantiguedad');
    if (type.value != "26") {
      divantiguedad.style.display = "block"
    } else {
      divantiguedad.style.display = "none";
    }
  });

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

</script>
    @livewireScripts
    @stack('scripts')
@endsection
