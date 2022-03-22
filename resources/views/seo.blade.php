@extends('layouts.web')
@section('header')
<title>Políticas de Privacidad - CasaCredito</title>
<meta name="description" content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos."/>
<meta name="keywords" content="Casas en venta en cuenca, Apartamentos en venta en cuenca, terrenos en venta en cuenca, lotes en venta en cuenca">

<meta property="og:url"                content="{{route('web.index')}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Casa Crédito Encuentra la casa de tus sueños." />
<meta property="og:description"        content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos." />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

@endsection

@section('content')
<div class="container p-4">
<p dir="ltr"><strong>Propiedades</strong></p>
@foreach ($listings as $listing)
    <a style="color:darkblue;font-size: 12px" href="{{route('web.detail',$listing->slug)}}">
        {{$listing->product_code}}: {{$listing->listing_title}} - {{$listing->address}}
    </a> <br>
@endforeach
<p><br />
&nbsp;</p>
</div>
@endsection
