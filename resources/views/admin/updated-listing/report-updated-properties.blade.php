@extends('layouts.dashtw')

@section('firstscript')
    <title>Reporte de propiedades actualizadas | Grupo Housing</title>
@endsection

@section('content')
    <div class="overflow-y-auto">
        <x-reports.updated-propertie-component></x-reports.updated-propertie-component>
    </div>
@endsection

@section('endscript')
    
@endsection