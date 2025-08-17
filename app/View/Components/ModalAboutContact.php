<?php

namespace App\View\Components;

use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class ModalAboutContact extends Component
{
    public $provinces, $types;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->provinces = DB::table('info_states')->where('country_id', 63)->get();
        $this->types = DB::table('listing_types')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-about-contact');
    }
}
