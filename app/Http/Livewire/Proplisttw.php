<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Proplisttw extends Component
{
    use WithPagination;

    public $code,$status,$detalle,$categoria,$tipo,$price,
    $pressButtom,$totalProperties=0,$pagActual,$firstItem;

    public function render()
    {
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

        if(Auth::user()->role != 'administrator') $properties_filter->where('user_id', Auth::id());

        if(strlen($this->detalle)>2){           
            $properties_filter->where('address','LIKE',"%$this->detalle%");
            if($properties_filter->count()<1){                
                $properties_filter->where('listing_title','LIKE',"%$this->detalle%");
            }
        }
        

        

        if($this->code)         $properties_filter->where('product_code','LIKE',"%$this->code%");
        if($this->status=='A')  $properties_filter->where('status',1);
        if($this->status=='D')  $properties_filter->where('status',0);        
        if($this->categoria)    $properties_filter->where('listingtype',$this->categoria);        
        if($this->tipo)         $properties_filter->where('listingtypestatus',$this->tipo);

        $properties = $properties_filter->paginate(50);
        $this->pagActual = $properties->currentPage();
        $this->firstItem = $properties->firstItem();
        $this->totalProperties = $properties->total();

        $types = DB::table('listing_types')->get(); 
        $categories = DB::table('listing_status')->get(); 
        return view('livewire.proplisttw',compact('properties','types','categories'));
    }
}
