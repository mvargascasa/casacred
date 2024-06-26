<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon-new.png')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}?id=8">
  <meta name="facebook-domain-verification" content="st7nmy30bjdubvp2cuvvhwuk6n2syf" />

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" media="print" onload="this.media='all'">
  
<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($actual_link, 'localhost') === false){
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script id="scriptanalytics" async></script>
    <script>
        let scriptanalytics = document.getElementById('scriptanalytics');
        setTimeout(() => {
            scriptanalytics.src = "https://www.googletagmanager.com/gtag/js?id=UA-124437679-1";
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'AW-806267889'); //    Adwords
            gtag('config', 'UA-124437679-1');//  Analytics 
        }, 3000);
    </script>

    <!-- Facebook Pixel Code -->
    <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '3081509562095231');
            fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=3081509562095231&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->   

<?php };// fin de if url localhost ?>

<style>
    @keyframes fade-in-move-down {
      0% {opacity: 0;transform: translateY(-3rem);}
      100% {opacity: 1;transform: translateY(0);margin-top: 100px;}
    }
    #modalSearch{animation: fade-in-move-down 0.5s ease;}
    .icons{color: #8B0000}
</style>

  @yield('header')
</head>

<body class="text-gray-800 antialiased bg-gray-100" id="body">
    <nav id="enfoque" class="z-50 w-full flex flex-wrap items-center justify-between px-2 py-1 bg-white shadow-lg">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">

                <div class="flex items-center">
                    <a href="/" title=" home" class="inline-flex items-center">
                        <img style="height:30px" class="mr-3" src="{{asset('casacredito-logo.svg')}}" alt="Logo">
                    </a>
                </div>

                <button type="button" onclick="toggleNavbar('example-collapse-navbar')" style="border: none !important"
                    class="text-sm text-gray-600 cursor-pointer leading-none px-3 py-1 border border-solid rounded block lg:hidden outline-none focus:outline-none">
                    <i class="fal fa-bars" style="font-size: 25px"></i>
                </button>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar">

                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto border border-gray-200 my-2 rounded-md">

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="{{route('web.index')}}">
                            <span class="inline-block ml-2">Compra</span>
                        </a>
                    </li>

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{route('web.servicios','asesores-bienes-raices')}}">
                            <span class="inline-block ml-2">Vende</span>
                        </a>
                    </li>

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{route('web.servicios','creditos-en-ecuador')}}">
                            <span class="inline-block ml-2">Creditos</span></a>
                    </li>

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{route('web.servicios','construye')}}">
                            <span class="inline-block ml-2">Construye</span></a>
                    </li>

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{route('web.notariausa')}}"><span class="inline-block ml-2">Notaría USA</span></a>
                    </li>

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="{{route('web.servicios','nosotros')}}"><span class="inline-block ml-2">Nosotros</span></a>
                    </li>

                    <li class="flex items-center">
                        <a class="lg:hover:text-yellow-300 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                        href="/login"><span class="inline-block ml-2">INGRESAR</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>

@yield('content')



</main>

<footer style="background-color: #122944;">
    <div class="px-4 pt-4">
            <h5 class="text-white text-lg p-1">Cuenca | Ecuador</h5>                
                <p class="text-gray-400 text-xs p-1">Lunes a Viernes 9:00 am&nbsp;a 6:00 pm</p>                
                <p class="text-gray-400 text-xs p-1">Sábados 9:00 am a 1:00 pm</p>                
                <p class="text-gray-400 text-xs p-1"> <b class="font-semibold">Oficina Créditos:</b>  Av. Juan Iñiguez 3-87 y D. Gonzalo Cordero</p>
                <p class="text-gray-400 text-xs p-1"> <b class="font-semibold">Oficina Ventas:</b>  Av. Fray Vicente Solano 3-54 y Remigio Tamariz Crespo</p>                
                <p class="text-gray-400 text-xs p-1">Edificio Santa Lucia</p>                
                <p class="py-2"><a href="tel:+59372810825" class="text-blue-400 text-sm">07-412-6004 </a>
                    <span class="text-blue-400 text-sm" >&nbsp; / &nbsp;</span>
                    <a href="tel:+593983849073" class="text-blue-400 text-sm"> 098-384-9073</a></p>                
                <p><a href="mailto:info@casacredito.com" class="text-blue-400 text-md">info@casacredito.com</a></p>
    </div>
    <div class="px-4 pt-4">
        <h5 class="text-white text-lg p-1">New York | EE.UU.</h5>
            <p class="text-gray-400 text-xs p-1">Lunes a Viernes 9:00 am a 6:00 pm</p>
            <p class="text-gray-400 text-xs p-1">Sábados y Domingos 9:00 am a 4:00 pm</p>
            <p class="text-gray-400 text-xs p-1">67-03 Roosevelt Avenue<br>
            Woodside, NY 11377</p>
            <p class="py-2"><a href="tel:+17186903740" class="text-blue-400 text-sm">718-690-3740</a>                    
                {{-- <span class="text-blue-400 text-sm" >&nbsp; / &nbsp;</span> --}}
                {{-- <a href="tel:+13478460067" class="text-blue-400 text-sm">347-846-0067</a>&nbsp;</p> --}}
            <p><a href="mailto:info@casacredito.com" class="text-blue-400 text-md">info@casacredito.com</a></p>
