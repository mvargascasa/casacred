<div class="modal fade" id="modalAlquiler" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #182741; color: #ffffff">
          <p class="modal-title h5" id="exampleModalLongTitle">Alquilar una propiedad</p>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div>
          <div class="d-flex mt-2 mr-3 ml-3">
            <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
            <label class="btn btn-outline-secondary btn-block" for="success-outlined" style="border-radius: 0px" onclick="showbuscar(this);">Buscar un alquiler</label>
            <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
            <label class="btn btn-outline-secondary btn-block" for="danger-outlined" style="border-radius: 0px" onclick="showalquilar(this);">Poner en alquiler</label>
          </div>
        </div>
        <div id="body1">
          <form action="{{ route('web.lead.contact') }}" method="POST">
            @csrf
          <div class="modal-body">
            <input type="hidden" name="interest" id="interest" value="Busca Alquiler">
            <div class="form-group">
              <label for="">Nombre y Apellido</label>
              <input type="text" id="nameb1" name="name" class="form-control" required>
            </div>
            <div class="form-group mt-2">
              <label for="">Teléfono</label>
              <input type="number" id="phoneb1" name="phone" class="form-control" required>
            </div>
            <div class="form-group mt-2">
                <label for="state">Provincia</label>
                <select class="form-select" name="state" id="selProvinceRentarProp" required>
                  <option value="">Seleccione</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="city">Ciudad</label>
                <select class="form-select" name="city" id="selCityRentarProp" required>
                  <option value="">Seleccione</option>
                </select>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn" style="background-color: #182741; color: #ffffff">Ver opciones</button>
          </div>
          </form>
        </div>
        <div id="body2" style="display: none">
          <form action="{{ route('web.lead.contact') }}" method="POST">
            @csrf
          <div class="modal-body">
            <input type="hidden" name="interest" value="Poner en Alquiler">
            <div class="form-group">
              <label for="">Nombre y Apellido</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group mt-2">
              <label for="">Teléfono</label>
              <input type="number" class="form-control" name="phone" required>
            </div>
            <div class="form-group mt-2">
              <label for="">Tipo de propiedad</label>
              <select class="form-select" name="type" id="">
                <option value="">Seleccione</option>
                @foreach ($types as $type)
                    <option value="{{ $type->type_title }}">{{ $type->type_title }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group mt-2 d-flex">
              <div class="mr-1" style="width: 100%">
                <label for="province">Provincia</label>
                <select name="province" class="form-select" id="selProvinceRentarProp2">
                  <option value="">Seleccione</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div style="width: 100%">
                <label for="city">Ciudad</label>
                <select class="form-select" name="city" id="selCityRentarProp2">
                  <option value="">Seleccione</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-primary" style="background-color: #182741; color: #ffffff">Enviar</button>
          </div>
        </form>
        </div>
      </div>
    </div>
</div>

<script>
    function showalquilar(btn) {
        document.getElementById('body1').style.display = "none";
        document.getElementById('body2').style.display = "block";
    }

    function showbuscar(btn) {
        document.getElementById('body1').style.display = "block";
        document.getElementById('body2').style.display = "none";
    }

    const selProvinceRentarProp = document.getElementById('selProvinceRentarProp');
    const selCityRentarProp = document.getElementById('selCityRentarProp');

    selProvinceRentarProp.addEventListener("change", async function() {
        selCityRentarProp.options.length = 0;
        let id = selProvinceRentarProp.options[selProvinceRentarProp.selectedIndex].dataset.id;
        const response = await fetch("{{ url('getcities') }}/" + id);
        const cities = await response.json();

        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Ciudad'));
        opt.value = '';
        selCityRentarProp.appendChild(opt);
        cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(city.name));
            opt.value = city.name;
            selCityRentarProp.appendChild(opt);
        });
    });

    const selProvinceRentarProp2 = document.getElementById('selProvinceRentarProp2');
    const selCityRentarProp2 = document.getElementById('selCityRentarProp2');

    selProvinceRentarProp2.addEventListener("change", async function() {
        selCityRentarProp2.options.length = 0;
        let id = selProvinceRentarProp2.options[selProvinceRentarProp2.selectedIndex].dataset.id;
        const response = await fetch("{{ url('getcities') }}/" + id);
        const cities = await response.json();

        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Ciudad'));
        opt.value = '';
        selCityRentarProp2.appendChild(opt);
        cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(city.name));
            opt.value = city.name;
            selCityRentarProp2.appendChild(opt);
        });
    });
</script>