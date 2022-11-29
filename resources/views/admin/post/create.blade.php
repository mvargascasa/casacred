@extends('layouts.dashtw')

@section('firstscript')
<title>Crear Post - Admin Casa Crédito</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.tailwindcss.com"></script>
@endsection

@php
    $labels = "font-semibold";
    $inputs = "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline";
@endphp

@section('content')
    <section class="mx-10 my-5 overflow-y-auto">
        <div class="text-left">
            <a class="text-blue-500" href="{{route('admin.post.index')}}"><i class="fas fa-chevron-left"></i> volver al listado de posts</a>
        </div>
        <div>
            @if(session('created'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session('created')}}</span>
                <span onclick="this.parentElement.classList.add('hidden')" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </div>
            @endif
            @if(session('postupdate'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{session('postupdate')}}</span>
                <span onclick="this.parentElement.classList.add('hidden')" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                  <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </div>
            @endif
            <div>
                <h3 class="text-center font-semibold p-3">@if(isset($post->id)) Editar Post - <i class="font-semibold text-red-600">"{{$post->publication_title}}"</i> @else Crear Nuevo Post @endif</h3>
                @if(isset($post->id))
                {!! Form::model($post, ['route' => ['admin.post.update',$post],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                @else
                {!! Form::open(['route' => 'admin.post.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                @endif
                @csrf
                <div class="border p-4 rounded">
                    <p class="font-bold"><i class="fa-solid fa-tag text-red-600"></i> Metatags</p>
                    <div class="grid grid-cols-1 my-3">
                        <div class="mx-3 my-1">
                            {!! Form::label('title_google', 'Título en Google', ['class' => $labels]) !!}
                            {!! Form::text('title_google', null, ['class' => $inputs, 'required']) !!}
                        </div>
                        <div class="mx-3 my-1">
                            {!! Form::label('metadescription', 'Meta Descripcion', ['class' => $labels]) !!}
                            {!! Form::textarea('metadescription', null, ['class' => $inputs, 'rows' => 3, 'required']) !!}
                        </div>
                        <div class="mx-3">
                            {!! Form::label("keywords", "Palabras Clave", ['class' => $labels]) !!}
                            {!! Form::textarea("keywords", null, ['class' => $inputs, 'rows' => 3, 'required']) !!}
                        </div>
                    </div>
                </div>
                
                <div class="border p-4 rounded mt-3">
                    <p class="font-bold"><i class="fa-solid fa-image text-red-600"></i> Imágenes</p>
                    <div class="grid grid-cols-2 my-3">
                        <div class="mx-3">
                            @if(isset($post->id) && ($post->first_image != null || $post->first_image != ""))
                                <img width="300px" height="250px" src="{{asset('uploads/posts/'.$post->first_image)}}" alt="imagen de cabecera">
                            @endif
                            {!! Form::label('first_image', 'Imagen de Cabecera', ['class' => $labels]) !!}
                            @if(isset($post->id))
                            {!! Form::file('first_image', ['class' => $inputs]) !!}
                            @else
                            {!! Form::file('first_image', ['class' => $inputs, 'required']) !!}
                            @endif
                        </div>
                        <div class="mx-3">
                            @if(isset($post->id) && ($post->second_image != null || $post->second_image != ""))
                                <img width="270px" src="{{asset('uploads/posts/'.$post->second_image)}}" alt="imagen de cabecera">
                            @endif
                            {!! Form::label('second_image', 'Imagen en Texto', ['class' => $labels]) !!}
                            @if(isset($post->id))
                            {!! Form::file('second_image', ['class' => $inputs]) !!} 
                            @else
                            {!! Form::file('second_image', ['class' => $inputs], 'required') !!} 
                            @endif
                        </div>
                    </div>
                </div>

                <div class="border p-4 rounded mt-3">
                    <p class="font-bold"><i class="fa-regular fa-newspaper text-red-600"></i> Información del post</p>
                    <div class="grid grid-cols-2 my-3">
                        <div class="mx-3">
                            {!! Form::label('publication_title', 'Título de la Publicación', ['class' => $labels]) !!}
                            {!! Form::text('publication_title', null, ['class' => $inputs, 'required']) !!}
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="mx-3">
                                {!! Form::label('status', 'Estado', ['class' => $labels]) !!}
                                {!! Form::select('status', [null => 'Seleccione', 0 => 'Borrador', 1 => 'Publicado'], null, ['class' => $inputs, 'required']) !!}
                            </div>
                            <div class="mx-3">
                                {!! Form::label('reading_time', 'Tiempo de lectura', ['class' => $labels]) !!}
                                {!! Form::text('reading_time', null, ['class' => $inputs, 'placeholder' => 'Solo número. Ej: 3', 'required']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="mx-3">
                        {!! Form::label('content', 'Contenido del Post', ['class' => $labels]) !!}
                        {!! Form::textarea('content', null, ['class' => $inputs, 'id' => 'content', 'rows' => 2]) !!}
                    </div>
                </div>

                <div class="text-center my-3">
                    {!! Form::submit('Guardar', ['class' => 'bg-red-600 rounded p-2 text-white', 'style' => 'cursor:pointer']) !!}
                </div>
            </div>
        </div>
    </section>
@endsection

@section('endscript')
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endsection