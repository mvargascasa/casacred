<?php

namespace App\View\Components;

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
        $this->categories = [
            [
                'id' => 'casas',
                'name' => 'Casas',
                'count' => 120,
                'icon' => 'house',
                'active' => false,
                'url' => '/casas-en-venta'
            ],
            [
                'id' => 'departamentos',
                'name' => 'Departamentos',
                'count' => 45,
                'icon' => 'building',
                'active' => false,
                'url' => '/departamentos-en-venta'
            ],
            [
                'id' => 'comerciales',
                'name' => 'Casas Comerciales',
                'count' => 35,
                'icon' => 'store',
                'active' => true,
                'url' => '/casas-comerciales-en-venta'
            ],
            [
                'id' => 'terrenos',
                'name' => 'Terrenos',
                'count' => 67,
                'icon' => 'terrain',
                'active' => false,
                'url' => '/terrenos-en-venta'
            ],
            [
                'id' => 'quintas',
                'name' => 'Quintas',
                'count' => 12,
                'icon' => 'cabin',
                'active' => false,
                'url' => '/quintas-en-venta'
            ]
        ];
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
