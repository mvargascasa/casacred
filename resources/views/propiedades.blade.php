<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=11">
    <script src="{{ asset('js/app.js') }}?v=11"></script>
    <style>
        select,
        select option {
        color: #000000;
        }
        option:first-child{
        color: #999999;}
    </style>
</head>
<body class="bg-gray-100">
    <header>
        <nav id="enfoque" class="z-50 w-full flex flex-wrap items-center justify-between px-2 py-2 bg-white shadow-lg">
            <div class="w-full px-4 mx-auto flex flex-wrap items-center justify-between">
                <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
    
                    <div class="flex items-center py-1">
                        <a href="/" title=" home" class="inline-flex items-center">
                            <img style="height:40px" class="mr-3" src="{{asset('casacredito-logo.svg')}}" alt="Logo">
                        </a>
                    </div>
    
                    <button type="button" onclick="toggleNavbar('example-collapse-navbar')"
                        class="text-sm text-gray-600 cursor-pointer leading-none px-3 py-1 border border-solid rounded block lg:hidden outline-none focus:outline-none">
                        SERVICIOS
                    </button>
                </div>
                <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                    id="example-collapse-navbar">
    
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center text-lg"
                                href="{{route('web.index')}}">Compra</a>
                        </li>
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center text-lg"
                            href="{{route('web.servicios','asesores-bienes-raices')}}">Vende</a>
                        </li>
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center text-lg"
                            href="{{route('web.servicios','creditos-en-ecuador')}}">Creditos</a>
                        </li>
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center text-lg"
                            href="{{route('web.servicios','construye')}}">Construye</a>
                        </li>
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center text-lg"
                            href="{{route('web.notariausa')}}">Notaría USA</a>
                        </li>
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center text-lg"
                            href="{{route('web.servicios','nosotros')}}">Nosotros</a>
                        </li>
    
                        <li class="flex items-center">
                            <a class="text-red-900 hover:text-white hover:bg-red-800 px-3 py-4 lg:py-2 flex items-center"
                            href="{{route('login')}}">INGRESAR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="z-40 sticky top-0 bg-gray-300 w-full px-3 py-1 shadow">
        <div class="container mx-auto px-2 py-1 flex flex-no-wrap">
            <div class="mx-2 px-2 py-1 font-bold text-red-700">FILTRAR</div>
            <input type="text" class="mx-2 px-2 py-1 bg-white border" placeholder="COD / Sector">
            <div class="relative mr-2">
                <a id="del1" class="absolute top-0 right-0 bg-red-700 text-white font-semibold px-2 py-2 text-xs cursor-pointer hidden" onclick="clearval(this,'sel1')">X</a>
                <select id="sel1" onclick="changval(this,'del1')" class="px-2 w-32  h-full py-1 bg-white text-xs border text-gray-400 font-bold"> <option hidden="true"  value="" required>Categoría</option><option value="Venta">Venta</option><option value="Alquiler">Alquiler</option><option value="Proyectos">Proyectos</option></select>
            </div>
            <div class="relative mr-2">
                <a id="del2" class="absolute top-0 right-0 bg-red-700 text-white font-semibold px-2 py-2 text-xs cursor-pointer hidden" onclick="clearval(this,'sel2')">X</a>
                <select id="sel2" onclick="changval(this,'del2')" class="px-2 w-32  h-full py-1 bg-white text-xs border text-gray-400 font-bold"> <option hidden="true"  value="" required>Tipo de Propiedad</option><option value="Casas">Casas</option><option value="Terrenos">Terrenos</option><option value="Departamentos">Departamentos</option></select>
            </div>
            <div class="relative mr-2">
                <a id="del3" class="absolute top-0 right-0 bg-red-700 text-white font-semibold px-2 py-2 text-xs cursor-pointer hidden" onclick="clearval(this,'sel3')">X</a>
                <select id="sel3" onclick="changval(this,'del3')" class="px-2 w-32  h-full py-1 bg-white text-xs border text-gray-400 font-bold"> <option hidden="true"  value="" required>Precios</option><option value="Precios1">Precios1</option><option value="Precios2">Precios2</option><option value="Precios3">Precios3</option></select>
            </div>
        </div>
    </div>

    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 content-start gap-4 bg-gray-100">
    
        @php $ii=0; @endphp
        @foreach ($listings as $pro)
        
            @php
                $ii++;
                $imgcover="https://casacredito.com/uploads/listing/600/";	
                $imgpri = explode("|", $pro->images);    
                if(isset($imgpri[0])) $imgpri = $imgcover.$imgpri[0];
                else $imgpri = $imgcover.$pro->cover_image;
            @endphp
    
    
        @if($ii==6)
            <div class="p-2 w-full">
                <div class="overflow-hidden rounded shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b-2 border-red-700">
                    <img class="w-full"  onclick="openModal('openLead')" src="{{asset('img/creditos-para-ecuatorianos-en-eeuu-24-horas.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
                </div>
            </div>
        @endif
        @if($ii==10)
            <div class="p-2 w-full">
                <div class="overflow-hidden rounded shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b-2 border-red-700">
                    <img class="w-full" onclick="openModal('openLead')" src="{{asset('img/vende-tu-propiedad-en-casacredito.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
                </div>
            </div>
        @endif
    
        <div class="p-2 w-full"  wire:loading.class="hidden">
            <div class="overflow-hidden border border-gray-200 bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out h-full place-self-stretch">
            
                <div class="relative">
                    <a href="{{route('web.detail',$pro->slug)}}"> <img style="height: 10rem;" src="{{$imgpri}}" alt="IMG" class="imgdir object-cover h-40 w-full" /> </a>
                    <div class="absolute bottom-0 left-0 bg-yellow-400 rounded px-2 text-white text-xs">{{$pro->category}}</div>
                    <div class="absolute bottom-0 right-0 bg-yellow-400 rounded px-2 text-white text-xs">{{$pro->type}}</div>
                </div>
                <div class="p-1">
                    <div class="flex items-center justify-between px-2 " >
                        <div class="text-xl text-red-800">$ <span class="font-bold">{{number_format($pro->property_price,0, ',', '.')??0}}</span> </div>
                        <p class="text-lg"><span class="text-gray-300">COD:</span><span class="font-semibold text-red-700">{{$pro->product_code}}</span></p>
                    </div>
                </div>
    
                <div class="">
                    <div class="flex text-xs align-bottom flex-col px-2 text-gray-500 uppercase truncate ">{{$pro->address}}</div>
                </div>
    
                <div class="flex w-full">
                    <a href="{{route('web.detail',$pro->slug)}}" class="px-2 text-sm font-semibold uppercase truncate pr-4">{{$pro->listing_title}}</a>
                </div>
    
                <div class="flex py-4 px-2 text-xs">
                    @if($pro->construction_area)
                    <img class="flex ml-2 object-scale-down img-const" width="18" height="10" src="/img/house.png" alt="">
                    <span class="ml-1 text-red-700 spn-const"><span class="tmp-const">{{$pro->construction_area}}</span>m<sup>2</sup></span> @endif
                    @if($pro->land_area)
                    <img class="flex ml-2 object-scale-down img-land" width="16" height="10" src="/img/floor.png" alt="">
                    <span class="ml-1 text-red-700 spn-land"><span class="tmp-land">{{$pro->land_area}}</span>m<sup>2</sup></span> @endif
                    @if($pro->bedroom)
                    <img class="flex ml-2 object-scale-down img-bed" width="18" height="10" src="/img/bed-black.png" alt="">
                    <span class="ml-1 text-red-700 spn-bed"><span class="tmp-bed">{{$pro->bedroom}}</span></span> @endif
                    @if($pro->bathroom)
                    <img class="flex ml-2 object-scale-down img-bath" width="18" height="10" src="/img/bathroom-black.png" alt="">
                    <span class="ml-1 text-red-700 spn-bath"><span class="tmp-bath">{{$pro->bathroom}}</span></span> @endif
                    @if($pro->garage)
                    <img class="flex ml-2 object-scale-down img-park" width="18" height="10" src="/img/garage-black.png" alt="">
                    <span class="ml-1 text-red-700 spn-park"><span class="tmp-park">{{$pro->garage}}</span></span> @endif
                </div>
        
    
            </div>
        </div>
        @endforeach
    
        @if($listings->count()<6)
            <div class="p-2 m-auto">
                <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700">
                    <img class="w-full"  onclick="openModal('openLead')" src="{{asset('img/creditos-para-ecuatorianos-en-eeuu-24-horas.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
                </div>
            </div>
        @endif
        
        @if($listings->count()<11)
            <div class="p-2 m-auto">
                <div class="overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out border-b border-red-700">
                    <img class="w-full" onclick="openModal('openLead')" src="{{asset('img/vende-tu-propiedad-en-casacredito.jpg')}}" alt="Creditos para Migrantes" class="imgdir rounded object-cover h-40 w-full" /> 
                </div>
            </div>
        @endif
    
     
    
    </div>

    @if(22==44)
    busqueda = [ venta, alquiler, proyecto ] <br>
    tipo = [ terreano, casa, proyecto ] <br>
    provincia = [ terreano, casa, proyecto ] <br>
    ciudad = [ terreano, casa, proyecto ] <br>
    precio_desde = [ terreano, casa, proyecto ] <br>
    precio_hasta = [ terreano, casa, proyecto ] <br>
    baños <br>
    habitaciones <br>
    parquederos <br>
    construccion_desde <br>
    construccion_hasta <br>
    terreno_desde <br>
    terreno_hasta <br> <br>
    @endif
</body>
</html>