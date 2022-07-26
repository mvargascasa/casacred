<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Proplisttw extends Component
{
    use WithPagination;

    public $code,$status,$detalle,$categoria,$tipo,$price,
    $pressButtom,$totalProperties=0,$pagActual,$firstItem,
    $view = 'grid', $available,
    $current_url,
    $country, $state, $city;

    public function render()
    {

        if ($this->view=='grid') {
            $viewaux = $this->view;
        } elseif($this->view=='list'){
            $viewaux = $this->view;
        }

        if($this->pressButtom>0){
            $this->pressButtom=0;
            $this->resetPage();
        }

        if($this->price){            
            if($this->price=='ASC') $properties_filter = Listing::orderBy('property_price','ASC');
            else $properties_filter = Listing::orderBy('property_price','DESC');
        }else{
            $properties_filter = Listing::orderBy('product_code','DESC');
        }

        if($this->current_url == "admin.myproperties" || Route::current()->getName() == "admin.myproperties"){
            if(Auth::user()->role != 'administrator') $properties_filter->where('user_id', Auth::id());
        }

        if(strlen($this->detalle)>2){           
            $properties_filter->where('address','LIKE',"%$this->detalle%");
            if($properties_filter->count()<1){                
                $properties_filter->where('listing_title','LIKE',"%$this->detalle%");
            }
        }
        

        if($this->code)                                         $properties_filter->where('product_code','LIKE',"%$this->code%");
        if($this->status=='A')                                  $properties_filter->where('status',1); //agregarle || $this->variable == null para muestre por defecto las activas y disponibles
        if($this->status=='D')                                  $properties_filter->where('status',0);        
        if($this->categoria)                                    $properties_filter->where('listingtype',$this->categoria);        
        if($this->tipo)                                         $properties_filter->where('listingtypestatus',$this->tipo);            
        if($this->available=='1')                               $properties_filter->where('available', 1); //agregarle || $this->variable == null para muestre por defecto las activas y disponibles
        if($this->available=='2')                               $properties_filter->where('available', 2);

        if($this->country)              $properties_filter->where('country', $this->country);
        if($this->state)                $properties_filter->where('state', $this->state);
        if($this->city)                 $properties_filter->where('city', $this->city);

        $properties = $properties_filter->paginate(50);
        $this->pagActual = $properties->currentPage();
        $this->firstItem = $properties->firstItem();
        $this->totalProperties = $properties->total();

        $types = DB::table('listing_types')->get(); 
        $categories = DB::table('listing_status')->get(); 
        return view('livewire.proplisttw',compact('properties','types','categories', 'viewaux'));
    }
}
