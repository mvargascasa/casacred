<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TestimonialsSection extends Component
{
    public $sectionTitle;
    public $sectionSubtitle;
    public $backgroundImage;
    public $testimonios;
    public $grupos;

    public function __construct(
        $sectionTitle = 'Testimonios',
        $sectionSubtitle = '¿Que opinan nuestros clientes?',
        $backgroundImage = '/img/testimonials-bg-image.webp'
    ) {
        $this->sectionTitle = $sectionTitle;
        $this->sectionSubtitle = $sectionSubtitle;
        $this->backgroundImage = $backgroundImage;
        
        $this->testimonios = $testimonios ?? [
            [
                'nombre' => 'Paola Cordero',
                'rating' => 5,
                'testimonio' => 'Trabajé con Grupo Housing para vender mi casa. El proceso fue sorprendentemente rápido y transparente. Consiguieron un excelente precio para la propiedad. Muy agradecido.'
            ],
            [
                'nombre' => 'Andrés Ledesma', 
                'rating' => 5,
                'testimonio' => 'Comprar mi primera casa fue una experiencia mucho más fácil de lo que esperaba. Grupo Housing me guió en cada paso, desde la búsqueda hasta la firma de los documentos. Muy agradecida por su ayuda.'
            ],
            [
                'nombre' => 'Fabián Ordóñez',
                'rating' => 5,
                'testimonio' => 'Solicité un avalúo para una propiedad familiar. El servicio fue rápido, profesional y muy detallado. La valoración fue justa y me sirvió perfectamente para mi trámite.'
            ],
            [
                'nombre' => 'Gabriela Viteri',
                'rating' => 5,
                'testimonio' => 'Gracias a Grupo Housing, pude vender mi departamento y comprar mi nueva casa al mismo tiempo. Ellos coordinaron todo de manera perfecta, lo que me ahorró mucho estrés y tiempo.'
            ],
            [
                'nombre' => 'David Peña',
                'rating' => 5,
                'testimonio' => 'Tenía un problema con los títulos de mi terreno. La asesoría legal de Grupo Housing fue clave para resolverlo. Su conocimiento del mercado local es impresionante.'
            ],
            [
                'nombre' => 'Daniela León',
                'rating' => 5,
                'testimonio' => 'Encontré un apartamento perfecto en la zona de El Vergel gracias a Grupo Housing. El proceso de alquiler fue sencillo y rápido. Su equipo es muy amable y profesional.'
            ],
        ];

        // Agrupar testimonios de 2 en 2 para el carousel
        $this->grupos = array_chunk($this->testimonios, 2);
        
    }

    public function render()
    {
        return view('components.testimonials-section');
    }
}