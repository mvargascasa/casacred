@extends('layouts.web2')

@section('header')
    <title>Inmobiliaria en Cuenca | Encuentra tu propiedad ideal</title>
    <meta name="description" content="Conoce nuestras propiedades disponibles. La mejor inmobiliaria en Cuenca para comprar, vender o rentar propiedades con confianza. ¡Contáctanos hoy!"/>
    <meta name="keywords" content="inmobiliaria en cuenca, inmobiliarias en cuenca, inmobiliarias cuenca, inmobiliaria en cuenca ecuador, inmobiliarias en cuenca ecuador, grupo housing, grupo housing inmobiliaria">

    <meta property="og:url"                content="{{ Request::url() }}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Inmobiliaria en Cuenca | Grupo Housing" />
    <meta property="og:description"        content="Conoce nuestras propiedades disponibles. La mejor inmobiliaria en Cuenca para comprar, vender o rentar con confianza. ¡Contáctanos hoy!" />
    <meta property="og:image"              content="{{ asset('img/grupo-housing-og.png') }}" />

    <meta name="robots" content="index,follow,snippet">
    <meta name="author" content="Grupo Housing">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link rel="stylesheet" href="{{ asset('css/font-style.css') }}">

    <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Grupo Housing - Inmobiliaria en Cuenca",
        "image": "{{ asset('img/grupo-housing-og.png') }}",
        "url": "{{ Request::url() }}",
        "telephone": "+593987595789",
        "address": {
        "@type": "PostalAddress",
        "streetAddress": "Remigio Tamariz Crespo",
        "addressLocality": "Cuenca",
        "addressRegion": "Azuay",
        "postalCode": "010107",
        "addressCountry": "EC"
        },
        "openingHours": [
        "Mo-Fr 09:00-18:00",
        "Sa 09:00-13:00"
        ],
        "sameAs": [
        "https://www.facebook.com/p/Grupo-Housing-61558563860180/",
        "https://maps.app.goo.gl/S5jpovAAPAQP4No17"
        ]
    }
    </script>
@endsection

@section('content')


    <x-banner-home></x-banner-home>
    <x-property-categories-home></x-property-categories-home>
    <x-featured-properties></x-featured-properties>
    <x-sell-rent-cta></x-sell-rent-cta>
    <x-real-estate-team></x-real-estate-team>
    <x-real-estate-services></x-real-estate-services>
    <x-contact-section></x-contact-section>
    <x-testimonials-section></x-testimonials-section>
    <x-faq-section></x-faq-section>

    {{-- modals --}}
    <x-modal-vender-propiedad></x-modal-vender-propiedad>
    <x-modal-rentar-propiedad></x-modal-rentar-propiedad>
    <x-modal-avaluo></x-modal-avaluo>

@endsection

@section('script')
    <script>
        const selProvinceModalVender = document.getElementById('selProvinceModalVender');
        const selCityModalVender = document.getElementById('selCityModalVender');

        selProvinceModalVender.addEventListener("change", async function() {
            selCityModalVender.options.length = 0;
            let id = selProvinceModalVender.options[selProvinceModalVender.selectedIndex].dataset.id;
            const response = await fetch("{{ url('getcities') }}/" + id);
            const cities = await response.json();

            var opt = document.createElement('option');
            opt.appendChild(document.createTextNode('Ciudad'));
            opt.value = '';
            selCityModalVender.appendChild(opt);
            cities.forEach(city => {
                var opt = document.createElement('option');
                opt.appendChild(document.createTextNode(city.name));
                opt.value = city.name;
                selCityModalVender.appendChild(opt);
            });
        });
    </script>
@endsection