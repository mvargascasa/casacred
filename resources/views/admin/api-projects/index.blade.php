@extends('layouts.dashtw')

@section('firstscript')
    
@endsection

@section('content')
    <section class="overflow-y-auto pb-10">
        <section class="container mx-auto">
            <h2 class="text-3xl pt-4 pb-3">Proyectos Casa Promotora</h2>
            <p class="pb-5">Esta visualizando los proyectos de <span class="font-semibold">casapromotora.com</span>.  Para poder editarlos ingrese al <a class="text-blue-500 font-semibold" href="https://casapromotora.com/login" target="_blank">sitio web</a> como administrador </p>
            <section class="grid grid-cols-4 gap-4">
                @foreach ($projects as $project)
                <div class="div">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="w-full" src="https://casapromotora.com/uploads/projects/600/{{strtok($project['images'], "|")}}" alt="{{ $project['slug']}}">
                        <div class="px-6 py-4">
                          <div class="font-bold text-xl mb-2">{{ $project['project_name'] }}</div>
                          <p class="text-gray-700 text-base">
                            {{ $project['state'] }}, {{ $project['city'] }}
                          </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $project['type']}}</span>
                        </div>
                      </div>
                </div>
                @endforeach
            </section>
        </section>
    </section>
@endsection

@section('endscript')
    
@endsection