<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva Notificacion</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 20px;
        }

        .property-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .property-title {
            color: #000000;
            font-size: 24px;
            margin-bottom: 10px;
            border-bottom: 2px solid #eee;
            padding-bottom: 5px;
        }

        .property-description-title {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .property-description-title span {
            font-weight: 100;
            margin-bottom: 5px;
            color: #555;
        }

        .property-description {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .property-details-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
            border-bottom: 1px dashed #eee;
            padding-bottom: 5px;
        }

        .property-details-item {
            margin-bottom: 8px;
        }

        .detail-label {
            font-weight: bold;
            color: #777;
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="property-container">
        <h1 class="property-title">Nueva Propiedad Creada</h1>

        @isset($listing)
            <div>
                <h2 class="property-description-title">Código de propiedad {{ $listing->product_code  }}</h2>

                <h2 class="property-description-title">Creado por: <span>{{ $uploadUser->name }}</span></h2>

                <h2 class="property-description-title">Titulo de propiedad:</h2>
                <p class="property-description">{{ $listing->listing_title ?? 'No hay descripción disponible.' }}</p>

                <h2 class="property-details-title">Detalles de la Propiedad:</h2>
                <ul>
                    @if(isset($listing->address))
                        <li class="property-details-item"><span class="detail-label">Dirección:</span> {{ $listing->address }}</li>
                    @endif
                    @if(isset($listing->bedrooms))
                        <li class="property-details-item"><span class="detail-label">Habitaciones:</span> {{ $listing->bedrooms }}</li>
                    @endif
                    @if(isset($listing->bathrooms))
                        <li class="property-details-item"><span class="detail-label">Baños:</span> {{ $listing->bathrooms }}</li>
                    @endif
                    @if(isset($listing->property_price))
                        <li class="property-details-item"><span class="detail-label">Precio:</span> ${{ number_format($listing->property_price, 2) }}</li>
                    @endif
                    @if(isset($listing->construction_area))
                        <li class="property-details-item"><span class="detail-label">Área:</span> {{ $listing->construction_area }} m²</li>
                    @endif
                    </ul>
            </div>
        @else
            <p>No se ha proporcionado información de la propiedad.</p>
        @endisset
    </div>
    
</body>
</html>