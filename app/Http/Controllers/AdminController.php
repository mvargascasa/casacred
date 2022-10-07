<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{     
    public function index(){
        $allproperties = Listing::all();
        $activatedproperties = Listing::where('status', 1)->get();
        $availableproperties = Listing::where('available', 1)->get();
        $totalproperties = $allproperties->count();
        $totalactivatedproperties = $activatedproperties->count();
        $totalavailableproperties = $availableproperties->count();
        return view('admin.index', compact('totalproperties', 'totalactivatedproperties', 'totalavailableproperties'));
    }     
    public function test(){
        return view('admin.test');
    }     
    public function getallimg(Listing $listing){
        if($listing){
            $listing = Listing::find($listing->id);
            return view('admin.z-getallimg',compact('listing'));
        }
    }      
    public function words(){
        $words = Word::orderBy('id','desc')->get();
        return view('admin.words.index',compact('words'));
    }   
}
