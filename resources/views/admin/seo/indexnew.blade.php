@extends('layouts.dashtw')

@section('firstscript')
<title>INDEX SEO</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
@endsection

@section('content')
    <main class="overflow-x-hidden overflow-y-auto m-5">
        <div>
            <a class="block text-blue-500" href="{{route('admin.seo.navbar.index')}}">NAVBAR</a>
            <a class="block text-blue-500" href="{{route('admin.seo.pages.index')}}">LISTADO PÁGINAS ORGÁNICAS</a>
        </div>
    </main>
@endsection

@section('script')

@endsection