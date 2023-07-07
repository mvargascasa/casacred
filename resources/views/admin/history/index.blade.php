@extends('layouts.dashtw')

@section('firstscript')
<title>Historial | Admin Casa Crédito</title>
@livewireStyles()
@endsection

@section('content')
    <section class="overflow-y-auto overflow-x-hidden">
        <section class="container mx-auto">
            @livewire('history-properties')
        </section>
    </section>
@endsection

@section('endscript')
@livewireScripts()
@endsection