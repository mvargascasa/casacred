<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class ReportUploadProperties extends Component
{

    public $dateFilter;

    public function render()
    {

        $this->dateFilter ? $date = Carbon::parse($this->dateFilter) : $date = Carbon::now();

        $users = User::where('role', 'ASESOR')->where('status', 1)->orderBy('created_at', 'asc')->get();

        foreach ($users as $user) {
            $properties_count = Listing::where('user_id', $user->id)->whereBetween('created_at', [$date->subDay(), $date])->count();
            
            $properties[$user->id] = $properties_count;
        }

        return view('livewire.report-upload-properties', [
            'users' => $users,
            'properties' => $properties,
            'now' => $date
        ]);
    }
}
