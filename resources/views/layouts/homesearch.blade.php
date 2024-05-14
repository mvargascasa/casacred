<div id="parentBuscador" class="w-100">
        
  <div class="row align-items-center d-flex justify-content-center" style="margin: 0;">

      <div class="col-12 text-white text-center p-4" style="width: 700px;background:#0f1929;">
        <p class="font-weight-bold heading-title" style="font-size: 30px; margin-bottom: 0px;">Su sueño está aquí</p>
        <h1 id="txtcasas" style="font-size: 20px">Venta y Alquiler de todo tipo de Propiedades</h1>
        <div class="w-100" id="form-inputs">
          <form action="{{ route('search.home') }}" method="POST">
          @csrf
          <div class="btn-group mb-3 w-100">
            <input type="radio" class="btn-check form-control" name="category" id="ftop_category_0" autocomplete="off" value="en-venta" checked>
            <label class="btn btn-outline-danger" for="ftop_category_0" style="width:100px;font-size: 14px">COMPRAR</label>  
            <input type="radio" class="btn-check form-control" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
            <label class="btn btn-outline-danger" for="ftop_category_1" style="width:100px;font-size: 14px">RENTAR</label>
          </div>
  
          <div class="mb-3 w-100">
            <div class="d-flex">
              <select name="ptype" id="ftop_ptype" class="form-control form-select w-25" style="border-radius: 5px 0px 0px 5px">
                    <option value="">Tipo de propiedad</option>
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
              <div class="d-flex w-75">
                <input type="text" placeholder="INGRESE / UBICACIÓN / CÓDIGO" id="ftop_txt" name="searchtxt" class="form-control w-100 rounded-0">
                <button type="submit" class="btn rounded-end font-weight-bold text-white" style="border-radius: 0px 5px 5px 0px; background-color: #8d97b2;">BUSCAR</button>
              </div>
            </div>
          </div>
        </form>
      </div>
        
        <div class="d-flex justify-content-center">
          <button type="button" data-bs-toggle="modal" data-bs-target="#modalFilters" id="btnsearch" class="btn btn-outline-light" style="display: none; border-radius: 25px; padding: 6px 10px 6px 10px; background-color: #dc3545; color: #ffffff""><i class="fas fa-search"></i></button>
        </div>

      </div>

      

  </div>
</div>