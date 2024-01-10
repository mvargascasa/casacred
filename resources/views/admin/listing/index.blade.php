@extends('layouts.dashtw')

@section('firstscript')
<title>Propiedades</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> 
<style>
    .hover-trigger .hover-target {display: none;} 
    .hover-trigger:hover .hover-target {display: block;border-radius: 5px;margin-top: 1px;margin-right: 1px;}
    select > option{background-color: #ffffff; font-size: 14px !important;}
    .btn-edit:hover{background-color: #79dfa0 !important}
    .div-selects > input:hover{background-color: #ef4444; color: #ffffff; cursor: pointer}
    #lbl_ftop_category_0, #lbl_ftop_category_1, #lbl_ftop_category_2, #lbl_ftop_category_3{cursor: pointer !important;} 
    .modal {transition: opacity 0.25s ease;}
    body.modal-active {overflow-x: hidden;overflow-y: visible !important;}
</style>
@livewireStyles
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="flex grid justify-items-end w-full pt-4 px-4">
        <div class="px-5 flex float-right">
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
                        @if(!$ismobile)
                        <section id="bgimage" class="h-64" style="background-size: cover;background-position: left center; width: 100%; background-repeat: no-repeat;">
                            <div class="text-center h-64">
                                <div class="flex justify-center pt-8 sticky top-0">
                                    <input type="hidden" id="b_tipo">
                                    <div class="flex align-items-center">
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_0" autocomplete="off" value="en-venta" @if($category === "en-venta") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display: none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="">
                                        <label class="bg-red-600 hover:bg-red-600 text-white pt-4 px-5 font-semibold" id="lbl_ftop_category_0" for="ftop_category_0" style="width:100px;font-size: 18px;" onclick="changeClassBtnRadio(this)">TODOS</label>
                                        
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_1" autocomplete="off" value="alquilar" @if($category === "alquilar") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display: none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="en-venta">
                                        <label class="bg-gray-100 hover:bg-red-600 text-black hover:text-white pb-1 pt-4 px-5 font-semibold" id="lbl_ftop_category_1" for="ftop_category_1" style="width:auto;font-size: 18px" onclick="changeClassBtnRadio(this)">CASA CREDITO</label>
                                        
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_2" autocomplete="off" value="proyectos" @if($category === "proyectos") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display:none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="alquilar">
                                        <label class="bg-gray-100 hover:bg-red-800 text-black hover:text-white pb-1 pt-4 px-5 font-semibold" id="lbl_ftop_category_2" for="ftop_category_2" style="width:auto;font-size: 18px" onclick="changeClassBtnRadio(this)">PROMOTORA</label>

                                        <input type="radio" style="display:none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="">
                                        <label class="bg-gray-100 hover:bg-blue-900 text-black hover:text-white pb-1 pt-4 px-5 font-semibold" id="lbl_ftop_category_3" for="ftop_category_3" style="width:auto;font-size: 18px" onclick="changeClassBtnRadio(this)">HOUSING</label>
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
                                        @foreach ($cities as $city)
                                            <option value="{{$city->name}}" data-id="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-1 pr-1 text-justify">
                                    <label class="text-xs text-gray-400">Sector</label>
                                    {{-- <input class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_detalle" name="b_detalle" type="text" placeholder="Ej: Ricaurte"> --}}
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 focus:outline-none shadow-md" id="b_sector">
                                        <option value="">Todas</option>
                                        @foreach ($sectores as $sector)
                                            <option value="{{$sector->name}}" data-id="{{$sector->id}}">{{$sector->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Código</label>
                                    <input class="block w-20 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_code" name="b_code" type="text" placeholder="Ej: 1733">
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
                                    <select class="block w-auto pl-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_categoria">
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
                                    <select class="block w-24 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none"id="b_status" name="b_status">
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
                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Precio</label>
                                    <div id="div6" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <label for="">Precio</label>
                                    </div>
                                    <div class="block w-full p-1" id="child6" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
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

                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Crédito VIP</label>
                                    <select class="block w-24 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none"id="b_credit_vip" name="b_credit_vip">
                                        <option value="" selected>Todos</option>
                                        <option value="1">Aplica</option>
                                        <option value="0">No Aplica</option>
                                    </select>
                                </div>

                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Avanzado</label>
                                    <div id="div9" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                                {{-- onclick="openDateFilter();" --}}
                                        <label for="">Seleccione</label>
                                    </div>
                                    <div class="block w-full p-1 text-justify" id="child9" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
                                        <div>
                                            <div style="background-color: #EF4444; color: #ffffff">
                                                <p class="ml-2 text-xs"># habitaciones</p>
                                            </div>
                                            <div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="1">
                                                        <label for="">1</label>
                                                    </div>
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="2">
                                                        <label for="">2</label>
                                                    </div>
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="3">
                                                        <label for="">3</label>
                                                    </div>
                                                    {{-- <input type="radio" id="" class="block m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                                                </div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="4">
                                                        <label for="">4</label>
                                                    </div>
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="5">
                                                        <label for="">5</label>
                                                    </div>
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="6">
                                                        <label for="">6</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex" style="background-color: #EF4444; color: #ffffff">
                                                <p class="ml-2 text-xs">¿Está en Plusvalia?</p>
                                                <input class="ml-1" type="checkbox" name="plusvalia" id="b_plusvalia">
                                            </div>
                                            {{-- <div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_plusvalia" name="plusvalia" value="1">
                                                        <label for="">SI</label>
                                                    </div>
                                                    <div class="mx-1">
                                                        <input type="radio" id="b_plusvalia" name="plusvalia" value="0">
                                                        <label for="">NO</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Fecha</label>
                                    <div id="div7" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                                {{-- onclick="openDateFilter();" --}}
                                        <label for="">Seleccione</label>
                                    </div>
                                    <div class="block w-full p-1 text-justify" id="child7" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
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
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_asesor">
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
                        @else
                        <div class="flex justify-center my-2">
                            <button class="modal-open bg-red-500 border border-red-500 hover:border-red-500 text-white hover:text-red-500 font-bold py-2 px-4 rounded-full">Buscar por:</button>
                        </div>
                        @endif
                            


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

                    <div style="cursor: pointer" id="btnCompartir" style="display: none" onclick="sharetowpp()" class="fixed bottom-2 p-3 rounded-full left-1/2 -translate-x-1/2 bg-green-500">
                        <p class="text-2xl text-white mb-1">Compartir</p>
                    </div>        
    </div>
</main>

@if($ismobile)
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-md font-semibold">Seleccione los filtros de la búsqueda</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <div>
            <div class="grid">
                <input type="hidden" name="b_current_url" id="b_current_url" value="{{ Route::current()->getName() }}">
                <div class="w-auto flex justify-center pb-2">
                    <div class="block w-full rounded-md mr-1">
                        <input type="hidden" id="view" value="grid">
                        <div style="cursor: pointer;" onclick="document.getElementById('view').value='grid';filter_properties();" class="float-left pr-1"><img src="{{ asset('img/grid.png') }}" alt=""></div>
                        <div style="cursor: pointer;" onclick="document.getElementById('view').value='list';filter_properties();" class="float-left pr-2"><img src="{{ asset('img/list.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 my-3">
                <div class="w-auto">
                    <label class="text-xs text-gray-400">Provincia</label>
                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 focus:outline-none shadow-md rounded" id="b_state">
                        <option value="">Todas</option>
                        @foreach ($states as $state)
                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-auto">
                    <label class="text-xs text-gray-400">Ciudad</label>
                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none rounded" id="b_city">
                        <option value="">Todas</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 my-4">
                <div class="w-auto text-justify">
                    <label class="text-xs text-gray-400">Sector</label>
                    <input class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none rounded" id="b_detalle" name="b_detalle" type="text" placeholder="Ej: Ricaurte">
                </div>
                <div class="w-auto text-justify">
                    <label class="text-xs text-gray-400">Código</label>
                    <input class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none rounded" id="b_code" name="b_code" type="text" placeholder="Ej: 1733">
                </div>
            </div>
            <div class="grid grid-cols-2 my-4">
                <div class="w-auto text-justify">
                    <label class="text-xs text-gray-400">Tipo de propiedad</label>
                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none rounded" id="b_categoria">
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
                <div class="w-auto text-justify">
                    <label class="text-xs text-gray-400">Categoría</label>
                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none rounded" id="b_tipo">
                        <option value="">Todos</option>	
                        <option value="en-venta">Venta </option>
                        <option value="alquilar">Alquiler </option>
                        <option value="proyectos">Proyecto</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 my-4">
                <div class="w-auto relative text-justify">
                    <label class="text-xs text-gray-400">Precio</label>
                    <div id="div6" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex rounded" style="background-color: white">
                        <label for="">Precio</label>
                    </div>
                    <div class="block w-full p-1" id="child6" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
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
                <div class="w-auto relative text-justify">
                    <label class="text-xs text-gray-400">Fecha</label>
                    <div id="div7" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex rounded" style="background-color: white">
                                {{-- onclick="openDateFilter();" --}}
                        <label for="">Seleccione</label>
                    </div>
                    <div class="block w-full p-1 text-justify" id="child7" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
                        <label class="ml-2 text-xs" for="fromdate">Desde</label>
                        <input type="date" class="block w-28 m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fromdate">
                        <label class="ml-2 text-xs" for="untildate">Hasta</label>
                        <input type="date" class="block w-28 m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="untildate">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 my-4">
                <div class="w-auto text-justify">
                    <label class="text-xs text-gray-400">Estado</label>
                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none rounded"id="b_status" name="b_status">
                        <option value="" selected>Todos</option>
                        <option value="A">ON</option>
                        <option value="D">OFF</option>
                    </select>
                </div>
                <div class="w-auto relative text-justify">
                    <label class="text-xs text-gray-400">Asesor</label>
                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none rounded" id="b_asesor">
                        <option value="">Asesor</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!--Footer-->
        <div class="flex justify-center pt-2">
          <button class="modal-close px-4 bg-transparent p-3 rounded-lg text-dark-500 hover:bg-gray-100 hover:text-dark-400 mr-2" onclick="location.reload();">Limpiar</button>
          <button class="px-4 bg-red-500 p-3 rounded-lg text-white hover:bg-red-400" onclick="filter_properties();toggleModal();">Buscar</button>
        </div>
        
      </div>
    </div>
  </div>
@endif

@endsection
@section('endscript')
@livewireScripts
@stack('scripts')
<script>

    //window.addEventListener('load', function(){
        let sectionbgomage = document.getElementById("bgimage");
        if(sectionbgomage) document.getElementById('bgimage').style.backgroundImage = "url({{asset('img/backimagesearch.jpg')}})";
    //});

    document.addEventListener('keypress', function(event){
        if(event.key === "Enter"){
            filter_properties();
        }
    });

    function changeClassBtnRadio(object){
        let check1 = document.getElementById("lbl_ftop_category_0");
        let check2 = document.getElementById("lbl_ftop_category_1");
        let check3 = document.getElementById("lbl_ftop_category_2");
        let check4 = document.getElementById("lbl_ftop_category_3");
        switch (object.id) {
            case "lbl_ftop_category_0":
                check1.classList.add('bg-red-600', 'text-white');check1.classList.remove('hover:bg-red-600', 'hover:text-white');
                check4.classList.remove('bg-blue-900', 'text-white');check4.classList.add('hover:bg-blue-900', 'hover:text-white', 'bg-gray-100');
                check2.classList.add('bg-gray-100', 'text-black','hover:bg-red-600', 'hover:text-white');check2.classList.remove('bg-red-600', 'text-white');
                check3.classList.remove('bg-red-800', 'text-white');check3.classList.add('hover:bg-red-800', 'hover:text-white');
                document.getElementById('b_tipo').value = "";
                break;
            case "lbl_ftop_category_1":
                check2.classList.remove('hover:bg-red-600', 'hover:text-white');check2.classList.add('bg-red-600', 'text-white');
                check4.classList.remove('bg-blue-900', 'text-white');check4.classList.add('hover:bg-blue-900', 'hover:text-white', 'bg-gray-100');
                check1.classList.remove('bg-red-600', 'text-white');check1.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check3.classList.remove('bg-red-800', 'text-white');check3.classList.add('hover:bg-red-800', 'hover:text-white');
                document.getElementById('b_tipo').value = "Casa Credito";
                break;
            case "lbl_ftop_category_2":
                check2.classList.remove('bg-red-600', 'text-white');check2.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check1.classList.remove('bg-red-600', 'text-white');check1.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check4.classList.remove('bg-blue-900', 'text-white');check4.classList.add('hover:bg-blue-900', 'hover:text-white', 'bg-gray-100');
                check3.classList.remove('hover:bg-red-800', 'hover:text-white');check3.classList.add('bg-red-800', 'text-white');
                document.getElementById('b_tipo').value = "Promotora";
                break;
            case "lbl_ftop_category_3":
                check2.classList.remove('bg-red-600', 'text-white');check2.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check1.classList.remove('bg-red-600', 'text-white');check1.classList.add('hover:bg-red-600', 'hover:text-white', 'bg-gray-100');
                check3.classList.remove('bg-red-800', 'text-white');check3.classList.add('hover:bg-red-800', 'hover:text-white', 'bg-gray-100');
                check4.classList.remove('hover:bg-blue-900', 'hover:text-white');check4.classList.add('bg-blue-900', 'text-white');
                document.getElementById('b_tipo').value = "Housing";
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
    const selSector = document.getElementById('b_sector');

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

    if(selState){
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
            opt.setAttribute('data-id', city.id);
            selCity.appendChild(opt);
        });
    });
    }

    if(selCity){
        selCity.addEventListener("change", async function(){
            selSector.options.length = 0;
            let id = selCity.options[selCity.selectedIndex].dataset.id;
            const response = await fetch("{{url('getsector')}}/"+id);
            const sectores = await response.json();
            
            let opt = document.createElement('option');
            opt.appendChild( document.createTextNode('Todas') );
            opt.value = '';
            selSector.appendChild(opt);
            sectores.forEach(sector => {
                let opt = document.createElement('option');
                opt.appendChild( document.createTextNode(sector.name) );
                opt.value = sector.name;
                selSector.appendChild(opt);
            });
        });
    }

  let openmodal = document.querySelectorAll('.modal-open')
    for (let i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    if(overlay) overlay.addEventListener('click', toggleModal)
    
    let closemodal = document.querySelectorAll('.modal-close')
    for (let i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      let isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
</script>
@endsection