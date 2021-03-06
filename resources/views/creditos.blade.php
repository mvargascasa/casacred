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
        .input-container {
            height: 50px;
            position: relative;
            width: 100%;
        }
        .ic1 {
            margin-top: 10px;
        }
        .input {
            background-color: #ffffff;
            border-radius: 12px;
            border: 1;
            box-sizing: border-box;
            color: #eee;
            font-size: 18px;
            height: 100%;
            outline: 0;
            padding: 4px 20px 0;
            width: 100%;
        }
        .cut {
            background-color: #ffffff;
            border-radius: 10px;
            height: 20px;
            left: 20px;
            position: absolute;
            top: -20px;
            transform: translateY(0);
            transition: transform 200ms;
            width: 80px;
        }
        .cut2{
            background-color: #ffffff;
            border-radius: 10px;
            height: 20px;
            left: 20px;
            position: absolute;
            top: -20px;
            transform: translateY(0);
            transition: transform 200ms;
            width: 120px;
        }
        .input:focus ~ .cut,
        .input:focus ~ .cut2,
        .input:not(:placeholder-shown) ~ .cut {
            transform: translateY(8px);
        }
        .placeholder {
            color: #65657b;
            font-family: sans-serif;
            left: 20px;
            line-height: 14px;
            pointer-events: none;
            position: absolute;
            transform-origin: 0 50%;
            transition: transform 200ms, color 200ms;
            top: 20px;
        }
        .input:focus ~ .placeholder,
        .input:not(:placeholder-shown) ~ .placeholder {
            transform: translateY(-30px) translateX(10px) scale(0.75);
        }
        .input:not(:placeholder-shown) ~ .placeholder {
            color: #808097;
        }

        .input:focus ~ .placeholder {
            color: #ca274a;
        }
        .form {
            background-color: #ffffff;
            border-radius: 20px;
            box-sizing: border-box;
        }
        
    </style>
@endsection

@section('content')
    <section id="prisection" style="background: rgba(8, 8, 8, 0.319); background-size: cover;background-position: left top; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 mt-5 pt-5" style="color: #0e3869">
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
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn" style="background-color: #ea325c; color: #ffffff; border-radius: 0px">Solicitar crédito</button>
            </div>
        </div>
        <div class="col-sm-6">
            <img class="img-fluid" src="https://www.inmobiliaria.com.do/wp-content/uploads/2020/07/pintar-una-casa.jpg" alt="">
        </div>
    </div>

    <div class="row text-center mt-5">
        <h5 class="mb-5">Visítenos personalmente en nuestras <br> <b>oficinas New York</b></h5>
        <a target="_blank" href="https://goo.gl/maps/ovKfQSvTmA5SBqqF6">
            <img class="img-fluid" src="{{ asset('img/maps-nl.png') }}" alt="">
        </a>
    </div>      

    <section id="imageBackCreditos" class="row" style="background-size: cover;background-position: left top; width: 100%; height: 200px; background-repeat: no-repeat;">
        <div class="text-center text-white" style="margin-top: 5%">
            <p style="margin: 0px">Más información sobre</p>
            <button class="btn" style="background-color: #3b4255; color: #ffffff">CRÉDITOS DE CONSUMO</button>
        </div>
    </section>


    {{-- modal para solicitar un credito --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Solicite un crédito</h5>
              <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="modal-body">
              <form action="" class="form">
                  <div class="form-group input-container ic1">
                      <input type="text" id="cedula" name="cedula" class="form-control input" placeholder=" " required>
                      <div class="cut"></div>
                      <label class="placeholder" for="cedula">Cédula</label>
                  </div>
                  <div class="form-group input-container ic1 mt-4">
                      <input type="text" id="name" name="name" class="form-control input" placeholder=" " required>
                      <div class="cut2"></div>
                      <label for="name" class="placeholder">Nombre y Apellido</label>
                  </div>
                  <div class="form-group input-container ic1 mt-4">
                      <input type="number" id="number" name="number" class="form-control input" placeholder=" " required>
                        <div class="cut"></div>
                      <label for="number" class="placeholder">Teléfono</label>
                  </div>
                  <div class="form-group input-container ic1 mt-4">
                      <input type="text" id="monto" name="monto" class="form-control input" placeholder=" " required>
                      <div class="cut2"></div>
                      <label for="monto" class="placeholder">Monto requerido</label>
                  </div>
              </form>
            </div>
            <div class="modal-footer justify-content-center">
              <button type="button" style="background-color: #ea325c; color: #ffffff" class="btn">Solicitar</button>
            </div>
          </div>
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