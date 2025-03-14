<div>
    <div class="px-4 py-5">
        <h1 class="text-gray-500 font-semibold text-xl mb-4">Filtrar por:</h1>
        <form action="{{ route('reports.updated.properties') }}" method="GET" class="flex gap-4">
            <div>
                <h2 class="text-gray-500 font-semibold text-md mb-2">Fecha:</h2>
                <select name="filter" class="border rounded px-4 py-2">
                    <option value="" {{ request()->query('filter') == '' ? 'selected' : '' }}>Todos</option>
                    <option value="day" {{ request()->query('filter') == 'day' ? 'selected' : '' }}>Día</option>
                    <option value="week" {{ request()->query('filter') == 'week' ? 'selected' : '' }}>Semana</option>
                    <option value="month" {{ request()->query('filter') == 'month' ? 'selected' : '' }}>Mes</option>
                </select>
            </div>
    
            <div>
                <h2 class="text-gray-500 font-semibold text-md mb-2">Tipo:</h2>
                <label>
                    <input type="checkbox" name="types[]" value="Contact" {{ in_array('Contact', request()->query('types', ['Contact', 'price'])) ? 'checked' : '' }}> Contacto
                </label>
                <label>
                    <input type="checkbox" name="types[]" value="price" {{ in_array('price', request()->query('types', ['Contact', 'price'])) ? 'checked' : '' }}> Precio
                </label>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded ml-2">Filtrar</button>
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
            @foreach ($comments as $comment)
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
            @endforeach
            <tr>
                <td colspan="5" class="px-6 py-4 text-center font-semibold">
                    Total de propiedades actualizadas: {{ $totalComments }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="mt-4 mb-4 p-4">
        {{ $comments->appends(['filter' => request()->query('filter'), 'types' => request()->query('types')])->links('pagination::tailwind') }}
    </div>

</div>