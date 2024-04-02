<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){

        $users = User::where('role', 'ASESOR')->where('status', 1)->orderBy('created_at', 'asc')->get();

        $now = Carbon::now();

        $submonth = $now->subMonth();

        foreach ($users as $user) {
            $properties_count = Listing::where('user_id', $user->id)->whereBetween('created_at', ['2024-04-01', '2024-04-02'])->count();
            $properties[$user->id] = $properties_count;
        }

        return view('admin.reports.index', ['users' => $users, 'properties' => $properties, 'now' => $now]);
    }
}
