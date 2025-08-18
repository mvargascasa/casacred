@extends('layouts.web2')

@section('header')
    <title>Descubre las últimas noticias en el mundo inmobiliario</title>
@endsection

@section('content')

<div>

    <x-news.hero-banner-news></x-news.hero-banner-news>
    <x-news.article-grid></x-news.article-grid>

    {{-- modal --}}
    <x-modal-about-contact></x-modal-about-contact>

</div>
    
@endsection

@section('script')
    
@endsection