<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FaqSection extends Component
{
    public $faqs;
    public $sectionTitle;
    public $sectionSubtitle;

    public function __construct(
        $sectionTitle = 'Preguntas',
        $sectionSubtitle = 'Frecuentes'
    ) {
        $this->sectionTitle = $sectionTitle;
        $this->sectionSubtitle = $sectionSubtitle;
        
        $this->faqs = [
            [
                'id' => 1,
                'question' => '¿Cómo puedo encontrar una inmobiliaria cerca de mí?',
                'answer' => 'Para encontrar una inmobiliaria cerca de mí, puedes contactarnos directamente a través de nuestro sitio web o llamando a nuestra línea telefónica. También puedes visitarnos en nuestras oficinas en Cuenca para recibir atención personalizada de nuestro equipo de expertos, quienes te guiarán en todo el proceso.',
                'isOpen' => true
            ],
            [
                'id' => 2,
                'question' => '¿Cómo puedo contactarme con un agente inmobiliario?',
                'answer' => 'Puedes contactar con nuestros agentes inmobiliarios a través de múltiples canales: llamando directamente a nuestra oficina, enviando un correo electrónico, utilizando nuestro formulario de contacto en línea, o visitando nuestras oficinas físicas.',
                'isOpen' => false
            ],
            [
                'id' => 3,
                'question' => '¿Qué servicios ofrecen las inmobiliarias en Cuenca?',
                'answer' => 'Nuestros servicios incluyen: compra y venta de propiedades residenciales y comerciales, alquiler de inmuebles, valoraciones profesionales, asesoramiento legal inmobiliario, gestión de trámites y documentación, financiamiento hipotecario, y servicios de inversión inmobiliaria. También ofrecemos consultoría personalizada según tus necesidades específicas.',
                'isOpen' => false
            ],
            [
                'id' => 4,
                'question' => '¿Trabajan con propiedades en todas las áreas de Cuenca?',
                'answer' => 'Sí, trabajamos con propiedades en toda la ciudad de Cuenca y sus alrededores. Tenemos amplio conocimiento del mercado local en diferentes sectores como El Centro Histórico, El Ejido, Totoracocha, El Batán, Ricaurte, y muchas otras zonas. Nuestro equipo especializado conoce las particularidades de cada área para brindarte el mejor asesoramiento.',
                'isOpen' => false
            ]
        ];
    }

    public function render()
    {
        return view('components.faq-section');
    }
}