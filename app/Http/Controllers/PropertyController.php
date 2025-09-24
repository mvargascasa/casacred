<?php

namespace App\Http\Controllers;

use App\Models\info_city;
use App\Models\info_parishes;
use App\Models\info_state;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class PropertyController extends Controller
{

    public function viewPropertyCode($propertyCode)
    {
        return view('propertieslist', [
            'type' => null,
            'typeId' => null,
            'status' => null,
            'state' => null,
            'city' => null,
            'parish' => null,
            'minPrice' => null,
            'maxPrice' => null,
            'propertyCode' => $propertyCode
        ]);
    }

    public function view($type, $status = null, $details = null)
    {
        // --- Mapeo de tipos a IDs ---
        $typeIds = [
            'CASAS' => [23, 1],
            'DEPARTAMENTOS' => [24, 3],
            'CASAS COMERCIALES' => [25, 5],
            'LOCALES COMERCIALES' => [32, 6],
            'OFICINAS' => [35, 7],
            'SUITES' => [36, 8],
            'EDIFICIOS' => [37],
            'HOTELES' => [39],
            'FABRICAS' => [41],
            'PARQUEADEROS' => [42],
            'BODEGAS' => [43],
            'NAVES INDUSTRIALES' => [45],
            'QUINTAS' => [29, 9],
            'HACIENDAS' => [30, 30],
            'TERRENOS' => [26, 10],
        ];

        // Normalizar tipo para buscar en el mapa
        $typeKey  = strtoupper(str_replace('-', ' ', $type));
        $typeId   = $typeIds[$typeKey] ?? null;

        $provinces = DB::table('info_states')->where('country_id', 63)->get();

        // --- Extraer rangos de precio y ubicaciones desde {details} ---
        $minPrice = null;
        $maxPrice = null;
        $state = $city = $parish = null;

        $elements = []; // elementos "en-xxx" (estado/ciudad/parroquia/otros términos)
        if ($details) {
            $detailsLower = strtolower($details);

            // 1) Capturar -desde-xxx y -hasta-yyy (en cualquier orden y posición)
            if (preg_match('/(?:^|-)desde-([0-9\.,]+)/i', $detailsLower, $mDesde)) {
                $minPrice = (int) preg_replace('/\D/', '', $mDesde[1]); // limpiar separadores
            }
            if (preg_match('/(?:^|-)hasta-([0-9\.,]+)/i', $detailsLower, $mHasta)) {
                $maxPrice = (int) preg_replace('/\D/', '', $mHasta[1]);
            }

            // 2) Quitar los fragmentos de precio del string antes de buscar ubicaciones
            $detailsForLocations = preg_replace('/(?:-desde-[0-9\.,]+)|(?:-hasta-[0-9\.,]+)/i', '', $detailsLower);

            // 3) Si comienza con -en-, retirarlo para poder hacer explode limpio
            if ($detailsForLocations && strpos($detailsForLocations, '-en-') === 0) {
                $detailsForLocations = substr($detailsForLocations, 4); // remove leading "-en-"
            }

            // 4) Separar por "-en-" para obtener posibles términos de ubicación
            $elements = $detailsForLocations ? array_filter(explode('-en-', $detailsForLocations)) : [];
        }

        // --- También aceptar min/max por query string (tienen prioridad si vienen) ---
        $qpMin = request()->input('min_price');
        $qpMax = request()->input('max_price');
        if ($qpMin !== null && $qpMin !== '') {
            $minPrice = (int) preg_replace('/\D/', '', (string) $qpMin);
        }
        if ($qpMax !== null && $qpMax !== '') {
            $maxPrice = (int) preg_replace('/\D/', '', (string) $qpMax);
        }

        // Corregir si vienen invertidos
        if ($minPrice !== null && $maxPrice !== null && $minPrice > $maxPrice) {
            [$minPrice, $maxPrice] = [$maxPrice, $minPrice];
        }

        // --- Resolver ubicaciones contra la BD ---
        foreach ($elements as $element) {
            $element = trim($element);
            if ($element === '') continue;

            $stateMatch  = info_state::whereRaw('LOWER(name) = ?', [$element])->first();
            $cityMatch   = info_city::whereRaw('LOWER(name) = ?', [$element])->first();
            $parishMatch = info_parishes::whereRaw('LOWER(name) = ?', [$element])->first();

            if (!$state && $stateMatch)   { $state  = $stateMatch->name; }
            if (!$city && $cityMatch)     { $city   = $cityMatch->name; }
            if (!$parish && $parishMatch) { $parish = $parishMatch->name; }
        }

        // dd($state, $city, $type, $typeId, $parish, $minPrice, $maxPrice);

        // Nota: $type lo pasamos como venía en la URL (p. ej. "casas") para tu vista/JS.
        // Si prefieres mostrarlo normalizado, puedes usar $typeKey.

        //dd($type, $typeId, $status, $state, $city, $parish, $minPrice, $maxPrice);

        return view('propertieslist', compact(
            'type', 'typeId', 'status', 'state', 'city', 'parish', 'minPrice', 'maxPrice', 'provinces'
        ));
    }

    public function search(Request $request)
    {
        // Recolección de parámetros
        $searchTerm = $request->input('searchTerm', '');
        $productCode = $request->input('product_code');
        $bedrooms = $request->input('bedrooms');
        $bathrooms = $request->input('bathrooms');
        $garage = $request->input('garage');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $constructionAreaMin = $request->filled('construction_area_min') ? (int) $request->input('construction_area_min') : null;
        $constructionAreaMax = $request->filled('construction_area_max') ? (int) $request->input('construction_area_max') : null;
        $landAreaMin = $request->filled('land_area_min') ? (int) $request->input('land_area_min') : null;
        $landAreaMax = $request->filled('land_area_max') ? (int) $request->input('land_area_max') : null;
        $typeIds = $request->input('type_ids', []);
        $city = $request->input('city');
        $state = $request->input('state');
        $sector = $request->input('sector');
        $is_new = $request->input('is_new');
        $listyearsmin = $request->filled('listyears_min') ? (int) $request->input('listyears_min') : null;
        $listyearsmax = $request->filled('listyears_max') ? (int) $request->input('listyears_max') : null;
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 20);

        // 🔥 Verificar si searchTerm contiene un código de propiedad (buscar directamente por product_code)
        if (!empty($searchTerm)) {
            // Buscar si existe una propiedad con el código exacto en searchTerm
            $propertyByProductCode = DB::table('listings')
                ->join('listing_types', 'listings.listingtype', '=', 'listing_types.id')
                ->select(
                    'listings.id as id',
                    'listings.product_code',
                    'listings.listing_title',
                    'listings.listing_description',
                    'listings.listingtype',
                    'listings.listingtypestatus',
                    'listings.bedroom',
                    'listings.bathroom',
                    'listings.garage',
                    'listings.construction_area',
                    'listings.land_area',
                    'listings.property_price',
                    'listings.customized_price',
                    'listings.state',
                    'listings.city',
                    'listings.sector',
                    'listings.images',
                    'listings.slug',
                    'listings.available',
                    'listings.status',
                    'listing_types.type_title as type_name',
                    'listings.aliquot'
                )
                ->where('listings.available', 1)
                ->where('listings.status', 1)
                ->where('listings.product_code', $searchTerm) // busca código exacto
                ->first();

            // Si encontró una propiedad por código exacto, retornarla directamente
            if ($propertyByProductCode) {
                return response()->json([
                    'properties' => [$propertyByProductCode], // Retornar como array con un solo elemento
                    'pagination' => [
                        'current_page' => 1,
                        'from' => 1,
                        'to' => 1,
                        'per_page' => 1,
                        'total' => 1,
                        'last_page' => 1,
                        'first_page_url' => $request->url(),
                        'last_page_url' => $request->url(),
                        'next_page_url' => null,
                        'prev_page_url' => null,
                    ]
                ]);
            }
        }

        $searchWords = explode(' ', $searchTerm);

        $properties_filter = DB::table('listings')
            ->join('listing_types', 'listings.listingtype', '=', 'listing_types.id')
            ->select(
                'listings.id as id',
                'listings.product_code',
                'listings.listing_title',
                'listings.listing_description',
                'listings.listingtype',
                'listings.listingtypestatus',
                'listings.bedroom',
                'listings.bathroom',
                'listings.garage',
                'listings.construction_area',
                'listings.land_area',
                'listings.property_price',
                'listings.customized_price',
                'listings.state',
                'listings.city',
                'listings.sector',
                'listings.images',
                'listings.slug',
                'listings.available',
                'listings.status',
                'listing_types.type_title as type_name',
                'listings.aliquot'
            )
            ->where('listings.available', 1)
            ->where('listings.status', 1)
            ->orderBy('listings.product_code', 'desc');

        //if(!empty($productCode)){
            if ($request->has('normalized_status') && $request->input('normalized_status') != '' && $request->input('normalized_status') != 'general') {
                $normalizedStatus = strtolower($request->input('normalized_status'));
                $statusVariants = $this->getStatusVariants();
    
                if (array_key_exists($normalizedStatus, $statusVariants)) {
                    $variants = $statusVariants[$normalizedStatus];
                    $properties_filter->where(function ($query) use ($variants) {
                        $query->whereIn(DB::raw("LOWER(listingtypestatus)"), $variants);
                    });
                }
            }
        //}

        // Aplicación de filtros básicos
        if (!empty($productCode)) {
            $properties_filter->where('product_code', 'LIKE', "%{$productCode}%");
        }

        // Filtros por detalles específicos de la propiedad
        if (!empty($productCode)) {
            $properties_filter->where('product_code', 'LIKE', "%{$productCode}%");
        }

        if ($bedrooms) {
            $properties_filter->where('bedroom', '=', $bedrooms);
        }

        if ($bathrooms) {
            $properties_filter->where('bathroom', '=', $bathrooms);
        }

        if ($garage) {
            $properties_filter->where('garage', '=', $garage);
        }

        if ($city) {
            $properties_filter->where('city', 'LIKE', "%{$city}%");
        }

        if ($is_new == 1) {
            $properties_filter->where('listingtagstatus', 2);
        }

        if (!is_null($listyearsmin)) {
            $properties_filter->where('listyears', '>=', $listyearsmin);
        }
        
        if (!is_null($listyearsmax)) {
            $properties_filter->where('listyears', '<=', $listyearsmax);
        }

        if ($state) {
            $properties_filter->where('state', 'LIKE', "%{$state}%");
        }

        if ($sector) {
            $properties_filter->where('sector', 'LIKE', "%{$sector}%");
            $properties_filter->where('address', 'LIKE', "%{$sector}%");
        }

        //filtrar por caracteristicas

        if ($request->filled('listingcharacteristic')) {
            $ids = explode(',', $request->listingcharacteristic);
            $properties_filter->where(function($q) use ($ids) {
                foreach ($ids as $id) {
                    $q->orWhere('listingcharacteristic', 'like', "%$id%");
                }
            });
        }
        
        if ($request->filled('listinggeneralcharacteristics')) {
            $ids = explode(',', $request->listinggeneralcharacteristics);
            $properties_filter->where(function($q) use ($ids) {
                foreach ($ids as $id) {
                    $q->orWhere('listinggeneralcharacteristics', 'like', "%$id%");
                }
            });
        }
        
        if ($request->filled('listinglistservices')) {
            $ids = explode(',', $request->listinglistservices);
            $properties_filter->where(function($q) use ($ids) {
                foreach ($ids as $id) {
                    $q->orWhere('listinglistservices', 'like', "%$id%");
                }
            });
        }


        if (count($typeIds) >= 2) {
            $listingTypeId = $typeIds[0];

            if (!empty($listingTypeId)) {
                $properties_filter->where('listingtype', $listingTypeId);
            }
        }

        if (count($typeIds) >= 1) {
            $listingTypeId = $typeIds[0];

            if (!empty($listingTypeId)) {
                $properties_filter->where('listingtype', $listingTypeId);
            }
        }

        if ($minPrice || $maxPrice) {
            if ($minPrice) {
                $properties_filter->where('property_price', '>=', $minPrice);
            }
            if ($maxPrice) {
                $properties_filter->where('property_price', '<=', $maxPrice);
            }

            // Aplicar el ordenamiento por precio solo si se está filtrando por precio
            $properties_filter->orderBy('property_price', 'asc');
        }

        if (!is_null($constructionAreaMin)) {
            $properties_filter->where('construction_area', '>=', $constructionAreaMin);
        }
        if (!is_null($constructionAreaMax)) {
            $properties_filter->where('construction_area', '<=', $constructionAreaMax);
        }
        
        if (!is_null($landAreaMin)) {
            $properties_filter->where('land_area', '>=', $landAreaMin);
        }
        if (!is_null($landAreaMax)) {
            $properties_filter->where('land_area', '<=', $landAreaMax);
        }


        foreach ($searchWords as $word) {
            $properties_filter->where(function ($query) use ($word) {
                $query->where('listing_title', 'LIKE', "%{$word}%")
                    ->orWhere('listing_description', 'LIKE', "%{$word}%")
                    ->orWhere('city', 'LIKE', "%{$word}%")
                    ->orWhere('state', 'LIKE', "%{$word}%")
                    ->orWhere('sector', 'LIKE', "%{$word}%")
                    ->orWhere('address', 'LIKE', "%{$word}%")
                    ->orWhere('product_code', 'LIKE', "%{$word}%")
                    ->orWhere('type_title', 'LIKE', "%{$word}%");
            });
        }

        $properties = $properties_filter->get();

        $perPage = $request->query('per_page', 30);
        $page = $request->query('page', 1);

        // Calcular el índice de inicio
        $start = ($page - 1) * $perPage;

        // Obtener los datos para la página actual
        $currentPageData = $properties->slice($start, $perPage);

        // Crear una instancia de LengthAwarePaginator
        $paginatedResults = new LengthAwarePaginator(
            $currentPageData,
            $properties->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        // Obtener solo los items de la página actual sin índices numéricos
        $itemsWithoutIndexes = collect($paginatedResults->items())->values();

        // Crear un array que contenga tanto los datos paginados como la información de paginación
        $responseData = [
            'properties' => $itemsWithoutIndexes,
            'pagination' => [
                'current_page' => $paginatedResults->currentPage(),
                'from' => $paginatedResults->firstItem(),
                'to' => $paginatedResults->lastItem(),
                'per_page' => $paginatedResults->perPage(),
                'total' => $paginatedResults->total(),
                'last_page' => $paginatedResults->lastPage(),
                'first_page_url' => $paginatedResults->url(1),
                'last_page_url' => $paginatedResults->url($paginatedResults->lastPage()),
                'next_page_url' => $paginatedResults->nextPageUrl(),
                'prev_page_url' => $paginatedResults->previousPageUrl(),
            ],
        ];

        return response()->json($responseData);
    }

    private function getStatusVariants()
    {
        return [
            'venta' => ['en-venta', 'En venta', 'on sale'],
            'renta' => ['alquilar', 'aquiler', 'rent', 'for rent'],
            'proyectos' => ['proyectos', 'projects']
        ];
    }

    private function normalizeListingTypeStatus($status)
    {
        switch (strtolower($status)) {
            case 'en-venta':
            case 'on sale':
                return 'venta';
            case 'alquilar':
                return 'alquiler';
            case 'proyectos':
                return 'proyectos';
            default:
                return null; // Devuelve null si no se reconoce el estado
        }
    }
}
