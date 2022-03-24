<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{asset('favicon-new.png')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}?id=8">
  <meta name="facebook-domain-verification" content="st7nmy30bjdubvp2cuvvhwuk6n2syf" />
  
<?php
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($actual_link, 'localhost') === false){
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124437679-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-806267889'); //    Adwords
        gtag('config', 'UA-124437679-1');//  Analytics 
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

  @yield('header')
</head>

<body class="text-gray-800 antialiased bg-gray-100">
    <nav id="enfoque" class="z-50 w-full flex flex-wrap items-center justify-between px-2 py-1 bg-white shadow-lg">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">

                <div class="flex items-center">
                    <a href="/" title=" home" class="inline-flex items-center">
                        <img style="height:30px" class="mr-3" src="{{asset('casacredito-logo.svg')}}" alt="Logo">
                    </a>
                </div>

                <button type="button" onclick="toggleNavbar('example-collapse-navbar')"
                    class="text-sm text-gray-600 cursor-pointer leading-none px-3 py-1 border border-solid rounded block lg:hidden outline-none focus:outline-none">
                    SERVICIOS
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
                <p class="text-gray-400 text-xs p-1">Av. Juan Iñiguez 3-87 y D. Gonzalo Cordero</p>                
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
                <span class="text-blue-400 text-sm" >&nbsp; / &nbsp;</span>
                <a href="tel:+13478460067" class="text-blue-400 text-sm">347-846-0067</a>&nbsp;</p>
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

<div onclick="openModal('openLead')" style="width: 30%" class="flex px-4 py-4 bg-red-700 text-white text-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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


<div id="modalSearch" class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
<!-- modal -->
<div class="bg-white rounded shadow-lg w-10/12 md:w-1/3  h-screen w-full">
  <!-- modal header -->
  <div class="border-b bg-red-900 px-4 py-2 flex justify-between items-center">
    <h3 class="text-white font-semibold text-lg">Busqueda</h3>
    <button onclick="closModal('modalSearch')" class="text-white font-bold px-2">&cross;</button>
  </div>
  <!-- modal body -->
  <div class="p-3">

    <div><label for="schtext" class="block text-xs leading-5 text-gray-500">Ciudad / Sector / Codigo</label>
        <div class="mt-1 rounded-md shadow-sm"><input type="text" id="schtext" name="schtext"
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
    
    <div class="mt-4"><span class="flex justify-center items-center "> 
        <button onclick="filter_properties()" class="w-full rounded-md text-xl text-white bg-red-900 p-2">BUSCAR PROPIEDADES</button></span></div>

    <div class="mt-4"><span class="flex justify-left items-left "> 
        <button onclick="filter_clear()" class="p-2 text-gray-500 rounded-md border border-gray-300">Limpiar Campos</button></span></div>


</div>
</div>
</div>



<div id="openLead" class="modal z-50 h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
<!-- modal -->
<div class="bg-white rounded shadow-lg w-10/12 md:w-1/3">
  <!-- modal header -->
  <div class="border-b bg-red-900 rounded px-4 py-2 flex justify-between items-center">
    <h3 class="text-white font-semibold text-lg">Contáctanos</h3>
    <button onclick="closModal('openLead')" class="text-white font-bold px-2">&cross;</button>
  </div>
  <!-- modal body -->
  <div class="p-3">
<p class="text-sm font-semibold pb-2 text-gray-700">Complete el siguiente formulario y en breve será contactado. </p>   
<form id="mainFormLead">
    <input class="form-control" type="hidden" name="interest" id="interest" value="Propiedades">
    <div><label for="fname" class="block text-xs leading-5 text-gray-500">Nombre y Apellido</label>
        <div class="mt-1 rounded-md shadow-sm"><input type="text" id="fname" name="fname" maxlength="100"
                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
            </div>
    </div>
    <div class="mt-2">
        <label for="tlf" class="block text-xs leading-5 text-gray-500">Teléfono</label>
        <div class="mt-1 rounded-md shadow-sm"><input  type="tel" id="tlf" name="tlf" maxlength="30"
                class="appearance-none block w-full px-3 text-sm  py-1 border border-gray-300 rounded-md focus:outline-none focus:shadow-outline-teal focus:border-teal-300 transition duration-150 ease-in-out ">
            </div>
    </div>
    <div class="mt-2">
        <label for="email" class="block text-xs leading-5 text-gray-500">Email</label>
        <div class="mt-1 rounded-md shadow-sm"><input  type="email" id="email" name="email"
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
        <button type="button" onclick="sendFormLead()" class="w-full font-bold rounded-md text-xl text-white bg-red-900 p-2">ENVIAR</button></span></div>
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
<script>
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("block");
        }
        
        function openModal(nModal) { document.getElementById(nModal).classList.remove('hidden') }
        function closModal(nModal) { document.getElementById(nModal).classList.add('hidden') }

        const sendFormLead = async() =>{
            if( document.getElementById('fname').value.length>2 && document.getElementById('tlf').value.length>6 ){
                    closModal('openLead')
                    openModal('openThank')
                    var dataForm = new FormData(document.getElementById('mainFormLead'));
                    const response = await fetch("{{route('web.sendlead')}}",
                    { body: dataForm, method: 'POST', headers: {"X-CSRF-Token": "{!!csrf_token()!!}" }  })
                    let mensaje = await response.text();
                    console.log(mensaje);
            }else{
                alert('Complete el formulario para enviar información...')
            }
        }

        const categoria = document.getElementById('schcat');

        categoria.addEventListener("change", function(){
            let divantiguedad = document.getElementById('divantiguedad');
            if (categoria.value != "Terrenos") {
                divantiguedad.style.display = "block";
            } else {
                divantiguedad.style.display = "none";
            }
        });
</script>
@yield('script')
</body>
</html>
