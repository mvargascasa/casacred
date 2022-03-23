@extends('layouts.navbar')
@section('header')
    <title>Créditos en Cuenca Ecuador</title>
    <meta name="description" content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos."/>
    <meta name="keywords" content="Casas en venta en cuenca, Apartamentos en venta en cuenca, terrenos en venta en cuenca, lotes en venta en cuenca">

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Casa Crédito Encuentra la casa de tus sueños." />
    <meta property="og:description"        content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos." />
    <meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

    <style>
        #labelCorreo, #inputCorreo{
            display: none;
        }
    </style>
@endsection

@section('content')
    <section id="prisection" style="background: rgba(8, 8, 8, 0.319); background-size: cover;background-position: left top; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mt-5 pt-5" style="color: #174a83">
                    <h4 class="text-center" style="font-weight: bold">Su crédito fácil, rápido <br> y seguro..!</h4>
                    <div style="margin-left: 20%">
                        <p style="margin: 0px;"><i class="far fa-calendar-alt"></i> Aprobación en 72 horas</p>
                        <p style="margin: 0px"><i class="fas fa-dollar-sign"></i> Hasta $25,000</p>
                        <p><i class="fas fa-passport"></i> Sin importar tu estatus migratorio</p>
                    </div>
                    <div class="text-center">
                        <img src="" alt="Imagen Bandera Ecuador">
                        <p style="color: #636363">Aplica para <b style="font-weight: bold">ECUATORIANOS</b> que <br> viven en Estados Unidos</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <img src="" alt="Imagen Persona">
                </div>
                <div class="col-sm-4" style="margin-top: 70px">
                    <form style="background-color: #ffffff; border-radius: 5px; margin-bottom: -15px; box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)" class="mt-4 pl-4 pr-4 pb-4">
                        <h5 class="text-center pt-4">Ingresa tus datos para <br> iniciar el proceso</h5>
                        <div class="mb-3">
                          <label for="cedula" class="form-label">Tu número de cédula</label>
                          <input type="text" class="form-control" id="inputCedula" name="cedula" required>
                        </div>
                        <div class="mb-3">
                            <label id="labelCelular" for="celular" class="form-label">Número de celular</label>
                            <label id="labelCorreo" for="email" class="form-label">Correo electrónico</label>
                            <div class="d-flex">
                                <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary btn-block" for="success-outlined" style="border-radius: 0px" onclick="showPhone();">Celular</label>
                                <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                                <label class="btn btn-outline-secondary btn-block" for="danger-outlined" style="border-radius: 0px" onclick="showEmail();">Correo</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="inputCelular" name="celular" placeholder="Ej: 099 048 5734" required>
                            <input type="email" class="form-control" id="inputCorreo" name="email" placeholder="Ej: usuario@ejemplo.com" required>
                        </div>
                        <p style="font-size: 12px">Con el click "Solicitar un crédito" autorizas a Casa Crédito para obtener tus referencias personales y/o crediticias de fuentes legales de información.</p>
                        <button type="submit" class="btn btn-danger btn-block" style="border-radius: 0px">Solicitar crédito</button>
                      </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-3">
        <div class="row mt-5 text-center">
            <h5 class="mb-4" style="color: #353c4b">- OBTENGA SU <b>CRÉDITO</b> CON SIMPLES PASOS -</h5>
            <div class="col-sm-3 mb-3">
                <i class="fas fa-laptop" style="padding: 10px; background-color: #f4f5f9; color: #ea325c; border-radius: 50px"></i>
                <p class="mt-3">Precalificación y <br> análisis de buro</p>
            </div>
            <div class="col-sm-3 mb-3">
                <i class="fad fa-angle-double-right" style="padding: 10px; background-color: #f4f5f9; color: #ea325c; border-radius: 50px"></i>
                <p class="mt-3">Apertura para dar <br> inicio al proceso</p>
            </div>
            <div class="col-sm-3 mb-3">
                <i class="fal fa-clock" style="padding: 10px; background-color: #f4f5f9; color: #ea325c; border-radius: 50px"></i>
                <p class="mt-3">Análisis de <br> documentación</p>
            </div>
            <div class="col-sm-3 mb-3">
                <i class="far fa-clipboard-user" style="padding: 10px; background-color: #f4f5f9; color: #ea325c; border-radius: 50px"></i>
                <p class="mt-3">Aprobación y <br> desembolso</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div style="margin-left: 25%; margin-top: 10%">
                <h6 style="font-weight: bold">BENEFICIOS DEL CRÉDITO DE CONSUMO</h6>
                <div>
                    <p><i class="far fa-check" style="color: #ea325c"></i> Tasa de Interés Baja</p>
                    <p><i class="far fa-check" style="color: #ea325c"></i> Aprobación en 48hs</p>
                    <p><i class="far fa-check" style="color: #ea325c"></i> Financiación hasta 5 años</p>
                    <p><i class="far fa-check" style="color: #ea325c"></i> Sin importar estatus migratorio</p>
                    <p><i class="far fa-check" style="color: #ea325c"></i> No necesita estar presente</p>
                </div>
                <button class="btn" style="background-color: #ea325c; color: #ffffff; border-radius: 0px">Solicitar crédito</button>
            </div>
        </div>
        <div class="col-sm-6">
            <img class="img-fluid" src="https://www.inmobiliaria.com.do/wp-content/uploads/2020/07/pintar-una-casa.jpg" alt="">
        </div>
    </div>

    <div class="row text-center mt-5">
        <h5 class="mb-5">Visiténos personalmente en nuestras <br> <b>oficinas New York</b></h5>
        <a href="https://goo.gl/maps/ovKfQSvTmA5SBqqF6">
            <img class="img-fluid" src="{{ asset('img/maps-ny.png') }}" alt="">
        </a>
    </div>

    <section id="imageBackCreditos" class="row" style="background-size: cover;background-position: left top; width: 100%; height: 200px; background-repeat: no-repeat;">
        <div class="text-center text-white" style="margin-top: 5%">
            <p style="margin: 0px">Más información sobre</p>
            <button class="btn" style="background-color: #3b4255; color: #ffffff">CRÉDITOS DE CONSUMO</button>
        </div>
    </section>

    <div class="row pb-4 pt-4" style="background-color: #f2f8f8; padding-left: 5%; padding-right: 5%; font-size: 13px">
        <div class="col-sm-3 justify-content-center">
            <h6 style="font-weight: bold">Tipos de inmuebles populares</h6>
            <a style="text-decoration: none; color: #000000" href="">Casas en Venta</a><br>
            <a style="text-decoration: none; color: #000000" href="">Casas en Alquiler</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en Venta</a><br>
            <a style="text-decoration: none; color: #000000" href="">Terrenos en venta</a><br>
            <a style="text-decoration: none; color: #000000; font-weight: bold; font-size: 11px" href="">Ver más</a>
        </div>
        <div class="col-sm-3 justify-content-center">
            <h6 style="font-weight: bold">Propiedades en venta</h6>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en venta: Quito</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en venta: Guayaquil</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en venta: Cuenca</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en venta: Salinas</a><br>
            <a style="text-decoration: none; color: #000000; font-weight: bold; font-size: 11px" href="">Ver más</a>
        </div>
        <div class="col-sm-3 justify-content-center">
            <h6 style="font-weight: bold">Propiedades en alquiler</h6>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en alquiler: Quito</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en alquiler: Guayaquil</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en alquiler: Cuenca</a><br>
            <a style="text-decoration: none; color: #000000" href="">Departamentos en alquiler: Salinas</a><br>
            <a style="text-decoration: none; color: #000000; font-weight: bold; font-size: 11px" href="">Ver más</a>
        </div>
        <div class="col-sm-3 justify-content-center">
            <h6 style="font-weight: bold">Zonas más populares</h6>
            <a style="text-decoration: none; color: #000000" href="">Quito</a><br>
            <a style="text-decoration: none; color: #000000" href="">Guayaquil</a><br>
            <a style="text-decoration: none; color: #000000" href="">Cuenca</a><br>
            <a style="text-decoration: none; color: #000000" href="">Manta</a><br>
            <a style="text-decoration: none; color: #000000; font-weight: bold; font-size: 11px" href="">Ver más</a>
        </div>
    </div>
@endsection

@section('footer')
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/imgheader2.jpg')";
        document.getElementById('imageBackCreditos').style.backgroundImage = "url('https://www.laboral-social.com/sites/laboral-social.com/files/competencia-orden-social.jpg')";
    });

    function showEmail(){
        document.getElementById('labelCorreo').style.display = "block";
        document.getElementById('inputCorreo').style.display = "block";

        document.getElementById('labelCelular').style.display = "none";
        document.getElementById('inputCelular').style.display = "none";
    }

    function showPhone(){
        document.getElementById('labelCorreo').style.display = "none";
        document.getElementById('inputCorreo').style.display = "none";

        document.getElementById('labelCelular').style.display = "block";
        document.getElementById('inputCelular').style.display = "block";
    }
</script>
@endsection