@extends('layouts.web')

@section('header')
    <title>Descubre las últimas noticias del Sector Inmobiliario - Grupo Housing</title>
    {{-- metaetiquetas --}}
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            border: none;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: rgba(99, 99, 99, 0.3) 0px 4px 12px;
        }
        .card img {
            transition: opacity 0.3s;
            border-radius: 15px 15px 0 0;
        }
        .card:hover img {
            opacity: 0.8;
        }
        .card-title {
            color: #242B40;
            transition: color 0.3s;
        }
        .card:hover .card-title {
            color: #1b233d;
        }
        .card-body {
            position: relative;
            padding: 1.5rem;
        }
        .card-body::before {
            content: '';
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background-color: #007bff;
        }
        .card-footer {
            background: #f8f9fa;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .card-title, .card-img-top {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <section id="prisection" class="text-light text-center d-flex align-items-center justify-content-center" style="min-height: 450px; background-size: cover; background-position: center; background-repeat: no-repeat;">
        <h1>Blog Grupo Housing Inmobiliaria</h1>
    </section>

    <div class="container my-5">
        <div class="row mx-5 g-4">
            @if(count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="card h-100">
                            <img src="{{ asset('uploads/posts/' . $post->first_image) }}" class="card-img-top" alt="{{ $post->publication_title }} - img" onclick="location.href='{{ route('web.show.post', $post->slug) }}'">
                            <div class="card-body">
                                <h5 class="card-title" onclick="location.href='{{ route('web.show.post', $post->slug) }}'">
                                    <i class="fas fa-pencil-alt"></i> 
                                    {{ $post->publication_title }}
                                </h5>
                                <p class="card-text text-muted" style="font-size: 14px">
                                    <i class="fas fa-info-circle"></i> 
                                    {{ $post->metadescription }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-clock"></i> 
                                        Tiempo de lectura: {{ $post->reading_time }} min
                                    </small>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt"></i> 
                                        Actualizado: {{ $post->updated_at->format('d M Y') }}
                                    </small>
                                </p>
                            </div>
                            <div class="card-footer border-0">
                                <div class="text-center">
                                    <a href="{{ route('web.show.post', $post->slug) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i> 
                                        Ver publicación
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No hemos encontrado posts publicados</p>
            @endif
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url('{{ asset('img/blog-casa-credito.jpg') }}')";
        });
    </script>
@endsection