</div>

<div class="col-12 col-md-4 p-4">
    <h5 class="text-white text-lg p-1">Sigue con Nosotros</h5>
            <p class="text-gray-400 text-xs p-1">Ahora con Casa Credito es fácil ser dueño de su propia casa en Ecuador. </p>
    
            <p class="flex">

        <a href="https://www.facebook.com/CasaCreditoInmobiliaria" class="px-1" target="_blank">
            <img src="https://casacredito.com/img/casacredito-facebook.svg" alt="Facebook Notary Public Near Me" width="40" height="40">
        </a>

        <a href="https://www.messenger.com/t/inmobiliariacasacredito" class="px-1" target="_blank">
            <img src="https://casacredito.com/img/casacredito-messenger.svg" alt="Messenger Notary Public Near Me" width="40" height="40">
        </a>

        <a href="https://www.instagram.com/inmobiliariacasacredito/" class="px-1" target="_blank">
            <img src="https://casacredito.com/img/casacredito-instagram.svg" alt="Instagram Notary Public Near Me" width="40" height="40">
        </a>

        <a href="https://api.whatsapp.com/send?phone=+593983849073" class="px-1" target="_blank">
            <img src="https://casacredito.com/img/casacredito-whatsapp.svg" alt="Whatsapp Notary Public Near Me" width="40" height="40">
        </a>

    
</p></div>
<div class="p-4 text-white ">
    <span class="text-xs">Copyright ©2018 Casa Crédito . <br>All rights reserved.</span> 
    <br><a href="https://casacredito.com/politicas-de-privacidad" class="text-blue-400"> Políticas de Privacidad</a>
</div>

<div class="p-4">casacredito.com</div>
</footer>

<div class="flex w-full bg-gray-300 fixed bottom-0">

