<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class UpdatedPropertiesController extends Controller
{
    public function index(){

        $properties = Listing::where('available', 1)->orderBy('contact_at', 'asc')->paginate(10);

        return view('admin.updated-listing.index', compact('properties'));
        
    }
}
