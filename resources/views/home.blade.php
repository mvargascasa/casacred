@extends('layouts.navbar')
@section('header')
    <title>Casas en venta en Cuenca Ecuador</title>
    <meta name="description" content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos."/>
    <meta name="keywords" content="Casas en venta en cuenca, Apartamentos en venta en cuenca, terrenos en venta en cuenca, lotes en venta en cuenca">

    <meta property="og:url"                content="{{route('web.index')}}" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="Casa Crédito Encuentra la casa de tus sueños." />
    <meta property="og:description"        content="Casas en Venta en Cuenca, Departamentos en venta en Cuenca, Lotes en Venta en Cuenca, Terrenos en Venta en Cuenca. Venta de Propiedades y Gestión de Créditos." />
    <meta property="og:image"              content="{{asset('img/meta-image-social-cc.jpg')}}" />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
      @media screen and (max-width: 850px){
        #txttitlebanner{
          font-size: 15px !important;
        }
      }
      .hover-image:hover{
        -webkit-transform: scale(1.1); transform: scale(1.1);
        -webkit-transition: 1s;
      }
    </style>
@endsection

@section('content')
    <section id="prisection" style="background-size: cover;background-position: left top; width: 100%; background-repeat: no-repeat; background: linear-gradient(rgba(255,255,255,0.5), rgba(255,255,255,0.5))">
    </section>
    
    <div style="position: relative">
        <img class="img-fluid" style="filter: brightness(60%)" src="{{ asset('img/home1.jpg') }}" alt="">
        <div id="parentbuscador" style="position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
            <h3 id="txttitlebanner" class="text-center text-white">¿QUÉ TIPO DE INMUEBLE <br> ESTAS BUSCANDO?</h3>
            <div id="buscador" class="d-flex justify-content-center" style="background-color: #ffffff; border-radius: 5px; height: 50px">
              <div class="d-flex align-items-center mr-1">
                <select class="form-select form-select-sm border-right" aria-label=".form-select-sm example" style="border: none">
                  <option selected>Ciudad</option>
                  <option value="Quito">Quito</option>
                  <option value="Guayaquil">Guayaquil</option>
                  <option value="Cuenca">Cuenca</option>
                  <option value="Manta">Manta</option>
                </select>
              </div>
              <div class="d-flex align-items-center mr-1">
                <select class="form-select form-select-sm border-right" aria-label=".form-select-sm example" style="border: none">
                  <option selected>Tipo de propiedad</option>
                  <option value="Casa">Casa</option>
                  <option value="Departamento">Departamento</option>
                </select>
              </div>
                <div style="border-radius: 0px; display: flex; align-items: center; margin-left: 10px">
                    <b style="font-size: 14px; color: #4c535a">Precio</b> 
                    <div>
                      <span class="input-group-btn border" style="width: 25px; margin-left: 10px; margin-right: 10px; border-color: #ff5619 !important; margin-top: 15px; padding-right: -10px; padding-left: -10px; border-radius: 5px">
                        <button class="btn btn-default" id="menos" type="button">-</button>
                      </span>
                    </div>
                    <input
                      style="width: 100px; border-color: #ff5619"
                      name="cantidad"
                      type="text"
                      style="width:50px;text-align: center;"
                      id="contador"
                      class="form-control"
                      value="20"
                      min="10"
                    />
                    <div>
                      <span class="input-group-btn border" style="width: 25px; margin-left: 10px; margin-right: 10px; border-color: #ff5619 !important; margin-top: 15px; padding-right: -10px; padding-left: -10px; border-radius: 5px">
                        <button class="btn btn-default" id="mas" type="button">+</button>
                      </span>
                    </div>
                </div>
                <div>
                  <button class="btn" style="background-color: #ff5619; color: #ffffff; border-radius: 0px 5px 5px 0px; height: 50px"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>

            {{-- DIV PARA MOSTRAR EL ICONO DE BUSCAR CUANDO SEA RESPONSIVE --}}
            <div class="d-flex justify-content-center">
              <button id="btnsearch" class="btn" style="display: none; border-radius: 25px; background-color: #ff5619; padding: 6px 10px 6px 10px; color: #ffffff"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="container">
        <h5 class="text-center mt-5 mb-5">- SERVICIOS <b style="font-weight: bold">INMOBILIARIOS</b> A TU ALCANCE -</h5>
        <div data-aos="fade-up" class="row ml-5 mr-5">
            <div class="col-sm-3 mb-5">
              <div class="position-relative d-flex justify-content-center">
                <img style="border-radius: 5px" class="img-fluid hover-image" src="{{ asset('img/home2.jpg') }}" alt="">
                <div class="position-absolute" style="bottom:0; color: #ffffff; margin: auto; font-size: 14px">
                  LA CASA DE SUS SUEÑOS AQUÍ
                </div>
              </div>
                <div class="text-center mt-3">
                    <h6>Quiero comprar una propiedad</h6>
                    <button class="btn btn-danger text-white">Solicitar</button>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
              <div class="position-relative d-flex justify-content-center">
                <img style="border-radius: 5px" class="img-fluid hover-image" src="{{ asset('img/home3.jpg') }}" alt="">
                <div class="position-absolute" style="bottom:0; color: #ffffff; margin: auto; font-size:14px">
                  AVALÚOS PARA TODO EL ECUADOR
                </div>
              </div>
                <div class="text-center mt-3">
                    <h6>Quiero vender una propiedad</h6>
                    <button class="btn btn-danger text-white">Comprar</button>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
              <div class="position-relative d-flex justify-content-center">
                <img style="border-radius: 5px" class="img-fluid hover-image" src="{{ asset('img/home4.jpg') }}" alt="">
                <div class="position-absolute" style="bottom:0; color: #ffffff; margin: auto; font-size: 14px">
                  SU PROPIEDAD EN BUENAS MANOS
                </div>
              </div>
                <div class="text-center mt-3">
                    <h6>Tengo una propiedad en alquiler</h6>
                    <button class="btn btn-danger text-white">Vender</button>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
              <div class="position-relative d-flex justify-content-center">
                <img style="border-radius: 5px" class="img-fluid hover-image" src="{{ asset('img/home5.jpg') }}" alt="">
                <div class="position-absolute" style="bottom:0; color: #ffffff; margin: auto; font-size: 14px">
                  RÁPIDOS Y EFECTIVOS
                </div>
              </div>
              <div class="text-center mt-3">
                  <h6>Créditos para ecuatorianos en USA</h6>
                  <button class="btn btn-danger text-white">Vender</button>
              </div>
          </div>
        </div>
    </div>

    <div class="row" style="background-color: #2c3144; padding-top: 2%; padding-bottom: 2%">
        <div class="col-sm-12 text-center text-white mt-4 mb-4">
            <h5>¿Quieres vender o rentar tu <b style="color: #fcc62e">Propiedad</b>?</h5>
            <p>Escríbenos y te asesoramos en el proceso</p>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn" style="background-color: #fcc62e">INICIAR</button>
        </div>
    </div>

    <div class="container">
      <div class="row mb-4">
          <h4 class="text-center mt-5 mb-5">PROYECTOS NUEVOS EN ECUADOR</h4>
          <div class="col-sm-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-2 position-relative" style="width: 20rem; height: 21rem">
                  <a style="text-decoration: none" href="https://casacreditopromotora.com/proyectos/Adra">
                    <img class="img-fluid" style="height: 100%" src="{{ asset('/img/adra.webp') }}" class="card-img-top" alt="Proyecto Adra - Casa Credito Promotora">
                  </a>
                  <div class="position-absolute" style="top: 5px; left: 5px; background-color: #2c314484; padding: 5px; font-size: 11px; border-radius: 7px; color: #ffffff;">
                    Departamentos
                  </div>
                  <div class="card-body">
                    <p style="font-size: 12px; margin-bottom: 6px" class="card-text fw-bold">Edificio Vista Linda, Cuenca</p>
                    <h5>Adra</h5>
                    <p style="font-size: 13px" class="card-title text-muted">Desde USD 99.000</p>
                  </div>
                </div>
          </div>
          <div class="col-sm-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-2 position-relative" style="width: 20rem; height: 21rem">
                  <a style="text-decoration: none" href="https://casacreditopromotora.com/proyectos/Futura Narancay">
                    <img class="img-fluid" style="height: 100%" src="{{ asset('/img/futuranarancay.webp') }}" class="card-img-top" alt="Proyecto Futura Narancay - Casa Credito Promotora">
                  </a>
                  <div class="position-absolute" style="top: 5px; left: 5px; background-color: #2c314484; padding: 5px; font-size: 11px; border-radius: 7px; color: #ffffff;">
                    Departamentos
                  </div>
                  <div class="card-body">
                    <p style="font-size: 12px; margin-bottom: 6px" class="card-text fw-bold">Narancay, Cuenca</p>
                    <h5>Futura Narancay</h5>
                    <p style="font-size: 13px" class="card-title text-muted">Desde USD 78.000</p>
                  </div>
                </div>
          </div>
          <div class="col-sm-4 d-flex justify-content-center">
              <div id="cardSimilarProject" class="card mb-2 position-relative" style="width: 20rem; height: 21rem">
                  <a style="text-decoration: none" href="https://casacreditopromotora.com/proyectos/Toscana">
                    <img class="img-fluid" style="height: 100%" src="{{ asset('/img/toscana.webp') }}" class="card-img-top" alt="Proyecto Toscana - Casa Credito Promotora">
                  </a>
                  <div class="position-absolute" style="top: 5px; left: 5px; background-color: #2c314484; padding: 5px; font-size: 11px; border-radius: 7px; color: #ffffff;">
                    Condominios
                  </div>
                  <div class="card-body">
                    <p style="font-size: 12px; margin-bottom: 6px" class="card-text fw-bold">Challuabamba, Cuenca</p>
                    <h5>Toscana</h5>
                    <p style="font-size: 13px" class="card-title text-muted">Desde USD 150.000</p>
                  </div>
                </div>
          </div>
          <div class="d-flex justify-content-center mt-3">
              <a style="background-color: #2c3144; color: #ffffff; padding: 15px; border-radius: 10px; font-size: 13px" class="btn" href="https://casacreditopromotora.com/proyectos">VISITE NUESTRO CATÁLOGO DE PROYECTOS EN <b style="color: #fcc62e;">ECUADOR </b><i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
      </div>
    </div>

    <div class="row pt-5 pb-5" style="background-color: #f2f8f8; padding-left: 5%; padding-right: 5%; font-size: 13px">
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

    {{-- DIV MODAL PARA FORMULARIO DE CONTACTO --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Complete el formulario y nos contactaremos con usted</h6>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
          </div>
          <div class="modal-body">
            <form action="">
              <div class="form-group mb-2">
                <label for="nombre" class="mb-2">Nombre y Apellido</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
              </div>
              <div class="form-group mb-2">
                <label for="telefono" class="mb-2">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
              </div>
              <div class="form-group mb-2">
                <label for="email" class="mb-2">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
              <div class="form-group mb-2">
                <label for="comentario" class="mb-2">Comentario</label>
                <input type="text" name="comentario" id="comentario" class="form-control" required>
              </div>
            </form>
          </div>
          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn" style="background-color: #fec41a">Enviar</button>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('footer')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
    window.addEventListener('load', (event) => {
        document.getElementById('prisection').style.backgroundImage = "url('img/home1.jpg')";
    });
    var sumar = document.getElementById("mas");
      var restar = document.getElementById("menos");
      var contador = document.getElementById("contador");

      sumar.onclick = function() {
        if(contador.value >= contador.min){
          restar.disabled = false;
        }
        contador.value = Number(contador.value) + 1;
      };

      restar.onclick = function() {
        if(contador.min == contador.value){
          restar.disabled = true;
        } else {
          contador.value = Number(contador.value) - 1;
        }
      };

      contador.onchange = function() {
        if(Number(this.value) < contador.min){
          alert('No puede ingresar un valor menor a ' + contador.min);
          contador.value = contador.min;
        }
      };
</script>
@endsection