@extends('layouts.webmobile')
@section('header')
<title>Casas en venta Cuenca Ecuador - Casa Crédito Encuentra la casa de tus sueños</title>
<meta name="description" content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos."/>
<meta name="keywords" content="Casas en venta en cuenca, Apartamentos en venta en cuenca, terrenos en venta en cuenca, lotes en venta en cuenca">

<meta property="og:url"                content="{{route('web.index')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Casa Crédito Encuentra la casa de tus sueños." />
<meta property="og:description"        content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos." />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />
@livewireStyles
@endsection

@section('content') 

        
<div class="z-50 w-full flex flex-wrap items-center justify-between px-2 py-1 bg-white sticky top-0 shadow-lg">
    <div onclick="openModal('modalSearch')" class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <div class="w-full text-gray-600 focus-within:text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                  <button type="submit" class="p-1 focus:outline-none focus:shadow-outline"  onclick="openModal('modalSearch')">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </button>
                </span>
                <input onclick="openModal('modalSearch')" readonly type="search" name="q" class="py-2 w-full text-sm text-white bg-gray-300 rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" 
                placeholder="Buscar Propiedades..." autocomplete="off">
            </div>
        </div>
    </div>
</div>


          @livewire('propmobile-tw')
          
    

          <div class="flex justify-between w-full p-4 text-xs">
            <div></div>
            <div class="px-5 flex float-right"  >
                <button onclick="prevpage()" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg> </button>
                <span class="px-2 py-1"> PAG: <span id="unoalcien">1</span> </span>
                <button onclick="nextpage()" class="bg-red-500 text-white rounded-md px-2 py-1 hover:bg-red-600"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg> </button>
                <span class=" px-2 py-1"> DE: <span id="totalProperties">0</span> REGISTROS </span>
            </div> 
        </div> 
@endsection

@section('script')
    @livewireScripts
    @stack('scripts')
@endsection
