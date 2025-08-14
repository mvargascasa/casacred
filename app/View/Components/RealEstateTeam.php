<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RealEstateTeam extends Component
{
    public $teamMembers;
    public $sectionTitle;
    public $sectionSubtitle;
    public $learnMoreText;
    public $learnMoreLink;

    public function __construct(
        $sectionTitle = 'Conoce a nuestro',
        $sectionSubtitle = 'equipo inmobiliario',
        $learnMoreText = 'Conoce más sobre nosotros',
        $learnMoreLink = '#'
    ) {
        $this->sectionTitle = $sectionTitle;
        $this->sectionSubtitle = $sectionSubtitle;
        $this->learnMoreText = $learnMoreText;
        $this->learnMoreLink = $learnMoreLink;
        
        $this->teamMembers = [
            [
                'id' => 1,
                'name' => 'Sofía Mejia',
                'title' => 'Asesora',
                'image' => 'asesora-sofia-mejia.webp',
                'email' => 'maria@inmobiliaria.com',
                'phone' => '+593 99 123 4567',
                'specialties' => ['Ventas', 'Casas Residenciales']
            ],
            [
                'id' => 5,
                'name' => 'Gabriela Astudillo',
                'title' => 'Gestora',
                'image' => 'gestora-gabriela-astudillo.webp',
                'email' => 'ana@inmobiliaria.com',
                'phone' => '+593 99 345 6789',
                'specialties' => ['Rentas', 'Propiedades de Lujo'],
            ],
            [
                'id' => 6,
                'name' => 'Lucrecia Charras',
                'title' => 'Gestora',
                'image' => 'gestora-lucrecia.webp',
                'email' => 'ana@inmobiliaria.com',
                'phone' => '+593 99 345 6789',
                'specialties' => ['Rentas', 'Propiedades de Lujo'],
            ]
        ];
    }

    public function render()
    {
        return view('components.real-estate-team');
    }
}