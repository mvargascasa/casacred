@extends('layouts.dashtw')

@section('firstscript')
    <title>Reporte de Propiedades</title>
    @livewireStyles
@endsection

@section('content')
    <section class="items-center justify-center overflow-y-auto">
        @livewire('report-upload-properties')
    </section>
@endsection

@section('endscript')
    @livewireScripts
@endsection