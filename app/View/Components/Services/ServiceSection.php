<?php

namespace App\View\Components\Services;

use App\Models\Service;
use Illuminate\View\Component;

class ServiceSection extends Component
{
    public $services;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->services = Service::where('status', 1)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.services.service-section');
    }
}
