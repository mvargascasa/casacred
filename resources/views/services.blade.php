@extends('layouts.web2')

@section('header')

@endsection

@section('content')
    <div>
        <x-services.hero-banner></x-services.hero-banner>
        <x-services.service-section></x-services.service-section>

        {{-- modal --}}
        <x-modal-about-contact></x-modal-about-contact>
    </div>
@endsection

@section('script')
    
@endsection