<div style="width: 10%" class="flex justify-center py-4 item-center bg-green-500 text-white text-xs" onclick="window.open('https://api.whatsapp.com/send?phone=+593983849073', '_blank')" >    
    <svg class="h-5 w-5" fill="white" viewBox="-23 -21 682 682.66669" xmlns="http://www.w3.org/2000/svg"><path d="m544.386719 93.007812c-59.875-59.945312-139.503907-92.9726558-224.335938-93.007812-174.804687 0-317.070312 142.261719-317.140625 317.113281-.023437 55.894531 14.578125 110.457031 42.332032 158.550781l-44.992188 164.335938 168.121094-44.101562c46.324218 25.269531 98.476562 38.585937 151.550781 38.601562h.132813c174.785156 0 317.066406-142.273438 317.132812-317.132812.035156-84.742188-32.921875-164.417969-92.800781-224.359376zm-224.335938 487.933594h-.109375c-47.296875-.019531-93.683594-12.730468-134.160156-36.742187l-9.621094-5.714844-99.765625 26.171875 26.628907-97.269531-6.269532-9.972657c-26.386718-41.96875-40.320312-90.476562-40.296875-140.28125.054688-145.332031 118.304688-263.570312 263.699219-263.570312 70.40625.023438 136.589844 27.476562 186.355469 77.300781s77.15625 116.050781 77.132812 186.484375c-.0625 145.34375-118.304687 263.59375-263.59375 263.59375zm144.585938-197.417968c-7.921875-3.96875-46.882813-23.132813-54.148438-25.78125-7.257812-2.644532-12.546875-3.960938-17.824219 3.96875-5.285156 7.929687-20.46875 25.78125-25.09375 31.066406-4.625 5.289062-9.242187 5.953125-17.167968 1.984375-7.925782-3.964844-33.457032-12.335938-63.726563-39.332031-23.554687-21.011719-39.457031-46.960938-44.082031-54.890626-4.617188-7.9375-.039062-11.8125 3.476562-16.171874 8.578126-10.652344 17.167969-21.820313 19.808594-27.105469 2.644532-5.289063 1.320313-9.917969-.664062-13.882813-1.976563-3.964844-17.824219-42.96875-24.425782-58.839844-6.4375-15.445312-12.964843-13.359374-17.832031-13.601562-4.617187-.230469-9.902343-.277344-15.1875-.277344-5.28125 0-13.867187 1.980469-21.132812 9.917969-7.261719 7.933594-27.730469 27.101563-27.730469 66.105469s28.394531 76.683594 32.355469 81.972656c3.960937 5.289062 55.878906 85.328125 135.367187 119.648438 18.90625 8.171874 33.664063 13.042968 45.175782 16.695312 18.984374 6.03125 36.253906 5.179688 49.910156 3.140625 15.226562-2.277344 46.878906-19.171875 53.488281-37.679687 6.601563-18.511719 6.601563-34.375 4.617187-37.683594-1.976562-3.304688-7.261718-5.285156-15.183593-9.253906zm0 0" fill-rule="evenodd"/></svg>
</div> 

<div onclick="openModal('modalinfomainFormLead')" style="width: 30%" class="flex px-4 py-4 bg-red-700 text-white text-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg><span class="ml-1">INFO</span>
</div>

<div style="width: 30%" class="flex px-4 py-4 bg-gray-500 text-white text-sm"><a class="flex" href="tel:+17186903740">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">            
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
  </svg><span class="ml-1">EEUU</span></a>
</div> 

<div style="width: 30%" class="flex px-4 py-4 bg-gray-600 text-white text-sm"><a class="flex" href="tel:+593983849073">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
  </svg><span class="ml-1">ECU</span></a>
</div> 

</div> 


