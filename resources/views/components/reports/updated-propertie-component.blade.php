<div>
    <div class="px-4 py-5">
        <h1 class="text-gray-500 font-semibold text-xl mb-4">Filtrar por:</h1>
        <form action="{{ route('reports.updated.properties') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <div class="mb-2 md:mb-0">
                <h2 class="text-gray-500 font-semibold text-md mb-2">Rango de Fechas:</h2>
                <div class="flex gap-2">
                    <input type="date" name="start_date" class="border rounded px-3 py-2 text-sm" value="{{ request()->query('start_date') }}">
                    <input type="date" name="end_date" class="border rounded px-3 py-2 text-sm" value="{{ request()->query('end_date') }}">
                </div>
                <p class="text-gray-400 text-xs mt-1">Si selecciona ambas fechas, se filtrará en ese rango.</p>
                <p class="text-gray-400 text-xs">Si selecciona solo una, se filtrará por ese día.</p>
            </div>

            <div class="mb-2 md:mb-0">
                <h2 class="text-gray-500 font-semibold text-md mb-2">Tipo de actualización:</h2>
                <label class="block text-sm text-gray-700">
                    <input type="checkbox" name="types[]" value="Contact" {{ in_array('Contact', request()->query('types', ['Contact', 'price'])) ? 'checked' : '' }}> Contacto
                </label>
                <label class="block text-sm text-gray-700">
                    <input type="checkbox" name="types[]" value="price" {{ in_array('price', request()->query('types', ['Contact', 'price'])) ? 'checked' : '' }}> Precio
                </label>
            </div>

            <div class="mt-auto">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded">Filtrar</button>
                @if(request()->hasAny(['start_date', 'end_date', 'types']))
                    <a href="{{ route('reports.updated.properties') }}" class="inline-block ml-2 text-white bg-red-700 py-2 px-4 rounded hover:bg-red-800">Limpiar Filtros</a>
                @endif
            </div>
        </form>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Usuario
                </th>
                @if(Auth::user()->email == "developer2@casacredito.com")
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID Base de datos
                    </th>
                @endif
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Código de propiedad
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tipo de comentario
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Comentario
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Fecha de creación
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($comments as $comment)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['user_name'] }}</div>
                    </td>
                    @if(Auth::user()->email == "developer2@casacredito.com")
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $comment['listing_id'] }}</div>
                        </td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">
                            @isset($comment['property_code'])
                                <a href="{{ Route('redirect.by.product.code', $comment['property_code']) }}">{{ $comment['property_code'] }}</a>
                            @else
                                <p>Sin codigo</p>
                            @endisset
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['type'] }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $comment['comment'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['created_at_ec'] }}</div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center">No se encontraron comentarios con los filtros aplicados.</td>
                </tr>
            @endforelse
            @if ($comments->isNotEmpty())
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center font-semibold">
                        Total de propiedades actualizadas: {{ $totalComments }}
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="mt-4 mb-4 p-4">
        {{ $comments->appends(request()->except('page'))->links('pagination::tailwind') }}
    </div>

</div>