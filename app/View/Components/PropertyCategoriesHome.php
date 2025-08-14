<?php

namespace App\View\Components;

use App\Models\Listing;
use Illuminate\View\Component;

class PropertyCategoriesHome extends Component
{

    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Mapear IDs de tipo de propiedad con sus datos visuales
        $map = [
            23 => [
                'id' => 'casas',
                'name' => 'Casas',
                'icon' => 'house',
                'url' => '/casas-en-venta'
            ],
            24 => [
                'id' => 'departamentos',
                'name' => 'Departamentos',
                'icon' => 'building',
                'url' => '/departamentos-en-venta'
            ],
            25 => [
                'id' => 'comerciales',
                'name' => 'Casas Comerciales',
                'icon' => 'store',
                'url' => '/casas-comerciales-en-venta'
            ],
            26 => [
                'id' => 'terrenos',
                'name' => 'Terrenos',
                'icon' => 'terrain',
                'url' => '/terrenos-en-venta'
            ],
            29 => [
                'id' => 'quintas',
                'name' => 'Quintas',
                'icon' => 'cabin',
                'url' => '/quintas-en-venta'
            ]
        ];

        // Consultar conteos reales desde la BD
        $counts = Listing::where('status', 1)
            ->where('available', 1)
            ->whereIn('listingtype', array_keys($map))
            ->selectRaw('listingtype, COUNT(*) as total')
            ->groupBy('listingtype')
            ->pluck('total', 'listingtype');

        // Construir array final $categories con datos reales
        $this->categories = [];
        foreach ($map as $typeId => $data) {
            $this->categories[] = [
                'id' => $data['id'],
                'name' => $data['name'],
                'count' => $counts[$typeId] ?? 0,
                'icon' => $data['icon'],
                'active' => false,
                'url' => $data['url']
            ];
        }

        // Si quieres que uno salga activo por defecto
        if (!empty($this->categories)) {
            $this->categories[0]['active'] = true; 
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.property-categories-home');
    }
}
