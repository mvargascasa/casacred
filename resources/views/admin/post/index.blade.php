@extends('layouts.dashtw')

@section('firstscript')
<title>Blog Casa Credito</title>
@endsection

@section('content')
    <section class="mx-5 my-5">
        <div class="float-right">
            <a class="bg-green-700 text-white p-1 rounded" href="{{route('admin.post.create')}}">Crear post</a>
        </div>
        <div>
            <h4>Listado de posts</h4>
            @if (count($posts)>0)
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                      <table class="min-w-full">
                        <thead class="border-b">
                          <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              #
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left"> 
                                IMG
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Titulo
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Estado
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                              Fecha Creado
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Acciones
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr class="border-b">
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$post->id}}</td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                  <img width="60" height="60" src="{{asset('uploads/posts/'.$post->first_image)}}" alt="">
                              </td>
                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{$post->publication_title}}
                              </td>
                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                @if($post->status == 1) <b class="text-green-500 font-semibold">PUBLICADO</b> @elseif($post->status == 0) <b class="text-red-500 font-semibold">BORRADOR</b>@endif
                              </td>
                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{date('d-M-Y', strtotime($post->created_at))}}
                              </td>
                              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                  <a href="{{route('admin.post.edit', $post)}}">Editar</a>
                              </td>
                            </tr>    
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            @else
            <div class="text-center">
                No hemos encontrado posts
            </div>
            @endif
        </div>
    </section>
@endsection

@section('endscript')
    
@endsection