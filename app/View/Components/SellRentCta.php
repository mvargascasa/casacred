<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SellRentCta extends Component
{
    public $title;
    public $subtitle;
    public $buttonText;
    public $buttonLink;

    public function __construct(
        $title = 'Vende o renta',
        $subtitle = 'con nosotros tu propiedad',
        $buttonText = 'Más información',
        $buttonLink = '/servicio/vende-tu-casa'
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
    }

    public function render()
    {
        return view('components.sell-rent-cta');
    }
}