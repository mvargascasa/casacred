@extends('layouts.dashtw')

@section('firstscript')
    <title>Proyecto $project_name</title>
@endsection

@section('content')
    <section class="overflow-y-auto">
        <section class="container mx-auto">
            <h2 class="text-3xl mt-4">{{ $project['project_name'] }}</h2>

            <section class="grid grid-cols-5 gap-4 mt-5">
                @foreach (array_filter(explode("|", $project['images'])) as $image)
                    <div>
                        <img src="https://casapromotora.com/uploads/projects/300/{{$image}}" alt="">
                    </div>
                @endforeach
            </section>

            <section>
                <p class="text-2xl mt-5"><span class="font-semibold">Ubicación: </span>{{ $project['state']}}, {{ $project['city'] }}, {{ $project['address'] }}</p>
            </section>

            <section>
                <p class="text-2xl font-semibold mt-4">Descripción</p>
                <p class="mt-5">{{ $project['description']}}</p>
            </section>

            <section class="mt-5">
                <p class="mb-5 font-semibold text-2xl">Google Maps</p>
                {!! $project['url_maps'] !!}
            </section>

        </section>
    </section>
@endsection

@section('endscript')
    
@endsection