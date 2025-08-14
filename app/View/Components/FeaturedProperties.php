<?php

namespace App\View\Components;

use App\Models\Listing;
use Illuminate\View\Component;

class FeaturedProperties extends Component
{

    public $properties;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->properties = Listing::where('outstanding', 1)->where('available', 1)->where('status', 1)->take(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.featured-properties');
    }
}
