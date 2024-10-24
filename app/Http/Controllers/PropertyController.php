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

    public function view($type, $status = null, $details = null)
    {
        //dd(request()->all(), request()->route()->parameters());
        $typeIds = [
            'CASAS' => [23, 1],
            'DEPARTAMENTOS' => [24, 3],
            'CASAS COMERCIALES' => [25, 5],
            'LOCALES COMERCIALES' => [32, 6],
            'OFICINAS' => [35, 7],
            'SUITES' => [36, 8],
            'QUINTAS' => [29, 9],
            'HACIENDAS' => [30, 30],
            'TERRENOS' => [26, 10]
        ];
    
        $type = strtoupper(str_replace('-', ' ', $type));
        $typeId = isset($typeIds[$type]) ? $typeIds[$type] : null;
    
        // Asegurarse de que details si existe, comienza correctamente con 'en-'
        if ($details && strpos($details, '-en-') === 0) {
            $details = substr($details, 4); // Remover el prefijo '-en-'
        }
        $elements = $details ? explode('-en-', strtolower($details)) : [];
    
        $state = $city = $parish = null;
    
        foreach ($elements as $element) {
            $stateMatch = info_state::whereRaw('LOWER(name) = ?', [$element])->first();
            $cityMatch = info_city::whereRaw('LOWER(name) = ?', [$element])->first();
            $parishMatch = info_parishes::whereRaw('LOWER(name) = ?', [$element])->first();
    
            if (!$state && $stateMatch) {
                $state = $stateMatch->name;
            }
            if (!$city && $cityMatch) {
                $city = $cityMatch->name;
            }
            if (!$parish && $parishMatch) {
                $parish = $parishMatch->name;
            }
        }
        //dd($state, $city, $parish);

        $featured_property = Listing::where('product_code', '2442')->first();

        return view('propertieslist', compact('type', 'typeId', 'status', 'state', 'city', 'parish', 'featured_property'));
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
        $typeIds = $request->input('type_ids', []);
        $city = $request->input('city');
        $state = $request->input('state');
        $sector = $request->input('sector');
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);



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

        // Aplicación de filtros básicos
        if (!empty($productCode)) {
            $properties_filter->where('product_code', 'LIKE', "%{$productCode}%");
        }

        // Filtros por detalles específicos de la propiedad
        if (!empty($productCode)) {
            $properties_filter->where('product_code', 'LIKE', "%{$productCode}%");
        }

        if ($bedrooms) {
            $properties_filter->where('bedroom', '>=', $bedrooms);
        }

        if ($bathrooms) {
            $properties_filter->where('bathroom', '>=', $bathrooms);
        }

        if ($garage) {
            $properties_filter->where('garage', '>=', $garage);
        }

        if ($city) {
            $properties_filter->where('city', 'LIKE', "%{$city}%");
        }

        if ($state) {
            $properties_filter->where('state', 'LIKE', "%{$state}%");
        }

        if ($sector) {
            $properties_filter->where('sector', 'LIKE', "%{$sector}%");
            $properties_filter->where('address', 'LIKE', "%{$sector}%");
        }


        if (count($typeIds) >= 2) {
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

        $perPage = $request->query('per_page', 10);
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
