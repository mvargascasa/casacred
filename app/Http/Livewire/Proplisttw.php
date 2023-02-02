<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Proplisttw extends Component
{
    use WithPagination;

    public $code,$status,$detalle,$categoria,$tipo,$price,
    $pressButtom,$totalProperties=0,$pagActual,$firstItem,
    $view = 'grid', $available,
    $current_url,
    //$country, 
    $state, $city,
    $fromprice, $uptoprice,
    $asesor,
    $fromdate, $untildate,
    $credit_vip,
    $bedrooms;

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

        //mostrar las propiedades de un asesor
        if($this->current_url == "admin.myproperties" || Route::current()->getName() == "admin.myproperties"){
            if(Auth::user()->role != 'administrator') $properties_filter->where('user_id', Auth::id());
        }
        if(Str::contains(URL::previous(), 'admin/my-properties') && $this->pagActual > 0) $properties_filter->where('user_id', Auth::id());

        //mostrar las propiedades vendidas
        if(Route::current()->getName() == "admin.soldout") $properties_filter->where('available', 2);
        if(Str::contains(URL::previous(), 'admin/sold-out') && $this->pagActual > 0) $properties_filter->where('available', 2);
        //if($this->pagActual > 0) dd($this->current_url);//$properties_filter->where('available', 2);

        // else $properties_filter->where('available', 1);
        if(Route::current()->getName() == "admin.properties") $properties_filter->where('available', 1);
        if(Str::contains(URL::previous(), 'admin/properties') && $this->pagActual > 0) $properties_filter->where('available', 1);

        $url_current = $this->current_url;

        if(strlen($this->detalle)>2){        
            //$properties_filter->where('address','LIKE',"%$this->detalle%")->orWhere('listing_title', 'LIKE', "%$this->detalle%");
            $properties_filter->where('address','LIKE',"%$this->detalle%");
            if($properties_filter->count()<1){
                $properties_filter->where('listing_title','LIKE',"%$this->detalle%");
            }
        }
        
        if($this->code){
            $properties_filter->where('product_code','LIKE',"%$this->code%");
        }
        
        if($this->status=='A')                                  $properties_filter->where('status',1); //agregarle || $this->variable == null para muestre por defecto las activas y disponibles
        if($this->status=='D')                                  $properties_filter->where('status',0);        
        if($this->categoria)                                    $properties_filter->where('listingtype',$this->categoria);        
        if($this->tipo)                                         $properties_filter->where('listingtypestatus',$this->tipo);            
        //if($this->available=='1' || $this->available == null)                               $properties_filter->where('available', 1); //agregarle || $this->variable == null para muestre por defecto las activas y disponibles
        //if($this->available=='2')                               $properties_filter->where('available', 2);

        //if($this->country)              $properties_filter->where('country', $this->country);
        if($this->state)                $properties_filter->where('state', $this->state);
        if($this->city)                 $properties_filter->where('city', $this->city);

        //buscando por asesor
        if($this->asesor)               $properties_filter->where('user_id', $this->asesor);

        //buscando por fecha
        if($this->fromdate || $this->untildate)         $properties_filter->whereBetween('created_at', [$this->fromdate, $this->untildate]);

        if($this->credit_vip)           $properties_filter->where('credit_vip', $this->credit_vip);

        if($this->bedrooms)     $properties_filter->where('bedroom', $this->bedrooms);

        //buscando por precio strlen($this->fromprice)>1   strlen($this->uptoprice)>1 
        if($this->fromprice && filter_var ( $this->fromprice, FILTER_SANITIZE_NUMBER_INT)>1){
            $fromprice_ = filter_var ( $this->fromprice, FILTER_SANITIZE_NUMBER_INT);
            $properties_filter->where('property_price','>',$fromprice_);
        }
        
        if($this->uptoprice && filter_var ( $this->uptoprice, FILTER_SANITIZE_NUMBER_INT)>1){
            $uptoprice_ = filter_var ( $this->uptoprice, FILTER_SANITIZE_NUMBER_INT);
            $properties_filter->where('property_price','<',$uptoprice_);
        }

        $properties = $properties_filter->paginate(50);
        $this->pagActual = $properties->currentPage();
        $this->firstItem = $properties->firstItem();
        $this->totalProperties = $properties->total();

        // if(count($properties) > 1){
        //     foreach ($properties as $propertie) {
        //         printf($propertie->listing_title);
        //     }
        // } else {
        //     printf($properties->listing_title);
        // }

        $similarProperties = Listing::where('available', 1);

        $similar_properties = [];
        if($this->code){
            $propertie_to_similar = Listing::where('product_code', 'LIKE', "%$this->code%")->first();
            if($propertie_to_similar){
                $address = $propertie_to_similar->address;
                if(str_contains($address, ",")){
                    $separate_address = explode(",", $address);
                    $address = end($separate_address);
                    $address = str_replace(" ", "", $address);
                }
                $similarProperties->where('address', 'LIKE', "%$address%");
                $similarProperties->where('state', $propertie_to_similar->state);
                $similarProperties->where('city', $propertie_to_similar->city);
                $similarProperties->where('listingtype', $propertie_to_similar->listingtype);
                $similar_properties = $similarProperties->where('product_code', '!=', $this->code)->latest()->take(8)->get();
            }
        }

        //dd($similarProperties);

        $types = DB::table('listing_types')->get(); 
        $categories = DB::table('listing_status')->get(); 

        return view('livewire.proplisttw',compact('properties','types','categories', 'viewaux', 'url_current', 'similar_properties'));
    }
}
