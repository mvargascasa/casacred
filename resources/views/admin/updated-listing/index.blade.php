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
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($properties as $propertie)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ $propertie->images != null ? explode('|', $propertie->images)[0] : 'Sin imagenes' }}
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