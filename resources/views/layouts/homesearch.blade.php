<div id="parentBuscador" class="w-100">
    <div class="row align-items-center d-flex justify-content-center">
        <div class="col-12 text-white text-center p-5">
            <p class="heading-title mb-3" style="font-size: 32px; margin-bottom: 10px; font-family: 'Sharp grotesk'; font-weight: 500;">
                Explora Nuestras Propiedades
            </p>
            <div class="w-100" id="form-inputs">
                <form id="searchForm" method="GET">
                    @csrf
                    <div class="btn-group mb-3 w-100 d-flex flex-row flex-wrap justify-content-center">
                        <input type="radio" class="btn-check" name="category" id="ftop_category_0" autocomplete="off" value="en-venta">
                        <label class="btn btn-outline-light mb-2 mb-md-0" for="ftop_category_0" style="width: 120px; font-size: 18px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">COMPRAR</label>
                        <input type="radio" class="btn-check" name="category" id="ftop_category_1" autocomplete="off" value="alquilar">
                        <label class="btn btn-outline-light mb-2 mb-md-0" for="ftop_category_1" style="width: 120px; font-size: 18px; border-radius: 5px; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);">RENTAR</label>
                    </div>

                    <div class="mb-3 w-100 d-flex flex-column flex-md-row">
                        <div class="col-md-3 p-0">
                            <select name="ptype" id="ftop_ptype" class="form-control form-select rounded-select-search-mobile mb-2 mb-md-0" style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); font-size: 18px;">
                                <option value="">Propiedades</option>
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
                        </div>
                        <div class="col-md-9 p-0 d-flex flex-column flex-md-row filters-block">
                            <input type="text" placeholder="INGRESE / UBICACIÓN / CÓDIGO" id="searchtxt" name="searchtxt" class="form-control rounded-0 rounded-input-search-mobile mb-2 mb-md-0" style="border-radius: 0; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); font-size: 18px;">
                            <button type="submit" class="btn rounded-all font-weight-bold text-white rounded-btn-search-mobile mt-2 mt-md-0" style="background-color: #8d97b2; box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); font-size: 18px;">BUSCAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
