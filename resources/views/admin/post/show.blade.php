@extends('layouts.web')
@section('header')
    <title>{{$post->title_google}}</title>
    <meta name="description" content="{{$post->metadescription}}">
    @if($post->keywords!=null) <meta name="keywords" content="{{$post->keywords}}"> @endif
    <meta property="og:title" content="{{$post->title_google}}">
    <meta property="og:description" content="{{$post->metadescription}}">
    <meta property="og:image" content="{{asset('uploads/posts/'.$post->first_image)}}">
    <style> 
        .card-related-posts{box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;}
        .card-related-posts:hover{box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;}
        .sticky-top-custom-bs4 {
            position: -webkit-sticky; /* Para compatibilidad con Safari */
            position: sticky;
            top: 10px; /* Se pegará en la parte superior del viewport */
        }
        .btn-show-articles, .btn-contact, .btn-go-to-portal{background-color: #1b3460; color: #ffffff}
        .btn-show-articles:hover, .btn-contact:hover, .btn-go-to-portal:hover{background-color: #1b3460dc; color: #ffffff}
        #dynamic-text {
            opacity: 1;
            /* Duración de 0.7 segundos y una curva más pronunciada para la opacidad */
            transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1); 
            display: inline-block;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <section id="prisection" style="background-size: cover; background-position: left center; background-repeat: no-repeat">
        <div>
            <div class="row p-4 p-md-5 align-items-center text-light text-center" style="min-height: 500px; background: rgba(2,2,2,0.5)">
                <h1>{{$post->publication_title}}</h1>
            </div>
        </div>
    </section>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center text-center border-bottom pb-3 mb-4">
            <div class="col-sm-6 col-6 border-right">
                <label><i class="fas fa-calendar text-primary"></i> <b>Fecha Publicado:</b> {{date('d-M-Y', strtotime($post->created_at))}}</label>
            </div>
            <div class="col-sm-6 col-6 border-left">
                <label><i class="fas fa-clock text-primary"></i> <b>Tiempo de Lectura:</b> {{$post->reading_time}} min.</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-12">
                <div style="text-align: justify !important" class="mx-2">
                    {!!$post->content!!}
                </div>

                <div class="mt-3">
                    <div class="bg-white rounded p-4 shadow-sm">
                        <h2>Descubre <span id="dynamic-text">las propiedades</span> en venta que Grupo Housing tiene para ti</h2>
                        <p>Entra y encuentra la propiedad que buscas: casas, departamentos, terrenos y más. ¡Tu espacio ideal a solo un clic!</p>
                        <a href="/propiedades-en-general" class="btn btn-go-to-portal btn-lg">Ir al portal</a>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-12 justify-content-center text-center">
                <div class="sticky-top-custom-bs4">
                    <div>
                        <img width="100%" height="100%" src="{{asset('uploads/posts/'.$post->second_image)}}" alt="">
                    </div>
                    @if(count($related_post)>0)
                    <div class="mt-4">
                        <h2 class="font-weight-normal">Articulos relacionados</h2>
                        <div>
                            @foreach ($related_post as $post_r)
                            <a href="{{route('web.show.post', $post_r->slug)}}">
                                <div class="d-flex my-3 border rounded card-related-posts">
                                    <img width="120" src="{{asset('uploads/posts/'.$post_r->first_image)}}" alt="{{$post_r->publication_title}}-img">
                                    <div class="py-1">
                                        <p style="margin-bottom: 0px">{{$post_r->publication_title}}</p>
                                        <div style="font-size: 12px">
                                            <i class="fas fa-calendar"></i> {{date('d-M-Y', strtotime($post_r->created_at))}}
                                            <i class="fas fa-clock"></i> {{$post_r->reading_time}} min
                                        </div>
                                    </div>
                                    <div id="arrow" style="display: none" class="d-flex align-items-center mx-2 float-right">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            <div class="d-flex">
                                <a href="/blog" class="btn btn-show-articles btn-block">Ver todos los artículos</a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="mt-3">
                        <div class="bg-white rounded p-4 shadow-sm">
                            <h2>¿Necesitas vender o rentar tu propiedad?</h2>
                            <p>Contáctanos ahora y descubre la manera más <strong>rápida y sencilla</strong> de hacerlo posible</p>
                            <a href="/servicio/vende-tu-casa" class="btn btn-contact">Contactarme con <strong>Grupo Housing</strong></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-sm-12 col-12">
                <h3>¿Está buscando una propiedad?</h3>
            </div>
        </div> --}}
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('{{asset('uploads/posts/'.$post->first_image)}}')";
        });

        document.addEventListener('DOMContentLoaded', function() {
            const dynamicTextSpan = document.getElementById('dynamic-text');
            const words = ['las propiedades', 'las casas', 'los departamentos', 'los terrenos', 'las oficinas', 'los locales'];
            let currentIndex = 0;

            function changeTextSmoothly() {
                // Bajar la opacidad a 0
                dynamicTextSpan.style.opacity = '0';

                // Esperar el tiempo necesario para que la opacidad baje
                setTimeout(() => {
                    currentIndex = (currentIndex + 1) % words.length;
                    dynamicTextSpan.textContent = words[currentIndex];
                    // Paso 3: Sube la opacidad a 1
                    dynamicTextSpan.style.opacity = '1';
                }, 350); // Ajustar a la mitad de la duración de tu transición CSS (700ms / 2 = 350ms)
            }

            // El intervalo general debe ser suficiente para que la animación completa se vea + tiempo de lectura
            // (0.7s bajando + 0.7s subiendo = 1.4s de animación). Un intervalo de 3000ms sigue siendo bueno.
            setInterval(changeTextSmoothly, 2500); 
        });
        
    </script>
@endsection