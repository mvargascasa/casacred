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
                            <div class="w-full overflow-scroll mx-auto" style="height: 80vh;">
                                <table class="w-full whitespace-nowrap bg-white">
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
                                            <th class="px-2"> <input class="block w-10 py-2 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-red-500 border-red-800" 
                                                id="b_code" name="b_code" type="text" ></th>
                                            <td class="px-2">
                                                <select class="block w-10 py-2 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-red-500 border-red-800"
                                                 id="b_status" name="b_status"  class="w-20">
                                                        <option value="" selected>Todos</option>
                                                        <option value="A">Activo</option>
                                                        <option value="D">DescAct</option>
                                                </select>
                                            </td>
                                            <th>
                                                <select class="block w-10 py-2 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-red-500 border-red-800"
                                                 id="b_price" name="b_price"  class="w-20">
                                                        <option value="" selected></option>
                                                        <option value="ASC">ASC</option>
                                                        <option value="DESC">DESC</option>
                                                </select>
                                            </th>
                                            <th class="px-2"><input class="block w-full py-2 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-red-500 border-red-800"
                                                id="b_detalle" name="b_detalle" type="text" ></th>
                                            <td>  
                                                <select class="block w-12 py-2 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-red-500 border-red-800"
                                                id="b_categoria" >
                                                        <option value="" selected></option>	
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
                                            <td>  
                                                <select class="block w-10 py-2 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-red-500 border-red-800"
                                                id="b_tipo" style="max-width:200px;">
                                                        <option value="" selected></option>
                                                        <option value="en-venta">Venta</option>
                                                        <option value="alquilar">Alquiler</option>
                                                </select>
                                        </td>
                                        <td></td>
                                        </tr>  
                                    </thead>
                                        <livewire:proplisttw />
                                </table>
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