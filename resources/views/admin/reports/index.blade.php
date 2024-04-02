@extends('layouts.dashtw')

@section('firstscript')
    
@endsection

@section('content')
    <section class="p-5">
        <h2 class="text-xl">Pestaña de Reportes</h2>
        @foreach ($users as $user)
            <p>El usuario {{ $user->name}} tiene {{ $properties[$user->id]}} propiedades creadas durante la fecha {{ $now->toDateString() }}</p>
        @endforeach
    </section>
@endsection

@section('endscript')
    
@endsection