@extends('layouts.dashtw')

@section('firstscript')
<title>Index SEO</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">  
@endsection

@section('content')
    <main class="overflow-x-hidden overflow-y-auto">
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
                                {{$page->state}}, {{$page->city}}
                            </td>
                            <td class="py-4 px-6">
                                {{$page->created_at->format('Y-m-d')}}
                            </td>
                            <td class="py-4 px-6">
                                <a class="bg-blue-600 text-white px-3 rounded hover:bg-blue-700" href="{{route('admin.seo.edit', $page)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('script')

@endsection