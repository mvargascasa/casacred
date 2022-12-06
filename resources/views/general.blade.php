@extends('layouts.web')
@section('header')
    <title>Propiedades de Venta en Ecuador</title>
    <meta name="description" content="Encuentre las mejores propiedades de Venta y Renta en Ecuador. Casa Crédito, un aliado suyo ✅">
    <meta name="keywords" content="casas en venta en ecuador">
    <style>
        .card{box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;}
        .card:hover{box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;}
    </style>
@endsection

@section('content')
    <section id="prisection" style="background: rgba(8, 8, 8, 0.319); background-size: cover;background-position: left center; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;">
        <div>
            <div class="row align-items-center d-flex justify-content-center text-center text-light" style="margin: 0; min-height: 450px;">
                <h1>
                    Casa Crédito Inmobiliaria
                </h1>
            </div>
        </div>
    </section>
    <div>
        <div class="container mb-5">
            @if(count($listingsc) > 0)
                <div class="row mt-5">
                    <h2 class="py-3">Cuenca</h2>
                    @foreach ($listingsc as $listingc)
                    @php $type = DB::table('listing_types')->select('type_title')->where('id', $listingc->listingtype)->first(); @endphp
                        <div class="col-sm-4">
                            <a href="{{route('web.detail', $listingc->slug)}}">
                                <div class="border card">
                                    <div class="position-relative">
                                        <img width="100%" src="{{asset('uploads/listing/600/'.strtok($listingc->images, '|'))}}" alt="IMG_{{$listingc->listing_title}}">
                                        <div class="position-absolute bg-danger text-light rounded px-2" style="top: 5px; left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                            {{$type->type_title}}
                                        </div>
                                    </div>
                                    <div class="my-2 mx-2">
                                        <p class="float-right font-weight-normal text-light rounded px-1" style="background-color: #FEBB19; font-size: 13px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">COD: {{$listingc->product_code}}</p>
                                        <p><i class="fas fa-tag"></i> {{strtoupper($listingc->listingtypestatus)}}</p>
                                        <p><i class="fas fa-map-marker-alt text-danger"></i> @if(str_contains($listingc->address, ",")){{$listingc->address}} @else {{$listingc->state.", ".$listingc->city.", ".$listingc->address}}@endif</p>
                                        <p class="font-weight-normal">{{$listingc->listing_title}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        <a class="btn btn-small float-right text-light" style="background-color: #FEBB19" href="{{route('web.propiedades', 'casas-en-venta-en-cuenca')}}">Ver más propiedades <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            @endif
            @if(count($listingsq)>0)
                <div class="row mt-5">
                    <h2>Quito</h2>
                    @foreach ($listingsq as $listingq)
                    @php $type = DB::table('listing_types')->select('type_title')->where('id', $listingq->listingtype)->first(); @endphp
                        <div class="col-sm-4">
                            <a href="{{route('web.detail', $listingq->slug)}}">
                                <div class="border card">
                                    <div class="position-relative">
                                        <img width="100%" src="{{asset('uploads/listing/600/'.strtok($listingq->images, '|'))}}" alt="IMG_{{$listingq->listing_title}}">
                                        <div class="position-absolute bg-danger text-light rounded px-2" style="top: 5px; left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                            {{$type->type_title}}
                                        </div>
                                    </div>
                                    <div class="my-2 mx-2">
                                        <p><i class="fas fa-tag"></i> {{strtoupper($listingq->listingtypestatus)}}</p>
                                        <p class="float-right font-weight-normal text-light rounded px-1" style="background-color: #FEBB19; font-size: 13px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">COD: {{$listingq->product_code}}</p>
                                        <p><i class="fas fa-map-marker-alt text-danger"></i> @if(str_contains($listingq->address, ",")){{$listingq->address}} @else {{$listingq->state.", ".$listingq->city.", ".$listingq->address}}@endif</p>
                                        <p class="font-weight-normal">{{$listingq->listing_title}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        <a class="btn btn-small float-right text-light" style="background-color: #FEBB19" href="{{route('web.propiedades', 'casas-en-venta-en-quito')}}">Ver más propiedades <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            @endif
            @if(count($listingsg)>0)
                <div class="row mt-5">
                    <h2>Guayaquil</h2>
                    @foreach ($listingsg as $listingg)
                        @php $type = DB::table('listing_types')->select('type_title')->where('id', $listingg->listingtype)->first(); @endphp
                        <div class="col-sm-4">
                            <a href="{{route('web.detail', $listingg->slug)}}">
                                <div class="border card">
                                    <div class="position-relative">
                                        <img width="100%" src="{{asset('uploads/listing/600/'.strtok($listingg->images, '|'))}}" alt="IMG_{{$listingg->listing_title}}">
                                        <div class="position-absolute bg-danger text-light rounded px-2" style="top: 5px; left: 5px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                                            {{$type->type_title}}
                                        </div>
                                    </div>
                                    <div class="my-2 mx-2">
                                        <p><i class="fas fa-tag"></i> {{strtoupper($listingg->listingtypestatus)}}</p>
                                        <p class="float-right font-weight-normal text-light rounded px-1" style="background-color: #FEBB19; font-size: 13px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">COD: {{$listingg->product_code}}</p>
                                        <p><i class="fas fa-map-marker-alt text-danger"></i> @if(str_contains($listingg->address, ",")){{$listingq->address}} @else {{$listingg->state.", ".$listingg->city.", ".$listingg->address}}@endif</p>
                                        <p class="font-weight-normal">{{$listingg->listing_title}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    <div class="mt-4">
                        <a class="btn btn-small float-right text-light" style="background-color: #FEBB19" href="{{route('web.propiedades', 'casas-en-venta-en-guayaquil')}}">Ver más propiedades <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url({{asset('img/imgheader2.jpg')}})";
        });
    </script>
@endsection