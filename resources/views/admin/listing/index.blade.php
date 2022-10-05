@extends('layouts.dashtw')

@section('firstscript')
<title>Propiedades Taildwind</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
<style>
    .hover-trigger .hover-target {display: none;} 
    .hover-trigger:hover .hover-target {display: block;border-radius: 5px;margin-top: 1px;margin-right: 1px;}
    select > option{background-color: #ffffff; font-size: 14px !important;}
    .btn-edit:hover{background-color: #79dfa0 !important}
    .div-selects > input:hover{background-color: #ef4444; color: #ffffff; cursor: pointer}
    #lbl_ftop_category_0, #lbl_ftop_category_1, #lbl_ftop_category_2{cursor: pointer !important;} 
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
                        <div class="overflow-x-auto rounded-md">
                            {{-- background: rgba(8, 8, 8, 0.319); --}}
                        <section id="bgimage" class="h-64" style="background: rgba(110, 110, 110, 0.319); background-size: cover;background-position: left center; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;">
                            <div class="text-center h-64">
                                <div class="flex justify-center pt-8 sticky top-0">
                                    <input type="hidden" id="b_tipo">
                                    <div class="flex align-items-center">
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_0" autocomplete="off" value="en-venta" @if($category === "en-venta") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display: none" class="btn-check" name="ftop_category[]" id="b_tipo" autocomplete="off" value="">
                                        <label class="bg-red-600 hover:bg-red-600 text-white pt-4 px-5" id="lbl_ftop_category_0" for="ftop_category_0" style="width:100px;font-size: 18px;" onclick="changeClassBtnRadio(this)">TODOS</label>
                                        
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_1" autocomplete="off" value="alquilar" @if($category === "alquilar") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display: none" class="btn-check" name="ftop_category[]" id="b_tipo" autocomplete="off" value="en-venta">
                                        <label class="bg-gray-100 hover:bg-red-600 text-black hover:text-white pb-1 pt-4 px-5" id="lbl_ftop_category_1" for="ftop_category_1" style="width:100px;font-size: 18px" onclick="changeClassBtnRadio(this)">VENTA</label>
                                        
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_2" autocomplete="off" value="proyectos" @if($category === "proyectos") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display:none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="alquilar">
                                        <label class="bg-gray-100 hover:bg-red-600 text-black hover:text-white pb-1 pt-4 px-5" id="lbl_ftop_category_2" for="ftop_category_2" style="width:100px;font-size: 18px" onclick="changeClassBtnRadio(this)">RENTA</label>
                                    </div>
                                </div> 
                                <div class="flex flex-wrap justify-center">
{{-- <div class="w-auto bg-gray-100 py-8 pl-6 pr-1">
                                    <select class="block w-auto pl-2 border rounded-md border-gray-400 hover:border-gray-500 shadow focus:outline-none focus:shadow-outline" id="b_country">
                                        <option value="">Pais</option>
                                        <option value="Argentina" data-id="233">Argentina</option>
                                        <option value="Colombia" data-id="47">Colombia</option>
                                        <option value="Ecuador" data-id="63">Ecuador</option>
                                        <option value="El Salvador" data-id="65">El Salvador</option>
                                        <option value="Guatemala" data-id="232">Guatemala</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="w-auto relative bg-gray-100 py-8 pl-6 pr-1">
                                    <div id="div1" class="pattern block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <input type="hidden" id="b_state">
                                        <label id="labeldiv1" for="state">Provincia</label>
                                    </div>
                                    <div class="overflow-y-scroll w-40 h-64 rounded-md mt-1 p-1 div-selects" id="child1" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Provincia</label>
                                        </div>
                                        @foreach ($states as $state)
                                            <input id="selState" onclick="setValue(this, 'labeldiv1')" type="text" class="w-full m-0 rounded pl-1" data-id="{{$state->id}}" value="{{$state->name}}" readonly>
                                        @endforeach
                                    </div>
                                </div> --}}
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-6 text-justify">
                                    <label class="text-xs text-gray-400">Provincia</label>
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 focus:outline-none shadow-md" id="b_state">
                                        <option value="">Todas</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="w-auto relative bg-gray-100 py-8 pl-1 pr-1">
                                    <div id="div2" class="pattern block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <input type="hidden" id="b_city">
                                        <label id="labeldiv2" for="state">Ciudad</label>
                                    </div>
                                    <div class="w-40 h-auto rounded-md mt-1 p-1 div-selects" id="child2" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Ciudad</label>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 pr-1 text-justify">
                                    <label class="text-xs text-gray-400">Ciudad</label>
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_city">
                                        <option value="">Todas</option>
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-1 pr-1 text-justify">
                                    <label class="text-xs text-gray-400">Sector</label>
                                    <input class="block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_detalle" name="b_detalle" type="text" placeholder="Ej: Ricaurte">
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Código</label>
                                    <input class="block w-20 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_code" name="b_code" type="text" placeholder="Ej: 1733">
                                </div>
                                {{-- <div class="w-auto bg-gray-100 py-8 pr-1 pl-1 relative">
                                    <div id="div3" class="pattern block w-24 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <input type="hidden" id="b_tipo">
                                        <label id="labeldiv3">Categoría</label>
                                    </div>
                                    <div class="w-24 h-auto rounded-md mt-1 p-1 div-selects" id="child3" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Categoría</label>
                                        </div>
                                        <input onclick="setValue(this, 'labeldiv3')" type="text" class="w-full m-0 rounded pl-1" value="Venta" readonly>
                                        <input onclick="setValue(this, 'labeldiv3')" type="text" class="w-full m-0 rounded pl-1" value="Alquiler" readonly>
                                    </div>
                                </div> --}}
                                {{-- <div class="w-auto bg-gray-100 py-8 pl-2">
                                    <select class="block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_tipo">
                                        <option value="" selected>Categoría</option>
                                        <option value="en-venta">Venta</option>
                                        <option value="alquilar">Alquiler</option>
                                    </select>
                                </div> --}}
                                {{-- <div class="w-auto bg-gray-100 py-8 pl-1 pr-1 relative">
                                    <div id="div4" class="pattern block w-40 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <input type="hidden" id="b_categoria">
                                        <label id="labeldiv4">Tipo de Propiedad</label>
                                    </div>
                                    <div class="w-40 h-auto rounded-md mt-1 p-1 div-selects" id="child4" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Tipo de propiedad</label>
                                        </div>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Casas" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Departamentos" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Casas Comerciales" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Terrenos" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Quintas" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Haciendas" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Locales Comerciales" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Oficinas" readonly>
                                        <input onclick="setValue(this, 'labeldiv4')" type="text" class="w-full m-0 rounded pl-1" value="Suites" readonly>
                                    </div>
                                </div> --}}
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Tipo de propiedad</label>
                                    <select class="block w-auto pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_categoria">
                                        <option value="">Todas</option>	
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
                                {{-- <div class="w-auto bg-gray-100 py-8 relative pl-1 pr-1">
                                    <div id="div5" class="pattern block w-24 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <input type="hidden" id="b_status">
                                        <label id="labeldiv5">Estado</label>
                                    </div>
                                    <div class="w-24 h-auto rounded-md mt-1 p-1 div-selects" id="child5" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Estado</label>
                                        </div>
                                        <input onclick="setValue(this, 'labeldiv5')" type="text" class="w-full m-0 rounded pl-1" value="ON" readonly>
                                        <input onclick="setValue(this, 'labeldiv5')" type="text" class="w-full m-0 rounded pl-1" value="OFF" readonly>
                                    </div>
                                </div> --}}
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Estado</label>
                                    <select class="block w-24 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none"id="b_status" name="b_status">
                                        <option value="" selected>Todos</option>
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
                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Precio</label>
                                    <div id="div6" class="pattern block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <label for="">Precio</label>
                                    </div>
                                    <div class="block w-full rounded-md mt-1 p-1" id="child6" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Precio</label>
                                        </div>
                                        <input id="minprice" class="block w-28 m-2 shadow appearance-none border rounded py-1 px-1 text-sm text-gray-700 leading-tight focus:outline-none" type="text" placeholder="Desde">
                                        <input id="maxprice" class="block w-28 m-2 shadow appearance-none border rounded py-1 px-1 text-sm text-gray-700 leading-tight focus:outline-none" type="text" placeholder="Hasta">
                                        <div class="bg-white flex justify-between items-center p-2" style="background-color: #ffffff">
                                            <input type="radio" id="asc" name="order" value="ASC">
                                            <label for="html" class="text-xs" title="Ascendente">ASC</label><br>
                                            <input type="radio" id="desc" name="order" value="DESC">
                                            <label for="css" class="text-xs" title="Descendente">DESC</label><br>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Fecha</label>
                                    <div id="div7" class="pattern block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                                {{-- onclick="openDateFilter();" --}}
                                        <label for="">Seleccione</label>
                                    </div>
                                    <div class="block w-full rounded-md mt-1 p-1 text-justify" id="child7" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <label class="ml-2 text-xs" for="fromdate">Desde</label>
                                        <input type="date" class="block w-28 m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fromdate">
                                        <label class="ml-2 text-xs" for="untildate">Hasta</label>
                                        <input type="date" class="block w-28 m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="untildate">
                                    </div>
                                </div>

                                {{-- <div class="w-auto bg-gray-100 py-8 relative pl-1 pr-1">
                                    <div id="div8" class="pattern block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <input type="hidden" id="b_asesor">
                                        <label id="labeldiv8" for="state">Asesor</label>
                                    </div>
                                    <div class="w-32 h-auto rounded-md mt-1 p-1 div-selects" id="child8" style="display: none; position:absolute; z-index: 3;border: 1px solid #cfd1d5; background-color: #ffffff">
                                        <div class="flex items-center">
                                            <div style="width: 8px; height: 8px; background-color: #EF4444; border-radius: 25px"></div> 
                                            <label class="text-xs ml-1 text-gray-500">Asesor</label>
                                        </div>
                                        @foreach ($users as $user)
                                            <input onclick="setValue(this, 'labeldiv8')" type="text" class="w-full m-0 rounded pl-1" data-id="{{$user->id}}" value="{{$user->name}}" readonly>
                                        @endforeach
                                    </div>
                                </div> --}}
                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Asesor</label>
                                    <select class="block w-32 pl-2 rounded-md border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_asesor">
                                        <option value="">Asesor</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                
                                <input type="hidden" name="b_current_url" id="b_current_url" value="{{ Route::current()->getName() }}">

                                <div class="bg-gray-100 pt-10 pb-8 pl-1 pr-6">
                                    <button class="bg-red-600 text-white rounded-md px-4 hover:bg-red-500 mr-1" onclick="filter_properties()">BUSCAR</button>
                                    <button class="bg-red-600 text-white rounded-md px-4 hover:bg-red-500" onclick="location.reload()">LIMPIAR</button>
                                </div>

                                <div style="display:none" class="w-auto flex justify-end pb-2">
                                    <div class="block w-full rounded-md mr-1">
                                        <input type="hidden" id="view" value="grid">
                                        <div style="cursor: pointer;" onclick="document.getElementById('view').value='grid';filter_properties();" class="float-right pr-1"><img src="{{ asset('img/grid.png') }}" alt=""></div>
                                        <div style="cursor: pointer;" onclick="document.getElementById('view').value='list';filter_properties();" class="float-right pr-2"><img src="{{ asset('img/list.png') }}" alt=""></div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </section>
                            


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

    //window.addEventListener('load', function(){
        document.getElementById('bgimage').style.backgroundImage = "url({{asset('img/backimagesearch.jpg')}})";
    //});

    document.addEventListener('keypress', function(event){
        if(event.key === "Enter"){
            filter_properties();
        }
    });

    function changeClassBtnRadio(object){
        console.log(object.id);
        let check1 = document.getElementById("lbl_ftop_category_0");
        let check2 = document.getElementById("lbl_ftop_category_1");
        let check3 = document.getElementById("lbl_ftop_category_2");
        switch (object.id) {
            case "lbl_ftop_category_0":
                check1.classList.add('bg-red-600', 'text-white');check1.classList.remove('hover:bg-red-600', 'hover:text-white');
                check2.classList.add('bg-gray-100', 'text-black','hover:bg-red-600', 'hover:text-white');check2.classList.remove('bg-red-600', 'text-white');
                check3.classList.remove('bg-red-600', 'text-white');check3.classList.add('hover:bg-red-600', 'hover:text-white');
                document.getElementById('b_tipo').value = "";
                break;
            case "lbl_ftop_category_1":
                check2.classList.remove('hover:bg-red-600', 'hover:text-white');check2.classList.add('bg-red-600', 'text-white');
                check1.classList.remove('bg-red-600', 'text-white');check1.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check3.classList.remove('bg-red-600', 'text-white');check3.classList.add('hover:bg-red-600', 'hover:text-white');
                document.getElementById('b_tipo').value = "en-venta";
                break;
            case "lbl_ftop_category_2":
                check2.classList.remove('bg-red-600', 'text-white');check2.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check1.classList.remove('bg-red-600', 'text-white');check1.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check3.classList.remove('hover:bg-red-600', 'hover:text-white');check3.classList.add('bg-red-600', 'text-white');
                document.getElementById('b_tipo').value = "alquilar";
                break;
            default:
                break;
        }
        filter_properties();
    }

    function setValue(object, label){
        
        document.getElementById(label).innerHTML = object.value;
        document.getElementById('child'+label.substring(8)).style.display = "none";

        let divpattern = document.getElementById(label.substring(5));
        let inputhidden = divpattern.firstElementChild;
        
        if(label === "labeldiv8"){
            inputhidden.value = object.dataset.id;
        } else {
            switch (object.value) {
                case "Venta": inputhidden.value = "en-venta";break;
                case "Alquiler": inputhidden.value = "alquilar"; break;
                case "Casas": inputhidden.value = 23; break;
                case "Departamentos": inputhidden.value = 24; break;
                case "Casas Comerciales": inputhidden.value = 25; break;
                case "Terrenos": inputhidden.value = 26; break;
                case "Quintas": inputhidden.value = 29; break;
                case "Haciendas": inputhidden.value = 30; break;
                case "Locales Comerciales": inputhidden.value = 32; break;
                case "Oficinas": inputhidden.value = 35; break;
                case "Suites": inputhidden.value = 36; break;
                case "ON": inputhidden.value = "A"; break;
                case "OFF": inputhidden.value = "D"; break;
                default: inputhidden.value = object.value; break;
            }
        }

        // if(object.value === "Venta") inputhidden.value = "en-venta";
        // else if(object.value === "Alquiler") inputhidden.value = "alquilar";
        // else inputhidden.value = object.value;
        if(label === "labeldiv1") getCities(object.dataset.id);
    }

    //const divpriceinputs = document.getElementById("pricemaxmin");
    const divlabelprecio = document.getElementById("selprecio");

    // for (let i = 1; i < 2; i++) {
    //     let element = document.getElementById('pattern1');
    //     element.addEventListener('click', eventsClick());
    // }

    document.querySelectorAll('.pattern').forEach(item => {
        item.addEventListener('click', event => {
            eventsClick(item.id);
        });
    });

    function eventsClick(iditem){
        openmaxminprice(iditem);
        const divpriceinputs = document.getElementById('child'+iditem.substring(3));
        const divlabelprecio = document.getElementById(iditem);
        document.addEventListener("click", (event) => {
        const isClickDivPriceInputs = divpriceinputs.contains(event.target);
        const isClickDivLabelPrecio = divlabelprecio.contains(event.target);
            if (!isClickDivPriceInputs && !isClickDivLabelPrecio) {
                if(divpriceinputs.style.display === "block") divpriceinputs.style.display = "none";
            }
        });
    }

    // divlabelprecio.addEventListener('click', function(){
        
    // });

    // const divdateinputs = document.getElementById('datefilter');
    // const divlabelprecio = document.getElementById('seldate');


    function openmaxminprice(iditem){
        let divpriceminmax = document.getElementById('child'+iditem.substring(3));
        if(divpriceminmax.style.display == "none") divpriceminmax.style.display = "block";
        else if(divpriceminmax.style.display == "block") divpriceminmax.style.display = "none";
    }

    // function openDateFilter(){
    //     let divdatefilter = document.getElementById('datefilter');
    //     if(divdatefilter.style.display == "none") divdatefilter.style.display = "block";
    //     else if(divdatefilter.style.display == "block") divdatefilter.style.display = "none";
    // }

    //const selCountry = document.getElementById('b_country');
    const selState = document.getElementById('b_state');
    const selCity = document.getElementById('b_city');

    // const selState = document.getElementById('selState');
    // const selCity = document.getElementById('child2');

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

    async function getCities(id){
        let labeldiv2 = document.getElementById('labeldiv2');
        labeldiv2.innerHTML = "Ciudad";
        //selCity.options.length = 0;
        selCity.innerHTML = "";
        const response = await fetch("{{url('getcities')}}/"+id );
        const cities = await response.json();
    
        var opt = document.createElement('input');
        //   opt.appendChild( document.createTextNode('Ciudad') );
        //   opt.value = 'Ciudad';
        //   selCity.appendChild(opt);
        cities.forEach(city => {
          var opt = document.createElement('input');
          opt.appendChild( document.createTextNode(city.name) );
          opt.value = city.name;
          opt.readOnly = true;
          opt.addEventListener("click", () => setValue(opt, 'labeldiv2'));
          opt.classList.add('w-full', 'm-0', 'rounded', 'pl-1');
          selCity.appendChild(opt);
    });
    }

    selState.addEventListener("change", async function() {
      selCity.options.length = 0;
    let id = selState.options[selState.selectedIndex].dataset.id;
    const response = await fetch("{{url('getcities')}}/"+id );
    const cities = await response.json();
    
    var opt = document.createElement('option');
          opt.appendChild( document.createTextNode('Todas') );
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