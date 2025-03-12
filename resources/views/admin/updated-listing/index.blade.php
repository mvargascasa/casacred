@extends('layouts.dashtw')

@section('firstscript')
    
@endsection

@section('content')

    <div class="overflow-y-auto py-4">
        
        <h1 class="font-semibold text-2xl text-gray-700 px-3">Propiedades Actualizadas</h1>

        <div class="overflow-x-auto">
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
                                <img width="75px" src="{{ asset('uploads/listing/thumb/600/'. explode('|', $propertie->images)[0]) }}">
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
            {{ $properties->links('pagination::tailwind')}}
        </div>

    </div>
@endsection

@section('endscript')
    
@endsection