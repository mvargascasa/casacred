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
{{-- @if ($ismobile) --}}
{{-- <div id="searchmobile" style="margin-left: auto; margin-right: auto; left: 0; right: 0; text-align: center">
  <div style="text-align: center; color: #ffffff; background-color: rgb(2, 2, 2); padding-top: 2%; padding-bottom: 5%; margin: 0px">
    <p style="font-size: 22px; margin-bottom: 0px; font-weight: 400">Su sueño está aquí</p>
    <h1 style="font-size: 17px; font-weight: 100">Venta y Alquiler de Propiedades</h1>
    <div class="d-flex justify-content-center text-center">
      <div class="d-flex w-50" data-bs-toggle="modal" data-bs-target="#modalFilters">
        <input type="text" class="form-control" style="border-radius: 25px 0px 0px 25px" placeholder="Buscar" readonly>
        <button type="button" id="btnsearch" class="btn" style="display: none; border-radius: 0px 25px 25px 0px; padding: 6px 10px 6px 10px; background-color: #dc3545; color: #ffffff"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>
</div> --}}
{{-- @else --}}
<div id="parentBuscador" class="w-100">
        
  <div class="row align-items-center d-flex justify-content-center" style="margin: 0;">

      <div class="col-12 text-white text-center p-4" style="width: 700px;background:rgb(0, 0, 0); z-index: 3 !important">
        <p class="font-weight-bold heading-title" style="font-size: 30px; margin-bottom: 0px">Su sueño está aquí</p>
        <h1 id="txtcasas" style="font-size: 20px">Venta y Alquiler de todo tipo de Propiedades</h1>
        {{-- <form id="formhomesearch" action="{{route('web.propiedades')}}" method="GET"> --}}
        <div class="w-100" id="form-inputs">
          <div class="btn-group mb-3 w-100">
            {{-- <input type="radio" class="btn-check form-control" name="category" id="ftop_category_0" autocomplete="off" value="en-venta" onclick="btnradio_search();"> --}}
            <input type="radio" class="btn-check form-control" name="category" id="ftop_category_0" autocomplete="off" value="en-venta" checked>
            <label class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">COMPRAR</label>
            
            {{-- <input type="radio" class="btn-check form-control" name="category" id="ftop_category_1" autocomplete="off" value="alquilar" onclick="btnradio_search();"> --}}
            <input type="radio" class="btn-check form-control" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
            <label class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">ALQUILAR</label>
            
            {{-- <input type="radio" class="btn-check form-control" name="category" id="ftop_category_2" autocomplete="off" value="proyectos" onclick="btnradio_search();"> --}}
            <input type="radio" class="btn-check form-control" name="category" id="ftop_category_2" autocomplete="off" value="proyectos">
            <label class="btn btn-outline-danger" for="ftop_category_2" style="width:100px;font-size: 14px">PROYECTOS</label>
          </div>
  
          <div class="mb-3 w-100">
            <div class="d-flex">
              <select name="ptype" id="ftop_ptype" class="form-control form-select w-25" style="border-radius: 5px 0px 0px 5px">
                    {{-- <option value="">Todas</option>	 --}}
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
              {{-- <input type="text" placeholder="INGRESE / UBICACIÓN / CÓDIGO" id="ftop_txt" name="searchtxt" class="form-control" onkeypress="if(event.keyCode==13)top_search()"> --}}
              <div class="d-flex w-75">
                <input type="text" placeholder="INGRESE / UBICACIÓN / CÓDIGO" id="ftop_txt" name="searchtxt" class="form-control w-100 rounded-0">
                <button type="button" class="btn btn-danger rounded-end" onclick="search();" style="border-radius: 0px 5px 5px 0px">BUSCAR</button>
              </div>
            </div>
        </div>
      </div>
        <div class="d-flex justify-content-center">
          <button type="button" data-bs-toggle="modal" data-bs-target="#modalFilters" id="btnsearch" class="btn btn-outline-light" style="display: none; border-radius: 25px; padding: 6px 10px 6px 10px; background-color: #dc3545; color: #ffffff""><i class="fas fa-search"></i></button>
        </div>
      {{-- </form>        --}}

    </div>

</div>
</div>
{{-- @endif --}}