<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ReportUploadProperties extends Component
{

    public $dateFilterTo = null;
    public $dateFilterFrom = null;
    public $total = 0;

    public function render()
    {
        $this->total = 0;
        
        if($this->dateFilterTo != null || $this->dateFilterFrom != null){
            $dateTo = Carbon::parse($this->dateFilterTo);
            $dateFrom = Carbon::parse($this->dateFilterFrom)->addDay();
        } else {
            $dateTo = Carbon::now();
            $dateFrom = Carbon::now()->addDay();
        }
        //$this->dateFilter ? $date = Carbon::parse($this->dateFilter) : $date = Carbon::now();
        
        // if($this->dateFilter != null ) dd($dateTo->format('Y-m-d'). " | " . $dateFrom->format('Y-m-d'));

        $users = User::where('role', 'ASESOR')->orWhere('role', 'administrator')->where('status', 1)->orderBy('created_at', 'desc')->get();

        foreach ($users as $user) {
            $properties_count = Listing::where('user_id', $user->id)->whereBetween('created_at', [$dateTo->format('Y-m-d'), $dateFrom->format('Y-m-d')])->count();
            
            $properties[$user->id] = [$user->name, $properties_count];

            $this->total += $properties_count;
        }        

        // dd($properties);

        return view('livewire.report-upload-properties', [
            'users' => $users,
            'properties' => $properties,
            'now' => $dateTo,
            'total' => $this->total
        ]);
    }
}