<div id="modalSearch" class="modal z-50 fixed left-0 top-0 justify-center items-center bg-black bg-opacity-50 hidden" style="margin-top: 100px">
<!-- modal -->
<div class="bg-white rounded shadow-lg w-10/12 md:w-1/3 w-full">
  <!-- modal header -->
  <div class="border-b bg-red-900 px-4 py-2 flex justify-between items-center">
    <h3 class="text-white font-semibold text-lg">Busqueda</h3>
    <button onclick="closModal('modalSearch')" class="text-white font-bold px-2">
        <i class="far fa-times"></i>
    </button>
  </div>
  <!-- modal body -->
  <div class="p-3">

    <div><label for="schtext" class="block text-xs leading-5 text-gray-500">Ciudad / Sector / Codigo</label>
        <div class="mt-1 rounded-md shadow-sm"><input type="text" id="schtext" name="schtext" @if(request()->query('psearchtxt')) value="{{request()->query('psearchtxt')}}" @endif
                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out "
                autocomplete="name" autocapitalize="words" maxlength="70"></div>
    </div>

    <div class="mt-2">
        <label for="schorder" class="block text-xs leading-5 text-gray-500">Ordenar por</label>
        <div class="mt-1">
            <select name="schorder" id="schorder" class="w-1/2  px-3 py-1 rounded-md border text-sm">
                <option value="" selected>Más Recientes</option>
                <option value="maxprice">Precio más alto</option>
                <option value="minprice">Precio más bajo</option>
            </select>    
        </div>
    </div>
    
    <div class="grid grid-cols-2 gap-4">
        <div class="mt-2">
            <label for="schtype" class="block text-xs leading-5 text-gray-500">Tipo de Busqueda</label>
            <div class="mt-1 rounded-md shadow-sm">
            <select name="schtype" id="schtype" class="w-full  px-3 py-1 rounded-md border text-sm">
                <option value="" selected></option>
                <option value="venta">Comprar</option>
                <option value="alquilar">Alquilar</option>
            </select>    
            </div>
        </div>

        <div class="mt-2">
            <label for="schcat" class="block text-xs leading-5 text-gray-500">Categoría</label>
            <div class="mt-1 rounded-md shadow-sm">
                <select name="schcat" id="schcat" class="w-full  px-3 py-1 rounded-md border text-sm">
                    <option value="" selected></option>
                    <option value="Departamentos">Departamentos</option>
                    <option value="Casas">Casas</option>                        
                    <option value="Casas Comerciales">Casas Comerciales</option>                        
                    <option value="Terrenos">Terrenos</option>
                    <option value="Quintas">Quintas</option>
                    <option value="Haciendas">Haciendas</option>
                    <option value="Locales Comerciales">Locales Comerciales</option>
                    <option value="Oficinas">Oficinas</option>
                    <option value="Suites">Suites</option>
                </select>    
            </div>
        </div>
    </div>
    {{-- NUEVO DIV PARA FILTRAR POR ANTIGUEDAD --}}
    <div id="divantiguedad" class="mt-2" style="display: none">
        <label for="schtag" class="block text-xs leading-5 text-gray-500">Estado</label>
        <div class="mt-1 rounded-md shadow-sm">
            <select name="schtag" id="schtag" class="w-full px-3 py-1 rounded-md border text-sm">
                <option value="" selected></option>
                <option value="2">Nueva</option>
                <option value="5">En Proyecto</option>
                <option value="6">Usada</option>
                <option value="7">Colonial</option>
            </select>
        </div>
    </div>
    {{-- TERMINA DIV --}}
    {{-- div rango de anios de construccion --}}
    {{-- <div class="mt-2">
        <label for="schrange" class="block text-xs leading-5 text-gray-500">Años de construcción</label>
        <span id="rangeValue"></span>
        <input type="range" class="form-range" min="0" max="4" step="1" id="schrange" name="schrange" onchange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)">
    </div> --}}
    {{-- termina div --}}
    <div class="mt-2">
        <label for="schpricef" class="block text-xs leading-5 text-gray-500">Precio</label>            
        <div class="grid grid-cols-2 gap-4">
            <div class="mt-1 rounded-md shadow-sm">                
                <input  type="text" id="schpricef" name="schpricef" placeholder="Desde" maxlength="8"
                    class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
            </div>
            <div class="mt-1 rounded-md shadow-sm">                
                <input  type="text" id="schpricet" name="schpricet" placeholder="Hasta" maxlength="8"
                    class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>

    <div class="mt-2">
        <label for="schsuperf" class="block text-xs leading-5 text-gray-500">Superficie</label>            
        <div class="grid grid-cols-2 gap-4">
            <div class="mt-1 rounded-md shadow-sm">                
                <input  type="text" id="schsuperf" name="schsuperf" placeholder="Desde"
                    class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out "
                    autocomplete="phone" maxlength="254">
            </div>
            <div class="mt-1 rounded-md shadow-sm">                
                <input  type="text" id="schsupert" name="schsupert" placeholder="Hasta"
                    class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out "
                    autocomplete="phone" maxlength="254">
            </div>
        </div>
    </div>
    
    <div class="flex">        
        <div class="mt-4 w-full"><span class="flex justify-left items-left"> 
            <button onclick="filter_clear()" class="p-2 text-gray-500 rounded-md border border-gray-300 w-full">Limpiar Campos</button></span></div>
        <div class="mt-4 w-full"><span class="flex justify-center items-center h-full" style="margin-left: 5px"> 
            <button onclick="filter_properties()" class="rounded-md text-sm text-white bg-red-900 p-2 h-full">BUSCAR PROPIEDADES</button></span></div>
    </div>


</div>
</div>
</div>

