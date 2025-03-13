<div>
    <div class="px-4 py-5">
        <h1 class="text-gray-500 font-semibold text-xl mb-4">Ver reporte por fecha:</h1>
        <div class="flex gap-2">
            <a href="{{ route('reports.updated.properties') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Todos
            </a>
            <a href="{{ route('reports.updated.properties', ['filter' => 'day']) }}" class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Día
            </a>
            <a href="{{ route('reports.updated.properties', ['filter' => 'week']) }}" class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Semana
            </a>
            <a href="{{ route('reports.updated.properties', ['filter' => 'month']) }}" class="bg-blue-800 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Mes
            </a>
        </div>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    User ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Listing ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Type
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Comment
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Created At
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($comments as $comment)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['user_id'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['listing_id'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['type'] }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">{{ $comment['comment'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $comment['created_at'] }}</div>
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
        {{ $comments->appends(['filter' => request()->query('filter')])->links('pagination::tailwind') }}
    </div>

</div>