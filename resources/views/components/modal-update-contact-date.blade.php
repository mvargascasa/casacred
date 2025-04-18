<div>
    <div id="miModal" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            Actualizar fecha de contacto
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                Ingrese un comentario y la fecha en que se contacta con el cliente
                            </p>
                        </div>
                        <div class="mt-2">
                            <textarea id="comentario" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" rows="4" placeholder="Comentario..."></textarea>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input id="fecha_contacto" type="datetime-local" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selecciona una fecha">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 flex gap-2">
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="cerrarModal()">
                        Cerrar
                    </button>
                    <button type="button" onclick="saveData()" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="cerrarModal()">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function abrirModal() {
        document.getElementById('miModal').classList.remove('hidden');
    }

    function cerrarModal() {
        document.getElementById('miModal').classList.add('hidden');
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