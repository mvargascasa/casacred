<?php

namespace App\View\Components\About;

use Illuminate\View\Component;

class TeamSection extends Component
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
                'name' => 'Anael Mosquera',
                'title' => 'Gestora',
                'image' => 'anael-mosquera.webp',
                'email' => 'maria@inmobiliaria.com',
                'phone' => '+593 99 123 4567',
                'specialties' => ['Ventas', 'Casas Residenciales']
            ],
            [
                'id' => 3,
                'name' => 'Andrea Hurtado',
                'title' => 'Gestora',
                'image' => 'andrea-hurtado.webp',
                'email' => 'maria@inmobiliaria.com',
                'phone' => '+593 99 123 4567',
                'specialties' => ['Ventas', 'Casas Residenciales']
            ],
            [
                'id' => 5,
                'name' => 'Belen Astudillo',
                'title' => 'Gestora',
                'image' => 'belen-astudillo.webp',
                'email' => 'ana@inmobiliaria.com',
                'phone' => '+593 99 345 6789',
                'specialties' => ['Rentas', 'Propiedades de Lujo'],
            ],
            [
                'id' => 2,
                'name' => 'Daysi Peralta',
                'title' => 'Asesora',
                'image' => 'daysi-peralta.webp',
                'email' => 'ana@inmobiliaria.com',
                'phone' => '+593 99 345 6789',
                'specialties' => ['Rentas', 'Propiedades de Lujo'],
            ]
        ];
    }

    public function render()
    {
        return view('components.about.team-section');
    }
}
