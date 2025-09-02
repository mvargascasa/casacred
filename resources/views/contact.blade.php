@extends('layouts.web2')

@section('header')
    <title>Contacto - Grupo Housing | Inmobiliaria en Cuenca, Ecuador</title>
    <meta name="description" content="¿Necesitas asesoría para comprar o vender una propiedad en Cuenca? Contáctanos. En Grupo Housing, te ayudamos a encontrar la propiedad ideal."/>
    <meta name="keywords" content="inmobiliaria en cuenca, inmobiliarias en cuenca, inmobiliarias cuenca, inmobiliaria en cuenca ecuador, inmobiliarias en cuenca ecuador, grupo housing, grupo housing inmobiliaria">

    <meta property="og:url"                content="{{ Request::url() }}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Contacto - Grupo Housing | Inmobiliaria en Cuenca, Ecuador" />
    <meta property="og:description"        content="¿Necesitas asesoría para comprar o vender una propiedad en Cuenca? Contáctanos. En Grupo Housing, te ayudamos a encontrar la propiedad ideal." />
    <meta property="og:image"              content="{{ asset('img/grupo-housing-og.png') }}" />

    <meta name="robots" content="index,follow,snippet">
    <meta name="author" content="Grupo Housing">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/font-style.css') }}">

@endsection

@section('content')
    <div>

        <x-contact.hero-banner></x-contact.hero-banner>
        <x-contact.contact-section></x-contact.contact-section>
        <x-contact-section :backgroundColor="'#f8fafc'" :theme="'light'"></x-contact-section>
        {{-- <x-about.solutions-section></x-about.solutions-section>
        <x-about.commitment-section></x-about.commitment-section>
        <x-about.team-section></x-about.team-section> --}}

        {{-- modal --}}
        <x-modal-about-contact></x-modal-about-contact>

    </div>
@endsection

@section('script')
    
@endsection