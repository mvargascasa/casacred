@extends('layouts.web2')

@section('header')
    <title>Conoce la mejor Inmobiliaria en Cuenca | Grupo Housing</title>
    <meta name="description" content="Conoce al equipo de Grupo Housing encargado de vender tu propiedad o conseguir la propiedad de tus sueños."/>
    <meta name="keywords" content="inmobiliaria en cuenca, inmobiliarias en cuenca, inmobiliarias cuenca, inmobiliaria en cuenca ecuador, inmobiliarias en cuenca ecuador, grupo housing, grupo housing inmobiliaria">

    <meta property="og:url"                content="{{ Request::url() }}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Conoce a Nuestro Equipo | Grupo Housing" />
    <meta property="og:description"        content="Conoce al equipo de Grupo Housing encargado de vender tu propiedad o conseguir la propiedad de tus sueños." />
    <meta property="og:image"              content="{{ asset('img/grupo-housing-og.png') }}" />

    <meta name="robots" content="index,follow,snippet">
    <meta name="author" content="Grupo Housing">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/font-style.css') }}">

@endsection

@section('content')
    <div>

        <x-about.hero-banner></x-about.hero-banner>
        <x-about.solutions-section></x-about.solutions-section>
        <x-about.commitment-section></x-about.commitment-section>
        <x-about.team-section></x-about.team-section>

        {{-- modal --}}
        <x-modal-about-contact></x-modal-about-contact>

    </div>
@endsection

@section('script')
    
@endsection