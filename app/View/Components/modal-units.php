<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal-units extends Component
{

    public $units;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($units)
    {
        $this->units = $units;
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
