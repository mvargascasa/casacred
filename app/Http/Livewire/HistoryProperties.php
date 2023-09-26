<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\UpdatedListings;
use App\Models\User;

class HistoryProperties extends Component
{

    use WithPagination;

    public $product_code;
    public $user_id;
    public $from_date;
    public $to_date;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $updated_listings_filter = UpdatedListings::orderBy('id', 'desc');

        if($this->product_code) $updated_listings_filter->where('property_code', 'LIKE', '%'.$this->product_code.'%');
        if($this->user_id) $updated_listings_filter->where('user_id', 'LIKE', '%'.$this->user_id.'%');
        if($this->from_date || $this->to_date) $updated_listings_filter->whereBetween('created_at', [$this->from_date, $this->to_date]);

        $updated_listings = $updated_listings_filter->paginate(20);

        return view('livewire.history-properties', [
            'updated_listings' => $updated_listings,
            'users' => User::where('department_id', '!=', null)->get(),
        ]);
    }
}