<div id="modalinfomainFormLead" class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
<!-- modal -->
<div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
  <!-- modal header -->
  <div class="border-b bg-red-900 rounded px-4 py-2 flex justify-between items-center">
    <h3 class="text-white font-semibold text-lg">Información</h3>
    <button onclick="closModal('modalinfomainFormLead')" class="text-white font-bold px-2">X</button>
  </div>
  <!-- modal body -->
    <div id="mapoffice" class="block">
        <p class="p-3">
            Visítenos en nuestras oficinas ubicadas en la <b class="font-semibold">Av. Fray Vicente Solano 3-54 y Remigio Tamariz Crespo</b>
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.6802974022044!2d-79.0138164852959!3d-2.908075697881869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91cd1933cc40a85d%3A0x3f5a0137411fe95e!2sCasa%20Cr%C3%A9dito%20Inmobiliaria!5e0!3m2!1ses-419!2sec!4v1664219646164!5m2!1ses-419!2sec" width="100%" height="300" style="border:0;" class="p-3" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="flex justify-center p-4">
            <button onclick="changeStatusModal()" class="bg-red-900 bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Deseo agendar una cita</button>
        </div>
    </div>

    <div class="p-3 hidden bg-white" id="forminfo">
        <p class="text-sm font-semibold pb-2 text-gray-700">Complete el siguiente formulario y en breve será contactado. </p>   
        <form id="infomainFormLead">
            <input class="form-control" type="hidden" name="interest" id="interest" value="Propiedades">
            <div><label for="infofname" class="block text-xs leading-5 text-gray-500">Nombre y Apellido</label>
                <div class="mt-1 rounded-md shadow-sm"><input type="text" id="infofname" name="fname" maxlength="100"
                        class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                    </div>
            </div>
            <div class="mt-2">
                <label for="tlf" class="block text-xs leading-5 text-gray-500">Teléfono</label>
                <div class="mt-1 rounded-md shadow-sm"><input  type="tel" id="infotlf" name="tlf" maxlength="30"
                        class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                    </div>
            </div>
            <div class="mt-2">
                <label for="email" class="block text-xs leading-5 text-gray-500">Email</label>
                <div class="mt-1 rounded-md shadow-sm"><input  type="email" id="infoemail" name="email"
                        class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                    </div>
            </div>
            <div class="mt-2">
                <label for="message" class="block text-xs leading-5 text-gray-500">Comentario</label>
                <div class="mt-1 rounded-md shadow-sm"><input  type="text" id="message" name="message" maxlength="150"
                        class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                    </div>
            </div>
            <div class="mt-4"><span class="flex justify-center items-center ">
                <button onclick="changeStatusModal()" type="button" class="w-full font-bold rounded-md text-base p-2">Ver el mapa</button>
                <button type="button" onclick="sendFormLead('infomainFormLead')" class="w-full font-bold rounded-md text-base text-white bg-red-900 p-2">ENVIAR</button></span>
            </div>
        </form>
        
        </div>
</div>
</div>

<div id="openThank" class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
<!-- modal -->
<div class="bg-white rounded shadow-lg w-10/12 md:w-1/3" onclick="closModal('openThank')" >
  <!-- modal header -->
  <div class="border-b bg-red-900 rounded px-4 py-2 flex justify-between items-center">
    <h3 class="text-white font-semibold text-lg">Contáctanos</h3>
    <button class="text-white font-bold close-modal px-2">&cross;</button>
  </div>
  <!-- modal body -->
    <div class="p-3 flex flex-col items-center justify-center">
        <div class="flex items-center justify-center h-24 w-24 rounded-md bg-yellow-200 text-white my-4">                  
            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="darkred">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          
    <h3 class="text-xl font-extrabold text-red-900 sm:text-2xl lg:text-3xl text-center">Gracias por Contactarnos</h3>
     <p class="text-xl font-light leading-relaxed mt-4 mb-4 text-black text-center">En breve te brindaremos la mejor asesoría.</p>        
    </div>
</div>
</div>

