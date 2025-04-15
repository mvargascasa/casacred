@extends('layouts.web')
@section('header')
    <title>Grupo Housing - Propiedades en Venta en Ecuador</title>
    <meta name="description"
        content="@if (request()->segment(2) != null) En Grupo Housing contamos con {{ ucwords(str_replace('-', ' ', request()->segment(2))) }}. Accede a nuestro Sitio Web y encuentra la propiedad que estás buscando. @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endif">
    <meta name="keywords"
        content="">

    <link rel="canonical" href="">

    <meta name="robots" content="index,follow,snippet">

    <meta property="og:url"                content="https://grupohousing.com/propiedades-en-general" />
    <meta property="og:type"               content="website" />
    <meta property="og:title"              content="@isset($meta_seo){{ ucfirst(str_replace('-', ' ', $meta_seo)) }} - Grupo Housing @else Grupo Housing Encuentra la casa de tus sueños. @endisset" />
    <meta property="og:description"
        content="@isset($meta_seo)En Grupo Housing Contamos con {{ ucfirst(str_replace('-', ' ', $meta_seo)) }}. Accede a nuestro sitio web y encuentra la propiedad que estás buscando. @else Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos! @endisset" />
    <meta property="og:image" content="{{ asset('img/meta-image-social-cc.jpg') }}" />
    <style>
        .search-bar-container {
            position: -webkit-sticky;
            /* Soporte para Safari */
            position: sticky;
            top: 0;
            /* Se pegará a 0px del top del viewport */
            z-index: 1050;
            /* Estilo opcional */
            width: 100%;
            /* Se extiende a lo ancho del contenedor */
        }


        .search-bar {
            position: sticky;
            z-index: 1050;
            border: 1px solid #e0e0e0;
            /* Color más suave para el borde */
            border-radius: 12px;
            background-color: #ffffff;
            /* Blanco para mantener la uniformidad */
            padding: 20px;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Sutil sombra para dar profundidad */
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            /* Color suave para el borde del input */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.06);
            /* Sutil sombra interna */
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
            /* Resaltado cuando el input está en foco */
        }

        .dropdown-menu {
            border: 0;
            /* Eliminación del borde en los dropdown */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Sombra para los dropdown para consistencia */
        }

        .btn-light {
            background-color: #ffffff;
            color: #333;
            /* Añadiendo color al texto para mejor contraste */
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            /* Cambio sutil al hacer hover */
        }

        @media (max-width: 768px) {

            .form-control,
            .dropdown-toggle {
                font-size: 14px;
                /* Tamaño de letra más manejable en dispositivos pequeños */
            }
        }

        .container-fluid {
            padding: 0;
            /* Eliminación del padding para más control en el diseño */
        }

        .mx-auto {
            margin-right: auto;
            margin-left: auto;
        }

        @media (max-width: 768px) {
            .btn-fixed {
                position: fixed;
                bottom: 10px;
                left: 10px;
                z-index: 1000;
                /* Mantenimiento del botón flotante en móviles */
            }
        }

        .btn-primary {
            background-color: #242B40 !important;
            /* Color de fondo */
            border-color: #242B40 !important;
            /* Color del borde */
            color: #ffffff !important;
            /* Color del texto */
        }

        .btn-primary:hover {
            background-color: #1a1f33 !important;
            /* Color de fondo al pasar el mouse */
            border-color: #161a28 !important;
            /* Color del borde al pasar el mouse */
        }

        @media screen and (max-width: 580px) {
            .redes {
                display: none !important
            }

            .text-title {
                position: relative !important;
                height: auto !important
            }

            .search {
                display: inline-block !important;
            }

            .rounded-search-mobile {
                border: 1px solid rgb(195, 195, 195) !important;
                border-radius: 5% !important;
                padding: 10px 20px 10px 20px !important
            }

            .slash {
                display: none !important
            }

            .section-search {
                padding-left: 5% !important;
                padding-right: 5% !important
            }

            .margin-bottom-mobile {
                margin-bottom: 9px !important
            }

            .border-tabs-mobile {
                border-radius: 25px !important;
                border: .5px solid rgb(202, 202, 202) !important;
                box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
            }

            .btn-search-mobile {
                text-align: center !important;
                margin-top: 20px !important
            }

            .label-filter {
                display: block !important
            }

            .img-filters {
                display: inline-block !important
            }

            .logo-housing {
                width: 250px;
            }

            .title {
                font-size: 35px !important;
                line-height: 45px !important;
            }

            .filters {
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
                display: inline !important;
                width: 100% !important;
                margin-left: 5% !important;
                margin-right: 5% !important;
            }

            .filters>select,
            .filters>input,
            .filters>button {
                width: 100% !important;
                margin-top: 2% !important;
                margin-bottom: 2% !important;
            }

            .padding-mobile-0 {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

            .characteristics {
                display: block !important;
                text-align: center !important;
            }

            .characteristics>p {
                padding-top: 0px !important;
            }

            .image_thumbnail {
                height: 250px !important;
            }

            .card-body {
                padding-top: 50px !important;
            }

            .card-body>a>h2 {
                padding-right: 0px !important;
            }
        }

        .border-end {
            border-right: 1px solid #dee2e6 !important;
        }

        .border-end-0 {
            border-right: 0 !important;
        }

        .carousel-image {
            object-fit: cover;
            width: 100%;
        }

        .property-item {
            transition: transform 0.3s ease;
        }

        .property-item:hover {
            transform: scale(1.05);
        }

        .btn-outline-primary {
            color: #242B40;
            border-color: #242B40;
        }

        .btn-outline-primary:hover {
            color: #ffffff;
            border-color: #242B40;
            background-color: #242B40;
        }

        .switch-container {
            display: inline-block;
            position: relative;
        }

        .switch-input {
            display: none;
        }

        .switch-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 60px;
            height: 30px;
            background-color: #ccc;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .switch-input:checked+.switch-label {
            background-color: #007bff;
        }

        .switch-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        #dynamic_content h3{
            font-size: 18px;
            font-weight: 200;
        }

        .switch-input:checked+.switch-label .switch-icon:first-child {
            transform: translateX(30px);
        }

        .switch-input:checked+.switch-label .switch-icon:last-child {
            transform: translateX(-30px);
        }

        @media (max-width: 767.98px) {
            .switch-container {
                display: none;
            }
        }
    </style>
