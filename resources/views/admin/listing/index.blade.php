@extends('layouts.dashtw')

@section('firstscript')
<title>Propiedades Taildwind</title>
@livewireStyles
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="flex justify-between w-full pt-4 px-4">
        <button class="bg-red-800 text-white rounded-md px-4 py-1 hover:bg-red-500" onclick="filter_properties()">BUSCAR</button>
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

                            <div class="flex">
                                <div class="pr-2 pb-2">
                                    <input class="block w-32 py-2 border rounded-md pl-2" id="b_code" name="b_code" type="text" placeholder="Código">
                                </div>
                    
                                <div class="pr-2 pb-2">
                                    <select class="block w-32 py-2 border rounded-md"id="b_status" name="b_status"  class="w-20" style="color: gray">
                                        <option value="" selected>Estado</option>
                                        <option value="A">Disponibles</option>
                                        <option value="D">No disponibles</option>
                                    </select>
                                </div>
                    
                                <div class="pr-2 pb-2">
                                    <select class="block w-32 py-2 border rounded-md" id="b_price" name="b_price"  class="w-20" style="color: gray">
                                        <option value="" selected>Precio</option>
                                        <option value="ASC">Ascendente</option>
                                        <option value="DESC">Descendente</option>
                                    </select>
                                </div>
                                
                                <div class="w-full pr-2">
                                    <input class="block w-full py-2 border rounded-md pl-2" id="b_detalle" name="b_detalle" type="text" placeholder="Ingrese un sector...">
                                </div>
                    
                                <div class="w-full pr-2">
                                    <select class="block w-full py-2 border rounded-md" id="b_categoria" style="color: gray">
                                        <option value="" selected>Tipo de propiedad</option>	
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
                    
                                <div class="w-full">
                                    <select class="block w-full py-2 border rounded-md" id="b_tipo" style="max-width:200px; color: gray">
                                        <option value="" selected>Categoría</option>
                                        <option value="en-venta">Venta</option>
                                        <option value="alquilar">Alquiler</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <div class="block w-full py-2 rounded-md">
                                        <input type="hidden" id="view">
                                        <button onclick="document.getElementById('view').value='grid';filter_properties();" class="float-right pr-1"><img src="{{ asset('img/grid.png') }}" alt=""></button>
                                        <button onclick="document.getElementById('view').value='list';filter_properties();" class="float-right pr-2"><img src="{{ asset('img/list.png') }}" alt=""></button>
                                    </div>
                                </div>
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

@endsection