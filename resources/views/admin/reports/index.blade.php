@extends('layouts.dashtw')

@section('firstscript')
    @livewireStyles
@endsection

@section('content')
    <section>
        @livewire('report-upload-properties')
    </section>
@endsection

@section('endscript')
    @livewireScripts
@endsection