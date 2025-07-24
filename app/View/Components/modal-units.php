<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;


class ModalUnits extends Component
{

    public $units;
    public $types;
    public $listing;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($units, $types, $listing)
    {
        $this->units = $units;
        $this->types = $types;
        $this->listing = $listing;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-units');
    }
}
