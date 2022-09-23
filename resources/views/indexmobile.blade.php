@extends('layouts.webmobile')
@section('header')
<title>Compra, Venta y Alquiler de Propiedades en Ecuador 🏠</title>
{{-- Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos. --}}
<meta name="description" content="Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos!"/>
<meta name="keywords" content="@isset($keywords) {{$keywords}} @else casas en venta, casas en venta guayaquil, casas en venta en guayaquil, casas en venta quito, casas en venta en quito, casas en venta cuenca, casas en venta en cuenca, casas de venta en guayaquil, casas de venta en quito, casas de venta en cuenca, casas en venta en guayaquil baratas, casas en venta en quito baratas, casas en venta en cuenca baratas, departamentos en venta, departamentos en venta en quito, departamentos en venta quito, departamentos en venta guayaquil, departamentos en venta en guayaquil, departamentos en venta cuenca, departamentos en venta en cuenca, venta casas cuenca, venta casas guayaquil, venta casas quito, departamentos en alquiler, departamentos en alquiler quito, departamentos en alquiler guayaquil, departamentos en alquiler cuenca, departamentos de alquiler en quito, departamentos de alquiler en guayaquil, departamentos de alquiler en cuenca, terrenos en venta, terrenos en venta cuenca, terrenos en venta en cuenca, terrenos de venta en cuenca, terrenos en venta quito, terrenos en venta en quito, terrenos de venta en quito, terrenos en venta guayaquil, terrenos en venta en guayaquil, terrenos de venta en guayaquil, venta terrenos cuenca, venta terrenos guayaquil, venta terrenos quito, lotes en venta, lotes en venta en cuenca, lotes en venta en quito, lotes en venta en guayaquil, apartamentos en venta, apartamentos en venta quito, apartamentos en venta guayaquil, apartamentos en venta cuenca @endisset">

<meta property="og:url"                content="{{route('web.index')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Compra, Venta y Alquiler de Propiedades en Ecuador 🏠" />
<meta property="og:description"        content="Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos!" />
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

@php
    $state=""; $type="";
    if(request()->segment(1) == 'casas-de-venta-en-ecuador'){ $state = ""; $type = "Casas";}
    if(request()->segment(1) == 'departamentos-de-venta-en-ecuador'){$state="";$type="Departamentos";}
    if(request()->segment(1) == 'terrenos-de-venta-en-ecuador'){$state="";$type="Terrenos";}
    if(request()->segment(1) == 'casas-de-venta-en-cuenca'){$state="Cuenca";$type="Casas";}
    if(request()->segment(1) == 'departamentos-de-venta-en-cuenca'){$state="Cuenca";$type="Departamentos";}
    if(request()->segment(1) == 'terrenos-de-venta-en-cuenca'){$state="Cuenca";$type="Terrenos";}
    if(request()->segment(1) == 'casas-de-venta-en-quito'){$state="Quito";$type="Casas";}
    if(request()->segment(1) == 'departamentos-de-venta-en-quito'){$state="Quito";$type="Departamentos";}
    if(request()->segment(1) == 'terrenos-de-venta-en-quito'){$state="Quito";$type="Terrenos";}
    if(request()->segment(1) == 'casas-de-venta-en-guayaquil'){$state="Guayaquil";$type="Casas";}
    if(request()->segment(1) == 'departamentos-de-venta-en-guayaquil'){$state="Guayaquil";$type="Departamentos";}
    if(request()->segment(1) == 'terrenos-de-venta-en-guayaquil'){$state="Guayaquil";$type="Terrenos";}
@endphp

          @livewire('propmobile-tw', ['searchtxt' => $state, 'category' => $type])
          
    

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
