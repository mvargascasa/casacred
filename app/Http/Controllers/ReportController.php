<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('admin.reports.index');
    }

    public function updatedProperties(){
        return view('admin.updated-listing.report-updated-properties');
    }
}
