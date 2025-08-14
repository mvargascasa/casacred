<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RealEstateServices extends Component
{
    public $services;
    public $sectionTitle;
    public $sectionSubtitle;
    public $viewAllText;
    public $viewAllLink;
    public $backgroundImage;

    public function __construct(
        $sectionTitle = 'Nuestros',
        $sectionSubtitle = 'Servicios',
        $viewAllText = 'Ver todos los servicios',
        $viewAllLink = '/servicio/construye',
        $backgroundImage = '/img/bg-services-section-home.webp'
    ) {
        $this->sectionTitle = $sectionTitle;
        $this->sectionSubtitle = $sectionSubtitle;
        $this->viewAllText = $viewAllText;
        $this->viewAllLink = $viewAllLink;
        $this->backgroundImage = $backgroundImage;
        
        $this->services = [
            [
                'id' => 'sell',
                'title' => 'Vende tu',
                'subtitle' => 'propiedad',
                'link' => '/servicio/vende-tu-casa',
                'featured' => false,
                'action' => '#exampleModalCenter'
            ],
            [
                'id' => 'rent',
                'title' => 'Renta tu',
                'subtitle' => 'propiedad',
                'link' => '/rentar',
                'featured' => true,
                'action' => '#modalAlquiler'
            ],
            [
                'id' => 'appraise',
                'title' => 'Avalúa tu',
                'subtitle' => 'propiedad',
                'link' => '/avaluar',
                'featured' => false,
                'action' => ''
            ]
        ];
    }

    public function render()
    {
        return view('components.real-estate-services');
    }
}