<div>
    <div id="modalUnits" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div>
                    <div class="mt-3 sm:mt-5">
                        @foreach ($units as $unit)
                            <div class="w-full mt-3 border rounded-lg shadow-sm p-3 bg-white">
                                <form id="unit-form-{{ $unit->id }}">
                                    <!-- TIPO DE PROPIEDAD -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Tipo de Propiedad</label>
                                        <select name="listing_type_id"
                                                class="w-full border rounded px-2 py-1 focus:outline-none focus:ring"
                                                disabled>
                                            <option value="">-- Selecciona --</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ $unit->listing_type_id == $type->id ? 'selected' : '' }}>
                                                    {{ $type->type_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                        
                                    <!-- NOMBRE -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Nombre</label>
                                        <input type="text" name="name" value="{{ $unit->name }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- UNIT NUMBER -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Número de Unidad</label>
                                        <input type="text" name="unit_number" value="{{ $unit->unit_number }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- FLOOR -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Piso</label>
                                        <input type="number" name="floor" value="{{ $unit->floor }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- AREA M2 -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Área m²</label>
                                        <input type="number" step="0.01" name="area_m2" value="{{ $unit->area_m2 }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- BEDROOMS -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Habitaciones</label>
                                        <input type="number" name="bedrooms" value="{{ $unit->bedrooms }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- BATHROOMS -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Baños</label>
                                        <input type="number" name="bathrooms" value="{{ $unit->bathrooms }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- PRICE -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Precio</label>
                                        <input type="number" step="0.01" name="price" value="{{ $unit->price }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- MIN PRICE -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Precio Mínimo</label>
                                        <input type="number" step="0.01" name="min_price" value="{{ $unit->min_price }}"
                                            class="w-full border-b bg-transparent focus:outline-none"
                                            disabled>
                                    </div>
                        
                                    <!-- STATUS -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Estado</label>
                                        <select name="status"
                                                class="w-full border rounded px-2 py-1 focus:outline-none focus:ring"
                                                disabled>
                                            <option value="available" {{ $unit->status === 'available' ? 'selected' : '' }}>Disponible</option>
                                            <option value="unavailable" {{ $unit->status === 'unavailable' ? 'selected' : '' }}>No disponible</option>
                                        </select>
                                    </div>
                        
                                    <!-- DESCRIPTION -->
                                    <div class="mb-2">
                                        <label class="text-sm font-medium text-gray-700">Detalles</label>
                                        <textarea name="description" rows="2"
                                                class="w-full border rounded px-2 py-1 focus:outline-none"
                                                disabled>{{ $unit->description }}</textarea>
                                    </div>
                        
                                    <!-- BOTONES -->
                                    <div class="flex gap-2 mt-3">
                                        <button type="button"
                                                class="edit-btn bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm"
                                                data-unit="{{ $unit->id }}">
                                            Editar
                                        </button>
                                        <button type="button"
                                                class="save-btn bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm hidden"
                                                data-unit="{{ $unit->id }}">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                                <p id="msg-{{ $unit->id }}" class="text-xs mt-2"></p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 flex gap-2">
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="cerrarModalUnits()">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function abrirModalUnits() {
        document.getElementById('modalUnits').classList.remove('hidden');
    }

    function cerrarModalUnits() {
        document.getElementById('modalUnits').classList.add('hidden');
    }

    function saveData() {
        const comentario = document.getElementById('comentario').value;
        const fecha_contacto = document.getElementById('fecha_contacto').value;
        const product_code = document.getElementById('product_code').value;

        fetch("{{ Route('update.contact.date') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de tener esto en tu Blade
            },
            body: JSON.stringify({
                comentario: comentario,
                fecha_contacto: fecha_contacto,
                product_code: product_code
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cerrarModal();
                alert('Fecha actualizada con éxito.');
                // Aquí puedes agregar una notificación de éxito o actualizar la tabla
            } else {
                alert('Error al actualizar la fecha de contacto.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.unit;
            const form = document.getElementById(`unit-form-${id}`);
            form.querySelectorAll('input, textarea, select').forEach(input => input.removeAttribute('disabled'));
            this.classList.add('hidden');
            form.querySelector(`.save-btn[data-unit="${id}"]`).classList.remove('hidden');
        });
    });

    //Ruta para actualizar la unidad
    const unitUpdateUrl = "{{ route('units.update', ['unit' => ':id']) }}";

    document.querySelectorAll('.save-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.unit;
            const form = document.getElementById(`unit-form-${id}`);
            const msg = document.getElementById(`msg-${id}`);

            const formData = new FormData(form);
            const data = {};
            formData.forEach((value, key) => data[key] = value);

            const url = unitUpdateUrl.replace(':id', id);

            fetch(url, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(res => res.json())
            .then(res => {
                if (res.success) {
                    msg.innerText = '✅ Actualizado correctamente';
                    msg.classList.add('text-green-600');
                } else {
                    msg.innerText = '❌ Error al actualizar';
                    msg.classList.add('text-red-600');
                }

                form.querySelectorAll('input, textarea').forEach(input => input.setAttribute('disabled', true));
                this.classList.add('hidden');
                form.querySelector(`.edit-btn[data-unit="${id}"]`).classList.remove('hidden');
            })
            .catch(err => {
                msg.innerText = '❌ Error al enviar datos';
                msg.classList.add('text-red-600');
            });
        });
    });
</script>