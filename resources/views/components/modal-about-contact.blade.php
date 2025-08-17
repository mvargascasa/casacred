<div class="modal fade" id="modalAboutContact" tabindex="-1" role="dialog" aria-labelledby="modalAboutContactTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #182741; color: #ffffff">
          <p class="modal-title h5" id="exampleModalLongTitle">Conoce el valor de tu propiedad</p>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('web.lead.about-contact') }}" method="POST">
          @csrf
        <div class="modal-body">
          <label class="text-muted font-weight-bolder">Por favor, complete el siguiente formulario y un asesor inmobiliario se contactará lo antes posible</label>
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
          <div class="mt-3">
            <label for="selProvinceModalAboutContact">Indique su lugar de residencia</label>
            <div class="row">
              <div class="col-sm-6">
                <select name="province" class="form-select mt-1" id="selProvinceModalAboutContact">
                  <option value="">Provincia</option>
                  @foreach ($provinces as $province)
                  <option value="{{ $province->name }}" data-id="{{ $province->id }}">{{ $province->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-6">
                <select class="form-select mt-1" name="city" id="selCityModalAboutContact">
                  <option value="">Ciudad</option>
                </select>
              </div>
            </div>
          </div>
            <div class="form-group mt-3">
                <label for="servicio" class="font-weight-bolder">¿Qué servicio necesita?</label>
                <select class="form-select mt-1" name="servicio" required>
                    <option value="">Seleccione</option>
                    <option value="Vender propiedad">Vender propiedad</option>
                    <option value="Rentar propiedad">Rentar propiedad</option>
                    <option value="Avalúo de propiedad">Avalúo de propiedad</option>
                    <option value="Otro servicio">Otro servicio</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="message" class="font-weight-bolder">Explique en qué está interesado</label>
                <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
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
    const selProvinceAboutContact = document.getElementById('selProvinceModalAboutContact');
    const selCityAboutContact = document.getElementById('selCityModalAboutContact');

    selProvinceAboutContact.addEventListener("change", async function() {
        selCityAboutContact.options.length = 0;
        let id = selProvinceAboutContact.options[selProvinceAboutContact.selectedIndex].dataset.id;
        const response = await fetch("{{ url('getcities') }}/" + id);
        const cities = await response.json();

        var opt = document.createElement('option');
        opt.appendChild(document.createTextNode('Ciudad'));
        opt.value = '';
        selCityAboutContact.appendChild(opt);
        cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode(city.name));
            opt.value = city.name;
            selCityAboutContact.appendChild(opt);
        });
    });
</script>