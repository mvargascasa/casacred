<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\Word;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class PropmobileTw extends Component
{
    use WithPagination;
    
    public $searchtxt,$category,$state,$city,$type,$fromprice,$uptoprice,
            $order,$superf,$supert,$tags,
            $pressButtom,$totalProperties=0,$pagActual,$firstItem;

    protected $queryString = [  'searchtxt'=> ['except' => ''],
                                'order'=> ['except' => ''],
                                'category'=> ['except' => ''],
                                'type'=> ['except' => ''],
                                'state'=> ['except' => ''],
                                'city'=> ['except' => ''],
                                'fromprice'=> ['except' => ''],
                                'uptoprice'=> ['except' => ''],
                                'superf'=> ['except' => ''],
                                'supert'=> ['except' => ''],
                                'tags' => ['except' => '']
                            ];
    public function render(Request $request)
    {
       
        if($this->pressButtom>0){
            $this->pressButtom=0;
            $this->resetPage();
        }

        $types = DB::table('listing_types')->get(); 
        $categories = DB::table('listing_status')->get(); 
        $listings_filter = Listing::where('status',1);
        
        if(strlen($this->searchtxt)>2){
            $txt = filter_var ( $this->searchtxt, FILTER_SANITIZE_NUMBER_INT);
            if($txt>999){
                $listings_filter->where('product_code',$txt);
            }else{
                $listings_filter->where('address','LIKE',"%$this->searchtxt%");
            }   
            if($listings_filter->count()<1){                
                $listings_filter = Listing::where('status',1);
                $listings_filter->where('listing_title','LIKE',"%$this->searchtxt%");
            }
        }
        
        if($this->order){
            if($this->order=='minprice') $listings_filter->orderBy('property_price','ASC');
            if($this->order=='maxprice') $listings_filter->orderBy('property_price','DESC');
        }else $listings_filter->orderBy('product_code','DESC');

        if(strlen($this->type)>0){
            $findTyp = DB::table('listing_status')->where('status_title',$this->type)->first();
            if( isset($findTyp->id) ) $listings_filter->where('listingtypestatus',$findTyp->slug);
        }
        
        if(strlen($this->category)>0){
            if (is_numeric($this->category)){
                $listings_filter->where('listingtype',$this->category);
            }else{
                $findCat = DB::table('listing_types')->where('type_title',$this->category)->first();
                if( isset($findCat->id) ) $listings_filter->where('listingtype',$findCat->id);
            }
        }
        
        if(strlen($this->state)>2){
            $listings_filter->where('state',$this->state);
        }

        if (strlen($this->tags)>0) {
            $listings_filter->where('listingtagstatus', $this->tags);
        }
        
        if(strlen($this->fromprice)>1 && filter_var ( $this->fromprice, FILTER_SANITIZE_NUMBER_INT)>1){
            $fromprice_ = filter_var ( $this->fromprice, FILTER_SANITIZE_NUMBER_INT);
            $listings_filter->where('property_price','>=',$fromprice_);
        }
        
        if(strlen($this->uptoprice)>1 && filter_var ( $this->uptoprice, FILTER_SANITIZE_NUMBER_INT)>1){
            $uptoprice_ = filter_var ( $this->uptoprice, FILTER_SANITIZE_NUMBER_INT);
            $listings_filter->where('property_price','<=',$uptoprice_);
        }
        
        
        if(strlen($this->superf)>1 && filter_var ( $this->superf, FILTER_SANITIZE_NUMBER_INT)>1){
            $listings_filter->where('land_area','>',(int)$this->superf);
        }
        
        if(strlen($this->supert)>1 && filter_var ( $this->supert, FILTER_SANITIZE_NUMBER_INT)>1){
            $listings_filter->where('land_area','<',(int)$this->supert);
        }

        $listings = $listings_filter->paginate(20);
        $this->pagActual = $listings->currentPage();
        $this->firstItem = $listings->firstItem();
        $this->totalProperties = $listings->total();


        
        foreach($listings as $property){
            $property->property_price = number_format($property->property_price, 0,',','.');
            $property->category = "CASAS";
            if($property->listingtype=='23') $property->category = "CASAS";
            if($property->listingtype=='24') $property->category = "DEPARTAMENTOS";
            if($property->listingtype=='25') $property->category = "CASAS COMERCIALES";
            if($property->listingtype=='26') $property->category = "TERRENOS";
            if($property->listingtype=='29') $property->category = "QUINTAS";
            if($property->listingtype=='30') $property->category = "HACIENDAS";
            if($property->listingtype=='32') $property->category = "LOCALES COMERCIALES";
            if($property->listingtype=='35') $property->category = "OFICINAS";
            if($property->listingtype=='36') $property->category = "SUITES";
            $property->type = "VENTA";
            if($property->listingtypestatus=='alquilar') $property->type = "ALQUILER";

            $bedroom=0; $bathroom=0;$garage=0;                      

            if(!empty($property->heading_details)){
                $allheadingdeatils=json_decode($property->heading_details); 
                foreach($allheadingdeatils as $singleedetails) { 
                    unset($singleedetails[0]);
                    for($i=1;$i<=count($singleedetails);$i++) { 
                    if($i%2==0) {  
                        if($singleedetails[$i-1]==41 || $singleedetails[$i-1]==86 || $singleedetails[$i-1]==49)
                        { 
                            if(empty($singleedetails[$i])){ $bedroom+=0; }else{
                            $bedroom+=$singleedetails[$i]; }
                        }
                        if($singleedetails[$i-1]==48 || $singleedetails[$i-1]==76 || $singleedetails[$i-1]==81)
                        {
                            if(empty($singleedetails[$i])){ $bathroom+=0; }else{
                            $bathroom+=$singleedetails[$i]; }
                        }
                        if($singleedetails[$i-1]==43)
                        {
                            if(empty($singleedetails[$i])){ $garage+=0; }else{
                            $garage+=$singleedetails[$i]; }
                        }
                    }
                    }
                    $i++;
                }
            }

            $property->bedroom  = $bedroom;
            $property->bathroom = $bathroom;
            $property->garage   = $garage;

        }


        return view('livewire.propmobile-tw',compact('listings','types','categories'));
    }
}
