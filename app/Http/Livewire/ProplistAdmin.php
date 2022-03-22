<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProplistAdmin extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $types = DB::table('listing_types')->get(); 
        $categories = DB::table('listing_status')->get(); 
        $listings_filter = Listing::latest();
        $listings = $listings_filter->paginate(50);
        return view('livewire.proplist-admin',compact('listings','types','categories'));
    }
}
