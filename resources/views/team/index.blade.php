@extends('layouts.web')

@section('header')
    <title>Nuestro Equipo | Casa Crédito</title>
    <meta name="robots" content="noindex">
@endsection

@section('content')
<section class="container py-5">
    <h1>Gerencia</h1>
    <div class="card" style="width: 18rem;">
        <img src="https://v1.tailwindcss.com/img/card-top.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>

    <h1>Administracion</h1>
    <div class="row">
        @for ($i = 0; $i < 3; $i++)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="https://v1.tailwindcss.com/img/card-top.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <h1>Sistemas</h1>
    <div class="row">
        @for ($i = 0; $i < 3; $i++)
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="https://v1.tailwindcss.com/img/card-top.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</section>
@endsection

@section('script')
    
@endsection