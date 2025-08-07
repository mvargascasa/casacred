@extends('layouts.dashtw')
@section('firstscript')
<title>Dashboard - Grupo Housing</title>

{{-- map leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.css" crossorigin="" />
<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.4/dist/esri-leaflet-geocoder.js" crossorigin=""></script>

@endsection

@section('content')
<main class="overflow-x-hidden overflow-y-auto">
    <div class="mx-4 border my-3 rounded p-4">
        <p class="font-semibold"><i class="fas fa-chart-bar text-gray-600"></i> ESTADISTICAS PROPIEDADES</p>
        <div class="mx-auto my-2">
            {{-- <h3 class="text-gray-700 text-3xl font-medium">Bienvenido</h3>   --}}
            <div class="flex">
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p>Total de Propiedades Disponibles: <b>{{$totalavailableproperties}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p>Total de Propiedades Activas: <b>{{$totalactivatedproperties}}</b></p>
                </div>
            </div>
        </div>
        <div class="mx-auto my-2">
            <div class="flex text-sm">
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Casas: <b>{{$totalcasas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Departamentos: <b>{{$totaldepartamentos}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Casas Comerciales: <b>{{$totalcasascomer}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Terrenos: <b>{{$totalterrenos}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Quintas: <b>{{$totalquintas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Haciendas: <b>{{$totalhaciendas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Locales Comerciales: <b>{{$totallocalcomer}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Oficinas: <b>{{$totaloficinas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded hover:bg-gray-800 hover:text-white">
                    <p><i class="fa-sharp fa-solid fa-circle text-gray-500"></i> Suites: <b>{{$totalsuites}}</b></p>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->id)
        <div class="grid grid-cols-1 mx-4 w-max-content">
            <a class="bg-green-700 p-2 rounded-md text-white" href="{{ route('update.valid.properties') }}">Actualizar propiedades validas</a>
        </div>
    @endif

    <div class="grid grid-cols-2 mx-4 my-2 w-auto border rounded py-4">
        <div>
            <p class="font-semibold mx-4 pb-1"><i class="fas fa-location text-gray-800"></i> UBICACIÓN DE PROPIEDADES</p>
            <p class="text-xs mx-4 pb-2">*Puede hacer clic sobre la ubicación de cada propiedad para más información</p>
            {{-- <div id="map" class="mx-4 rounded" style="height: 400px"></div> --}}
            <div id="map" style="height: 500px; z-index: 3"></div>
        </div>
        <div class="mt-5" style="height: 500px; overflow: auto">
            <p class=" bg-white font-semibold text-center sticky top-0">Ultimas propiedades subidas</p>
            <div class="flex justify-center mx-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Sector</th>
                            <th class="px-4 py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties_aux as $prop)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-xs">
                            <td class="px-4 py-4">{{$prop->product_code}}</td>
                            <td class="px-4 py-4">{{$prop->listing_title}}</td>
                            <td class="px-4 py-4">{{$prop->address}}</td>
                            <td class="px-4 py-4">{{$prop->created_at->format('d-M-y')}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mx-4 my-3 w-auto border rounded py-4">
        <p class="font-semibold mx-4"><i class="fas fa-user text-gray-800"></i> MI USUARIO</p>
        <div class="mx-4">
            @if (count($properties_at_week)>0)
            <p>Propiedades subidas por <b class="text-gray-600">{{Auth::user()->name}}</b> durante esta semana desde el <b class="text-gray-600">{{$now->startOfWeek()->format('d-M-y')}} </b> hasta el <b class="text-gray-600">{{$now->endOfWeek()->format('d-M-y')}}</b></p>
            <div class="grid grid-cols-3 my-2">
                @foreach ($properties_at_week as $prop_at_week)
                    <div class="border mx-1 p-1 rounded">
                        <label class="text-xs text-gray-500">{{$prop_at_week->created_at->format('d-M-y')}}</label>
                        <p>{{$prop_at_week->product_code}} - {{$prop_at_week->listing_title}}</p>
                    </div>
                @endforeach
            </div>
            @else
                <p class="text-red-600"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> No hemos encontrado captaciones esta semana del usuario {{Auth::user()->name}}</p>
            @endif
        </div>
    </div>
    {{-- @if(Auth::user()->role == "administrator")
    <div class="mx-4 my-3 w-auto border rounded py-4">
        <p class="font-semibold mx-4">PROPIEDADES SUBIDAS EL DÍA DE HOY</p>
        <div class="mx-4">
            @if (count($properties_today)>0)
            <div class="grid grid-cols-1 my-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Plan</th>
                            <th class="px-4 py-2">Sector</th>
                            <th class="px-4 py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties_today as $prop_today)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-xs">
                            <td class="px-4 py-4">{{$prop_today->product_code}}</td>
                            <td class="px-4 py-4 text-blue-400"><a href="{{route('home.tw.edit', $prop_today)}}">{{$prop_today->listing_title}}</a></td>
                            <td class="px-4 py-4">@if($prop_today->listing_type == 2) PAGO @elseif($prop_today->listing_type == 1) GRATIS @endif</td>
                            <td class="px-4 py-4">{{$prop_today->address}}</td>
                            <td class="px-4 py-4">{{$prop_today->created_at->format('d-M-y')}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-red-600"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> No hemos encontrado propiedades subidas el día de hoy</p>
            @endif
        </div>
    </div>
    @endif --}}

    <div class="mx-4 my-3 w-auto border rounded py-4">
        <p class="font-semibold mx-4"><i class="far fa-edit text-gray-800"></i> PROPIEDADES ACTUALIZADAS POR <b class="text-gray-800 font-semibold">{{Auth::user()->name}}</b> EL DÍA <b class="text-gray-800 font-semibold">{{substr(date(now()), 0, 10)}}</b></p>
        <div class="mx-4">
            @if (count($updated_listing)>0)
            <div class="grid grid-cols-1 my-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Campos Actualizados</th>
                            <th class="px-4 py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($updated_listing as $update_lis)
                        @php
                            $listing = \App\Models\Listing::find($update_lis->listing_id);
                        @endphp
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-xs">
                            <td class="px-4 py-4"><a href="{{route('home.tw.edit', $listing)}}">{{$update_lis->property_code}}</a></td>
                            <td class="px-4 py-4">{{str_replace(",", ", ", $update_lis->value_change)}}</td>
                            <td class="px-4 py-4">{{date_format(new DateTime($update_lis->created_at), 'd-M-Y')}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-red-600"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> No hemos encontrado propiedades</p>
            @endif
        </div>
    </div>

    <div class="mx-4 my-3 w-auto border rounded py-4">
        <p class="font-semibold mx-4"><i class="fas fa-arrow-down text-gray-800"></i> PROPIEDADES QUE BAJARON DE PRECIO</p>
        <div class="mx-4">
            @if (count($properties_dropped)>0)
            <div class="grid grid-cols-1 my-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
                            <th></th>
                            <th class="px-4 py-2">Código</th>
                            <th class="px-4 py-2">Comentario</th>
                            <th class="px-4 py-2">Precio Anterior</th>
                            <th class="px-4 py-2">Nuevo Precio</th>
                            <th class="px-4 py-2">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($properties_dropped as $pd)
                        @php
                            $listing = \App\Models\Listing::find($pd->listing_id);
                        @endphp
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-xs">
                            <td class="px-4 py-4">@if($pd->property_price_prev > $pd->property_price) <i class="fas fa-arrow-down text-green-600"></i> @elseif($pd->property_price_prev < $pd->property_price) <i class="fas fa-arrow-up text-red-600"></i> @else <i class="fas fa-horizontal-rule"></i> @endif </td>
                            <td class="px-4 py-4"><a href="{{route('home.tw.edit', $listing)}}">{{$pd->property_code}}</a></td>
                            <td class="px-4 py-4">@if($pd->comment == null || $pd->comment == "") <b>Sin información</b> @else {{$pd->comment}}@endif</td>
                            <td class="px-4 py-4">${{number_format($pd->property_price_prev)}}</td>
                            <td class="px-4 py-4">${{number_format($pd->property_price)}}</td>
                            <td class="px-4 py-4">{{date_format(new DateTime($pd->created_at), 'd-M-Y')}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                <div class="flex float-right mt-3 text-blue-600">
                    <a href="{{route('admin.properties.change.price')}}">Ver todas</a>
                </div>
            </div>
            @else
                <p class="text-red-600"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> No hemos encontrado propiedades</p>
            @endif
        </div>
    </div>
</main>
@endsection

@section('endscript')
<script>
    let map = L.map('map').setView([-2.9004975301629137, -79.00414343755442], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    const apiKey = "AAPK6cd0390360a34c47abb6992f612c3a4eHDSN5oz15wvKsDnnOXQAT1xiCNYDtP4B8XRcytqys3UphqELHcSD_tlTbsijCbGz";

    const searchControl = L.esri.Geocoding.geosearch({
        position: "topright",
        placeholder: "Ingrese la dirección de la propiedad",
        useMapBounds: false,
        providers: [
            L.esri.Geocoding.arcgisOnlineProvider({
                apikey: apiKey,
                nearby: {
                lat: -33.8688,
                lng: 151.2093
                }
            })
        ]
    }).addTo(map);

    newarray = @json($properties_aux);

    for(let i = 0; i < newarray.length; i++){
        let images = newarray[i]['images'] ? newarray[i]['images'].split('|') : [];
        //let images = newarray[i]['images'].split('|');
        let imageUrl = images.length > 0 ? `https://grupohousing.com/uploads/listing/600/${images[0]}` : 'https://grupohousing.com/img/logo-azul-grupo-housing.png';
        let marker = L.marker([newarray[i]['lat'], newarray[i]['lng']]).addTo(map)
            .bindPopup(`<div style='display: flex; gap: 5px; align-items: center'>
                <div>
                    <span style='font-weight: bold'>Propiedad ${newarray[i]['product_code']}</span><br>
                    <span>${newarray[i]['listing_title']}</span><br>
                    <a target='blank' href='https://api.whatsapp.com/send?text=https://maps.google.com/?q=${newarray[i]['lat']},${newarray[i]['lng']}'>Compartir Ubicación</a><br>
                    <a href="https://grupohousing.com/admin/show-listing/${newarray[i]['id']}">Ver propiedad</a>
                </div>
                <div><img width='200px' src='${imageUrl}'></div>
            </div>`)
            .openPopup();
    }
</script>
@endsection