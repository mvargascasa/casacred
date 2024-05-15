<div id="parentBuscador" class="w-100">

    <div class="row align-items-center d-flex justify-content-center" style="margin: 0;">

        <div class="col-12 text-white text-center p-4" style="width: 700px;background:#0f1929;">
            <p class="font-weight-bold heading-title" style="font-size: 30px; margin-bottom: 0px;">Su sueño está aquí</p>
            <h1 id="txtcasas" style="font-size: 20px">Venta y Alquiler de todo tipo de Propiedades</h1>
            <div class="w-100" id="form-inputs">
                <form id="searchForm" method="GET">
                    @csrf
                    <div class="btn-group mb-3 w-100">
                        <input type="radio" class="btn-check form-control" name="category" id="ftop_category_0"
                            autocomplete="off" value="en-venta">
                        <label class="btn btn-outline-danger" for="ftop_category_0"
                            style="width:100px;font-size: 14px">COMPRAR</label>
                        <input type="radio" class="btn-check form-control" name="category" id="ftop_category_1"
                            autocomplete="off" value="alquilar">
                        <label class="btn btn-outline-danger" for="ftop_category_1"
                            style="width:100px;font-size: 14px">RENTAR</label>
                    </div>

                    <div class="mb-3 w-100">
                        <div class="d-flex filters-block">
                            <select name="ptype" id="ftop_ptype"
                                class="form-control form-select w-25 rounded-select-search-mobile"
                                style="border-radius: 5px 0px 0px 5px">
                                <option value="">Tipo de Propiedad</option>
                                <option data-ids="[23,1]" value="1">Casas</option>
                                <option data-ids="[24,3]" value="2">Departamentos</option>
                                <option data-ids="[25,5]" value="3">Casas Comerciales</option>
                                <option data-ids="[32,6]" value="4">Locales Comerciales</option>
                                <option data-ids="[35,7]" value="5">Oficinas</option>
                                <option data-ids="[36,8]" value="6">Suites</option>
                                <option data-ids="[29,9]" value="7">Quintas</option>
                                <option data-ids="[30,30]" value="8">Haciendas</option>
                                <option data-ids="[26,10]" value="8">Terrenos</option>
                            </select>
                            <div class="d-flex w-75 filters-block">
                                <input type="text" placeholder="INGRESE / UBICACIÓN / CÓDIGO" id="searchtxt"
                                    name="searchtxt" class="form-control w-100 rounded-0 rounded-input-search-mobile">
                                <button type="submit"
                                    class="btn rounded-end font-weight-bold text-white rounded-btn-search-mobile"
                                    style="border-radius: 0px 5px 5px 0px; background-color: #8d97b2;">BUSCAR</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
