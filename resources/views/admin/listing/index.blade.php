@extends('layouts.dashtw')

@section('firstscript')
<title>Propiedades Taildwind</title>
<style>
    .hover-trigger .hover-target {display: none;} 
    .hover-trigger:hover .hover-target {display: block;border-radius: 5px;margin-top: 1px;margin-right: 1px;}
    select > option{background-color: #E5E7EB;}
    .btn-view:hover{background-color: #68d391 !important}
    .btn-edit:hover{background-color: #fc8181 !important}
</style>
@livewireStyles
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="flex grid justify-items-end w-full pt-4 px-4">
        <div class="px-5 flex float-right"  >
            <button onclick="prevpage()" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg> </button>
            <span class="px-4 py-1"> Pag: <span id="unoalcien">1</span> </span>
            <button onclick="nextpage()" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg> </button>
            <span class=" px-4 py-1"> de: <span id="totalProperties">0</span> Registros </span>
        </div> 
    </div> 
                    <div class="flex flex-col pt-4 px-2">
                        <div class="-my-2 py-2 overflow-x-auto">

                            <div id="filtersdiv" class="flex justify-center mt-4">
                                {{-- <div class="w-full pr-2">
                                    <select class="block w-auto pl-2 py-2 border rounded-md border-gray-400 hover:border-gray-500 shadow focus:outline-none focus:shadow-outline" id="b_country">
                                        <option value="">Pais</option>
                                        <option value="Argentina" data-id="233">Argentina</option>
                                        <option value="Colombia" data-id="47">Colombia</option>
                                        <option value="Ecuador" data-id="63">Ecuador</option>
                                        <option value="El Salvador" data-id="65">El Salvador</option>
                                        <option value="Guatemala" data-id="232">Guatemala</option>
                                    </select>
                                </div> --}}
                                <div class="w-auto pr-2 pb-2">
                                    <select class="block w-32 py-2 pl-2 border-gray-300 hover:border-gray-400 focus:outline-none shadow-md" id="b_state">
                                        <option value="">Provincia</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-auto pr-2 pb-2">
                                    <select class="block w-32 py-2 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_city">
                                        <option value="">Ciudad</option>
                                    </select>
                                </div>
                                <div class="w-auto pr-2">
                                    <input class="block w-32 py-2 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_detalle" name="b_detalle" type="text" placeholder="Sector">
                                </div>
                                <div class="w-auto pr-2 pb-2">
                                    <input class="block w-20 py-2 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_code" name="b_code" type="text" placeholder="Código">
                                </div>
                                <div class="w-auto pr-2">
                                    <select class="block w-24 py-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_tipo">
                                        <option value="" selected>Categoría</option>
                                        <option value="en-venta">Venta</option>
                                        <option value="alquilar">Alquiler</option>
                                    </select>
                                </div>
                                <div class="w-auto pr-2">
                                    <select class="block w-auto py-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_categoria">
                                        <option value="">Tipo de propiedad</option>	
                                        <option value="23">Casas </option>
                                        <option value="24">Departamentos </option>
                                        <option value="25">Casas Comerciales</option>
                                        <option value="26">Terrenos</option>
                                        <option value="29">Quintas</option>
                                        <option value="30">Haciendas</option>
                                        <option value="32">Locales Comerciales</option>
                                        <option value="35">Oficinas</option>
                                        <option value="36">Suites</option>
                                    </select>
                                </div>
                                <div class="w-auto pr-2 pb-2">
                                    <select class="block w-20 py-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none"id="b_status" name="b_status">
                                        <option value="" selected>Estado</option>
                                        <option value="A">ON</option>
                                        <option value="D">OFF</option>
                                    </select>
                                </div>
                                {{-- <div class="w-auto pr-2 pb-2">
                                    <select class="w-auto block w-20 py-2 border rounded-md border-gray-400 hover:border-gray-500 shadow focus:outline-none focus:shadow-outline"id="b_available" name="b_available"  class="w-20">
                                        <option value="" selected>Disponibilidad</option>
                                        <option value="1">Disponibles</option>
                                        <option value="2">No disponibles</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="w-full pr-2 pb-2">
                                    <select class="w-auto block w-32 py-2 border rounded-md border-gray-400 hover:border-gray-500 shadow focus:outline-none focus:shadow-outline" id="b_price" name="b_price"  class="w-20">
                                        <option value="" selected>Precio</option>
                                        <option value="ASC">Ascendente</option>
                                        <option value="DESC">Descendente</option>
                                    </select>
                                </div> --}}
                                <div class="w-auto pr-2 pb-2">
                                    <div onclick="openmaxminprice();" class="block w-32 py-2 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <label for="">Precio</label>
                                    </div>
                                    <div class="block w-auto" id="pricemaxmin" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #E5E7EB">
                                        <input id="minprice" class="block w-32 m-2 shadow appearance-none border rounded py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Mínimo">
                                        <input id="maxprice" class="block w-32 m-2 shadow appearance-none border rounded py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Máximo">
                                        <div class="bg-white flex justify-between p-2" style="background-color: #E5E7EB">
                                            <input type="radio" id="asc" name="order" value="ASC">
                                            <label for="html" title="Ascendente">ASC.</label><br>
                                            <input type="radio" id="desc" name="order" value="DESC">
                                            <label for="css" title="Descendente">DESC.</label><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-auto pr-2 pb-2">
                                    <div onclick="openDateFilter();" class="block w-32 py-2 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <label for="">Fecha</label>
                                    </div>
                                    <div class="block w-auto" id="datefilter" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #E5E7EB">
                                        <label class="ml-2" for="fromdate">Desde</label>
                                        <input type="date" class="block w-32 m-2 shadow appearance-none border rounded py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fromdate">
                                        <label class="ml-2" for="untildate">Hasta</label>
                                        <input type="date" class="block w-32 m-2 shadow appearance-none border rounded py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="untildate">
                                    </div>
                                </div>

                                <div class="w-auto pr-2 pb-2">
                                    <select class="block w-32 py-2 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_asesor">
                                        <option value="">Asesor</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-auto">
                                    <div class="block w-full py-2 rounded-md">
                                        <input type="hidden" id="view" value="grid">
                                        <div style="cursor: pointer" onclick="document.getElementById('view').value='grid';filter_properties();" class="float-right pr-1"><img src="{{ asset('img/grid.png') }}" alt=""></div>
                                        <div style="cursor: pointer" onclick="document.getElementById('view').value='list';filter_properties();" class="float-right pr-2"><img src="{{ asset('img/list.png') }}" alt=""></div>
                                    </div>
                                </div>
                                <input type="hidden" name="b_current_url" id="b_current_url" value="{{ Route::current()->getName() }}">
                            </div>

                            <div class="flex justify-center m-5">
                                <button class="bg-red-800 text-white rounded-md px-4 py-1 hover:bg-red-500 mr-1" onclick="filter_properties()">BUSCAR</button>
                                <button class="bg-red-800 text-white rounded-md px-4 py-1 hover:bg-red-500 ml-1" onclick="location.reload()">LIMPIAR CAMPOS</button>
                            </div>

                            <div class="w-full overflow-scroll mx-auto" style="height: 80vh;">
                                {{-- <table class="w-full whitespace-nowrap bg-white">
                                    <thead>
                                        <tr class="sticky top-0">
                                            <th class="px-1 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                </th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                </th>
                                            <th class="w-2 px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                COD</th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Precio</th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Detalle</th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Categoria</th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                Tipo</th>
                                            <th class="px-2 py-2 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                User</th>
                                        </tr>    
                                        <tr><th></th><th></th>
                                            <th class="px-2"> <input class="block w-24 py-2 border rounded-md pl-2" 
                                                id="b_code" name="b_code" type="text" placeholder="Código..."></th>
                                            <td class="px-2">
                                                <select class="block w-14 py-2 border rounded-md"
                                                 id="b_status" name="b_status"  class="w-20" style="color: gray">
                                                        <option value="" selected>Seleccione</option>
                                                        <option value="A">Activa</option>
                                                        <option value="D">Desactivada</option>
                                                </select>
                                            </td>
                                            <th>
                                                <select class="block w-14 py-2 border rounded-md"
                                                 id="b_price" name="b_price"  class="w-20" style="color: gray">
                                                        <option value="" selected>Seleccione</option>
                                                        <option value="ASC">Ascendente</option>
                                                        <option value="DESC">Descendente</option>
                                                </select>
                                            </th>
                                            <th class="px-2" style="width: 40%"><input class="block w-full py-2 border rounded-md pl-2"
                                                id="b_detalle" name="b_detalle" type="text" placeholder="Ingrese un sector..."></th>
                                            <td class="w-14">  
                                                <select class="block w-full py-2 border rounded-md"
                                                id="b_categoria" style="color: gray">
                                                        <option value="" selected>Seleccione</option>	
                                                        <option value="23">Casas </option>
                                                        <option value="24">Departamentos </option>
                                                        <option value="25">Casas Comerciales</option>
                                                        <option value="26">Terrenos</option>
                                                        <option value="29">Quintas</option>
                                                        <option value="30">Haciendas</option>
                                                        <option value="32">Locales Comerciales</option>
                                                        <option value="35">Oficinas</option>
                                                        <option value="36">Suites</option>
                                                </select>
                                            </td>
                                            <td class="w-40 px-2">  
                                                <select class="block w-full py-2 border rounded-md"
                                                id="b_tipo" style="max-width:200px; color: gray">
                                                        <option value="" selected>Seleccione</option>
                                                        <option value="en-venta">Venta</option>
                                                        <option value="alquilar">Alquiler</option>
                                                </select>
                                        </td>
                                        <td></td>
                                        </tr>  
                                    </thead>      --}}
                                    <livewire:proplisttw />
                                {{-- </table> --}}
                            </div>
                        </div>
                    </div>

                    
    </div>
</main>
@endsection
@section('endscript')
@livewireScripts
@stack('scripts')
<script>

    document.addEventListener('keypress', function(event){
        if(event.key === "Enter"){
            filter_properties();
        }
    });

    function openmaxminprice(){
        let divpriceminmax = document.getElementById('pricemaxmin');
        if(divpriceminmax.style.display == "none") divpriceminmax.style.display = "block";
        else if(divpriceminmax.style.display == "block") divpriceminmax.style.display = "none";
    }

    function openDateFilter(){
        let divdatefilter = document.getElementById('datefilter');
        if(divdatefilter.style.display == "none") divdatefilter.style.display = "block";
        else if(divdatefilter.style.display == "block") divdatefilter.style.display = "none";
    }

    //const selCountry = document.getElementById('b_country');
    const selState = document.getElementById('b_state');
    const selCity = document.getElementById('b_city');

    // selCountry.addEventListener("change", async function(){
    //     selState.options.length = 0;
    //     let id = selCountry.options[selCountry.selectedIndex].dataset.id;
    //     const response = await fetch("{{url('getstates')}}/"+id);
    //     const states = await response.json();

    //     var opt = document.createElement('option');
    //         opt.appendChild(document.createTextNode('Provincia'));
    //         opt.value = '';
    //         selState.appendChild(opt);
    //     states.forEach(state => {
    //         var opt = document.createElement('option');
    //         opt.appendChild(document.createTextNode(state.name));
    //         opt.value = state.name;
    //         opt.setAttribute('data-id', state.id);
    //         selState.appendChild(opt);
    //     });
    //     //para poner el select de city sin options -> cada vez que cambie el select de country
    //     selCity.options.length = 0;
    //     var optaux = document.createElement('option'); optaux.appendChild(document.createTextNode('Ciudad')); optaux.value = '';
    //     selCity.appendChild(optaux);
    // });

    selState.addEventListener("change", async function() {
      selCity.options.length = 0;
    let id = selState.options[selState.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Ciudad') );
          opt.value = '';
          selCity.appendChild(opt);
    cities.forEach(city => {
          var opt = document.createElement('option');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          selCity.appendChild(opt);
    });
  });
</script>
@endsection