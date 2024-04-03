@extends('layouts.dashtw')

@section('firstscript')
    @livewireStyles
@endsection

@section('content')
    <section class="w-5/12 items-center justify-center">
        @livewire('report-upload-properties')
    </section>
@endsection

@section('endscript')
    @livewireScripts
@endsection