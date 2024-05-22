@extends('layouts.web')

@section('header')
    <title>Blog Casa Crédito Inmobiliaria</title>
    {{-- metaetiquetas --}}
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: rgba(99, 99, 99, 0.3) 0px 4px 12px;
        }
        .card img {
            transition: opacity 0.3s;
        }
        .card:hover img {
            opacity: 0.8;
        }
        .card-title {
            transition: color 0.3s;
        }
        .card:hover .card-title {
            color: #007bff;
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
                            <img src="{{ asset('uploads/posts/' . $post->first_image) }}" class="card-img-top" alt="{{ $post->publication_title }} - img">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->publication_title }}</h5>
                                <p class="card-text text-muted" style="font-size: 14px">{{ $post->metadescription }}</p>
                            </div>
                            <div class="card-footer border-0 bg-white">
                                <div class="text-center">
                                    <a href="{{ route('web.show.post', $post->slug) }}" class="btn btn-primary">Ver publicación</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No hemos encontrado posts publicados</p>
            @endif
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