<div id="modalcredmainFormLead" class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
      <!-- modal header -->
      <div class="border-b bg-red-900 rounded px-4 py-2 flex justify-between items-center">
        <h3 class="text-white font-semibold text-lg">Solicite su Crédito</h3>
        <button onclick="closModal('modalcredmainFormLead')" class="text-white font-bold px-2">X</button>
      </div>
      <!-- modal body -->    
        <div class="p-3 bg-white">
            <p class="text-sm font-semibold pb-2 text-gray-700">Complete el siguiente formulario con su información y nos contactaremos lo antes posible para asesorarle en el trámite</p>   
            <form id="credmainFormLead">
                <input class="form-control" type="hidden" name="interest" id="interest" value="Crédito">
                <div><label for="credfname" class="block text-xs leading-5 text-gray-500">Nombre y Apellido</label>
                    <div class="mt-1 rounded-md shadow-sm"><input type="text" id="credfname" name="fname" maxlength="100"
                            class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                        </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="mt-2 mr-1">
                        <label for="credtlf" class="block text-xs leading-5 text-gray-500">Teléfono</label>
                        <div class="mt-1 rounded-md shadow-sm"><input  type="tel" id="credtlf" name="tlf" maxlength="30"
                                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                            </div>
                    </div>
                    <div class="mt-2 ml-1">
                        <label for="mount" class="block text-xs leading-5 text-gray-500">Monto a solicitar</label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input type="number" id="credmount" name="mount" class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out" required>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <label for="email" class="block text-xs leading-5 text-gray-500">Email</label>
                    <div class="mt-1 rounded-md shadow-sm"><input  type="email" id="credemail" name="email"
                            class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                        </div>
                </div>

                <div class="mt-2">
                    <label for="message" class="block text-xs leading-5 text-gray-500">Comentario</label>
                    <div class="mt-1 rounded-md shadow-sm"><input  type="text" id="message" name="message" maxlength="150"
                            class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                        </div>
                </div>
                <div class="mt-4"><span class="flex justify-center items-center ">
                    <button type="button" onclick="sendFormLead('credmainFormLead')" class="w-full font-bold rounded-md text-base text-white bg-red-900 p-2">ENVIAR</button></span>
                </div>
            </form>
            
            </div>
    </div>
    </div>

    <div id="modalvendmainFormLead" class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
          <!-- modal header -->
          <div class="border-b bg-red-900 rounded px-4 py-2 flex justify-between items-center">
            <h3 class="text-white font-semibold text-md">Venda su Propiedad con Nosotros</h3>
            <button onclick="closModal('modalvendmainFormLead')" class="text-white font-bold px-2">X</button>
          </div>
          <!-- modal body -->
          <div id="vend1" class="block p-3">
            <div class="pb-2">
                <img src="{{asset('img/oficinasnuevas.jpg')}}" class="w-full rounded" alt="Oficinas Casa Credito">
            </div>
            <p class="text-sm pb-2 text-gray-700">
                En Casa Crédito contamos con un servicio exclusivo para la venta de su propiedad.
            </p>
            <p class="text-sm pb-2 text-gray-700">Le ofrecemos:</p>
            <ul class="text-sm text-gray-700 pb-3">
                <li><i class="fas fa-home icons"></i> Avalúo Referencial</li>
                <li><i class="fas fa-sack-dollar icons"></i> Gestión de Crédito</li>
                <li><i class="fas fa-camera-alt icons"></i> Fotografías y diseño de anuncios</li>
            </ul>
            <div class="flex justify-center">
                <button class="rounded-md text-white bg-red-900 p-1" onclick="changeDivModalVend('vend1','vend2')">Siguiente <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>

          <div id="vend2" class="hidden p-3">
            {{-- <div class="pb-2">
                <img src="{{asset('img/oficinasnuevas.jpg')}}" class="w-full rounded" alt="Oficinas Casa Credito">
            </div> --}}
            <p class="text-sm pb-2 text-gray-700">
                Beneficios de Vender con Casa Crédito
            </p>
            <ol class="text-sm pb-2 text-gray-700">
                <li><i class="fas fa-check icons"></i> Mantenemos total confidencialidad de su información personal</li>
                <li><i class="fas fa-check icons"></i> Realizamos estrategias publicitarias en Ecuador y Estados Unidos </li>
                <li><i class="fas fa-check icons"></i> Contamos con plataformas digitales propias para distribución</li>
            </ol>
            <div class="flex justify-center">
                <button class="rounded-md p-1 mr-1" onclick="changeDivModalVend('vend2', 'vend1')"><i class="fas fa-arrow-left"></i> Regresar</button>
                <button class="rounded-md text-white bg-red-900 p-1 ml-1" onclick="changeDivModalVend('vend2', 'vend3')">Siguiente <i class="fas fa-arrow-right"></i></button>
            </div>
          </div>

            <div id="vend3" class="p-3 bg-white hidden">
                <p class="text-sm font-semibold pb-2 text-gray-700">Complete el siguiente formulario con la información respectiva y nos encargaremos de asesorarlo en la venta de su propiedad</p>   
                <form id="vendmainFormLead">
                    <input class="form-control" type="hidden" name="interest" id="interest" value="Vender una propiedad">
                    <div><label for="vendfname" class="block text-xs leading-5 text-gray-500">Nombre y Apellido</label>
                        <div class="mt-1 rounded-md shadow-sm"><input type="text" id="vendfname" name="fname" maxlength="100"
                                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                            </div>
                    </div>
                    <div class="grid grid-cols-2">
                        <div class="mt-1 mr-1">
                            <label for="vendtlf" class="block text-xs leading-5 text-gray-500">Teléfono</label>
                            <div class="mt-1 rounded-md shadow-sm"><input  type="tel" id="vendtlf" name="tlf" maxlength="30"
                                    class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                                </div>
                        </div>
                        <div class="mt-1 ml-1">
                            <label for="email" class="block text-xs leading-5 text-gray-500">Email</label>
                            <div class="mt-1 rounded-md shadow-sm"><input  type="email" id="vendemail" name="email"
                                    class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
                                </div>
                        </div>
                    </div>

                    <div class="mt-1 mr-2">
                        <label for="types" class="block text-xs leading-5 text-gray-500">¿Qué propiedad necesita vender?</label>
                        <select name="type" id="vendtype" class="bg-white appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                            <option value="">Seleccione</option>
                            @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->type_title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-2">
                        <div class="mt-1 mr-2">
                            <label for="selState" class="block text-xs leading-5 text-gray-500">Provincia</label>
                            <select name="state" id="vendstate" class="bg-white appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                                <option value="">Seleccione</option>
                                @foreach ($states as $state)
                                <option value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-1 mr-2">
                            <label for="selCity" class="block text-xs leading-5 text-gray-500">Ciudad</label>
                            <select name="city" id="vendcity" class="bg-white appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-1">
                        <label for="message" class="block text-xs leading-5 text-gray-500">Comentario</label>
                        <div class="mt-1 rounded-md shadow-sm"><input  type="text" id="message" name="message" maxlength="150"
                                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                            </div>
                    </div>
    
                    {{-- <div class="mt-2">
                        <label for="message" class="block text-xs leading-5 text-gray-500">Comentario</label>
                        <div class="mt-1 rounded-md shadow-sm"><input  type="text" id="message" name="message" maxlength="150"
                                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out">
                            </div>
                    </div> --}}
                    <div class="mt-4"><span class="flex justify-center items-center ">
                        <button class="font-bold rounded-md p-1 mr-1" onclick="changeDivModalVend('vend3', 'vend2')"><i class="fas fa-arrow-left"></i> Regresar</button>
                        <button type="button" onclick="sendFormLead('vendmainFormLead')" class="rounded-md text-white bg-red-900 p-2">Enviar <i class="fas fa-arrow-right"></i></button></span>
                    </div>
                </form>
                
                </div>
                
        </div>
        </div>

