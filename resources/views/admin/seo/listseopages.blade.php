@extends('layouts.dashtw')

@section('firstscript')
<title>LISTADO PÁGINAS SEO</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
@endsection

@section('content')
    <main class="overflow-x-hidden overflow-y-auto">
        @if(session('isdeleted'))
                <div class="alert-del bg-green-100 border border-green-400 text-green-700 px-4 py-3 mx-3 my-3 mb-2 rounded relative" role="alert">
                    {{session('isdeleted')}}
                    <span onclick="document.querySelector('.alert-del').classList.add('hidden')" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif
        <div class="mx-4">
            <p class="font-semibold">Listado de Páginas</p>
            <a href="{{route('admin.seo.create')}}" class="float-right bg-green-500 hover:bg-green-700 text-white rounded px-3">Crear página</a>
        </div>
        <div class="my-5 mx-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            H1
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Titulo en Google
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Meta Description
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ubicacion
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Fecha
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$page->title}}
                            </th>
                            <td class="py-4 px-6">
                                {{$page->title_google}}
                            </td>
                            <td class="py-4 px-6">
                                {{Str::limit($page->meta_description, 40, '...')}}
                            </td>
                            <td class="py-4 px-6">
                                @if((isset($page->category) && $page->category == 0) || ($page->state == null && $page->city == null)) Ecuador - General @else {{$page->state}}, {{$page->city}} @endif
                            </td>
                            <td class="py-4 px-6">
                                {{$page->created_at->format('Y-m-d')}}
                            </td>
                            <td class="py-4 px-6 flex">
                                <a class="bg-blue-600 text-white px-3 rounded hover:bg-blue-700" href="{{route('admin.seo.edit', $page)}}">Editar</a>
                                <form action="{{route('admin.seo.delete', $page->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-600 text-white px-3 mx-1 rounded hover:bg-red-700">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{$pages->links('pagination::tailwind')}}
            </div>
        </div>
    </main>
@endsection

@section('script')

@endsection