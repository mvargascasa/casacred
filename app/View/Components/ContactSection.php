<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactSection extends Component
{
    public $title;
    public $subtitle;
    public $submitText;
    public $mapApiKey;
    public $businessName;
    public $businessAddress;
    public $businessCoordinates;
    public $privacyText;
    public $termsLink;

    public function __construct(
        $title = 'Contáctanos',
        $subtitle = 'Proporciona tus datos',
        $submitText = 'Enviar',
        $mapApiKey = null,
        $businessName = 'Grupo Housing | Inmobiliaria en Cuenca',
        $businessAddress = 'Remigio Tamariz Crespo, Cuenca 010107',
        $businessCoordinates = '-2.9001285,-79.0058965',
        $privacyText = 'Deseo ser contactado y entiendo como van a ser manipulados mis datos según los',
        $termsLink = '#'
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->submitText = $submitText;
        $this->mapApiKey = $mapApiKey ?? env('GOOGLE_MAPS_API_KEY');
        $this->businessName = $businessName;
        $this->businessAddress = $businessAddress;
        $this->businessCoordinates = $businessCoordinates;
        $this->privacyText = $privacyText;
        $this->termsLink = $termsLink;
    }

    public function render()
    {
        return view('components.contact-section');
    }
}