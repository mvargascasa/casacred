@extends('layouts.web')
@section('header')
    <title>
        {{ $listing->product_code }} {{ $listing->listing_title }}</title>
    @php
        $type = DB::table('listing_types')
            ->select('type_title')
            ->where('id', $listing->listingtype)
            ->first();
        $status;
        switch ($listing->listingtypestatus) {
            case 'en-venta':
                $status = 'venta';
                break;
            case 'En venta':
                $status = 'venta';
                break;
            case 'on sale':
                $status = 'venta';
                break;
            case 'alquilar':
                $status = 'alquiler';
                break;
            case 'proyectos':
                $status = 'proyectos';
                break;
        }
    @endphp
    <meta name="description"
        content="@isset($listing->meta_description){{ $listing->meta_description }} @else {{ mb_substr(trim(strip_tags($listing->listing_description)), 0, 180) }}... @endif"/>
<meta name="keywords" content="@isset($listing->keywords) {{ $listing->keywords }} @else Casas en venta en cuenca ecuador, Apartamentos en venta en cuenca ecuador, terrenos en venta en cuenca ecuador, lotes en venta en cuenca ecuador, {{ Str::lower($type->type_title) }} en {{ $status }} en {{ strtolower($listing->city . ' ' . $listing->state) }} @endisset">
    <meta name="robots" content="@if ($listing->status) index @else noindex @endif">

    <meta property="og:url" content="{{ route('web.detail', $listing->slug) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $listing->listing_title }}" />
    <meta property="og:description"
        content="{{ mb_substr(trim(strip_tags($listing->listing_description)), 0, 180) }}..." />

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    @php $firstImg = array_filter(explode("|", $listing->images)) @endphp
    <meta property="og:image" content="{{ url('uploads/listing/600', $firstImg[0] ?? '') }}" />

    <style>
        .images-mobile {
            display: none !important
        }

        .img-banner:hover {
            filter: brightness(80%) !important;
        }

        @media screen and (max-width: 580px) {
            .form {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

            .images-desktop {
                display: none !important
            }

            .images-mobile {
                display: block !important
            }

            .btn-modal-images {
                display: none !important
            }
        }

        .custom-text {
            font-size: 1.5rem;
            /* Tamaño similar al de h4 */
            font-style: normal;
            /* Eliminar la negrita */
            white-space: nowrap;
            color: #242B40;
        }
    </style>
@endsection

@php
    $images = array_filter(explode('|', $listing->images));
    $filexists = false;
    if (file_exists(public_path() . '/uploads/listing/thumb/600/' . strtok($listing->images, '|'))) {
        $filexists = true;
    }
    $listingtype = DB::table('listing_types')
        ->where('id', $listing->listingtype)
        ->first();
@endphp
@php
    $images = array_filter(explode('|', $listing->images));
    $filexists = false;
    if (file_exists(public_path() . '/uploads/listing/thumb/600/' . strtok($listing->images, '|'))) {
        $filexists = true;
    }
    $listingtype = DB::table('listing_types')
        ->where('id', $listing->listingtype)
        ->first();
@endphp
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 position-relative">
                <div id="carouselImages" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach (explode('|', $listing->images) as $image)
                            <div class="carousel-item @if ($loop->index == 0) active @endif">
                                <img src="{{ $filexists ? url('uploads/listing/', $image) : url('uploads/listing/', $image) }}"
                                    class="d-block w-100" style="height: auto; max-height: 600px; border-radius: 15px;">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselImages" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselImages" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
                <span class="position-absolute top-0 end-0 p-2 text-white"
                    style="background-color: #242B40; font-family: 'Sharp Grotesk'; font-weight:500; border-top-right-radius: 10px; border-bottom-left-radius: 10px; right: 12px; top: 0; z-index: 1050;">COD:
                    {{ $listing->product_code }}</span>

            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-center overflow-auto">
                    <div class="d-inline-flex">
                        @foreach (explode('|', $listing->images) as $index => $image)
                            <img onclick="switchImage({{ $index }})"
                                src="{{ $filexists ? url('uploads/listing/thumb/600', $image) : url('uploads/listing/600', $image) }}"
                                class="img-thumbnail m-1" style="width: 100px; cursor: pointer;">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <h1 class="" style="font-family: 'Sharp Grotesk'; font-weight: 500;">{{ $listing->listing_title }}
                </h1>
                <div class="d-flex align-items-center mt-3">
                    <i class="fa-solid fa-location-dot fs-5 me-2"></i>
                    <p class="mb-0 ms-2">{{ $listing->sector }}, {{ $listing->city }}, {{ $listing->state }}</p>
                    <span class="ms-2 ml-2 badge"
                        style="background-color: #f9a322; color: #ffffff; border-radius: 5px; font-weight: 500; font-size: 13px; padding: 3px 6px;">
                        {{ $listingtype->type_title }}
                    </span>
                    <span class="ms-2 ml-2 badge"
                        style="background-color: #dc3545; color: #ffffff; border-radius: 5px; font-weight: 500; font-size: 13px; padding: 3px 6px;">
                        @switch($listing->listingtypestatus)
                            @case('en-venta')
                                Venta
                            @break

                            @case('alquilar')
                                Alquilar
                            @break

                            @default
                                Proyectos
                        @endswitch
                    </span>
                </div>
                <div class="d-flex justify-content-around flex-wrap mt-4">
                    @if ($listing->bedroom > 0)
                        <div class="d-flex align-items-center justify-content-center flex-column text-center p-2">
                            <img src="{{ asset('img/dormitorios.png') }}" alt="Habitaciones" width="50px" height="50px">
                            <p class="pt-2 fw-bold">{{ $listing->bedroom }} Hab.</p>
                        </div>
                    @endif
                    @if ($listing->bathroom > 0)
                        <div class="d-flex align-items-center justify-content-center flex-column text-center p-2">
                            <img src="{{ asset('img/banio.png') }}" alt="Baños" width="50px" height="50px">
                            <p class="pt-2 fw-bold">{{ $listing->bathroom }}
                                {{ $listing->bathroom > 1 ? 'Baños' : 'Baño' }}</p>
                        </div>
                    @endif
                    @if ($listing->garage > 0)
                        <div class="d-flex align-items-center justify-content-center flex-column text-center p-2">
                            <img src="{{ asset('img/estacionamiento.png') }}" alt="Garaje" width="50px" height="50px">
                            <p class="pt-2 fw-bold">{{ $listing->garage }}
                                {{ $listing->garage > 1 ? 'Garajes' : 'Garaje' }}</p>
                        </div>
                    @endif
                    @if (isset($listing->construction_area) && $listing->construction_area != 0)
                        <div class="d-flex align-items-center justify-content-center flex-column text-center p-2">
                            <img src="{{ asset('img/area.png') }}" alt="Área de construcción" width="50px"
                                height="50px">
                            <p class="pt-2 fw-bold">{{ $listing->construction_area }} m<sup>2</sup></p>
                        </div>
                    @endif
                </div>
                <h2 style="font-family: 'Sharp Grotesk', sans-serif;">Acerca de esta propiedad</h2>
                <p style="font-family: 'Sharp Grotesk', sans-serif;"><strong>Sector:</strong> {{ $listing->sector }}</p>
                <p style="font-family: 'Sharp Grotesk', sans-serif; text-align: justify;" id="description">
                    <strong>Descripción:</strong>
                    <span id="short-desc">{{ Str::limit($listing->listing_description, 200, '...') }}</span>
                    <span id="full-desc" style="display: none;">{{ $listing->listing_description }}</span>
                    @if (strlen($listing->listing_description) > 200)
                        <a href="#" onclick="toggleDescription(); return false;" id="desc-toggle"
                            style="color: gray; text-decoration: underline; cursor: pointer;">Ver más</a>
                    @endif
                </p>
                @if (isset($listing->land_area) && $listing->land_area != 0)
                    <p style="font-family: 'Sharp Grotesk', sans-serif;"><strong>Metros de terreno:</strong>
                        {{ $listing->land_area }} m<sup>2</sup></p>
                @endif
                @if (isset($listing->construction_area) && $listing->construction_area != 0)
                    <p style="font-family: 'Sharp Grotesk', sans-serif;"><strong>Metros de construcción:</strong>
                        {{ $listing->construction_area }} m<sup>2</sup></p>
                @endif




                @if (is_array(json_decode($listing->heading_details)))
                    <div style="border: none" class="card my-4">
                        <div class="card-body" style="margin: -16px">
                            <h2 class="card-title h6"
                                style=" font-size: 23px; font-family: 'Sharp Grotesk'; font-weight: 500;">Detalles</h2>
                            @foreach (json_decode($listing->heading_details) as $dets)
                                <div class="row" style="padding-left: 7px">
                                    <?php unset($dets[0]);
                                    $printControl = 0; ?>
                                    {{-- @php dd($dets); @endphp      --}}
                                    {{-- @foreach ($dets as $det) --}}
                                    @for ($i = 1; $i < count($dets); $i++)
                                        @if ($printControl == 0)
                                            <?php $printControl = 1; ?>
                                            <div class="col-lg-3 col-md-4 col-6 p-1">
                                                <span class="text-muted small" style="font-family: 'Sharp Grotesk'; font-weight: 100;">
                                                    @foreach ($details as $detail)
                                                        @if ($detail->id == $dets[$i])
                                                            {{ $detail->charac_titile }} @if ($detail->id == $dets[$i] && $detail->id == 86)
                                                                <span style="background-color: #242B40"
                                                                    class="text-white px-2">
                                                                    {{ $dets[$i + 1] }}</span>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                        @else
                                            <?php $printControl = 0; ?>
                                        @endif
                                    @endfor
                                    {{-- @endforeach     --}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if (count(array_filter(explode(',', $listing->listinggeneralcharacteristics))) > 0)
                    <div style="border: none" class="card my-4">
                        <div class="card-body" style="margin: -16px">
                            <h2 class="card-title h6"
                                style=" font-size: 23px; font-family: 'Sharp Grotesk'; font-weight: 500;">Características
                                Generales</h2>
                            <div class="row" style="padding-left: 7px">
                                @foreach (array_filter(explode(',', $listing->listinggeneralcharacteristics)) as $lgc)
                                    <div class="col-lg-3 col-md-4 col-6 p-1">
                                        {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                                        <span class="text-muted small" style="font-family: 'Sharp Grotesk'; font-weight: 100;">
                                            @foreach ($generalcharacteristics as $gc)
                                                @if ($gc->id == $lgc)
                                                    {{ $gc->title }}
                                                    @endif @if ($gc->id == $lgc && $lgc == 8 && $listing->num_pisos > 0)
                                                        <b class="bg-orange text-white px-1">{{ $listing->num_pisos }}</b>
                                                        @endif @if ($gc->id == $lgc && $lgc == 7 && $listing->niv_constr > 0)
                                                            <b class="bg-orange text-white px-1">
                                                                {{ $listing->niv_constr }}</b>
                                                            @endif @if ($gc->id == $lgc && $lgc == 15 && $listing->pisos_constr > 0)
                                                                <b class="bg-orange text-white px-1">
                                                                    {{ $listing->pisos_constr }}</b>
                                                            @endif
                                                        @endforeach
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if (count(array_filter(explode(',', $listing->listingenvironments))) > 0)
                    <div style="border: none" class="card my-4">
                        <div class="card-body" style="margin: -16px">
                            <h2 class="card-title h6"
                                style=" font-size: 23px; font-family: 'Sharp Grotesk'; font-weight: 500;">Ambientes</h2>
                            <div class="row" style="padding-left: 7px">
                                @foreach (array_filter(explode(',', $listing->listingenvironments)) as $lenv)
                                    <div class="col-lg-3 col-md-4 col-6 p-1">
                                        {{-- <i class="fas fa-check px-2 text-muted"></i> --}}
                                        <span class="text-muted small" style="font-family: 'Sharp Grotesk'; font-weight: 100;">
                                            @foreach ($environments as $environment)
                                                @if ($environment->id == $lenv)
                                                    {{ $environment->title }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if ($listing->status)
                    <div class="container">
                        <p class="text-center" style="font-weight: 400; font-size:20px">Compartir</p>
                        <div class="d-flex justify-content-center">
                            <p title="Compartir en Facebook" style="cursor: pointer" id="shareToFacebook"><i
                                    class="fab fa-facebook" style="color: #0165E1;font-size:30px"></i></p>
                            {{-- <p title="Compartir en Twitter" id="shareToTwitter" style="cursor: pointer"><i class="fab fa-twitter ml-3" style="color: #1DA1F2;font-size:30px"></i></p> --}}
                            <p title="Compartir por WhatsApp" id="shareToWpp" style="cursor: pointer"><i
                                    class="fab fa-whatsapp ml-3" style="color: #25D366;font-size:30px"></i></p>
                        </div>
                    </div>
                @endif

                <h3 class="mt-4" style="font-family: 'Sharp Grotesk'">Ubicación</h3>
                <div class="d-flex align-items-center mt-3">
                    <i class="fa-solid fa-location-dot fs-5 me-2"></i>
                    <p class="mb-0" style="font-family: 'Sharp Grotesk'">{{ $listing->sector }}, {{ $listing->city }},
                        {{ $listing->state }}</p>
                </div>
                <div id="map" style="height: 500px;" class="my-3"></div>
            </div>

            <div class="col-md-5 mb-5">
                <div class="sticky-top px-5" style="top: 0;">
                    <div class="text-center text-white py-3 shadow"
                        style="background-color: #242B40; border-radius: 25px 25px 0 0;">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-auto">
                                <span class="fw-bold" style="font-size: 40px; line-height: 50px; font-family: 'Sharp Grotesk'; font-weight: 500;">
                                    ${{ $listing->property_price }}</span>
                            </div>
                            @if ($listing->aliquot && $listing->aliquot > 0)
                                <div class="col-auto" style="border-left: 2px solid white; height: 50px; margin: 0 10px;">
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <span class="fw-bold" style="font-size: 20px; font-family: 'Sharp Grotesk'; font-weight: 500;">Alícuota</span>
                                    </div>
                                    <div class="row">
                                        <span class="fw-bold" style="font-size: 20px; font-family: 'Sharp Grotesk'; font-weight: 500;">
                                            ${{ $listing->aliquot }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-white pt-4 pb-5 shadow px-5" style="border-radius: 0 0 25px 25px;">
                        <p class="text-center" style="font-size: x-large; font-weight: 600; ">¿Te interesa esta propiedad?
                        </p>
                        <p class="text-center">Proporciónanos tus datos y te contactaremos</p>
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('web.sendlead') }}" method="POST" id="formDetailProp">

                                @csrf

                                <div class="form-group">
                                    <input type="text" id="fname" name="fname" placeholder="Nombre"
                                        class="w-100" style="border: none; border-bottom: 1px solid #242B40" required>
                                    <input type="text" id="flastname" name="flastname" placeholder="Apellido"
                                        class="w-100 mt-4" style="border: none; border-bottom: 1px solid #242B40"
                                        required>
                                    <input type="hidden" id="interestDetail" name="interest">
                                </div>

                                <div class="form-group mt-4 w-100">
                                    <input type="number" id="tlf" name="tlf" placeholder="Teléfono"
                                        class="w-100" style="border: none; border-bottom: 1px solid #242B40" required>
                                </div>

                                <div class="form-group mt-4 w-100">
                                    <input type="email" id="email" name="email" placeholder="Correo electrónico"
                                        class="w-100" style="border: none; border-bottom: 1px solid #242B40" required>
                                </div>

                                <div class="form-group mt-4 w-100">
                                    <textarea name="message" id="message" rows="3" placeholder="Mensaje" class="w-100"
                                        style="border: none; border-bottom: 1px solid #242B40" required>Hola, me interesa este inmueble y quiero que me contacten. Gracias</textarea>
                                </div>

                                <input type="hidden" name="interest" value="{{ $listing->product_code }}">

                                <div class="form-group mt-4 w-100 d-flex justify-content-center">
                                    <button id="btnEnviar" type="button" class="btn text-white rounded-pill"
                                        style="background-color: #242B40;"
                                        onclick="sendFormDetail({{ $listing->product_code }}, event)">ENVIAR</button>
                                </div>

                                <p class="text-center mt-4" style="font-size: x-large; font-weight: 600">Nuestros datos de
                                    contacto</p>

                                <div class="d-flex gap-3 ms-4">
                                    <div class="rounded-circle d-flex justify-content-center align-items-center"
                                        style="border: 1px solid #242b40a2; width: 30px; height: 30px">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <a style="text-decoration: none" href="tel:+593987474637"
                                        class="mt-1 ml-2 text-dark">098-747-4637</a>
                                </div>

                                <div class="d-flex gap-3 ms-4 mt-2">
                                    <div class="rounded-circle d-flex justify-content-center align-items-center"
                                        style="border: 1px solid #242b40a2; width: 30px; height: 30px">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </div>
                                    <a style="text-decoration: none"
                                        onclick="return gtag_report_conversion('https://api.whatsapp.com/send?phone=593987474637&text=Hola%20*Housing%20Rent%20Group*,%20deseo%20consultar%20por%20esta%20propiedad:%20*{{ $listing->product_code }}*');"
                                        href="https://api.whatsapp.com/send?phone=593987474637&text=Hola%20*Housing%20Rent%20Group*,%20deseo%20consultar%20por%20esta%20propiedad:%20*{{ $listing->product_code }}*"
                                        class="mt-1 ml-2 text-dark">098-747-4637</a>
                                </div>
                                <div class="d-flex gap-3 ms-4 mt-2">
                                    <div class="rounded-circle d-flex justify-content-center align-items-center"
                                        style="border: 1px solid #242b40a2; width: 30px; height: 30px">
                                        <img width="15px" src="{{ asset('img/email-icon.png') }}" alt="">
                                    </div>
                                    <a style="text-decoration: none" href="mailto:info@housingrentgroup.com"
                                        class="mt-2 text-dark ml-2">info@housingrentgroup.com</a>
                                </div>

                                <div class="d-flex gap-3 ms-4 mt-2">
                                    <div class="rounded-circle d-flex justify-content-center align-items-center"
                                        style="border: 1px solid #242b40a2; width: 30px; height: 30px">
                                        <img width="15px" src="{{ asset('img/location-icon.png') }}" alt="">
                                    </div>
                                    <a style="text-decoration: none" class="mt-1 text-dark ml-2"
                                        href="https://maps.app.goo.gl/g4G5hBDe9doEPJvx7">Remigio Tamariz Crespo y Av.
                                        Solano</a>
                                </div>

                                <div class="form-group mb-2">
                                    <input type="hidden" name="g-recaptcha-response" id="recaptchaToken">

                                    @error('captcha')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @if ($user->profile_photo_path != null && $user->status == 1)
                    <div class="container">
                        <div class="text-center border px-3 mt-3 rounded py-3 card-asesor">
                            <img class="rounded-circle img-profile" width="170px" height="170px"
                                src="{{ asset('uploads/profiles/' . $user->profile_photo_path) }}"
                                alt="Imagen de perfil">
                            <p class="mt-3 mb-0" style="font-weight: 200">{{ $user->name }}</p>
                            <p class="font-weight-normal m-0" style="font-size: small">
                                @if ($user->role == 'ASESOR')
                                    Asesor Inmobiliario
                                @else
                                    Gestor Inmobiliario
                                @endif
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4 col-4">
                                    <a href="tel:+593983849073">
                                        <i class="fas fa-phone-alt text-light p-2 rounded-circle icon-phone border border-white"
                                            style="background-color: #242B40"></i>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send?phone=593983849073&text=Hola, estoy interesado en la propiedad *{{ $listing->product_code }}* - *{{ $listing->listing_title }}* y deseo que me contacten. Gracias 😊%0A{{ url()->current() }}">
                                        <i class="fab fa-whatsapp text-light p-2 rounded-circle border border-white"
                                            style="background-color: #242B40"></i>
                                    </a>
                                </div>
                                <div class="col-sm-4 col-4">
                                    <a href="mailto:ventas@casacredito.com">
                                        <i class="fas fa-envelope text-light p-2 rounded-circle border border-white"
                                            style="background-color: #242B40"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
    @php
        $listingsSimilar = \App\Models\Listing::select(
            'listing_title',
            'images',
            'property_price',
            'heading_details',
            'city',
            'state',
            'country',
            'slug',
            'listingtype',
        )
            ->where('city', $listing->city)
            ->where('status', 1)
            ->where('listingtype', $listing->listingtype)
            ->inRandomOrder()
            ->limit(4)
            ->get();
    @endphp
    @if (count($listingsSimilar) > 0)
        <div class="row mt-5 justify-content-center mx-5" data-aos="zoom-in">
            <h3 class="text-center mb-5 h5">Propiedades similares</h3>
            <p>Más {{ $listingtype->type_title }}@if ($listing->listingtypestatus == 'en-venta')
                    en venta
                @elseif($listing->listingtypestatus == 'alquilar')
                    en renta
                @else
                    en proyectos
                @endif en {{ $listing->city }} </p>
            @foreach ($listingsSimilar as $listing_s)
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-2 d-flex justify-content-center text-center">
                    <a style="text-decoration: none; color: #000000" href="{{ route('web.detail', $listing_s->slug) }}">
                        <div data-aos="zoom-in" class="card cardsimilarlisting" style="width: 18rem;">
                            @php
                                $imageVerification = asset(
                                    'uploads/listing/thumb/600' . strtok($listing_s->images, '|'),
                                );
                            @endphp
                            <img class="card-img-top lazyLoad" width="100%" height="100%"
                                data-src="@if (file_exists($imageVerification)) {{ asset('uploads/listing/thumb/600/' . strtok($listing_s->images, '|')) }} @else {{ asset('uploads/listing/600/' . strtok($listing_s->images, '|')) }} @endif"
                                alt="{{ $listing_s->listing_title }}">
                            <div class="card-body">
                                <p style="margin: 0px" class="card-title h5">
                                    ${{ number_format($listing_s->property_price) }}</p>
                                @php
                                    $bedroom = 0; //bedroom 41&86&49 //garage 43 //bathroom 48&76&81 // squarefit 44
                                    $bathroom = 0;
                                    $garage = 0;
                                    $squarefit = 0;
                                    if (!empty($listing_s->heading_details)) {
                                        $allheadingdeatils = json_decode($listing_s->heading_details);
                                        foreach ($allheadingdeatils as $singleedetails) {
                                            unset($singleedetails[0]);
                                            for ($i = 1; $i <= count($singleedetails); $i++) {
                                                if ($i % 2 == 0) {
                                                    if (
                                                        $singleedetails[$i - 1] == 41 ||
                                                        $singleedetails[$i - 1] == 86 ||
                                                        $singleedetails[$i - 1] == 49
                                                    ) {
                                                        $bedroom += $singleedetails[$i];
                                                    }
                                                    if (
                                                        $singleedetails[$i - 1] == 48 ||
                                                        $singleedetails[$i - 1] == 76 ||
                                                        $singleedetails[$i - 1] == 81 ||
                                                        $singleedetails[$i - 1] == 49
                                                    ) {
                                                        $bathroom += $singleedetails[$i];
                                                    }
                                                    if ($singleedetails[$i - 1] == 43) {
                                                        $garage += $singleedetails[$i];
                                                    }
                                                }
                                            }
                                            $i++;
                                        }
                                    }
                                @endphp
                                @if ($bedroom > 0 || $bathroom > 0)
                                    <p style="font-size: 15px; margin: 0px" class="card-text">
                                        @if ($bedroom > 0)
                                            {{ $bedroom }} @if ($bedroom > 1)
                                                habitaciones
                                            @else
                                                habitación
                                            @endif
                                            @endif @if ($bathroom > 0)
                                                {{ $bathroom }} @if ($bathroom > 1)
                                                    baños
                                                @else
                                                    baño
                                                @endif
                                            @endif
                                    </p>
                                @endif
                                <p style="font-size: 15px; margin: 0px" class="card-text">
                                    @isset($listing_s->country)
                                        {{ $listing_s->country }} |
                                    @endisset {{ $listing_s->state }} | {{ $listing_s->city }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
@endsection

@section('script')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // Función global para cambiar la imagen del carrusel
        window.switchImage = function(index) {
            var carouselElement = document.querySelector('#carouselImages');
            var carousel = new bootstrap.Carousel(carouselElement);
            carousel.to(index); // Mueve el carrusel al índice de imagen especificado
        };

        document.addEventListener('DOMContentLoaded', function() {
            var carouselElement = document.querySelector('#carouselImages');
            var carousel = new bootstrap.Carousel(carouselElement);
        });
    </script>
    <script>
        function toggleDescription() {
            const shortDesc = document.getElementById('short-desc');
            const fullDesc = document.getElementById('full-desc');
            const toggleBtn = document.getElementById('desc-toggle');

            if (shortDesc.style.display === 'none') {
                shortDesc.style.display = 'inline';
                fullDesc.style.display = 'none';
                toggleBtn.innerHTML = 'Ver más';
            } else {
                shortDesc.style.display = 'none';
                fullDesc.style.display = 'inline';
                toggleBtn.innerHTML = 'Ver menos';
            }
        }
    </script>
    <script>
        const lat = {{ $listing->lat }};
        const lng = {{ $listing->lng }};

        let map = L.map('map').setView([lat, lng], 15);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let title = '{{ $listing->listing_title }}';
        let images = '{{ $listing->images }}'.split('|')[0];

        let circle = L.circle([lat, lng], {
            color: '#242B40',
            fillColor: '#242B40',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map);

        let popup = L.popup()
            .setLatLng([lat + 0.004, lng])
            .setContent(
                `<div class="text-center"> <b>Sector donde se encuentra la propiedad:</b> <br> <br> <span> ${title} </span> <br> <br> <img class='w-100' src='/uploads/listing/600/${images}' /></div>`
            )
            .addTo(map);
    </script>
@endsection