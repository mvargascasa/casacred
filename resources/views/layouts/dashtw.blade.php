<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{asset('favicon-admin.png')}}" type="image/x-icon" />
    <link rel="stylesheet" href="{{asset('css/app.css?'.uniqid())}}">
    @yield('firstscript')
</head>
<body>


<!-- component -->
<div>
    <script src="{{asset('js/alpine.min.js')}}" defer></script>
    
    <div x-data="{ sidebarOpen: false }" class="flex h-screen">

        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
    
        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-40 transition duration-300 transform bg-gray-500 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-4">
                <div class="flex items-center">
                    <img class="h-10" src="{{asset('img/casacredito-logo-crm.svg')}}">
                </div>
            </div>
    
            <nav class="mt-4">                
    
                @php $actual_link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; @endphp
                @if(strpos($actual_link, 'crm8')) 
                <a href="{{route('home.tw')}}" class="flex items-center px-4 text-sm bg-yellow-500 font-bold">
                    <span class="mx-3 py-4">Localhost</span>
                </a> 
                @endif

                <a style="text-decoration: none !important" href="{{route('admin.index')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Dashboard</span>
                </a>               
    
                <a style="text-decoration: none !important" href="{{route('admin.listings.create')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin/listings/create')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Crear Propiedad</span>
                </a>        
    
                <a style="text-decoration: none !important" href="{{route('admin.properties')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin/properties*')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Propiedades</span>
                </a>
@if(Auth::user()->role!="administrator")
                <a style="text-decoration: none !important" href="{{ route('admin.myproperties') }}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin/my-properties*')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Mis Propiedades</span>
                </a> 
@endif         
@if (Auth::id()==123 || Auth::id()==147 || Auth::id()==15)
        
                <a style="text-decoration: none" href="{{route('admin.contacts')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin/contacts*')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Contactos</span>
                </a>
    
                <a style="text-decoration: none" href="{{route('admin.opports')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin/opports*')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Oportunidades</span>
                </a>     
    
                <a style="text-decoration: none" href="{{route('admin.services.index')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('admin/service*')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Servicios</span>
                </a>        
    
                <a style="text-decoration: none" href="{{route('users.index')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('users/*')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Usuarios</span>
                </a>         
    
@endif
                @if (Auth::id()==123)   
                <a style="text-decoration: none !important" href="{{route('profile.show')}}" class="flex items-center px-4 text-sm text-white @if(Request::is('user/profile')) border-l-4 border-white bg-red-800 @endif hover:bg-gray-700 hover:bg-opacity-25 hover:text-white">
                    <span class="mx-3 py-4">Perfil</span>
                </a>
                @endif
    
                
            </nav>
        </div>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center py-1 px-6 bg-gray-300 border-b-4 border-red-800">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
    
                <div class="flex items-center">
                    <div x-data="{ notificationOpen: false }" class="relative hidden">
                        <button @click="notificationOpen = ! notificationOpen"
                            class="flex mx-4 text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </button>
    
                        <div x-show="notificationOpen" @click="notificationOpen = false"
                            class="fixed inset-0 h-full w-full z-10" style="display: none;"></div>
    
                        <div x-show="notificationOpen"
                            class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl overflow-hidden z-10"
                            style="width: 20rem; display: none;">
                            <a href="#"
                                class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1"
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                    alt="avatar">
                                <p class="text-sm mx-2">
                                    <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                                        class="font-bold text-indigo-400" href="#">Upload Image</span> artical . 2m
                                </p>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1"
                                    src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80"
                                    alt="avatar">
                                <p class="text-sm mx-2">
                                    <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                                </p>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1"
                                    src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=334&amp;q=80"
                                    alt="avatar">
                                <p class="text-sm mx-2">
                                    <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span
                                        class="font-bold text-indigo-400" href="#">Test with TDD</span> artical . 1h
                                </p>
                            </a>
                            <a href="#"
                                class="flex items-center px-4 py-3 text-gray-600 hover:text-white hover:bg-indigo-600 -mx-2">
                                <img class="h-8 w-8 rounded-full object-cover mx-1"
                                    src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=398&amp;q=80"
                                    alt="avatar">
                                <p class="text-sm mx-2">
                                    <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                                </p>
                            </a>
                        </div>
                    </div>
    
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = ! dropdownOpen"
                            class="relative block h-8 overflow-hidden focus:outline-none">
                           {{Auth::user()->name}}
                        </button>
    
                        <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                            style="display: none;"></div>
    
                        <div x-show="dropdownOpen"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                            style="display: none;">
                            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-800 hover:text-white"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form></a>
                        </div>
                    </div>
                </div>
            </header>
            
                    @yield('content')

        </div>
    </div>
</div>
@yield('endscript')
</body>
</html>