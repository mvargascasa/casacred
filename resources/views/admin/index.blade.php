@extends('layouts.dashtw')
@section('firstscript')
<title>Dashboard - Casa Crédito</title>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA9HaUDMtwi6jqW1M8avBHmOpspAUFto4"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    var newarray = [];
    function initMap() {
      var map;
      var bounds = new google.maps.LatLngBounds();
      var mapOptions = {
          mapTypeId: 'roadmap'
      };
                      
      // Display a map on the web page
      map = new google.maps.Map(document.getElementById("map"), mapOptions);
      map.setTilt(50);
          
      // Multiple markers location, latitude, and longitude

      newarray = @json($properties_aux);
      var markers_aux = [];
      var infoWindowContent_aux = [];
      for(let i = 0; i < newarray.length; i++){
        //if(newarray[i]['lat'].includes('-') && newarray[i]['lng'].includes('-')){
          markers_aux[i] = new Array(newarray[i]['listing_title'] + ", EC", newarray[i]['lat'], newarray[i]['lng']);
          infoWindowContent_aux[i] = new Array("<div>Código "+newarray[i]['product_code']+"<p><a target='_blank' href='https://casacredito.com/admin/show-listing/"+newarray[i]['id']+"'>"+newarray[i]['listing_title']+"</a></p><p><a target='_blank' href='https://api.whatsapp.com/send?text=https://maps.google.com/?q="+newarray[i]['lat']+","+newarray[i]['lng']+"'>Enviar Ubicación</a></p></div>");
        //}
      }

      //console.log("---------markers aux --------------------");
      //console.log(markers_aux);

      var markers = [
          ['Brooklyn Public Library, NY', 40.672587, -73.968146]
          //['Brooklyn Public Library, NY', 40.672587, -73.968146],
          //['Prospect Park Zoo, NY', 40.665588, -73.965336]
      ];
      //console.log("-------------MARKERS--------------");
      //console.log(markers);
                          
      // Info window content
      var infoWindowContent = [
          ['<div class="info_content">' +
          '<h3>Brooklyn Public Library</h3>' +
          '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' + '</div>'],
          // ['<div class="info_content">' +
          // '<h3>Brooklyn Public Library</h3>' +
          // '<p>The Brooklyn Public Library (BPL) is the public library system of the borough of Brooklyn, in New York City.</p>' +
          // '</div>'],
          // ['<div class="info_content">' +
          // '<h3>Prospect Park Zoo</h3>' +
          // '<p>The Prospect Park Zoo is a 12-acre (4.9 ha) zoo located off Flatbush Avenue on the eastern side of Prospect Park, Brooklyn, New York City.</p>' +
          // '</div>']
      ];

      //console.log("-----------------infoWindowContent-------------------");
      //console.log(infoWindowContent);


      //console.log("---------------infoWindowContentAux-------------------")
      //console.log(infoWindowContent_aux);
          
      // Add multiple markers to map
      var infoWindow = new google.maps.InfoWindow(), marker, i;
      
      var icon = {
          url: "https://cdn1.iconfinder.com/data/icons/real-estate-building-flat-vol-3/104/house__location__home__map__Pin-512.png", // url
          scaledSize: new google.maps.Size(40, 40), // scaled size
          origin: new google.maps.Point(0,0), // origin
          anchor: new google.maps.Point(0, 0) // anchor
      };
      // Place each marker on the map  
      for( i = 0; i < markers_aux.length; i++ ) {
          var position = new google.maps.LatLng(markers_aux[i][1], markers_aux[i][2]);
          bounds.extend(position);
          marker = new google.maps.Marker({
              position: position,
              map: map,
              icon: icon,
              title: markers_aux[i][0]
          });
          
          // Add info window to marker    
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                  infoWindow.setContent(infoWindowContent_aux[i][0]);
                  infoWindow.open(map, marker);
              }
          })(marker, i));
          // Center the map to fit all markers on the screen
          map.fitBounds(bounds);
      }
      // Set zoom level
      var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
          this.setZoom(13);
          google.maps.event.removeListener(boundsListener);
      });
      
  }
  //if(){
    google.maps.event.addDomListener(window, 'load', initMap);
  //}  
</script>
@endsection

@section('content')
<main class="overflow-x-hidden overflow-y-auto">
    <div class="mx-4 border my-3 rounded p-4">
        <p class="font-semibold">ESTADISTICAS PROPIEDADES</p>
        <div class="mx-auto my-2">
            {{-- <h3 class="text-gray-700 text-3xl font-medium">Bienvenido</h3>   --}}
            <div class="flex">
                <div class="mx-1 border p-2 rounded">
                    <p>Total de Propiedades: <b>{{$totalproperties}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p>Propiedades Activadas: <b>{{$totalactivatedproperties}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p>Propiedades Disponibles: <b>{{$totalavailableproperties}}</b></p>
                </div>
            </div>
        </div>
        <div class="mx-auto my-2">
            <div class="flex text-sm">
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Casas: <b>{{$totalcasas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Departamentos: <b>{{$totaldepartamentos}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Casas Comerciales: <b>{{$totalcasascomer}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Terrenos: <b>{{$totalterrenos}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Quintas: <b>{{$totalquintas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Haciendas: <b>{{$totalhaciendas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Locales Comerciales: <b>{{$totallocalcomer}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Oficinas: <b>{{$totaloficinas}}</b></p>
                </div>
                <div class="mx-1 border p-2 rounded">
                    <p><i class="fa-sharp fa-solid fa-circle text-red-500"></i> Total Suites: <b>{{$totalsuites}}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 mx-4 my-2 w-auto border rounded py-4">
        <div>
            <p class="font-semibold mx-4 pb-1">UBICACIÓN DE PROPIEDADES</p>
            <p class="text-xs mx-4 pb-2">*Puede hacer clic sobre la ubicación de cada propiedad para más información</p>
            <div id="map" class="mx-4 rounded" style="height: 400px"></div>
        </div>
        <div class="mt-5" style="height: 400px; overflow: auto">
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
        <p class="font-semibold mx-4">MI USUARIO</p>
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
    @if(Auth::user()->role == "administrator")
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
    @endif

    <div class="mx-4 my-3 w-auto border rounded py-4">
        <p class="font-semibold mx-4">PROPIEDADES QUE BAJARON DE PRECIO</p>
        <div class="mx-4">
            @if (count($properties_dropped)>0)
            <div class="grid grid-cols-1 my-2">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0">
                        <tr>
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
                            <td class="px-4 py-4"><a href="{{route('home.tw.edit', $listing)}}">{{$pd->property_code}}</a></td>
                            <td class="px-4 py-4">@if($pd->comment == null || $pd->comment == "") <b>Sin información</b> @else {{$pd->comment}}@endif</td>
                            <td class="px-4 py-4">${{number_format($pd->property_price_prev)}}</td>
                            <td class="px-4 py-4">${{number_format($pd->property_price)}}</td>
                            <td class="px-4 py-4">{{$pd->created_at->format('d-M-y')}}</td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                <div class="flex float-right mt-3 text-blue-600">
                    <a href="{{route('admin.properties.change.price')}}">Ver más</a>
                </div>
            </div>
            @else
                <p class="text-red-600"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> No hemos encontrado propiedades</p>
            @endif
        </div>
    </div>
</main>
@endsection