@endsection

@section('content')
    <section class="container">
        <section class="p-5">
            <p style="font-family: 'Sharp Grotesk'" class="text-center display-6 fw-bold"><span
                    style="font-weight: 100">Prueba nuestro</span> <span style="font-weight: 500">buscador avanzado</span>
            </p>
        </section>
    </section>

    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h1 style="font-family: 'Sharp Grotesk'; text-align: left;" class="h3 fw-bold">
                <span style="font-weight: 500">Total</span>
                <span style="font-weight: 100"> propiedades</span>
            </h1>
            <p id="description_banner"></p>
        </div>
        <div class="switch-container">
            <input type="checkbox" id="toggleViewBtn" class="switch-input">
            <label for="toggleViewBtn" class="switch-label">
                <span class="switch-icon"><i id="toggleIcon" class="fas fa-th-large"></i></span>
                <span class="switch-icon"><i id="toggleIcon" class="fas fa-bars"></i></span>
            </label>
        </div>
    </div>


    <section class="container-fluid text-center search-bar-container">
        <!-- Contenido para desktop -->
        <div class="container d-none d-md-block mx-auto">
            <div class="card search-bar">
                <form id="searchFormDesktop" class="row g-2 align-items-center justify-content-center">
                    <div class="col-3">
                        <input type="text" id="searchTerm" class="form-control form-control-sm"
                            placeholder="Buscar por ubicación, tipo de propiedad, codígo">
                    </div>
                    <div class="col-auto">
                        <select class="form-control form-control-sm" id="propertyType">
                            <option value="">Tipo de Propiedad</option>
                            <option data-ids="[23,1]" value="1">Casas</option>
                            <option data-ids="[24,3]" value="2">Departamentos</option>
                            <option data-ids="[25,5]" value="3">Casas Comerciales</option>
                            <option data-ids="[32,6]" value="4">Locales Comerciales</option>
                            <option data-ids="[35,7]" value="5">Oficinas</option>
                            <option data-ids="[36,8]" value="6">Suites</option>
                            <option data-ids="[29,9]" value="7">Quintas</option>
                            <option data-ids="[30,30]" value="8">Haciendas</option>
                            <option data-ids="[26,10]" value="8">Terrenos</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select class="form-control form-control-sm" id="propertyStatus">
                            <option data-ids="general" value="general">Todas</option>
                            <option data-ids="venta" value="venta">Venta</option>
                            <option data-ids="renta" value="renta">Renta</option>
                            <option data-ids="proyectos" value="proyectos">Proyectos</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="locationInput"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ubicación
                        </button>
                        <div class="dropdown-menu p-2" aria-labelledby="locationInput">
                            <input type="text" id="sector" class="form-control mb-2 form-control-sm" placeholder="Sector">
                            <input type="text" id="city" class="form-control mb-2 form-control-sm" placeholder="Ciudad">
                            <input type="text" id="state" class="form-control form-control-sm" placeholder="Provincia">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="priceInput"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Precio
                        </button>
                        <div class="dropdown-menu p-2" aria-labelledby="priceInput">
                            <input type="number" id="minPrice" class="form-control mb-2 form-control-sm"
                                placeholder="Mínimo">
                            <input type="number" id="maxPrice" class="form-control form-control-sm" placeholder="Máximo">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="featuresInput"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Características
                        </button>
                        <div class="dropdown-menu p-2" aria-labelledby="featuresInput">
                            <input type="number" id="bedrooms" class="form-control mb-2 form-control-sm"
                                placeholder="Hab.">
                            <input type="number" id="bathrooms" class="form-control mb-2 form-control-sm" placeholder="Baños">
                            <input type="number" id="garage" class="form-control form-control-sm" placeholder="Garajes">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="clearSearch(false)">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="container-fluid text-center">
        <!-- Botón para abrir modal en dispositivos móviles -->
        <div class="d-md-none mt-3">
            <button class="btn btn-primary btn-fixed" type="button" data-bs-toggle="modal"
                data-bs-target="#filtersModal">
                Abrir Filtros
            </button>
        </div>

        <!-- Modal para los filtros -->
        <div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="filtersModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title h5" id="filtersModalLabel">Filtros de Búsqueda</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="searchFormModal" class="row g-3 align-items-end">
                            <div class="col-12">
                                <input type="text" id="searchTermModal" class="form-control" placeholder="Buscar...">
                            </div>
                            <div class="col-auto dropdown">
                                <select class="form-control" id="propertyTypeModal">
                                    <option value="">Tipo de Propiedad</option>
                                    <option data-ids="[23,1]" value="1">Casas</option>
                                    <option data-ids="[24,3]" value="2">Departamentos</option>
                                    <option data-ids="[25,5]" value="3">Casas Comerciales</option>
                                    <option data-ids="[32,6]" value="4">Locales Comerciales</option>
                                    <option data-ids="[35,7]" value="5">Oficinas</option>
                                    <option data-ids="[36,8]" value="6">Suites</option>
                                    <option data-ids="[29,9]" value="7">Quintas</option>
                                    <option data-ids="[30,30]" value="8">Haciendas</option>
                                    <option data-ids="[26,10]" value="8">Terrenos</option>
                                </select>
                            </div>
                            <div class="col-auto dropdown">
                                <select class="form-control" id="propertyStatusModal">
                                    <option data-ids="general" value="general">Todas</option>
                                    <option data-ids="venta" value="venta">Venta</option>
                                    <option data-ids="renta" value="renta">Renta</option>
                                    <option data-ids="proyectos" value="proyectos">Proyectos</option>
                                </select>
                            </div>
                            <div class="col-auto dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="locationInputModal"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Ubicación
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="locationInputModal">
                                    <input type="text" id="sectorModal" class="form-control" placeholder="Sector">
                                    <input type="text" id="cityModal" class="form-control mb-2" placeholder="Ciudad">
                                    <input type="text" id="stateModal" class="form-control mb-2"
                                        placeholder="Provincia">
                                </div>
                            </div>
                            <div class="col-auto dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="priceInputModal"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Precio
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="priceInputModal">
                                    <input type="number" id="minPriceModal" class="form-control mb-2"
                                        placeholder="Precio mínimo">
                                    <input type="number" id="maxPriceModal" class="form-control"
                                        placeholder="Precio máximo">
                                </div>
                            </div>
                            <div class="col-auto dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="featuresInputModal"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Características
                                </button>
                                <div class="dropdown-menu p-2" aria-labelledby="featuresInputModal">
                                    <input type="number" id="bedroomsModal" class="form-control mb-2"
                                        placeholder="Habitaciones">
                                    <input type="number" id="bathroomsModal" class="form-control mb-2"
                                        placeholder="Baños">
                                    <input type="number" id="garageModal" class="form-control" placeholder="Garajes">
                                </div>
                            </div>

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="clearSearch(true)">Limpiar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5" id="propertiesContainer">
        <section class="row">
            <section class="col-sm-12">
                <section class="row justify-content-center" id="propertiesList">
                    <!-- Los resultados de la búsqueda se insertarán aquí -->
                </section>
            </section>
        </section>
        <div class="row justify-content-center">
            <div id="pagination" class="mt-4"></div>
        </div>

        <div id="dynamic_content" class="row justify-content-center align-items-center mb-4">

        </div>

    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        var typeIdsArray = [];
        var typeIdsArrayModal = [];
        let useCardView = false;
        let pagegobal = 1;
        document.getElementById('toggleViewBtn').addEventListener('change', function() {
            useCardView = this.checked;
            searchProperties(pagegobal, false); // Recargar las propiedades con la nueva vista
        });
        document.addEventListener('DOMContentLoaded', function() {
            if (window.innerWidth <= 767) {
                document.getElementById('toggleViewBtn').checked = true;
                useCardView = true;
            }
            // Valores iniciales recibidos del servidor
            const initialState = '{{ $state ?? '' }}';
            const initialStatus = '{{ $status ?? '' }}';
            const initialCity = '{{ $city ?? '' }}';
            const initialParish = '{{ $parish ?? '' }}';
            const initialTypeIds = JSON.parse('{{ json_encode($typeId) }}' || '[]');
            const searchTerm = new URLSearchParams(window.location.search).get('searchTerm') || '';

            // Configuración inicial para el formulario de desktop
            if (initialState) document.getElementById('state').value = initialState;
            if (initialCity) document.getElementById('city').value = initialCity;
            if (initialParish) document.getElementById('sector').value = initialParish;
            if (searchTerm) document.getElementById('searchTerm').value = searchTerm;
            setInitialPropertyType(initialTypeIds, 'propertyType');
            setInitialPropertyStatus(initialStatus, 'propertyStatus');

            // Configuración inicial para el formulario modal
            if (initialState) document.getElementById('stateModal').value = initialState;
            if (initialCity) document.getElementById('cityModal').value = initialCity;
            if (initialParish) document.getElementById('sectorModal').value = initialParish;
            if (searchTerm) document.getElementById('searchTermModal').value = searchTerm;
            setInitialPropertyType(initialTypeIds, 'propertyTypeModal');
            setInitialPropertyStatus(initialStatus, 'propertyStatusModal');

            // Simular el clic en el botón de búsqueda en ambos formularios
            document.querySelector('#searchFormDesktop button[type="submit"]').click();
            document.querySelector('#searchFormModal button[type="submit"]').click();
        });

        function setInitialPropertyType(typeIds, propertyTypeId) {
            const selectElement = document.getElementById(propertyTypeId);
            const options = selectElement.options;
            for (let i = 0; i < options.length; i++) {
                if (options[i].getAttribute('data-ids') === JSON.stringify(typeIds)) {
                    options[i].selected = true;

                    // Actualiza el array de IDs basado en si es modal o no
                    if (propertyTypeId === 'propertyType') {
                        typeIdsArray = typeIds; // Actualiza para desktop
                    } else if (propertyTypeId === 'propertyTypeModal') {
                        typeIdsArrayModal = typeIds; // Actualiza para modal
                    }

                    // Disparar manualmente el evento de cambio para asegurar que cualquier lógica adicional se ejecute
                    const event = new Event('change');
                    selectElement.dispatchEvent(event);
                    break;
                }
            }
        }

        function setInitialPropertyStatus(initialStatus, propertyStatusId) {
            const selectElement = document.getElementById(propertyStatusId);
            const options = selectElement.options;
            for (let option of options) {
                if (option.value === initialStatus) {
                    option.selected = true;
                    // Trigger change event to handle any additional logic
                    selectElement.dispatchEvent(new Event('change'));
                    break;
                }
            }
        }

        // Evento para capturar los IDs del formulario desktop
        document.getElementById('propertyType').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var typeIds = selectedOption.getAttribute('data-ids');
            typeIdsArray = JSON.parse(typeIds);
        });

        // Evento para capturar los IDs del formulario modal
        document.getElementById('propertyTypeModal').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var typeIds = selectedOption.getAttribute('data-ids');
            typeIdsArrayModal = JSON.parse(typeIds);
        });

        document.getElementById('propertyStatus').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var statusselect = selectedOption.getAttribute('data-ids');
            status = statusselect;
        });
        document.getElementById('propertyStatusModal').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var statusselect = selectedOption.getAttribute('data-ids');
            status = statusselect;
        });




        window.searchProperties = function(page = 1, isModal = false) {

            

            page = parseInt(page);
            var currentTypeIds = isModal ? typeIdsArrayModal : typeIdsArray;
            var selectElement = isModal ? document.getElementById('propertyTypeModal') : document.getElementById(
                'propertyType');
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var typeName = selectedOption.text;
            var typeValue = selectedOption.value;


            var statusElement = isModal ? document.getElementById('propertyStatusModal') : document.getElementById(
                'propertyStatus');
            var statusValue = statusElement.value; // "venta", "renta", o "proyectos"
            var statusText = statusElement.options[statusElement.selectedIndex].text;

            // Asegúrate de que el tipo tiene un valor significativo, y no es simplemente el marcador de posición
            if (!typeValue) {
                typeName = 'propiedades';
            } else {
                typeName = typeName.toLowerCase().replace(/\s+/g, '-');
            }

            const searchParams = new URLSearchParams({
                searchTerm: document.getElementById(isModal ? 'searchTermModal' : 'searchTerm') ? document
                    .getElementById(isModal ? 'searchTermModal' : 'searchTerm').value : '',
                bedrooms: document.getElementById(isModal ? 'bedroomsModal' : 'bedrooms') ? document
                    .getElementById(isModal ? 'bedroomsModal' : 'bedrooms').value : '',
                bathrooms: document.getElementById(isModal ? 'bathroomsModal' : 'bathrooms') ? document
                    .getElementById(isModal ? 'bathroomsModal' : 'bathrooms').value : '',
                garage: document.getElementById(isModal ? 'garageModal' : 'garage') ? document.getElementById(
                    isModal ? 'garageModal' : 'garage').value : '',
                min_price: document.getElementById(isModal ? 'minPriceModal' : 'minPrice') ? document
                    .getElementById(isModal ? 'minPriceModal' : 'minPrice').value : '',
                max_price: document.getElementById(isModal ? 'maxPriceModal' : 'maxPrice') ? document
                    .getElementById(isModal ? 'maxPriceModal' : 'maxPrice').value : '',
                city: document.getElementById(isModal ? 'cityModal' : 'city') ? document.getElementById(
                    isModal ? 'cityModal' : 'city').value : '',
                state: document.getElementById(isModal ? 'stateModal' : 'state') ? document.getElementById(
                    isModal ? 'stateModal' : 'state').value : '',
                sector: document.getElementById(isModal ? 'sectorModal' : 'sector') ? document.getElementById(
                    isModal ? 'sectorModal' : 'sector').value : '',
                page: page,
                normalized_status: document.getElementById(isModal ? 'propertyStatusModal' : 'propertyStatus') ?
                    document.getElementById(
                        isModal ? 'propertyStatusModal' : 'propertyStatus').value : ''
            });

            let urlSlug = `/${typeName}`;
            if (statusValue) {
                urlSlug += `-en-${statusValue}`;
            }

            console.log('typeName: ' + typeName, 'statusValue: ' + statusValue);

            let titleComponents = [typeName.charAt(0).toUpperCase() + typeName.slice(1)];
            if (searchParams.get('sector')) {
                urlSlug += `-en-${searchParams.get('sector').toLowerCase().replace(/\s+/g, '-')}`;
                titleComponents.push(searchParams.get('sector'));
            }
            if (searchParams.get('state')) {
                urlSlug += `-en-${searchParams.get('state').toLowerCase().replace(/\s+/g, '-')}`;
                titleComponents.push(searchParams.get('state'));
            }
            if (searchParams.get('city')) {
                urlSlug += `-en-${searchParams.get('city').toLowerCase().replace(/\s+/g, '-')}`;
                titleComponents.push(searchParams.get('city'));
            }

            document.title = `${titleComponents.join(' en ')} - ${statusText}`;

            // Agregar manualmente los `type_ids[]` asegurando el formato correcto
            let queryString = searchParams.toString();
            currentTypeIds.forEach(id => {
                queryString += `&type_ids[]=${encodeURIComponent(id)}`;
            });

            let canonical = document.querySelector("link[rel='canonical']");

            window.history.pushState({
                path: urlSlug
            }, '', urlSlug);

            generateDynamicContent(typeName, statusValue, searchParams.get('city'));

            canonical.href = urlSlug;

            axios.get('/api/propertys/list?' + queryString)
                .then(function(response) {
                    const properties = response.data.properties;
                    let html = '';
                    if (properties.length > 0) {
                        properties.forEach((property, index) => {
                            let imageUrl = getImageUrl(property);
                            html += useCardView ? buildCardPropertyHTML(property, index) :
                                buildHorizontalPropertyHTML(property, index);
                        });
                        updateDynamicTitle(response.data.pagination.total, searchParams, isModal);
                    } else {
                        html =
                            '<section class="row"><p class="text-center fw-bold">No hemos encontrado propiedades</p></section>';
                        updateDynamicTitle(response.data.pagination.total, searchParams, isModal);
                    }
                    document.getElementById('propertiesList').innerHTML = html;
                    updatePagination(response.data.pagination, isModal);
                })
                .catch(function(error) {
                    console.error('Error en la búsqueda:', error.response ? error.response.data :
                        'Error desconocido');

                    document.getElementById('propertiesList').innerHTML =
                        '<section class="row"><p class="text-center fw-bold">Error al cargar propiedades.</p></section>';
                });
        };

        function updateDynamicTitle(total, searchParams, isModal) {
            const typeElement = document.getElementById(isModal ? 'propertyTypeModal' : 'propertyType');
            const selectedTypeIndex = typeElement.selectedIndex;
            const typeName = typeElement.options[selectedTypeIndex].text;
            const state = searchParams.get('state');
            const city = searchParams.get('city');
            const sector = searchParams.get('sector');

            let titleSuffix = `propiedades`;
            if (selectedTypeIndex !== 0 && typeName.toLowerCase() !== "tipo de propiedad") {
                titleSuffix = `${typeName.toLowerCase()}`;
            }

            if (searchParams.get('normalized_status')) {
                titleSuffix += ` en ${searchParams.get('normalized_status')}`;
            } else {
                titleSuffix += ` en general`;
            }

            let locationDetails = [];
            if (sector) locationDetails.push(sector);
            if (city) locationDetails.push(city);
            if (state) locationDetails.push(state);
            if (locationDetails.length) {
                titleSuffix += ` en ${locationDetails.join(", ")}`;
            }

            let metaDescripcion = document.querySelector('meta[name="description"]');
            let keywords = document.querySelector('meta[name="keywords"]')
            let description_banner = document.getElementById('description_banner');
            
            if (metaDescripcion) {
                
                let contentMetaDescription = "";
                let contentBannerDescription = "";

                if(total < 1){
                    contentMetaDescription = 'Encuentre la casa de sus sueños, donde los sueños se hacen realidad 😉 Contamos con una gran variedad de propiedades disponibles ¡Contáctenos!';
                    contentBannerDescription = 'Descubre todas las propiedades en venta y renta que Grupo Housing tiene para ti';
                } else{
                    contentMetaDescription = `Encontramos ${total} ${strTitle(titleSuffix)} disponibles. ¡Solicita ahora una visita y descubre tu opción ideal! Clic aquí para más información`;
                    contentBannerDescription = `Hemos encontrado ${total} ${replaceFirstEnWithDe(titleSuffix)} disponibles.`;
                }
                
                // Cambia el atributo content de la meta descripción
                metaDescripcion.setAttribute('content', contentMetaDescription);
                keywords.setAttribute('content', titleSuffix);
                description_banner.innerHTML = contentBannerDescription;
            }

            let titleComponents = `${total} ${titleSuffix} en Ecuador - Grupo Housing`;
            document.title = `${titleComponents}`;
            document.querySelector('h1').innerHTML =
                `<span style="font-weight: 500">${total}</span><span style="font-weight: 100"> ${titleSuffix}</span>`;        
        }

        function getImageUrl(property) {
            const imageList = property.images.split('|');
            if (imageList.length > 0 && imageList[0]) {
                return `/uploads/listing/${imageList[0]}`;
            }
        }

        function replaceFirstEnWithDe(titleSuffix) {
            return titleSuffix.replace(/\ben\b/i, 'de');
        }

        function updatePagination(pagination, isModal) {
            let paginationHtml =
                '<nav aria-label="Page navigation" class="pagination-nav"><ul class="pagination justify-content-center">';
            // Botón anterior con icono
            if (pagination.prev_page_url) {
                paginationHtml +=
                    `<li class="page-item"><button class="page-link" style="border: 1px solid #242B40; border-radius: 50%; color: #242B40; width: 36px; height: 36px; padding: 0 12px; display: flex; align-items: center; justify-content: center;" onclick="searchProperties(${pagination.current_page - 1}, ${isModal})"><i class="fas fa-angle-left"></i></button></li>`;
            } else {
                paginationHtml +=
                    '<li class="page-item disabled"><span class="page-link" style="border: 1px solid #242B40; border-radius: 50%; color: #242B40; width: 36px; height: 36px; padding: 0 12px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-angle-left"></i></span></li>';
            }

            // Calcular rangos de páginas para paginación deslizante
            let startPage = Math.max(1, pagination.current_page - 2);
            let endPage = Math.min(pagination.current_page + 2, pagination.last_page);
            for (let i = startPage; i <= endPage; i++) {
                const activeClass = pagination.current_page === i ? 'active' : '';
                const activeStyle = activeClass ?
                    'background-color: #242B40; color: white; border: 1px solid #242B40; border-radius: 50%; width: 36px; height: 36px; padding: 0 12px; display: flex; align-items: center; justify-content: center;' :
                    'border: 1px solid #242B40; color: #242B40; border-radius: 50%; width: 36px; height: 36px; padding: 0 12px; display: flex; align-items: center; justify-content: center;';
                paginationHtml +=
                    `<li class="page-item ${activeClass}"><button class="page-link" style="${activeStyle}" onclick="searchProperties(${i}, ${isModal})">${i}</button></li>`;
            }

            // Botón siguiente con icono
            if (pagination.next_page_url) {
                paginationHtml +=
                    `<li class="page-item"><button class="page-link" style="border: 1px solid #242B40; border-radius: 50%; color: #242B40; width: 36px; height: 36px; padding: 0 12px; display: flex; align-items: center; justify-content: center;" onclick="searchProperties(${pagination.current_page + 1}, ${isModal})"><i class="fas fa-angle-right"></i></button></li>`;
            } else {
                paginationHtml +=
                    '<li class="page-item disabled"><span class="page-link" style="border: 1px solid #242B40; border-radius: 50%; color: #242B40; width: 36px; height: 36px; padding: 0 12px; display: flex; align-items: center; justify-content: center;"><i class="fas fa-angle-right"></i></span></li>';
            }
            paginationHtml += '</ul></nav>';
            document.getElementById('pagination').innerHTML = paginationHtml;

            pagegobal = pagination.current_page;
        }

        // Convertir los primeras letras de cada palabra en mayusculas para la metadescription
        function strTitle(cadena) {
            return cadena.split(' ').map(function(palabra) {
                return palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase();
            }).join(' ');
        }


        function buildHorizontalPropertyHTML(property, indexProperty) {
            let aliquotInfo = property.aliquot > 0 ?
                `<p class="card-text" style="font-family: 'Sharp Grotesk', sans-serif;"><strong>Alícuota:</strong> $${property.aliquot}</p>` :
                '';
            let phoneNumber = '593987595789'; // Número por defecto para venta
            let phoneNumberWhatsapp = '593987595789'; //Numero de venta que tiene whatsapp
            let transactionType = "venta";
            if (property.listingtypestatus.includes('rent') || property.listingtypestatus.includes('alquilar')) {
                phoneNumber = '593987595789'; // Cambiar si es renta
                transactionType = "alquiler";
            }

            let whatsappMessage = encodeURIComponent(
                `Hola, Grupo Housing estoy interesado en ${transactionType === "venta" ? "comprar" : "rentar"} esta propiedad: ${property.product_code}`
            );

            let images = property.images.split('|');
            let carouselIndicators = '';
            let carouselItems = '';

            images.forEach((image, index) => {
                let activeClass = index === 0 ? 'active' : '';
                carouselIndicators +=
                    `<li data-target="#carousel${property.id}" data-slide-to="${index}" class="${activeClass}"></li>`;
                carouselItems += `
                <div class="carousel-item ${activeClass}">
                    <img src="/uploads/listing/600/${image}" class="d-block w-100 carousel-image" style="height:330px" loading="lazy" alt="${property.listing_title} - img ${index+1}">
                </div>`;
            });
            let areaInfo = '';
            if (property.construction_area > 0) {
                areaInfo = `${property.construction_area} m<sup>2</sup>`;
            }
            let landArea = '';
            if (property.land_area > 0) {
                landArea = `${property.land_area} m<sup>2</sup>`;
            }
            let frontArea = '';
            if (property.Front > 0) {
                frontArea = `${property.Front} m<sup>2</sup>`;
            }
            let fundArea = '';
            if (property.Fund > 0) {
                fundArea = `${property.Fund} m<sup>2</sup>`;
            }

            let formattedDescription = property.listing_description ?
                property.listing_description.toLowerCase().replace(/(^\w{1})|(\.\s*\w{1})/g, letter => letter.toUpperCase())
                .substring(0, 120) + '...' :
                'Descripción no disponible.';

            let formattedPrice = new Intl.NumberFormat('es-EC', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(property.property_price);

            return `<article class="col-12 my-1 property-item" style="padding-left: 0px !important; padding-right: 0px !important;">
        <div class="card mb-3 rounded-0">
            <div class="row g-0 d-flex">
                <div class="col-md-4">
                    <a href="/propiedad/${property.slug}" style="text-decoration: none;">
                        <div id="carousel${property.id}" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                ${carouselItems}
                            </div>
                            <a class="carousel-control-prev" href="#carousel${property.id}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel${property.id}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </a>
                </div>
                <div class="col-md-8 px-5 py-3 padding-mobile-0 position-relative">
                    <div class="position-absolute" style="font-family: 'Sharp Grotesk', sans-serif;top: 0px; right: 0px; background-color: #242B40; color: #ffffff; border-radius: 0px 0px 0px 25px !important;">
                        <p class="m-0 py-3 px-3 h5">Cod: ${property.product_code}</p>
                    </div>
                    <div class="card-body">
                        <h2 class="h5 text-muted order-2" style="font-family: 'Sharp Grotesk', sans-serif; font-weight: 300;"><i class="fas fa-map-marker-alt"></i> ${property.sector ? ` ${property.sector},` : ''} ${property.city}, ${property.state}</h2>
                        <a href="/propiedad/${property.slug}" class="text-dark order-1" style="text-decoration: none;">
                            <h3 class="card-title" style="font-family: 'Sharp Grotesk', sans-serif; font-size: 1.4rem; padding-right: 60px; font-weight: 500;">${property.listing_title.charAt(0).toUpperCase() + property.listing_title.slice(1).toLowerCase()}</h3>
                        </a>
                        <p class="card-text" style="font-weight:500; font-size: 23px; font-family: 'Sharp Grotesk', sans-serif;">${formattedPrice}</p>
                        ${aliquotInfo}
                        <h4 class="h6" style="font-family: 'Sharp Grotesk', sans-serif; font-weight: 100;">${formattedDescription}</h4>
                        <hr>
                        <div class="row align-items-center">
                            <div class="col-sm-8 d-flex justify-content-around">
                                ${property.bedroom > 0 ? `<div class="d-flex align-items-center justify-content-center w-100 border-end characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/dormitorios.png') }}" alt="Icono dormitorios de propiedad ${property.product_code}">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${property.bedroom} Hab.</p>
                                                </div>
                                            </div>` : ''}
                                ${property.bathroom > 0 ? `<div class="d-flex align-items-center justify-content-center w-100 border-end characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/banio.png') }}" alt="Icono de baños de propiedad ${property.product_code}">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${property.bathroom} ${property.bathroom > 1 ? 'Baños' : 'Baño'}</p>
                                                </div>
                                            </div>` : ''}
                                ${property.garage > 0 ? `<div class="d-flex align-items-center justify-content-center w-100 border-end characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/estacionamiento.png') }}" alt="">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${property.garage} ${property.garage > 1 ? 'Garajes' : 'Garaje'}</p>
                                                </div>
                                            </div>` : ''}
                                ${areaInfo ? `<div class="d-flex align-items-center justify-content-center w-100 characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/area.png') }}" alt="">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${areaInfo}</p>
                                                </div>
                                            </div>` : ''}
                                ${landArea ? `<div class="d-flex align-items-center justify-content-center w-100 characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/area.png') }}" alt="">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${landArea}</p>
                                                </div>
                                            </div>` : ''}
                                ${frontArea ? `<div class="d-flex align-items-center justify-content-center w-100 characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/area.png') }}" alt="">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${frontArea}</p>
                                                </div>
                                            </div>` : ''}
                                ${fundArea ? `<div class="d-flex align-items-center justify-content-center w-100 characteristics">
                                                <div>
                                                    <img width="50px" height="50px" src="{{ asset('img/area.png') }}" alt="">
                                                    <p class="p-0 m-0" style="font-weight: 600; font-size: 15px">${fundArea}</p>
                                                </div>
                                            </div>` : ''}
                            </div>
                            <div class="col-sm-4 d-flex gap-3">
                                <div class="w-100 d-flex align-items-center">
                                <a href="tel:${phoneNumber}" class="btn btn-outline-primary rounded-pill w-100 d-flex align-items-center">
                                    <i class="fas fa-phone-alt me-2 mr-1"></i>Llamar
                                </a>
                            </div>
                            <div class="w-100 d-flex align-items-center ml-2">
                                <a href="https://wa.me/${phoneNumberWhatsapp}?text=${whatsappMessage}" class="btn btn-outline-success rounded-pill w-100 d-flex align-items-center">
                                    <i class="fab fa-whatsapp me-2 mr-1"></i> WhatsApp
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>`;
        }


        function buildCardPropertyHTML(property, indexProperty) {
            let aliquotInfo = property.aliquot > 0 ?
                `<p class="card-text" style="font-family: 'Sharp Grotesk', sans-serif;"><strong>Alícuota:</strong> $${property.aliquot}</p>` :
                '';

            let phoneNumber = '593987595789'; // Número por defecto para venta
            let phoneNumberWhatsapp = '593987595789';
            let transactionType = "venta";
            if (property.listingtypestatus.includes('rent') || property.listingtypestatus.includes('alquilar')) {
                phoneNumber = '593987595789'; // Cambiar si es renta
                transactionType = "alquiler";
            }

            let whatsappMessage = encodeURIComponent(
                `Hola, Grupo Housing estoy interesado en ${transactionType === "venta" ? "comprar" : "rentar"} esta propiedad: ${property.product_code}`
            );

            let images = property.images.split('|');
            let carouselIndicators = '';
            let carouselItems = '';

            images.forEach((image, index) => {
                let activeClass = index === 0 ? 'active' : '';
                carouselIndicators +=
                    `<li data-target="#carousel${property.id}" data-slide-to="${index}" class="${activeClass}"></li>`;
                carouselItems += `
            <div class="carousel-item ${activeClass}">
                <img src="/uploads/listing/600/${image}" class="d-block w-100 carousel-image" style="height:330px" loading="lazy">
            </div>`;
            });

            let areaInfo = '';
            if (property.construction_area > 0) {
                areaInfo = `${property.construction_area} m<sup>2</sup>`;
            } else if (property.land_area > 0) {
                areaInfo = `${property.land_area} m<sup>2</sup>`;
            }
            let formattedDescription = property.listing_description ?
                property.listing_description.toLowerCase().replace(/(^\w{1})|(\.\s*\w{1})/g, letter => letter.toUpperCase())
                .substring(0, 120) + '...' :
                'Descripción no disponible.';

            let formattedPrice = new Intl.NumberFormat('es-EC', {
                style: 'currency',
                currency: 'USD',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(property.property_price);
            
            return `
    <article class="col-12 col-md-4 mb-4 property-item">
        <div class="card h-100">
            <a href="/propiedad/${property.slug}" style="text-decoration: none;">
                <div id="carousel${property.id}" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        ${carouselItems}
                    </div>
                    <a class="carousel-control-prev" href="#carousel${property.id}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel${property.id}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </a>
            <div class="card-body flex-grow-1 d-flex flex-column">
                <div class="position-absolute" style="top: 0px; right: 0px; background-color: #242B40; color: #ffffff; border-radius: 0px 0px 0px 25px;">
                    <p class="m-0 py-2 px-2 h6" style="font-family: 'Sharp Grotesk', sans-serif;">Cod: ${property.product_code}</p>
                </div>
                <h2 class="h6" style="font-family: 'Sharp Grotesk', sans-serif; font-weight: 300;">
                    <i class="fas fa-map-marker-alt"></i> ${property.sector ? `${property.sector},` : ''} ${property.city}, ${property.state}
                </h2>
                <a href="/propiedad/${property.slug}" class="text-dark" style="text-decoration: none;">
                    <h3 class="card-title" style="font-family: 'Sharp Grotesk', sans-serif; font-size: 1.2rem; font-weight: 500;">
                        ${property.listing_title.charAt(0).toUpperCase() + property.listing_title.slice(1).toLowerCase()}
                    </h3>
                </a>
                
                ${aliquotInfo}
                <h4 class="card-text h6" style="font-family: 'Sharp Grotesk', sans-serif; font-weight: 100; font-size: 15px; text-align: justify">${formattedDescription}</h4>
                <div class="mt-auto">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-wrap">
                            ${property.bedroom > 0 ? `<div class="d-flex align-items-center characteristics pl-2">
                                <img width="30px" height="30px" src="{{ asset('img/dormitorios.png') }}" alt="">
                                <p class="pt-3" style="font-weight: 600; font-size: 15px">${property.bedroom}</p>
                            </div>` : ''}
                            ${property.bathroom > 0 ? `<div class="d-flex align-items-center characteristics pl-2">
                                <img width="30px" height="30px" src="{{ asset('img/banio.png') }}" alt="">
                                <p class="pt-3" style="font-weight: 600; font-size: 15px">${property.bathroom}</p>
                            </div>` : ''}
                            ${property.garage > 0 ? `<div class="d-flex align-items-center characteristics pl-2">
                                <img width="30px" height="30px" src="{{ asset('img/estacionamiento.png') }}" alt="">
                                <p class="pt-3" style="font-weight: 600; font-size: 15px">${property.garage}</p>
                            </div>` : ''}
                            ${areaInfo ? `<div class="d-flex align-items-center characteristics pl-2">
                                <img width="30px" height="30px" src="{{ asset('img/area.png') }}" alt="">
                                <p class="pt-3" style="font-weight: 600; font-size: 15px">${areaInfo}</p>
                            </div>` : ''}
                        </div>
                        <p class="card-text" style="font-weight: 500; font-size: 23px; font-family: 'Sharp Grotesk', sans-serif;">${formattedPrice}</p>
                    </div>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-center gap-3 mt-3">
                            <div class="w-100 d-flex justify-content-center">
                                <a href="tel:${phoneNumber}" class="btn btn-outline-primary rounded-pill w-75 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-phone-alt me-2 mr-1"></i>Llamar
                                </a>
                            </div>
                            <div class="w-100 d-flex justify-content-center">
                                <a href="https://wa.me/${phoneNumberWhatsapp}?text=${whatsappMessage}" class="btn btn-outline-success rounded-pill w-75 d-flex justify-content-center align-items-center">
                                    <i class="fab fa-whatsapp me-2 mr-1"></i> WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </article>`;
        }

        function clearSearch(isModal) {
            // Determine whether to clear the modal or desktop forms
            const searchTermId = isModal ? 'searchTermModal' : 'searchTerm';
            const bedroomsId = isModal ? 'bedroomsModal' : 'bedrooms';
            const bathroomsId = isModal ? 'bathroomsModal' : 'bathrooms';
            const garageId = isModal ? 'garageModal' : 'garage';
            const minPriceId = isModal ? 'minPriceModal' : 'minPrice';
            const maxPriceId = isModal ? 'maxPriceModal' : 'maxPrice';
            const cityId = isModal ? 'cityModal' : 'city';
            const stateId = isModal ? 'stateModal' : 'state';
            const sectorId = isModal ? 'sectorModal' : 'sector';
            const propertyTypeId = isModal ? 'propertyTypeModal' : 'propertyType';
            const propertyStatusId = isModal ? 'propertyStatusModal' : 'propertyStatus';
            // Clear all the fields
            document.getElementById(searchTermId).value = '';
            document.getElementById(bedroomsId).value = '';
            document.getElementById(bathroomsId).value = '';
            document.getElementById(garageId).value = '';
            document.getElementById(minPriceId).value = '';
            document.getElementById(maxPriceId).value = '';
            document.getElementById(cityId).value = '';
            document.getElementById(stateId).value = '';
            document.getElementById(sectorId).value = '';
            document.getElementById(propertyTypeId).selectedIndex = 0;
            document.getElementById(propertyStatusId).selectedIndex = 0;
            // Reset the typeIdsArray based on whether it is modal or desktop
            if (isModal) {
                typeIdsArrayModal = [];
            } else {
                typeIdsArray = [];
            }

            // Trigger a new search with reset parameters
            searchProperties(1, isModal);
        }
        document.getElementById('searchFormDesktop').addEventListener('submit', function(event) {
            event.preventDefault();
            searchProperties(1, false);
        });

        document.getElementById('searchFormModal').addEventListener('submit', function(event) {
            event.preventDefault();
            searchProperties(1, true);
        });

        document.addEventListener('DOMContentLoaded', function() {
            searchProperties(1, false);
        });

        function generateDynamicContent(property_type, operation, location) 
        {
            let content = '';
            let qaPairs = [];

            if (property_type && operation) {
                let propertyTypeDisplay = property_type.replace(/[-_]/g, ' ');
                let operationDisplay = (operation === 'venta' || operation === 'renta') ? operation : 'general';
                let locationDisplay = location ? location.replace(/[-_]/g, ' ') : 'Ecuador';

                qaPairs.push({
                    question: `¿Por qué ${operationDisplay === 'venta' ? 'comprar' : operationDisplay === 'renta' ? 'alquilar' : 'buscar'} ${propertyTypeDisplay} en ${operationDisplay} en ${locationDisplay}?`,
                    answer: `Encontrar ${propertyTypeDisplay} en ${operationDisplay} en ${locationDisplay} ofrece diversas ventajas. Se presenta como una opción inmobiliaria atractiva debido a su notable crecimiento turístico, lo que impulsa una economía local en expansión y ofrece oportunidades de inversión con potencial de valorización.`
                });

                qaPairs.push({
                    question: `¿Dónde puedo ${operationDisplay === 'venta' ? 'comprar' : operationDisplay === 'renta' ? 'alquilar' : 'encontrar'} ${propertyTypeDisplay} en ${operationDisplay} en ${locationDisplay}?`,
                    answer: `Puedes encontrar una amplia variedad de ${propertyTypeDisplay} en ${operationDisplay} en ${locationDisplay} en nuestra inmobiliaria. En Grupo Housing, comprendemos la importancia de esta decisión y nos comprometemos a brindarte un servicio integral y personalizado. Nuestro equipo de profesionales te acompañará en cada paso.`
                });

                qaPairs.push({
                    question: `¿Cómo puedo ${operationDisplay === 'venta' ? 'comprar' : operationDisplay === 'renta' ? 'alquilar' : 'buscar'} ${propertyTypeDisplay} en ${operationDisplay} en ${locationDisplay}?`,
                    answer: `Para ${operationDisplay === 'venta' ? 'comprar' : operationDisplay === 'renta' ? 'alquilar' : 'buscar'} ${propertyTypeDisplay} en ${operationDisplay} en ${locationDisplay}, puedes definir tu presupuesto y necesidades, explorar opciones en línea mediante nuestro sitio web o contáctarnos directamente en Grupo Housing por teléfono, WhatsApp o redes sociales. Te brindaremos asesoramiento profesional, gestionaremos trámites y te guiaremos en todo el proceso.`
                });
            }

            qaPairs.forEach(qa => {
                content += `
                    <section class="mt-4">
                        <h2>${qa.question}</h2>
                        <h3>${qa.answer}</h3>
                    </section>
                `;
            });

            let containerDynamicContent = document.getElementById('dynamic_content');
            if (containerDynamicContent) {
                containerDynamicContent.innerHTML = content;
            }
        }
    </script>
@endsection
