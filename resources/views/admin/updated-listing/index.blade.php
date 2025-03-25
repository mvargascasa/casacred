@extends('layouts.dashtw')

@section('firstscript')
    <title>Propiedades por actualizar | Grupo Housing</title>
@endsection

@section('content')

    <div class="overflow-y-auto py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-semibold text-2xl text-gray-700 px-3">Propiedades Actualizadas</h1>
            <a class="bg-blue-800 text-white p-2 rounded hover:bg-blue-700 text-sm font-semibold" href="{{ Route('reports.updated.properties') }}">Reporte de propiedades actualizadas</a>
        </div>

        <div class="px-3 mb-4">
            <form action="{{ route('updated.properties') }}" method="GET">
                <label for="listingtypestatus" class="block text-gray-700 text-sm font-bold mb-2">Filtrar por tipo:</label>
                <select name="listingtypestatus" style="width: 150px" id="listingtypestatus" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline form-select">
                    <option value="">Todos</option>
                    <option value="en-venta" {{ request('listingtypestatus') === 'en-venta' ? 'selected' : '' }}>En Venta</option>
                    <option value="alquilar" {{ request('listingtypestatus') === 'alquilar' ? 'selected' : '' }}>Alquilar</option>
                    </select>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-2">Filtrar</button>
            </form>
        </div>

        <div class="overflow-x-auto mt-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Imagen
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Código de Producto
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Título del Listado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dirección
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha de último contacto
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($properties as $propertie)
                        <tr class="hover:bg-gray-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img width="75px" src="{{ asset('uploads/listing/600/'. explode('|', $propertie->images)[0]) }}">
                                {{-- {{ $propertie->images != null ? explode('|', $propertie->images)[0] : 'Sin imagenes' }} --}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $propertie->product_code }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $propertie->listing_title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $propertie->address }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {!! $propertie->contact_at ? $propertie->contact_at : '<span class="text-sm font-semibold">Sin fecha de contacto</span>' !!}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{-- <a class="font-semibold bg-red-600 text-white rounded px-2 pb-1 hover:bg-red-700" href="{{ Route('home.tw.edit', $propertie) }}">Actualizar</a> --}}
                                @if ($propertie->showUpdateButton)
                                    <a href="{{ Route('home.tw.edit', $propertie) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Actualizar
                                    </a>
                                @else
                                    @if($propertie->nextContactDate)
                                        Próximo contacto: <br>
                                        <span class="font-semibold text-sm">{{ $propertie->nextContactDate }}</span>
                                    @else
                                        Sin fecha de próximo contacto.
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="py-3">
            {{ $properties->appends(['listingtypestatus' => request('listingtypestatus')])->links('pagination::tailwind')}}
        </div>

    </div>
@endsection

@section('endscript')

@endsection