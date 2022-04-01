<div id="parentbuscador" style="position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
    <h3 id="txttitlebanner" class="text-white">¿QUÉ TIPO DE INMUEBLE ESTÁS BUSCANDO?</h3>
    <div id="formtopsearch">
      <form action="{{ route('web.index') }}" method="GET">
        <div class="btn-group pb-2">
          <input type="radio" class="btn-check" name="category" id="ftop_category_0" autocomplete="off" value="en-venta">
          <label style="border: none; border-radius: 0px;" class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">VENTA</label>
          
          <input type="radio" class="btn-check" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
          <label style="border:none; border-radius: 0px" class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">ALQUILER</label>
          
          <input type="radio" class="btn-check" name="category" id="ftop_category_2" autocomplete="off" value="proyectos">
          <label style="border: none; border-radius: 0px" class="btn btn-outline-danger" for="ftop_category_2" style="width:100px;font-size: 14px">PROYECTO</label>
        </div>
        <div class="input-group">
          {{-- onkeypress="if(event.keyCode==13)document.getElementById('formtopsearch').submit()" --}}
          <input type="text" id="ftop_txt" name="searchtxt" class="form-control" style="background-color:rgba(0, 0, 0, 0); border-radius: 0px; color: #ffffff" placeholder="Buscar por dirección, ciudad, código">
          <span id="basic-addon2">
            <button type="submit" class="btn btn-outline-light" style="border-radius: 0px 5px 5px 0px">
              <i class="far fa-search"></i>
            </button>
          </span>
        </div>
      </form>
    </div>

    {{-- DIV PARA MOSTRAR EL ICONO DE BUSCAR CUANDO SEA RESPONSIVE --}}
    <div class="d-flex justify-content-center">
      <button type="button" data-bs-toggle="modal" data-bs-target="#modalFilters" id="btnsearch" class="btn btn-outline-light" style="display: none; border-radius: 25px; padding: 6px 10px 6px 10px;"><i class="fas fa-search"></i></button>
    </div>
</div>