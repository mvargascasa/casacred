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
    .popup{
        position: fixed;
        width: 500px;
        height: 300px;
        padding: 10px;
        top: 40%;
        left: 50%;
        margin-top: -100px;  /* Negative half of height. */
        margin-left: -250px;  /* Negative half of width. */
    }
    .zone-label-norte { background: #3B82F6 !important; color: white !important; 
                         border: none !important; font-weight: 600; }
    .zone-label-sur   { background: #EAB308 !important; color: white !important; 
                         border: none !important; font-weight: 600; }
    .zone-label-este  { background: #22C55E !important; color: white !important; 
                         border: none !important; font-weight: 600; }
    .zone-label-oeste { background: #A855F7 !important; color: white !important; 
                         border: none !important; font-weight: 600; }
    .leaflet-tooltip   { padding: 2px 8px; font-size: 12px; }
    .map-zone-btn { transition: all 0.15s ease; }
    .active-zone-btn { box-shadow: 0 0 0 2px rgba(255,255,255,0.8), 0 0 0 4px currentColor; }
    .leaflet-tooltip { padding: 2px 8px; font-size: 12px; }
    .zone-label { font-weight: 600; font-size: 13px; border: none !important; background: transparent !important; box-shadow: none !important; }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
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
                        <section id="bgimage" class="h-64 relative" style="background-size: cover;background-position: left center; width: 100%; background-repeat: no-repeat;">
                            <div class="text-center h-64">
                                <div class="flex justify-center pt-8 sticky top-0">
                                    <input type="hidden" id="b_tipo">
                                    <div class="flex align-items-center">
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_0" autocomplete="off" value="en-venta" @if($category === "en-venta") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display: none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="">
                                        <label class="bg-red-600 hover:bg-red-600 text-white pt-4 px-5 font-semibold" id="lbl_ftop_category_0" for="ftop_category_0" style="width:100px;font-size: 18px;" onclick="changeClassBtnRadio(this)">TODOS</label>
                                        
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_1" autocomplete="off" value="alquilar" @if($category === "alquilar") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display: none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="en-venta">
                                        <label class="bg-gray-100 hover:bg-red-600 text-black hover:text-white pb-1 pt-4 px-5 font-semibold" id="lbl_ftop_category_1" for="ftop_category_1" style="width:auto;font-size: 18px" onclick="changeClassBtnRadio(this)">GRUPO HOUSING</label>
                                        
                                        {{-- <input type="radio" class="btn-check" name="ftop_category[]" id="ftop_category_2" autocomplete="off" value="proyectos" @if($category === "proyectos") checked @endif onclick="btnradio_search(this);setCategoryOnLoadIfRequestQueryHas(this.value)"> --}}
                                        <input type="radio" style="display:none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="alquilar">
                                        <label class="bg-gray-100 hover:bg-red-800 text-black hover:text-white pb-1 pt-4 px-5 font-semibold" id="lbl_ftop_category_2" for="ftop_category_2" style="width:auto;font-size: 18px" onclick="changeClassBtnRadio(this)">PROMOTORA</label>

                                        <input type="radio" style="display:none" name="ftop_category[]" id="b_tipo" autocomplete="off" value="">
                                        <label class="bg-gray-100 hover:bg-blue-900 text-black hover:text-white pb-1 pt-4 px-5 font-semibold" id="lbl_ftop_category_3" for="ftop_category_3" style="width:auto;font-size: 18px" onclick="changeClassBtnRadio(this)">HOUSING RENT</label>
                                    </div>
                                </div> 
                                <div class="flex flex-wrap justify-center">
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-6 text-justify">
                                    <label class="text-xs text-gray-400">Provincia</label>
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 focus:outline-none shadow-md" id="b_state">
                                        <option value="">Todas</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 focus:outline-none shadow-md" id="b_sector">
                                        <option value="">Todas</option>
                                        @foreach ($sectores as $sector)
                                            <option value="{{$sector->name}}" data-id="{{$sector->id}}">{{$sector->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-1 pr-1 text-justify">
                                    <label class="text-xs text-gray-400">Zona</label>
                                    <input type="text" class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_zona" name="b_zona" placeholder="Ej: Misicata">
                                    <div id="divaddzones" class="bg-white mt-1 rounded px-2 w-56 absolute z-10 h-56 hidden overflow-y-auto min-h-min">
                                        
                                    </div>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Código</label>
                                    <input class="block w-20 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_code" name="b_code" type="text" placeholder="Ej: 1733">
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Tipo de propiedad</label>
                                    <select class="block w-auto pl-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_categoria">
                                        <option value="">Todas</option>	
                                        <option value="23">Casas </option>
                                        <option value="24">Departamentos </option>
                                        <option value="26">Terrenos</option>
                                        <option value="25">Casas Comerciales</option>
                                        <option value="32">Locales Comerciales</option>
                                        <option value="36">Suites</option>
                                        <option value="29">Quintas</option>
                                        <option value="30">Haciendas</option>
                                        <option value="35">Oficinas</option>
                                        <option value="37">Edificio</option>
                                        <option value="38">Colonial</option>
                                        <option value="39">Hotel</option>
                                        <option value="40">Fábrica</option>
                                        <option value="41">En Proyecto</option>
                                        <option value="42">Parqueadero</option>
                                        <option value="43">Bodega</option>
                                        <option value="44">Naves Industriales</option>
                                        <option value="45">Hostal</option>
                                        <option value="46">Penthouse</option>
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Tipo de transaccion</label>
                                    <select class="block w-full pl-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_transaccion">
                                        <option value="">Todas</option>	
                                        <option value="venta">Venta </option>
                                        <option value="alquilar">Renta </option>
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Etiqueta</label>
                                    <select class="block w-full pl-2 border-gray-300 hover:border-gray-400 shadow-md leading-tight focus:outline-none" id="b_tagstatus">
                                        <option value="">Todas</option>	
                                        <option value="2">Nueva </option>
                                        <option value="5">En Proyecto</option>
                                        <option value="6">Usada </option>
                                        <option value="7">Colonial</option>
                                        <option value="9">Remodelada</option>
                                        <option value="10">En Preventa</option>
                                        <option value="11">En Construcción</option>
                                        <option value="8">No Aplica</option>
                                    </select>
                                </div>
                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Estado</label>
                                    <select class="block w-24 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none"id="b_status" name="b_status">
                                        <option value="" selected>Todos</option>
                                        <option value="A">ON</option>
                                        <option value="D">OFF</option>
                                    </select>
                                </div>
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

                                <div class="w-auto bg-gray-100 pt-4 pb-8 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Zona Cardinal</label>
                                    <select class="block w-28 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" 
                                            id="b_cardinal_zone" name="b_cardinal_zone">
                                        <option value="">Todas</option>
                                        <option value="norte">↑ Norte</option>
                                        <option value="sur">↓ Sur</option>
                                        <option value="este">→ Este</option>
                                        <option value="oeste">← Oeste</option>
                                        <option value="centro">⊙ Centro</option>
                                    </select>
                                </div>

                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Habitaciones</label>
                                    <div id="div9" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                                {{-- onclick="openDateFilter();" --}}
                                        <label for="">Seleccione</label>
                                    </div>
                                    <div class="block w-full p-1 text-justify" id="child9" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
                                        <div>
                                            <div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="1">
                                                        <label for="">1</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="2">
                                                        <label for="">2</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="3">
                                                        <label for="">3</label>
                                                    </div>
                                                    {{-- <input type="radio" id="" class="block m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                                                </div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="4">
                                                        <label for="">4</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="5">
                                                        <label for="">5</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="6">
                                                        <label for="">6</label>
                                                    </div>
                                                </div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="7">
                                                        <label for="">7</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="8">
                                                        <label for="">8</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bedrooms" name="bedrooms" value="9">
                                                        <label for="">9</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Baños</label>
                                    <div id="div10" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                                {{-- onclick="openDateFilter();" --}}
                                        <label for="">Seleccione</label>
                                    </div>
                                    <div class="block w-full p-1 text-justify" id="child10" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
                                        <div>
                                            <div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="1">
                                                        <label for="">1</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="2">
                                                        <label for="">2</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="3">
                                                        <label for="">3</label>
                                                    </div>
                                                    {{-- <input type="radio" id="" class="block m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                                                </div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="4">
                                                        <label for="">4</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="5">
                                                        <label for="">5</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="6">
                                                        <label for="">6</label>
                                                    </div>
                                                </div>
                                                <div class="flex mt-1">
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="7">
                                                        <label for="">7</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="8">
                                                        <label for="">8</label>
                                                    </div>
                                                    <div class="mx-1 flex items-center justify-center gap-2">
                                                        <input type="radio" id="b_bathrooms" name="bathrooms" value="9">
                                                        <label for="">9</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                {{-- <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-1 text-justify">
                                    <label class="text-xs text-gray-400">Fecha</label>
                                    <div id="div7" class="pattern block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none flex" style="background-color: white">
                                        <label for="">Seleccione</label>
                                    </div>
                                    <div class="block w-full p-1 text-justify" id="child7" style="display: none; position:absolute; z-index: 3;border: 1px solid #000000; background-color: #ffffff">
                                        <label class="ml-2 text-xs" for="fromdate">Desde</label>
                                        <input type="date" class="block w-28 m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fromdate">
                                        <label class="ml-2 text-xs" for="untildate">Hasta</label>
                                        <input type="date" class="block w-28 m-2 shadow appearance-none border rounded py-1 text-sm text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="untildate">
                                    </div>
                                </div> --}}

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
                                {{-- <div class="w-auto bg-gray-100 pt-4 pb-8 relative pr-1 pl-2 text-justify">
                                    <label class="text-xs text-gray-400">Asesor</label>
                                    <select class="block w-32 pl-2 border-gray-300 hover:border-gray-400 shadow-md focus:outline-none" id="b_asesor">
                                        <option value="">Asesor</option>
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                                
                                <input type="hidden" name="b_current_url" id="b_current_url" value="{{ Route::current()->getName() }}">

                                <div class="bg-gray-100 pt-10 pb-8 pl-1 pr-6">
                                    <button class="bg-gray-700 text-white rounded-md px-3 hover:bg-gray-600 mr-1"
                                            onclick="openCardinalMap()" type="button">
                                        🗺 Mapa
                                    </button>
                                    <button class="bg-red-600 text-white rounded-md px-4 hover:bg-red-500 mr-1" onclick="filter_properties()">BUSCAR</button>
                                    <button class="bg-red-600 text-white rounded-md px-4 hover:bg-red-500" onclick="location.reload()">LIMPIAR</button>
                                </div>

                                    <div class="absolute hidden top-0 right-0 pb-2 bg-gray-100">
                                        <div class="block w-full rounded-md mr-1 px-4">
                                            <p class="text-xs text-left">Ver por:</p>
                                            <input type="hidden" id="view" value="grid">
                                            <div>
                                                <div style="cursor: pointer;" onclick="document.getElementById('view').value='grid';filter_properties();" class="float-right pr-1" title="Lista"><img src="{{ asset('img/grid.png') }}" alt=""></div>
                                                <div style="cursor: pointer;" onclick="document.getElementById('view').value='list';filter_properties();" class="float-right pr-2" title="Tarjetas"><img src="{{ asset('img/list.png') }}" alt=""></div>
                                            </div>
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


    {{-- MODAL MAPA CARDINAL --}}
    <div id="modal-cardinal-map"
        class="fixed inset-0 z-50 flex items-center justify-center"
        style="display: none !important; background: rgba(0,0,0,0.65)">

        <div class="bg-white rounded-lg shadow-2xl mx-2 overflow-hidden flex flex-col"
            style="width: 96vw; max-width: 1100px; height: 90vh;">

            {{-- HEADER --}}
            <div class="flex items-center justify-between px-5 py-3 bg-gray-800 flex-shrink-0">
                <h3 class="text-white font-semibold text-base">Mapa por Zonas Cardinales</h3>
                <button onclick="closeCardinalMap()"
                        class="text-gray-300 hover:text-white text-2xl leading-none ml-4">&times;</button>
            </div>

            {{-- FILTROS INTERNOS DEL MAPA --}}
            <div class="flex flex-wrap items-end gap-3 px-5 py-3 bg-gray-50 border-b flex-shrink-0">

                {{-- Zona cardinal --}}
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Zona Cardinal</label>
                    <div class="flex gap-1 flex-wrap">
                        <button onclick="applyMapFilter('cardinal_zone', '')"
                                id="mapbtn-all"
                                class="map-zone-btn active-zone-btn text-xs px-3 py-1 rounded font-semibold bg-gray-700 text-white">
                            Todas
                        </button>
                        <button onclick="applyMapFilter('cardinal_zone', 'norte')"
                                id="mapbtn-norte"
                                class="map-zone-btn text-xs px-3 py-1 rounded font-semibold bg-blue-100 text-blue-700 hover:bg-blue-500 hover:text-white">
                            ↑ Norte
                        </button>
                        <button onclick="applyMapFilter('cardinal_zone', 'sur')"
                                id="mapbtn-sur"
                                class="map-zone-btn text-xs px-3 py-1 rounded font-semibold bg-yellow-100 text-yellow-700 hover:bg-yellow-500 hover:text-white">
                            ↓ Sur
                        </button>
                        <button onclick="applyMapFilter('cardinal_zone', 'este')"
                                id="mapbtn-este"
                                class="map-zone-btn text-xs px-3 py-1 rounded font-semibold bg-green-100 text-green-700 hover:bg-green-500 hover:text-white">
                            → Este
                        </button>
                        <button onclick="applyMapFilter('cardinal_zone', 'oeste')"
                                id="mapbtn-oeste"
                                class="map-zone-btn text-xs px-3 py-1 rounded font-semibold bg-purple-100 text-purple-700 hover:bg-purple-500 hover:text-white">
                            ← Oeste
                        </button>
                        <button onclick="applyMapFilter('cardinal_zone', 'centro')"
                                id="mapbtn-centro"
                                class="map-zone-btn text-xs px-3 py-1 rounded font-semibold bg-gray-100 text-gray-600 hover:bg-gray-400 hover:text-white">
                            ⊙ Centro
                        </button>
                    </div>
                </div>

                {{-- Tipo de propiedad --}}
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Tipo de propiedad</label>
                    <select id="map-filter-categoria"
                            onchange="applyMapFilter('categoria', this.value)"
                            class="text-xs border border-gray-300 rounded px-2 py-1.5 focus:outline-none">
                        <option value="">Todas</option>
                        <option value="23">Casas</option>
                        <option value="24">Departamentos</option>
                        <option value="26">Terrenos</option>
                        <option value="25">Casas Comerciales</option>
                        <option value="32">Locales Comerciales</option>
                        <option value="36">Suites</option>
                        <option value="29">Quintas</option>
                        <option value="30">Haciendas</option>
                        <option value="35">Oficinas</option>
                        <option value="37">Edificios</option>
                        <option value="38">Colonial</option>
                        <option value="39">Hotel</option>
                        <option value="41">Fábrica</option>
                        <option value="42">Parqueadero</option>
                        <option value="43">Bodega</option>
                        <option value="44">Naves Industriales</option>
                        <option value="45">Hostal</option>
                        <option value="46">Penthouse</option>
                        <option value="41">En Proyecto</option>
                    </select>
                </div>

                {{-- Venta / Renta --}}
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Operación</label>
                    <select id="map-filter-transaccion"
                            onchange="applyMapFilter('transaccion', this.value)"
                            class="text-xs border border-gray-300 rounded px-2 py-1.5 focus:outline-none">
                        <option value="">Todas</option>
                        <option value="venta">Venta</option>
                        <option value="alquilar">Renta</option>
                    </select>
                </div>

                {{-- Contador --}}
                <div class="ml-auto text-right">
                    <p id="map-counter" class="text-sm font-semibold text-gray-700">Cargando...</p>
                    <p id="map-filter-active" class="text-xs text-blue-600 hidden">Filtro activo</p>
                </div>
            </div>

            {{-- LEYENDA --}}
            <div class="flex gap-4 px-5 py-1.5 bg-white border-b text-xs flex-shrink-0 flex-wrap">
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-blue-500 inline-block"></span> Norte</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-yellow-500 inline-block"></span> Sur</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-green-500 inline-block"></span> Este</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-purple-500 inline-block"></span> Oeste</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-gray-400 inline-block"></span> Centro</span>
                <span class="flex items-center gap-1"><span class="w-3 h-3 rounded-full bg-gray-200 border inline-block"></span> Sin zona</span>
                <span class="ml-auto text-gray-400 text-xs">Haz clic en los botones de zona o en los cuadrantes del mapa para filtrar</span>
            </div>

            {{-- MAPA --}}
            <div id="cardinal-map" class="flex-1" style="min-height: 0;"></div>

            {{-- FOOTER --}}
            <div class="px-5 py-2.5 bg-gray-50 border-t flex justify-between items-center flex-shrink-0">
                <p class="text-xs text-gray-500">
                    Los filtros aplicados aquí también se reflejan en el listado de propiedades
                </p>
                <div class="flex gap-2">
                    <button onclick="resetMapFilters()"
                            class="text-sm px-4 py-1.5 rounded border border-gray-300 hover:bg-gray-100">
                        Limpiar filtros
                    </button>
                    <button onclick="closeCardinalMap()"
                            class="bg-red-600 text-white text-sm px-4 py-1.5 rounded hover:bg-red-700">
                        Cerrar
                    </button>
                </div>
            </div>

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

            console.log(sectores);
            
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

    const searchZones = async () => {

        let inputZonas = document.getElementById('b_zona');
        let zonas = [];

        if(inputZonas.value.length == 0) {
            zonas = [];
        } else {
            const response = await fetch("{{url('admin/getzones')}}/"+inputZonas.value);
            zonas = await response.json();
        }

        let divaddzones = document.getElementById('divaddzones');

        if(zonas.length <= 10){
            divaddzones.classList.remove('h-56');
            divaddzones.classList.add('h-auto');
        } else {
            divaddzones.classList.remove('h-auto');
            divaddzones.classList.add('h-56');
        }

        if(inputZonas.value.length > 0){
            divaddzones.classList.remove('hidden')
            divaddzones.innerHTML = '';
            zonas.forEach(zona => {
                let text = document.createElement('p');
                text.textContent = zona.name;
                text.classList.add("textZonas", "cursor-pointer");
                text.setAttribute("onclick", `addToInputZona('${zona.name}')`);
    
                divaddzones.appendChild(text);
            });
        } else {
            divaddzones.innerHTML = '';
            divaddzones.classList.add('hidden');
        }

    }

    const addToInputZona = (zona) => {

        let inputZonas = document.getElementById('b_zona');
        inputZonas.value = zona;

        let divaddzones = document.getElementById('divaddzones');
        divaddzones.classList.add('hidden');
    }

    const showText = () => {
        console.log('click en el p');
    }

  let openmodal = document.querySelectorAll('.modal-open')
    for (let i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal(openmodal[i].id)
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

    let cardinalMapInstance   = null;
let cardinalMapInitialized = false;
let allMapMarkers         = [];   // todos los markers cargados
let allPropertiesData     = [];   // datos originales sin filtrar

// Filtros activos dentro del modal
let mapActiveFilters = {
    cardinal_zone: '',
    categoria: '',
    transaccion: ''
};

const CUENCA_CENTER  = [-2.9001285, -79.0058965];
const CUENCA_ZOOM    = 13;
const CENTER_RADIUS  = 0.012;

const ZONE_COLORS = {
    norte:  '#3B82F6',
    sur:    '#EAB308',
    este:   '#22C55E',
    oeste:  '#A855F7',
    centro: '#9CA3AF',
    'null': '#D1D5DB',
};

const ZONE_LABELS = {
    norte: '↑ Norte', sur: '↓ Sur',
    este: '→ Este',  oeste: '← Oeste', centro: '⊙ Centro'
};

// ── Abrir / Cerrar ─────────────────────────────────────────
function openCardinalMap() {
    let modal = document.getElementById('modal-cardinal-map');
    modal.style.setProperty('display', 'flex', 'important');

    if (!cardinalMapInitialized) {
        setTimeout(initCardinalMap, 150);
    } else {
        // Refrescar tamaño por si el modal cambió
        setTimeout(() => cardinalMapInstance.invalidateSize(), 100);
    }
}

function closeCardinalMap() {
    document.getElementById('modal-cardinal-map')
            .style.setProperty('display', 'none', 'important');
}

// ── Inicializar mapa ───────────────────────────────────────
function initCardinalMap() {
    cardinalMapInstance = L.map('cardinal-map').setView(CUENCA_CENTER, CUENCA_ZOOM);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(cardinalMapInstance);

    drawCardinalQuadrants();
    loadPropertiesOnMap();

    cardinalMapInitialized = true;
}

// ── Cuadrantes visuales ────────────────────────────────────
function drawCardinalQuadrants() {
    const cx = CUENCA_CENTER[0];
    const cy = CUENCA_CENTER[1];
    const ext = 0.08;
    const r   = CENTER_RADIUS;

    const zones = [
        { zone: 'norte',  bounds: [[cx + r,   cy - ext], [cx + ext, cy + ext]] },
        { zone: 'sur',    bounds: [[cx - ext,  cy - ext], [cx - r,   cy + ext]] },
        { zone: 'este',   bounds: [[cx - ext,  cy + r],   [cx + ext, cy + ext]] },
        { zone: 'oeste',  bounds: [[cx - ext,  cy - ext], [cx + ext, cy - r]]   },
    ];

    zones.forEach(function(z) {
        L.rectangle(z.bounds, {
            color:       ZONE_COLORS[z.zone],
            fillColor:   ZONE_COLORS[z.zone],
            fillOpacity: 0.07,
            weight:      1.5,
            dashArray:   '5,4'
        })
        .addTo(cardinalMapInstance)
        .bindTooltip(ZONE_LABELS[z.zone], {
            permanent:  true,
            direction:  'center',
            className:  'zone-label'
        })
        .on('click', function() {
            applyMapFilter('cardinal_zone', z.zone);
        });
    });

    // Centro
    L.circle([cx, cy], {
        radius:      r * 111000,
        color:       ZONE_COLORS.centro,
        fillColor:   ZONE_COLORS.centro,
        fillOpacity: 0.07,
        weight:      1.5,
        dashArray:   '5,4'
    })
    .addTo(cardinalMapInstance)
    .bindTooltip('Centro', { permanent: true, direction: 'center', className: 'zone-label' })
    .on('click', function() {
        applyMapFilter('cardinal_zone', 'centro');
    });
}

// ── Cargar propiedades (pins) ──────────────────────────────
async function loadPropertiesOnMap() {
    try {
        const response = await fetch("{{ route('admin.listings.map.pins') }}");
        allPropertiesData = await response.json();
        renderMapMarkers(allPropertiesData);
    } catch (e) {
        console.error('Error cargando pins:', e);
        document.getElementById('map-counter').textContent = 'Error al cargar propiedades';
    }
}

function renderMapMarkers(data) {
    // Limpiar markers anteriores
    allMapMarkers.forEach(m => cardinalMapInstance.removeLayer(m));
    allMapMarkers = [];
    let count = 0;

    data.forEach(function(prop) {

        // ✅ Sanitizar: reemplazar coma por punto y convertir a float
        const lat = parseFloat(String(prop.lat || '').replace(',', '.'));
        const lng = parseFloat(String(prop.lng || '').replace(',', '.'));

        // ✅ Validar coordenadas antes de crear el marker
        if (isNaN(lat) || isNaN(lng)) return;
        if (lat === 0 || lng === 0) return;
        if (lat < -90  || lat > 90)  return;
        if (lng < -180 || lng > 180) return;

        const zone  = prop.cardinal_zone || 'null';
        const color = ZONE_COLORS[zone]  || ZONE_COLORS['null'];
        const label = ZONE_LABELS[zone]  || 'Sin zona';

        const icon = L.divIcon({
            className: '',
            html: '<div style="width:11px;height:11px;background:' + color + ';border-radius:50%;border:2px solid white;box-shadow:0 1px 4px rgba(0,0,0,0.35)"></div>',
            iconSize:   [11, 11],
            iconAnchor: [5.5, 5.5]
        });

        const priceFormatted = prop.property_price
            ? '$' + parseInt(prop.property_price).toLocaleString('es-EC')
            : '—';

        const editUrl = prop.property_by === 'Housing'
            ? '/admin/housing/property/' + prop.id + '/edit'
            : '/admin/listings/' + prop.id + '/edit';

        const popup = L.popup({ maxWidth: 220 }).setContent(
            '<div style="font-family:sans-serif;font-size:13px;line-height:1.4">' +
            '<p style="font-weight:600;margin:0 0 2px">' + (prop.listing_title || 'Sin título').substring(0, 45) + '</p>' +
            '<p style="color:#6B7280;font-size:11px;margin:0">Cod: ' + prop.product_code + '</p>' +
            '<p style="margin:4px 0">' +
                '<span style="background:' + color + ';color:white;padding:1px 7px;border-radius:10px;font-size:11px">' + label + '</span>' +
                (prop.listingtypestatus ? '<span style="margin-left:4px;background:#F3F4F6;padding:1px 6px;border-radius:10px;font-size:11px">' + prop.listingtypestatus + '</span>' : '') +
            '</p>' +
            '<p style="color:#DC2626;font-weight:700;font-size:15px;margin:2px 0">' + priceFormatted + '</p>' +
            (prop.city ? '<p style="color:#6B7280;font-size:11px;margin:0">' + prop.city + '</p>' : '') +
            '<a href="' + editUrl + '" target="_blank" style="display:inline-block;margin-top:6px;color:#2563EB;font-size:11px;text-decoration:none">Ver / Editar propiedad →</a>' +
            '</div>'
        );

        try {
            const marker = L.marker([lat, lng], { icon: icon })
                .addTo(cardinalMapInstance)
                .bindPopup(popup);
            allMapMarkers.push(marker);
            count++;
        } catch (e) {
            console.warn('Marker inválido — ID ' + prop.id + ': ' + e.message);
        }
    });

    document.getElementById('map-counter').textContent = count + ' propiedades en mapa';
}

// ── Aplicar filtro desde el modal ──────────────────────────
function applyMapFilter(filterKey, value) {
    mapActiveFilters[filterKey] = value;

    // Actualizar botones de zona
    if (filterKey === 'cardinal_zone') {
        updateZoneButtons(value);

        // Sincronizar el select externo del listado
        let selectZone = document.getElementById('b_cardinal_zone');
        if (selectZone) selectZone.value = value;
    }

    // Sincronizar selects externos
    if (filterKey === 'categoria') {
        let sel = document.getElementById('b_categoria');
        if (sel) sel.value = value;
    }
    if (filterKey === 'transaccion') {
        let sel = document.getElementById('b_transaccion');
        if (sel) sel.value = value;
    }

    // Filtrar markers en el mapa
    const filtered = filterPropertiesData();
    renderMapMarkers(filtered);

    // Actualizar badge de filtro activo
    updateFilterBadge();

    // Actualizar el listado de Livewire SIN cerrar el modal
    syncLivewireFilters();
}

function filterPropertiesData() {
    return allPropertiesData.filter(function(prop) {
        let pass = true;

        if (mapActiveFilters.cardinal_zone) {
            pass = pass && (prop.cardinal_zone === mapActiveFilters.cardinal_zone);
        }
        if (mapActiveFilters.categoria) {
            pass = pass && (String(prop.listingtype) === String(mapActiveFilters.categoria));
        }
        if (mapActiveFilters.transaccion) {
            let status = (prop.listingtypestatus || '').toLowerCase();
            let filter = mapActiveFilters.transaccion.toLowerCase();
            pass = pass && status.includes(filter);
        }

        return pass;
    });
}

function updateZoneButtons(activeZone) {
    const zoneBtns = ['all', 'norte', 'sur', 'este', 'oeste', 'centro'];
    zoneBtns.forEach(function(z) {
        let btn = document.getElementById('mapbtn-' + z);
        if (!btn) return;

        // Quitar estilos activos
        btn.classList.remove(
            'bg-gray-700', 'bg-blue-500', 'bg-yellow-500',
            'bg-green-500', 'bg-purple-500', 'bg-gray-500',
            'text-white', 'active-zone-btn'
        );

        // Determinar si este botón está activo
        const isActive = (z === 'all' && activeZone === '') || z === activeZone;

        if (isActive) {
            btn.classList.add('text-white', 'active-zone-btn');
            const colorMap = {
                all: 'bg-gray-700', norte: 'bg-blue-500', sur: 'bg-yellow-500',
                este: 'bg-green-500', oeste: 'bg-purple-500', centro: 'bg-gray-500'
            };
            btn.classList.add(colorMap[z]);
        }
    });
}

function updateFilterBadge() {
    let badge  = document.getElementById('map-filter-active');
    let active = Object.values(mapActiveFilters).some(v => v !== '');
    if (active) {
        badge.classList.remove('hidden');
        let parts = [];
        if (mapActiveFilters.cardinal_zone) parts.push(ZONE_LABELS[mapActiveFilters.cardinal_zone]);
        if (mapActiveFilters.categoria)     parts.push('Cat: ' + mapActiveFilters.categoria);
        if (mapActiveFilters.transaccion)   parts.push(mapActiveFilters.transaccion);
        badge.textContent = 'Filtros: ' + parts.join(' · ');
    } else {
        badge.classList.add('hidden');
    }
}

function resetMapFilters() {
    mapActiveFilters = { cardinal_zone: '', categoria: '', transaccion: '' };

    // Resetear selects del modal
    let selCat   = document.getElementById('map-filter-categoria');
    let selTrans = document.getElementById('map-filter-transaccion');
    if (selCat)   selCat.value   = '';
    if (selTrans) selTrans.value = '';

    // Resetear botones de zona
    updateZoneButtons('');

    // Resetear selects externos del listado
    let selZone  = document.getElementById('b_cardinal_zone');
    let selCatEx = document.getElementById('b_categoria');
    let selTransEx = document.getElementById('b_transaccion');
    if (selZone)   selZone.value   = '';
    if (selCatEx)  selCatEx.value  = '';
    if (selTransEx) selTransEx.value = '';

    // Mostrar todos los markers
    renderMapMarkers(allPropertiesData);
    updateFilterBadge();

    // Limpiar filtros en Livewire
    syncLivewireFilters();
}

// Cerrar con Escape (solo si el modal está abierto)
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        let modal = document.getElementById('modal-cardinal-map');
        if (modal && modal.style.display !== 'none') closeCardinalMap();
    }
});

function syncLivewireFilters() {
    // Comunicar al componente Livewire mediante evento de ventana
    window.dispatchEvent(new CustomEvent('cardinal-filter-changed', {
        detail: {
            cardinal_zone: mapActiveFilters.cardinal_zone,
            categoria:     mapActiveFilters.categoria,
            transaccion:   mapActiveFilters.transaccion
        }
    }));
}
</script>
@endsection