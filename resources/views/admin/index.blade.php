@extends('layouts.dashtw')
@section('header')
<title>Dashboard</title>
@endsection

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto">
    <div class="mx-auto py-2">
        {{-- <h3 class="text-gray-700 text-3xl font-medium">Bienvenido</h3>   --}}
        <div class="flex float-right">
            <div class="mx-1 border p-2 rounded">
                <p>Total de Propiedades: <b>{{$totalproperties}}</b></p>
            </div>
            <div class="mx-1 border p-2 rounded">
                <p>Propiedades Activadas: <b>{{$totalactivatedproperties}}</b></p>
            </div>
            <div class="mx-1 border p-2 rounded">
                <p>Propiedades Disponibles: <b>{{$totalavailableproperties}}</b></p>
            </div>
        </div>
    </div>
</main>
@endsection
