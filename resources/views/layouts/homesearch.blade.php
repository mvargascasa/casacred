{{-- <div id="parentbuscador" style="position: absolute; top: 45%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
    <h3 id="txttitlebanner" class="text-white">¿QUÉ TIPO DE INMUEBLE ESTÁ BUSCANDO?</h3>
    <div id="formtopsearch">
      <form action="{{ route('web.propiedades') }}" method="GET">
        <div class="btn-group pb-2">
          <input type="radio" class="btn-check" name="category" id="ftop_category_0" autocomplete="off" value="en-venta">
          <label style="border: none; border-radius: 0px;" class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">VENTA</label>
          
          <input type="radio" class="btn-check" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
          <label style="border:none; border-radius: 0px" class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">ALQUILER</label>
          
          <input type="radio" class="btn-check" name="category" id="ftop_category_2" autocomplete="off" value="proyectos">
          <label style="border: none; border-radius: 0px" class="btn btn-outline-danger" for="ftop_category_2" style="width:100px;font-size: 14px">PROYECTO</label>
        </div>
        <div class="input-group"> --}}
          {{-- onkeypress="if(event.keyCode==13)document.getElementById('formtopsearch').submit()" --}}
          {{-- <input type="text" id="ftop_txt" name="searchtxt" class="form-control" style="background-color:rgba(0, 0, 0, 0); border-radius: 0px; color: #ffffff" placeholder="Buscar por dirección, ciudad, código">
          <span id="basic-addon2">
            <button type="submit" class="btn" style="border-radius: 0px 5px 5px 0px; background-color: #8b0000; color: #ffffff">
              <i class="far fa-search"></i>
            </button>
          </span>
        </div>
      </form>
    </div> --}}

    {{-- DIV PARA MOSTRAR EL ICONO DE BUSCAR CUANDO SEA RESPONSIVE --}}
    {{-- <div class="d-flex justify-content-center">
      <button type="button" data-bs-toggle="modal" data-bs-target="#modalFilters" id="btnsearch" class="btn btn-outline-light" style="display: none; border-radius: 25px; padding: 6px 10px 6px 10px;"><i class="fas fa-search"></i></button>
    </div>
</div> --}}
@if ($ismobile)
<div id="searchmobile" style="width: 80vw">
  <div style="text-align: center; color: #ffffff; background-color: rgba(2, 2, 2, 0.5); padding-top: 10%; padding-bottom: 5%; margin: 0px">
    <h3>Su sueño está aquí</h3>
    <div class="d-flex justify-content-center">
      <button type="button" data-bs-toggle="modal" data-bs-target="#modalFilters" id="btnsearch" class="btn" style="display: none; border-radius: 25px; padding: 6px 10px 6px 10px; background-color: #dc3545; color: #ffffff"><i class="fas fa-search"></i></button>
    </div>
  </div>
</div>
@else
<div id="parentBuscador" style="position: absolute; margin-left: auto; margin-right: auto; left: 0; right: 0; text-align: center">
        
  <div class="row align-items-center d-flex justify-content-center" style="margin: 0; min-height: 250px;">

      <div class="col-12 text-white text-center p-4" style="width: 600px;background:rgba(2, 2, 2, 0.5)">
        <h1 class="font-weight-bold heading-title" >Su sueño está aquí</h1>
        <h6 id="txtcasas">Casas, departamentos, Terrenos, Casas Comerciales, Quintas</h6>
        <form action="{{route('web.propiedades')}}" method="GET">
        <div id="formtopsearch">
          <div class="btn-group pb-2">
            <input type="radio" class="btn-check" name="category" id="ftop_category_0" autocomplete="off" value="en-venta">
            <label class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">VENTA</label>
            
            <input type="radio" class="btn-check" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
            <label class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">ALQUILER</label>
            
            <input type="radio" class="btn-check" name="category" id="ftop_category_2" autocomplete="off" value="proyectos">
            <label class="btn btn-outline-danger" for="ftop_category_2" style="width:100px;font-size: 14px">PROYECTO</label>
          </div>
  
          <div class="input-group mb-3">
                <select class="form-select" id="ftop_type" name="type" style="max-width:200px;">
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
                <input type="text" id="ftop_txt" name="searchtxt" class="form-control" onkeypress="if(event.keyCode==13)top_search()">
                <button type="submit" class="btn btn-danger" >BUSCAR</button>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <button type="button" data-bs-toggle="modal" data-bs-target="#modalFilters" id="btnsearch" class="btn btn-outline-light" style="display: none; border-radius: 25px; padding: 6px 10px 6px 10px;"><i class="fas fa-search"></i></button>
        </div>
      </form>       

    </div>

</div>
</div>
@endif