<div class="modal fade" id="modalAvaluo" tabindex="-1" role="dialog" aria-labelledby="modalAvaluoTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #182741; color: #ffffff">
          <p class="modal-title h5" id="exampleModalLongTitle">Conoce el valor de tu propiedad</p>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="demo-form" action="{{ route('web.lead.contact') }}" method="POST">
          @csrf
        <div class="modal-body">
          <label class="text-muted font-weight-bolder">Por favor, complete el siguiente formulario y un asesor inmobiliario se contactará lo antes posible</label>
          <input type="hidden" name="interest" value="Avalúo de una propiedad">
          <div class="row">
            <div class="col-sm-6 col-6">
              <div class="form-group mt-2">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
              </div>
            </div>
            <div class="col-sm-6 col-6">
              <div class="form-group mt-2">
                <label for="name">Apellido</label>
                <input type="text" name="lastname" id="lastname" class="form-control" required>
              </div>
            </div>
          </div>
          <div class="form-group mt-2">
            <label for="phone">Teléfono</label>
            <input type="number" name="phone" id="phone" class="form-control" required>
          </div>
          <div class="form-group mt-2">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="form-group mt-3">
            <label for="tipopropiedad" class="font-weight-bolder">¿Qué tipo de propiedad necesita avaluar?</label>
            @php
              $types = DB::table('listing_types')->get();
            @endphp
            <select class="form-select mt-1" name="tipopropiedad">
              <option value="">Seleccione</option>
              @foreach ($types as $type)
                <option value="{{ $type->type_title }}">{{ $type->type_title }}</option>
              @endforeach
            </select>
          </div>
          <div class="mt-3">
            <label class="text-gray font-weight-bolder">¿En donde se encuentra ubicada su propiedad?</label>
            <div class="row">
              <div class="col-sm-6">
                <select name="province" class="form-select mt-1" id="selProvinceModalAvaluo">
                  <option value="">Provincia</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-6">
                <select class="form-select mt-1" name="city" id="selCityModalAvaluo">
                  <option value="">Ciudad</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center">
          <button class="btn" type="submit" style="background: #182741; color: #ffffff">Enviar</button>
        </div>
      </form>
      </div>
    </div>
</div>

<script>
    const selProvinceAvaluo = document.getElementById('selProvinceModalAvaluo');
    const selCityAvaluo = document.getElementById('selCityModalAvaluo');

    selProvinceAvaluo.addEventListener("change", async function() {
        selCityAvaluo.options.length = 0;
        let id = selProvinceAvaluo.options[selProvinceAvaluo.selectedIndex].dataset.id;
        const response = await fetch("{{ url('getcities') }}/" + id);
        const cities = await response.json();

        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Ciudad'));
        opt.value = '';
        selCityAvaluo.appendChild(opt);
        cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(city.name));
            opt.value = city.name;
            selCityAvaluo.appendChild(opt);
        });
    });
</script>