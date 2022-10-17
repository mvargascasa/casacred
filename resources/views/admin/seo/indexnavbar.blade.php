@extends('layouts.dashtw')

@section('firstscript')
<title>INDEX NAVBAR SEO</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
@endsection

@section('content')
    <main class="overflow-x-hidden overflow-y-auto m-5">
        <div class="bg-gray-300 p-5 rounded">
            <p>En esta sección podrá editar los elementos de la barra de navegación de la página web</p>
        </div>
        <div class="my-3">
            {{-- <div class="bg-blue-600 text-white p-1 rounded" onclick="">
                <label><a href="{{route('admin.seo.navbar.edit')}}">Compra</a></label>
            </div> --}}
            @foreach ($navbar_items as $navbar_item)
            <div class="bg-blue-600 text-white p-1 rounded my-2" onclick="">
                <label><a href="{{route('admin.seo.navbar.edit', $navbar_item->id)}}">{{$navbar_item->name}}</a></label>
                <label class="bg-white rounded text-blue-700 font-semibold px-1 float-right"><a href="{{route('admin.seo.navbar.create')}}">Crear Item</a></label>
            </div>
            @endforeach
        </div>
    </main>
@endsection

@section('script')

@endsection