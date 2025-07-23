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
                            <div class="w-full mt-3">
                                <div class="bg-white border rounded-lg shadow-sm p-3">
                                    <div class="mb-2">
                                        <h6 class="text-base font-semibold text-gray-800">{{ $unit->name }}</h6>
                                        @if($unit->unit_number)
                                            <strong class="text-gray-500 block">Unidad #{{ $unit->unit_number ?? '-' }}</strong>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-700 mb-2 space-y-1">
                                        @if($unit->floor)
                                            <div><span>Piso:</span> {{ $unit->floor ?? '-' }}</div>
                                        @endif
                                        @if($unit->area_m2)
                                            <div><span>Área:</span> {{ $unit->area_m2 ?? '-' }} m²</div>
                                        @endif
                                        @if($unit->bedrooms)
                                            <div><span>Hab:</span> {{ $unit->bedrooms ?? '-' }} </div>
                                        @endif
                                        @if($unit->bathrooms)
                                            <div><span>Baños:</span> {{ $unit->bathrooms ?? '-' }}</div>
                                        @endif
                                        @if($unit->price)
                                            <div><span>Precio:</span> ${{ number_format($unit->price ?? 0, 2) }}</div>
                                        @endif
                                    </div>

                                    @if($unit->description)
                                        <div>
                                            <strong>Detalles:</strong>
                                            <p>{{ $unit->description }}</p>
                                        </div>
                                    @endif

                                    <span class="inline-block px-2 py-0.5 rounded-full text-xs font-semibold 
                                        {{ $unit->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-700' }}">
                                        {{ ucfirst($unit->status) }}
                                    </span>
                                </div>
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
</script>