<script>
        // window.addEventListener('load', (event) => {
        //     var range = new URLSearchParams(window.location.search).get('range');
        //     if (range) rangeSlide(range);
        //     else{rangeSlide("0");document.getElementById('schrange').value = 0;};
        // });

        window.addEventListener('click', function(e) {
            if (!document.getElementById("modalSearch").contains(e.target)) {
                if(!containsClass("modalSearch")){
                    e.preventDefault();
                }
            }
        });

        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("block");
        }

        function containsClass(nModal){
            let modal = document.getElementById(nModal);
            if(modal.classList.contains('hidden'))return true;
            else return false;
        }

        function validateForms(form_id){
            let first_letters = form_id.substring(0,4);
            let verification = true;
            switch (form_id) {
                case "infomainFormLead":
                    if(document.getElementById(first_letters+"fname").value < 2 || document.getElementById(first_letters+"tlf").value < 7 || document.getElementById(first_letters+"email").value < 10) verification = false;
                    break;
                case "credmainFormLead":
                    if(document.getElementById(first_letters+"fname").value < 2 || document.getElementById(first_letters+"tlf").value < 7 || document.getElementById(first_letters+"mount").value < 5 || document.getElementById(first_letters+"email") < 10) verification = false;
                    break;
                case "vendmainFormLead":
                if(document.getElementById(first_letters+"fname").value < 2 || document.getElementById(first_letters+"tlf").value < 7 || document.getElementById(first_letters+"email") < 10 || document.getElementById(first_letters+"type").value  == "" || document.getElementById(first_letters+"state").value == "" || document.getElementById(first_letters+"city").value == "") verification = false;
                    break;
                default:
                    break;
            }
            return verification;
        }
        
        function openModal(nModal) { document.getElementById(nModal).classList.remove('hidden');}
        function closModal(nModal) { document.getElementById(nModal).classList.add('hidden')}

        const sendFormLead = async(idform) =>{
            //if( document.getElementById(idform.substring(0, 4) + 'fname').value.length>2 && document.getElementById(idform.substring(0, 4) + 'tlf').value.length>6 ){
            let validation = validateForms(idform);
            console.log(validation);
            if(validation){        
                    closModal("modal"+idform)
                    openModal('openThank')
                    var dataForm = new FormData(document.getElementById(idform));
                    const response = await fetch("{{route('web.sendlead')}}",
                    { body: dataForm, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}" }  })
                    let mensaje = await response.text();
                    console.log(mensaje);
            }else{
                alert('Complete el formulario para enviar información...')
            }
        }

        const categoria = document.getElementById('schcat');
        const tag = document.getElementById('schtag');

        categoria.addEventListener("change", function(){
            let divantiguedad = document.getElementById('divantiguedad');
            if (categoria.value != "Terrenos") {
                divantiguedad.style.display = "block";
            } else {
                divantiguedad.style.display = "none";
                tag.value = "";
            }
        });

        function changeStatusModal(){
            let divmap = document.getElementById('mapoffice');
            let divform = document.getElementById('forminfo');

            if(divmap.classList.contains('block')){
                divmap.classList.remove('block');
                divmap.classList.add('hidden');
                divform.classList.remove('hidden');
                divform.classList.add('block');
            } else if(divform.classList.contains('block')){
                divmap.classList.remove('hidden');
                divmap.classList.add('block');
                divform.classList.remove('block');
                divform.classList.add('hidden');
            }
        }

        function changeDivModalVend(from, to){
            let divvend1 = document.getElementById('vend1');
            let divvend2 = document.getElementById('vend2');
            let divvend3 = document.getElementById('vend3');
            
            if(from == "vend1" && to == "vend2"){
                divvend1.classList.remove('block');
                divvend1.classList.add('hidden');
                divvend2.classList.remove('hidden');
                divvend2.classList.add('block');
            }
            if(from == "vend2" && to == "vend1"){
                divvend1.classList.remove('hidden');
                divvend1.classList.add('block');
                divvend2.classList.remove('block');
                divvend2.classList.add('hidden');
            }
            if(from == "vend2" && to == "vend3"){
                divvend2.classList.remove('block');
                divvend2.classList.add('hidden');
                divvend3.classList.remove('hidden');
                divvend3.classList.add('block');
            }
            if(from == "vend3" && to == "vend2"){
                divvend2.classList.remove('hidden');
                divvend2.classList.add('block');
                divvend3.classList.remove('block');
                divvend3.classList.add('hidden');
            }
        }

        let selProvincea = document.querySelector("select[name='state']");
        let selCitya = document.querySelector("select[name='city']");

        selProvincea.addEventListener("change", async function() {
        selCitya.options.length = 0;
        let id = selProvincea.options[selProvincea.selectedIndex].dataset.id;
        const response = await fetch("{{url('getcities')}}/"+id );
        const cities = await response.json();
        
        var opt = document.createElement('option');
            opt.appendChild( document.createTextNode('Seleccione') );
            opt.value = '';
            selCitya.appendChild(opt);
        cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode(city.name) );
            opt.value = city.name;
            selCitya.appendChild(opt);
        });
    });


    //     const rangeSlide = (value) => {
    //     let stringyearsconstruction;
    //     switch (value) {
    //         case "0":stringyearsconstruction = "Entre 0 a 5 años";break;
    //         case "1":stringyearsconstruction = "Entre 5 a 10 años";break;
    //         case "2":stringyearsconstruction = "Entre 10 a 15 años";break;
    //         case "3":stringyearsconstruction = "Entre 15 a 20 años";break;
    //         case "4":stringyearsconstruction = "Más de 20 años";break;
    //         default:break;
    //     }
    //     document.getElementById('rangeValue').innerHTML = stringyearsconstruction;
    // }
</script>
@yield('script')
</body>
</html>
