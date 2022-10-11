<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{     
    public function index(){

        $totalcasas = Listing::where('listingtype', 23)->where('available', 1)->count();
        $totaldepartamentos = Listing::where('listingtype', 24)->where('available', 1)->count();
        $totalcasascomer = Listing::where('listingtype', 25)->where('available', 1)->count();
        $totalterrenos = Listing::where('listingtype', 26)->where('available', 1)->count();
        $totalquintas = Listing::where('listingtype', 29)->where('available', 1)->count();
        $totalhaciendas = Listing::where('listingtype', 30)->where('available', 1)->count();
        $totallocalcomer = Listing::where('listingtype', 32)->where('available', 1)->count();
        $totaloficinas = Listing::where('listingtype', 35)->where('available', 1)->count();
        $totalsuites = Listing::where('listingtype', 36)->where('available', 1)->count();

        $totalproperties= Listing::all()->count();
        $totalactivatedproperties = Listing::where('status', 1)->count();
        $totalavailableproperties = Listing::where('available', 1)->count();

        $properties = []; $properties_aux = [];
        $properties = Listing::select('product_code', 'lat', 'lng', 'listing_title', 'id', 'address', 'created_at')
                                ->where('city', 'LIKE', "%Cuenca%")
                                // ->where('listingtype', 'LIKE', "%%")
                                ->where('available', 1)
                                ->where(DB::raw('LENGTH(lat)'), '>', 5)
                                ->where(DB::raw('LENGTH(lng)'), '>', 5)
                                ->latest()->take(10)->get();
        foreach ($properties as $p) {
            if(Str::startsWith($p->lat, '-') && Str::startsWith($p->lng, '-') && Str::contains($p->lat, '.') && Str::contains($p->lng, '.')){
                array_push($properties_aux, $p);
            }
        }

        return view('admin.index', compact('totalproperties', 'totalactivatedproperties', 'totalavailableproperties', 'properties_aux', 'totalcasas', 'totaldepartamentos', 'totalcasascomer', 'totalterrenos', 'totalquintas', 'totalhaciendas', 'totallocalcomer', 'totaloficinas', 'totalsuites'));
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
