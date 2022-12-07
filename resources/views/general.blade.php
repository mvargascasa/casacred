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
    <section id="prisection" style="background: rgba(8, 8, 8, 0.319); background-size: cover;background-position: center center; width: 100%; background-repeat: no-repeat; background-blend-mode: darken;">
        <div>
            <div class="row align-items-center d-flex justify-content-center text-center text-light" style="margin: 0; min-height: @if($ismobile) 250px; @else 450px; @endif">
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
                    <h2 class="py-3">Propiedades en Cuenca</h2>
                    <hr>
                    @foreach ($listingsc as $listingc)
                    @php $type = DB::table('listing_types')->select('type_title')->where('id', $listingc->listingtype)->first(); @endphp
                        <div class="col-sm-4 my-1">
                            <a href="{{route('web.detail', $listingc->slug)}}">
                                <div class="border card h-100">
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
                    <h2 class="py-3">Propiedades en Quito</h2>
                    <hr>
                    @foreach ($listingsq as $listingq)
                    @php $type = DB::table('listing_types')->select('type_title')->where('id', $listingq->listingtype)->first(); @endphp
                        <div class="col-sm-4 my-1">
                            <a href="{{route('web.detail', $listingq->slug)}}">
                                <div class="border card h-100">
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
                    <h2 class="py-3">Propiedades en Guayaquil</h2>
                    <hr>
                    @foreach ($listingsg as $listingg)
                        @php $type = DB::table('listing_types')->select('type_title')->where('id', $listingg->listingtype)->first(); @endphp
                        <div class="col-sm-4 my-1">
                            <a href="{{route('web.detail', $listingg->slug)}}">
                                <div class="border card h-100">
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

        <div class="mt-5 pt-5 pb-5" style="background-color: #ffffff">
            <h2 class="text-center">¿Necesita una propiedad en otra ubicación?</h2>
            <div class="row @if($ismobile) mx-1 @else mx-5 px-5 @endif mt-3 mb-4">
                <div class="col-6 col-sm-3">
                    <label for="state" class="mb-2 mt-2 text-muted"><i class="fas fa-map-marked-alt"></i> Provincia</label><br>
                    <select name="" id="bform_province" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($states as $state)
                            <option class="option" value="{{$state->name}}" data-id="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-sm-3">
                    <label for="city" class="mb-2 mt-2 text-muted"><i class="fas fa-map-marker-alt"></i> Ciudad</label><br>
                    <select name="" id="bform_city" class="form-select">
                        <option value="">Seleccione</option>
                    </select>
                </div>
                <div class="col-6 col-sm-3">
                    <label for="type" class="mb-2 mt-2 text-muted"><i class="fas fa-home"></i> Tipo de Propiedad</label><br>
                    <select name="" id="bform_type" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->type_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 col-sm-3">
                    <label for="category" class="mb-2 mt-2 text-muted"><i class="fas fa-tasks-alt"></i> Categoría</label><br>
                    <select name="" id="bform_cat" class="form-select">
                        <option value="">Seleccione</option>
                        <option value="venta">Venta</option>
                        <option value="alquiler">Alquiler</option>
                        <option value="proyectos">Proyectos</option>
                    </select>
                </div>
            </div>
            <div class="mt-3 text-center">
                <button onclick="search()" class="btn btn-danger"><i class="far fa-search"></i> Buscar</button>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        window.addEventListener('load', (event) => {
            document.getElementById('prisection').style.backgroundImage = "url({{asset('img/imgheader2.jpg')}})";
        });

        const selState  = document.getElementById('bform_province');
        const selCities = document.getElementById('bform_city');

        selState.addEventListener("change", async function() {
            selCities.options.length = 0;
            let id = selState.options[selState.selectedIndex].dataset.id;
            const response = await fetch("{{url('getcities')}}/"+id );
            const cities = await response.json();
            
            var opt = document.createElement('option');
                opt.appendChild( document.createTextNode('Seleccione') );
                opt.value = '';
                selCities.appendChild(opt);
            cities.forEach(city => {
                var opt = document.createElement('option');
                opt.appendChild( document.createTextNode(city.name) );
                opt.value = city.name;
                selCities.appendChild(opt);
            });
        });

        function search(){
            let state = document.getElementById('bform_province').value;
            let city = document.getElementById('bform_city').value;
            let type = document.getElementById('bform_type').value;
            let category = document.getElementById('bform_cat').value;
            if(state == "" || city == "" || type == "" || category == ""){
                alert('Seleccione los elementos de la lista');
            } else {
                type_title = getlistingtype(type);
                slug = type_title + "-en-" + category + "-en-" + city.toLowerCase();
                url = "{{route('web.propiedades', [':slug'])}}";
                url = url.replace(':slug', slug);
                window.location.href = url;
                //console.log(slug.toLowerCase());
            }
        }

        function getlistingtype(type){
            let type_title="";
            switch (type) {
                case "23": type_title = "casas"; break;
                case "24": type_title = "departamentos"; break;
                case "25": type_title = "casas-comerciales"; break;
                case "26": type_title = "terrenos"; break;
                case "29": type_title = "quintas"; break;
                case "30": type_title = "haciendas"; break;
                case "32": type_title = "locales-comerciales"; break;
                case "35": type_title = "oficinas"; break;
                case "36": type_title = "suites"; break;
                default:
                    break;
            }
            return type_title;
        }
    </script>
@endsection