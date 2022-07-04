<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use App\Models\Listing;
use App\Models\Oportunidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Jetstream\Jetstream;

class TwController extends Controller
{
      
    
    public function index(){
        $opports = Oportunidades::latest()->limit(10)->get();
        return view('ztw.index',compact('opports'));
    } 

    public function create(){
        $lastcode = Listing::where('product_code','!=','')->orderBy('product_code','desc')->first();
        $benefits = DB::table('listing_benefits')->get();  
        $services = DB::table('listing_services')->get();  
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->get(); 
        $categories = DB::table('listing_status')->get();
        $tags = DB::table('listing_tags')->get();
        
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $optAttrib = [];
        foreach($states as $state){
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }

        return view('admin.listing.add-tw',compact('benefits','services','types','categories','tags','details','states','optAttrib','lastcode'));
    }   
    
    public function edit(Listing $listing){
        // if(Auth::user()->role != "administrator" && $listing->user_id!= Auth::id()){
        //     return redirect()->route('admin.listingshow',compact('listing'));
        // }
        $benefits = DB::table('listing_benefits')->get();   
        $services = DB::table('listing_services')->get();
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->get();  
        $categories = DB::table('listing_status')->get();  
        $tags = DB::table('listing_tags')->get();
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $optAttrib = [];
        $getCities=0;
        foreach($states as $state){
            if($listing->state==$state->name){ $getCities=$state->id; }
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }
        $cities = DB::table('info_cities')->where('state_id',$getCities)->get(); 
        return view('admin.listing.add-tw',compact('listing','benefits','services','types','categories',
                    'tags','details','states','optAttrib','cities'));
    } 

    
    public function contacts(){
        
        //Jetstream::roles();
        $data['contacts'] = Contactos::latest()->limit(50)->get();
        return view('admin.contacts.index',$data);
    } 
    
    public function opports(){
        $opports = Oportunidades::where('pipeline','Inmobiliaria')->latest()->limit(10)->get();
        return view('admin.opports.index',compact('opports'));
    }
    
    public function test(){
        $listing = Listing::find(673);
        $benefits = DB::table('listing_benefits')->get();  
        $services = DB::table('listing_services')->get();  
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->get(); 
        $categories = DB::table('listing_status')->get();
        $tags = DB::table('listing_tags')->get();
        
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $optAttrib = [];
        foreach($states as $state){
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }

        return view('admin.listing.shownew',compact('listing','benefits','services','types','categories','tags','details','states','optAttrib'));
    
    }
    
       
    public function properties(){
        return view('admin.listing.index');
    }
    
    
    public function propertieshow(Listing $listing){
        $benefits = DB::table('listing_benefits')->get();   
        $services = DB::table('listing_services')->get();
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->get();  
        $categories = DB::table('listing_status')->get();  
        $tags = DB::table('listing_tags')->get();
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $optAttrib = [];
        $getCities=0;
        foreach($states as $state){
            if($listing->state==$state->name){ $getCities=$state->id; }
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }
        $cities = DB::table('info_cities')->where('state_id',$getCities)->get(); 
        return view('admin.listing.show',compact('listing','benefits','services','types','categories',
                    'tags','details','states','optAttrib','cities'));

    }
}
