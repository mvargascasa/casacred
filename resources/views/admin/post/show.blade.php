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
            </div>
            <div class="col-sm-4 col-12 justify-content-center text-center">
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
                    </div>
                </div>
                @endif
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
    </script>
@endsection