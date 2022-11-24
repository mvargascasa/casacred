@extends('layouts.dashtw')

@section('firstscript')
<title>Propiedades que cambiaron de precio</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="overflow-y-auto pb-5 mx-10">
        <h3 class="p-10 text-center font-semibold">Propiedades que cambiaron de precio</h3>
        <div class="mx-10">
            @if(count($properties_change_price)> 0)
            <div class="mb-3">
                <form action="{{route('admin.properties.change.price')}}" method="GET" class="flex">
                    <input type="text" name="property_code" placeholder="Buscar por código" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <button class="mx-1 bg-red-600 text-white rounded px-3 font-semibold" type="submit"><i class="fas fa-search"></i> Buscar</button>
                    <button class="mx-1 bg-red-600 text-white rounded px-3 font-semibold"><a href="{{route('admin.properties.change.price')}}"><i class="fas fa-trash-alt"></i> Limpiar</a></button>
                </form>
            </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <th class="px-4 py-2"></th>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Comentario</th>
                            <th class="px-4 py-2">Precio Anterior</th>
                            <th class="px-4 py-2">Nuevo Precio</th>
                            <th class="px-4 py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties_change_price as $pcprice)
                        @php
                            $listing = \App\Models\Listing::find($pcprice->listing_id);
                        @endphp
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-xs">
                            <td class="px-4 py-4">@if($pcprice->property_price_prev > $pcprice->property_price) <i class="fas fa-arrow-down text-green-600"></i> @elseif($pcprice->property_price_prev < $pcprice->property_price) <i class="fas fa-arrow-up text-red-600"></i> @else <i class="fas fa-horizontal-rule"></i> @endif</td>
                            <td class="px-4 py-4"><a href="{{route('home.tw.edit', $listing)}}">{{$pcprice->property_code}}</a></td>
                            <td class="px-4 py-4">@if($pcprice->comment == null || $pcprice->comment == "") <b>Sin información</b> @else {{$pcprice->comment}}@endif</td>
                            <td class="px-4 py-4"><del>${{number_format($pcprice->property_price_prev)}}</del></td>
                            <td class="px-4 py-4">${{number_format($pcprice->property_price)}}</td>
                            <td class="px-4 py-4">{{$pcprice->created_at->format('d-M-y')}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{$properties_change_price->links('pagination::tailwind')}}
                </div>
            @else
                <p>No hemos encontrado información</p>
            @endif
        </div>
    </div>
@endsection

@section('endscript')

@endsection