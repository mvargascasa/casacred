@extends('layouts.web')
@section('header')
    <title>Blog Casa Crédito Inmobiliaria</title>
    {{-- metaetiquetas --}}
    <style>
        .card{box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;}
        .card:hover{box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;}
    </style>
@endsection

@section('content')
    <section id="prisection" style="background-size: cover; background-position: left top; background-repeat: no-repeat">
        <div>
            <div class="row p-4 p-md-5 align-items-center text-light text-center" style="min-height: 450px; background: rgba(2,2,2,0.5)">
                <h1>Blog Casa Crédito Inmobiliaria</h1>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row mx-5">
            @if(count($posts)>0)
                @foreach ($posts as $post)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="card w-100 mb-3 h-100">
                            <img src="{{asset('uploads/posts/'.$post->first_image)}}" alt="{{$post->publication_title}} - img">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->publication_title}}</h5>
                                <p class="card-text text-muted" style="font-size: 14px">{{$post->metadescription}}</p>
                                <div class="text-center">
                                    <a href="{{route('web.show.post', $post->slug)}}" class="btn btn-danger">Ver publicacion</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <p>No hemos encontrado posts publicados</p>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{asset('img/blog-casa-credito.jpg')}}')";
    });
    </script>
@endsection