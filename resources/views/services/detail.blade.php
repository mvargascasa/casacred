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
  @media screen and (max-width: 1400px){#txt_info{padding-top: 5rem !important;}}
  @media screen and (max-width: 1200px){#txt_info{padding-top: 2rem !important;}}
  @media screen and (max-width: 850px){#txt_info{padding-top: 13rem !important;}#card_creditos{margin-left: 7px; margin-right: 7px}}
  .hover01 figure img {-webkit-transform: scale(1);transform: scale(1);-webkit-transition: .3s ease-in-out;transition: .3s ease-in-out;}
  .hover01 figure:hover img {-webkit-transform: scale(1.1);transform: scale(1.1);}
</style>

@endsection



@section('content') 

<section id="prisection" style="background-size: cover;background-position: left top; background-repeat: no-repeat;">
    @if($service->slug != "vende-tu-casa")
  <div>
  
      <div class="row p-4 p-md-5 align-items-center" style="min-height: 450px;background:rgba(2, 2, 2, 0.5)">
  
        <div class="col-12 text-white text-center">
            <h1 style="text-align:center"><span style="color:#ffffff"><span style="font-size:40px">{{$service->page_title}}</span></span></h1> 
          <a href="javascript:void(0)" onclick="setInterest('{{$service->page_title}}')" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContact">INICIAR TRAMITE</a>
                                                {{-- {{$service->page_title}} --}}
        </div>
  
      </div>
    </div>
    @else
    <div class="row align-items-center text-white @if(!$ismobile) px-5 @endif" style="min-height: 450px;background:rgba(2, 2, 2, 0.5)">
      <div class="col-sm-6 @if($ismobile) pt-5 mt-4 px-4 @endif">
        <h1 style="text-align:left"><span style="color:#ffffff"><span style="font-size:40px">Vender Propiedades</span></span></h1>
        <strong><p>Venda su propiedad con nosotros y ahorre tiempo y dinero</p></strong>
        <br>
        <p><strong>Le ofrecemos:</strong></p><ul><li>Aval&uacute;o Referencial.</li><li>Gesti&oacute;n de Cr&eacute;dito.</li><li>Fotograf&iacute;as y dise&ntilde;o de anuncios.</li></ul>
      </div>
      <div class="col-sm-6 d-flex justify-content-center">
        <div class="modal-content text-dark @if($ismobile) my-1 @else w-75 my-5 @endif">
          <div class="modal-body">
            <form action="{{route('web.lead.contact')}}" method="POST">
              @csrf
              <div class="form-group">
                <div class="d-flex">
                  <div class="form-group mr-1" style="width: 100%">
                      {!! Form::label('name', 'Nombre:', ['class' => 'small font-weight-bolder mb-2']) !!}
                      {!! Form::text('fname', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                      {!! Form::hidden('interest', 'Venta de propiedad', ['id'=>'interest']) !!}
                  </div> 
                  <div class="form-group" style="width: 100%">
                      {!! Form::label('flastname', 'Apellido:', ['class' => 'small font-weight-bolder mb-2']) !!}
                      {!! Form::text('flastname', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                  </div>
                </div>
                
                <div class="form-group mt-2">
                    {!! Form::label('tlf', 'Teléfono:', ['class' => 'small font-weight-bolder mb-2']) !!}
                    {!! Form::number('tlf', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                </div>

                <div class="form-group mt-2">
                  {!! Form::label('email', 'Correo electrónico', ['class' => 'small font-weight-bolder mb-2']) !!}
                  {!! Form::email('email', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                </div>
                
                <div class="form-group mt-2">
                    {!! Form::label('ftype', '¿Qué propiedad necesita vender?', ['class' => 'small font-weight-bolder mb-2']) !!}
                    <select name="ftype" class="form-control form-control-sm" required>
                      <option value="">Seleccione</option>
                        @foreach ($types as $type)
                            <option value="{{$type->type_title}}">{{$type->type_title}}</option> 
                        @endforeach
                    </select>
                </div>
                
                <label class="small font-weight-bolder mt-2">¿Donde se encuentra ubicada su propiedad?</label>
                <div class="d-flex mt-2">
                    <div class="form-group mr-1" style="width: 100%">
                        {{-- {!! Form::label('fstate', 'Provincia:') !!} --}}
                        <select name="fstate" id="selStateHeader" class="form-control form-control-sm" required>
                            <option value="">Provincia</option>
                            @foreach ($states as $state)
                                <option value="{{$state->name}}" data-id="{{$state->id}}">{{ $state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group" style="width: 100%">
                        {{-- {!! Form::label('fcity', 'Ciudad:') !!} --}}
                        <select name="fcity" id="selCityHeader" class="form-control form-control-sm" required>
                            <option value="">Ciudad</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group mt-2">
                    {!! Form::label('fsector', 'Sector: (Ej: Totoracocha, Ricaurte)', ['class' => 'small font-weight-bolder mb-2']) !!}
                    {!! Form::text('fsector', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                </div>
                
                <div class="d-flex mt-2">
                    <div class="form-group mr-1" style="width: 100%">
                        {!! Form::label('fyears', 'Años de construcción:', ['class' => 'small font-weight-bolder mb-2']) !!}
                        {!! Form::text('fyears', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                    </div>
                    
                    <div class="form-group" style="width: 100%">
                        {!! Form::label('fprice', 'Precio estimado:', ['class' => 'small font-weight-bolder mb-2']) !!}
                        {!! Form::number('fprice', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                    </div>
                </div>
                
                <div class="form-group">
                    {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-primary btn-block mt-4']) !!}
                </div> 
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endif
  </section>
   

    
<section class="bg-white">
    <div class="container">
        <div class="row py-4">
          {{-- div general --}}
          <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <div class="card my-4">
                <div class="card-body">
                  <h2 class="card-title text-primary text-uppercase" style="font-size: 16px">{{$service->page_title}}</h2> <hr>
                  <p class="card-text">{!!$service->description!!}</p>
                </div>
            </div>
        </div> 
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="card my-4">
                <div class="card-body">
                  <h3 class="card-title text-primary text-uppercase" style="font-size: 16px">Links</h3> <hr>
                  @foreach ($otros as $otro)
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item" style="border-bottom: 1px #eeeeee  solid;">
                        <div class="d-flex flex-row">
                          <div class="px-1"><img src="{{url('uploads/services',$otro->image)}}"width="30" alt=""></div>
                          <div><a class="btn btn-primary" href="{{url('servicio/'.$otro->slug)}}" style="text-decoration: none;">{{$otro->title}}</a></div>
                        </div>                            
                      </li>
                    </ul>
                  @endforeach
                </div>
              </div>

              @if ($service->page_title === "Créditos Hipotecarios" || $service->page_title === "Créditos de Consumo" || $service->page_title === "Créditos de Construcción")
              <div id="card_creditos" style="border: none" class="card position-relative">
                <img class="img-fluid rounded" src="@if($service->page_title === "Créditos Hipotecarios") {{ asset('img/CREDITO-HIPOTECARIO.webp') }} @elseif($service->page_title === "Créditos de Consumo") {{ asset('img/CONSUMO.webp')}} @elseif($service->page_title === "Créditos de Construcción") {{ asset('img/CONSTRUCCION.webp') }} @endif" alt="{{ $service->page_title }} para Ecuatorianos residentes en Estados Unidos">
                <div class="position-absolute" style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100%">
                  <div class="text-center">
                    <div id="txt_info" style="padding-top: 8rem">
                      <img src="{{ asset('img/ECUADOR-04.webp') }}" width="35px" alt="{{ $service->page_title }} para Ecuatorianos residentes en Estados Unidos">
                      <img src="{{ asset('img/USA-05.webp') }}" width="35px" alt="{{ $service->page_title }} para Ecuatorianos residentes en Estados Unidos">
                    </div>
                    <p class="text-white" style="font-weight: 500; font-size: 15px">{{ $service->page_title}} <br> para migrantes</p>
                  </div>
                </div>
                <div class="position-absolute" onclick="setInterest('{{$service->page_title}}')" data-toggle="modal" data-target="#modalContact" style="bottom: 0; left: 0; width: 100%; background-color: #c30000; height: 60px; cursor: pointer">
                  <div class="position-relative" style="display: flex; justify-content: center; text-align: center">
                    <div class="position-absolute" style="top: 0; margin-top: -20px">
                      <i style="background-color: #c30000; color: #ffffff; padding: 5px; border-radius: 25px" class="fal fa-usd-circle fa-2x"></i>
                      <p class="text-white" style="font-size: 18px; font-weight: 400">Solicite su crédito <u style="font-weight: bold">AQUÍ</u></p>
                    </div>
                  </div>
                </div>
              </div>
              @endif
        </div>
        {{-- termina div general --}}
           {{-- div nuevo vende tu casa con nosotros  --}}
          @if($service->slug == "vende-tu-casa")
          <div class="col-12 text-center py-4">
            <h2>¿Qué tipo de propiedad desea vender?</h2>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender casas</h3>
              {{-- <div class="service-icon">
                <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_41-626026c110919.png" width="60" alt="">
              </div> --}}
              <div class="mb-3 hover01">
                <figure>
                  <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/casa.webp')}}" alt="Vender casa">
                </figure>
              </div>
              <p class="description">Venda su casa con la ayuda de profesionales en el sector inmobiliario que le darán la accesoría que necesita
                para ahorrar tiempo y dinero.</p>
              <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Casa</a>
            </div>
          </div>   
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender departamentos</h3>
                {{-- <div class="service-icon">
                  <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_41-626026c110919.png" width="60" alt="">
                </div> --}}
                <div class="mb-3 hover01">
                  <figure>
                    <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/departamento.webp')}}" alt="Vender departamentos">
                  </figure>
                </div>
                <p class="description">Venda su departamento en tiempo record con la inmobiliaria lider en Cuenca, Infórmese con los mejores
                  asesores inmobiliarios del país.</p>
                <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Departamento</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender terrenos</h3>
                {{-- <div class="service-icon">
                    <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_42-6260257370d7d.png" width="60" alt="">
                </div> --}}
                <div class="mb-3 hover01">
                  <figure>
                    <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/terreno.webp')}}" alt="Vender terrenos">
                  </figure>
                </div>
                <p class="description"> Vender un terreno nunca habia sido tan fácil, recibimos todos los días cientos de clientes que buscan terrenos en venta para
                  construir sus viviendas o proyectos comerciales.
                </p>
                <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Terreno</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender Locales comerciales</h3>
                {{-- <div class="service-icon">
                  <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_43-626025dc312d2.png" width="60" alt="">
                </div> --}}
                <div class="mb-3 hover01">
                  <figure>
                    <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/local.webp')}}" alt="Vender local">
                  </figure>
                </div>
                <p class="description"> ¿Tiene un local comercial que quiere vender al precio previsto y sin complicaciones? Ahora es el mejor momento, registre su local comercial 
                  y lo mostraremos a una amplia lista de interesados, para que su venta sea rápida y efectiva. </p>
                <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Local</a>
            </div>
          </div>   
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender quintas</h3>
                {{-- <div class="service-icon">
                    <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_44-626025fbd2694.png" width="60" alt="">
                </div> --}}
                <div class="mb-3 hover01">
                  <figure>
                    <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/quinta.webp')}}" alt="Vender quinta">
                  </figure>
                </div>
                <p class="description">¿Quiere vender una quinta? Ha llegado al mejor lugar, no dude en registrar su quinta en Casa Crédito y aumentar el número de interesados
                  y de oferta con un par de clics.
                </p>
              <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Quinta</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender Casas Comerciales</h3>
                {{-- <div class="service-icon">
                    <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_47-6260261b22f18.png" width="60" alt="">
                </div> --}}
                <div class="mb-3 hover01">
                  <figure>
                    <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/casa-comercial.webp')}}" alt="Vender casa comercial">
                  </figure>
                </div>
                <p class="description"> Venda su casa comercial con la Inmobiliaria que si hace que las cosas sucedan. Regístrela hoy y empiece a recibir 
                  interesados día tras día. </p>
                <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Casa Comercial</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender Haciendas</h3>
              {{-- <div class="service-icon">
                  <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_43-626025dc312d2.png" width="60" alt="">
              </div> --}}
              <div class="mb-3 hover01">
                <figure>
                  <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/hacienda.webp')}}" alt="Vender hacienda">
                </figure>
              </div>
              <p class="description"> Vender una Hacienda en Casa Crédito es la mejor iniciativa que puede tomar, haremos que su venta sea rápida y segura . ¡Venda su hacienda hoy!</p>
              <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Hacienda</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender Oficina</h3>
              {{-- <div class="service-icon">
                  <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_44-626025fbd2694.png" width="60" alt="">
              </div> --}}
              <div class="mb-3 hover01">
                <figure>
                  <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/oficina.webp')}}" alt="Vender oficina">
                </figure>
              </div>
              <p class="description">Venda su oficina con nosotros, y consiga el cliente ideal.
              </p>
              <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Oficina</a>
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-4 py-2">
            <div class="serviceBox">
              <h3 class="title">Vender Suites</h3>
              {{-- <div class="service-icon">
                  <img class="service-img pt-3" src="https://casacredito.com/uploads/services/IMG_47-6260261b22f18.png" width="60" alt="">
              </div> --}}
              <div class="mb-3 hover01">
                <figure>
                  <img class="img-fluid rounded-circle" width="50%" src="{{asset('img/suite.webp')}}" alt="Vender suite">
                </figure>
              </div>
              <p class="description"> ¿Quiere vender una suite? Tenemos los clientes interesados en ese tipo de propiedad, registre su suite con nosotros y vendala fácil y rápido. </p>
              <a href="javascript:void(0)" onclick="setInterest('Venta de propiedad')" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalVende">Vender Suites</a>
            </div>
          </div>
          @endif
          {{-- termina div nuevo vende con nosotros --}}
        </div>
    </div>
<section>

{{-- nuevo texto solo para vender tu casa con nosotros --}}
@if($service->slug == "vende-tu-casa")
<div class="container mb-5">
  <p>
    <h2>
      Beneficios de vender con Casa Cr&eacute;dito Inmobiliaria
    </h2>
    <div class="row mt-4">
      <div class="col-sm-6 col-12 my-2"><i class="fad fa-file-chart-line text-primary" style="font-size: 23px"></i> Recibirá Informes Mensuales</div>
      <div class="col-sm-6 col-12 my-2"><i class="fas fa-user-lock text-primary" style="font-size: 23px"></i> Mantenemos Total Confidencialidad del Trámite</div>
      <div class="col-sm-6 col-12 my-2"><i class="fal fa-images text-primary" style="font-size: 23px"></i> Publicamos su propiedad en Ecuador y en Estados Unidos</div>
      <div class="col-sm-6 col-12 my-2"><i class="fas fa-users text-primary" style="font-size: 23px"></i> Única empresa que genera sus propios clientes potenciales</div>
      <div class="col-sm-6 col-12 my-2"><i class="fad fa-browser text-primary" style="font-size: 23px"></i> Sus propiedades se muestran exclusivamente en nuestra plataforma</div>
      <div class="col-sm-6 col-12 my-2"><i class="far fa-calendar-day text-primary" style="font-size: 23px"></i> Mostramos su propiedad a cientos de clientes potenciales todos los días</div>
    </div>
</div>
@endif


@if($service->slug == "vende-tu-casa")
<div class="modal fade" id="modalVende" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #1b3460">
        <h4 class="modal-title text-white" id="exampleModalLongTitle" style="font-size: 17px">Complete el siguiente formulario y en breve será contactado</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('web.lead.contact')}}" method="POST">
          @csrf
          <div class="form-group">
            <div class="d-flex">
              <div class="form-group mr-1" style="width: 100%">
                  {!! Form::label('name', 'Nombre:') !!}
                  {!! Form::text('fname', null, ['class' => 'form-control', 'required']) !!}
                  {!! Form::hidden('interest', 'Venta de propiedad', ['id'=>'interest']) !!}
              </div> 
              <div class="form-group" style="width: 100%">
                  {!! Form::label('flastname', 'Apellido:') !!}
                  {!! Form::text('flastname', null, ['class' => 'form-control', 'required']) !!}
              </div>
            </div>
            
            <div class="d-flex">
              <div class="form-group mt-2 mr-1 w-100">
                  {!! Form::label('tlf', 'Teléfono:') !!}
                  {!! Form::number('tlf', null, ['class' => 'form-control', 'required']) !!}
              </div>
              <div class="form-group mt-2 w-100">
                {!! Form::label('email', 'Correo electrónico') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
              </div>
            </div>
            
            <div class="form-group mt-2">
                {!! Form::label('ftype', 'Tipo de propiedad') !!}
                <select name="ftype" class="form-select" required>
                  <option value="">Seleccione</option>
                    @foreach ($types as $type)
                        <option value="{{$type->type_title}}">{{$type->type_title}}</option> 
                    @endforeach
                </select>
            </div>
            
            <div class="d-flex mt-2">
                <div class="form-group mr-1" style="width: 100%">
                    {!! Form::label('fstate', 'Provincia:') !!}
                    <select name="fstate" id="selState" class="form-select" required>
                        <option value="">Elige Provincia</option>
                        @foreach ($states as $state)
                            <option value="{{$state->name}}" data-id="{{$state->id}}">{{ $state->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group" style="width: 100%">
                    {!! Form::label('fcity', 'Ciudad:') !!}
                    <select name="fcity" id="selCity" class="form-select" required>
                        <option value="">Elige Ciudad</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group mt-2">
                {!! Form::label('fsector', 'Sector: (Ej: Totoracocha, Ricaurte)') !!}
                {!! Form::text('fsector', null, ['class' => 'form-control', 'required']) !!}
            </div>
            
            <div class="d-flex mt-2">
                <div class="form-group mr-1" style="width: 100%">
                    {!! Form::label('fyears', 'Años de construcción:') !!}
                    {!! Form::text('fyears', null, ['class' => 'form-control', 'required']) !!}
                </div>
                
                <div class="form-group" style="width: 100%">
                    {!! Form::label('fprice', 'Precio estimado:') !!}
                    {!! Form::number('fprice', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
            
            <div class="form-group">
                {!! Form::submit('Enviar',  ['class' => 'btn btn-lg btn-primary btn-block mt-4']) !!}
            </div> 
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endif


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

    const SelState = document.getElementById('selState');
    const SelCity = document.getElementById('selCity');

    const selStateHeader = document.getElementById('selStateHeader');
    const selCityHeader = document.getElementById('selCityHeader');

  if(SelState){
      SelState.addEventListener("change", async function() {
      SelCity.options.length = 0;
      let id = SelState.options[SelState.selectedIndex].dataset.id;
      const response = await fetch("{{url('getcities')}}/"+id );
      const cities = await response.json();
      
      var opt = document.createElement('option');
            opt.appendChild( document.createTextNode('Ciudad') );
            opt.value = '';
            SelCity.appendChild(opt);
      cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode(city.name) );
            opt.value = city.name;
            SelCity.appendChild(opt);
      });
    });
  }

  if(selStateHeader){
    selStateHeader.addEventListener("change", async function() {
      selCityHeader.options.length = 0;
      let id = selStateHeader.options[selStateHeader.selectedIndex].dataset.id;
      const response = await fetch("{{url('getcities')}}/"+id );
      const cities = await response.json();
      
      var opt = document.createElement('option');
            opt.appendChild( document.createTextNode('Ciudad') );
            opt.value = '';
            selCityHeader.appendChild(opt);
      cities.forEach(city => {
            var opt = document.createElement('option');
            opt.appendChild( document.createTextNode(city.name) );
            opt.value = city.name;
            selCityHeader.appendChild(opt);
      });
    });
  }
  </script>
@endsection
