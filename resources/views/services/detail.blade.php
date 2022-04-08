@extends('layouts.web')
@section('header')
<title>Casa Credito - {{$service->page_title}}</title>
<link rel="stylesheet" href="{{asset('css/style-not.css?4')}}">
<meta name="description" content="{{$service->page_seocescription}}"/>
<meta name="keywords"    content="{{$service->page_metatags}}">

<meta property="og:url"                content="{{url('servicios/'.$service->slug)}}" />
<meta property="og:type"               content="website" />
<meta property="og:title"              content="Casa Credito - {{$service->page_title}}" />
<meta property="og:description"        content="{{$service->page_seocescription}}" />
<meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

<style>
  input:required:focus:valid {
    background: url("https://assets.digitalocean.com/labs/icons/hand-thumbs-up.svg") no-repeat 95% 50% rgba(159, 240, 159, 0.796);
    background-size: 25px;
  }
  input:focus:invalid {
    background: url("https://assets.digitalocean.com/labs/icons/exclamation-triangle-fill.svg") no-repeat 95% 50% rgba(250, 164, 130, 0.66);
    background-size: 25px;
  }
  input:focus, textarea:focus{
    outline:none !important;
    outline-width: 0 !important;
    box-shadow: none !important;
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
  }
</style>

@endsection



@section('content') 

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    <div>
  
      <div class="row p-4 p-md-5 align-items-end" style="min-height: 450px;background:rgba(2, 2, 2, 0.5)">
  
        <div class="col-12 text-white text-center">
            <p style="text-align:center"><span style="color:#ffffff"><span style="font-size:40px">{{$service->page_title}}</span></span></p> 
          <a href="javascript:void(0)" onclick="setInterest('{{$service->page_title}}')" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
        </div>
  
      </div>
    </div>
  </section>
   

    
<section class="bg-white">
    <div class="container">
        <div class="row py-4">            
            <div class="col-12 col-sm-9">
                <div class="card my-4">
                    <div class="card-body">
                      <h6 class="card-title text-danger text-uppercase">{{$service->page_title}}</h6> <hr>
                      <p class="card-text">{!!$service->description!!}</p>
                    </div>
                </div>
            </div> 
            <div class="col-12 col-sm-3">
                <div class="card my-4">
                    <div class="card-body">
                      <h6 class="card-title text-danger text-uppercase">Links</h6> <hr>
                      @foreach ($otros as $otro)
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item" style="border-bottom: 1px #eeeeee  solid;">
                            <div class="d-flex flex-row">
                              <div class="px-1"><img src="{{url('uploads/services',$otro->image)}}"width="30" alt=""></div>
                              <div><a class="link-dark" href="{{url('servicio/'.$otro->slug)}}" style="text-decoration: none;">{{$otro->title}}</a></div>
                            </div>                            
                          </li>
                        </ul>
                      @endforeach
                    </div>
                  </div>
                  @if ($service->page_title === "Créditos Hipotecarios" || $service->page_title === "Créditos de Consumo" || $service->page_title === "Créditos de Construcción")
                  <div class="card">
                    <div class="card-header text-center text-white" style="background-color: #8b0000">
                      <h6 class="mt-3">¿Necesita más información?</h6>
                      <p>¡Nosotros lo llamamos!</p>
                    </div>
                    <form action="{{ route('web.lead.contact') }}" method="POST">
                      @csrf
                    <div class="card-body">
                      <input type="hidden" name="interest" class="form-control" value="{{ $service->page_title }}">
                        <div class="form-group mb-2">
                          <input style="font-size: 14px" type="text" class="form-control" name="name" placeholder="Nombre y Apellido" required>
                        </div>
                        <div class="form-group mb-2">
                          <input style="font-size: 14px" type="number" class="form-control" name="phone" id="phone" placeholder="Teléfono" required>
                        </div>
                        <div class="form-group mb-2">
                          <input style="font-size: 14px" type="email" class="form-control" name="email" id="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group mb-2">
                          <textarea style="font-size: 14px" name="message" class="form-control" id="message" rows="3" placeholder="Mensaje">Deseo más información sobre {{ $service->page_title }}</textarea>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                          <button type="submit" class="btn" style="background-color: #8b0000; color: #ffffff">Enviar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  @endif
            </div>
        </div>
    </div>
<section>

  @if (session('emailsend'))
      @php
        echo "
          <script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>
          <script>
            swal('Hemos enviado su información', 'Nos pondremos en contacto lo antes posible!', 'success');
          </script>
        ";    
      @endphp
    @endif

@endsection



@section('script')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('{{url('uploads/services/'.$service->headerimg)}}')";
    });
  </script>
@endsection
