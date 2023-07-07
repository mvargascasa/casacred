<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\UpdatedListings;

class HistoryProperties extends Component
{

    use WithPagination;

    public $product_code = "";
    public $user_id;
    public $from_date;
    public $to_date;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.history-properties', [
            'updated_listings' => UpdatedListings::where('property_code', 'LIKE', '%'.$this->product_code.'%')->where('user_id', 'LIKE', '%'.$this->user_id.'%')->whereBetween('created_at', [$this->from_date, $this->to_date])->paginate(20),
        ]);
    }
}
