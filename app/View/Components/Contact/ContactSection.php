<?php

namespace App\View\Components\Contact;

use Illuminate\View\Component;

class ContactSection extends Component
{
    public $ubicacion;
    public $telefono;
    public $email;

    public function __construct($ubicacion = 'Remigio Tamariz y Av. Solano', $telefono = '096-786-7999', $email = 'info@grupohousing.com')
    {
        $this->ubicacion = $ubicacion;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.contact.contact-section');
    }
}
