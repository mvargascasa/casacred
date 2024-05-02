<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\Word;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Proplist extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchtxt,$category,$state,$city,$type,$fromprice,$uptoprice,$pressButtom,$tags,$range, // $tags y $range nueva variable para filtrar
            $tester, $ptype, $pstate,
            $bedrooms, $bathrooms, $garage,
            $sector;

    public $states, $cities, $sectores;

    public $stateID = 1022; 
    public $cityID = 15307; 
    public $typeID;

    // protected $queryString = [  'searchtxt'=> ['except' => ''],
    //                             'category'=> ['except' => ''],
    //                             'type'=> ['except' => ''],
    //                             'ptype' => ['except' => ''], // new variable
    //                             'state'=> ['except' => ''],
    //                             'pstate' => ['except' => ''],
    //                             'city'=> ['except' => ''],
    //                             'fromprice'=> ['except' => ''],
    //                             'uptoprice'=> ['except' => ''],
    //                             'tags' => ['except' => ''],
    //                             'range' => ['except' => ''],
    //                             'bedrooms' => ['except' => ''],
    //                             'bathrooms' => ['except' => '']    
    //                         ]; //se agrego en este array

    public function mount(){
        $this->getStates();
        //$this->cities = DB::table('info_cities')->where('state_id', $this->stateID)->orderBy('name')->get();
        //$this->sectores = DB::table('info_sector')->where('city_id', $this->cityID)->orderBy('name')->get();
        $this->ptype = $this->type; 
    }

    public function updated(){
        $this->getStates();
        $this->getCities($this->stateID);
        $this->getSectores($this->cityID);
    }

    public function getStates(){
        $this->states = DB::table('info_states')->where('country_id', 63)->orderBy('name')->get();
    }

    public function getCities($state_id){
        $this->getStates();
        $this->stateID = $state_id;
        $this->sectores = null;
        $this->cities = DB::table('info_cities')->where('state_id', $state_id)->orderBy('name')->get();
    }

    public function getSectores($city_id){
        $this->cityID = $city_id;
        $state = DB::table('info_cities')->select('state_id')->where('id', $city_id)->first();
        $this->getCities($this->stateID);
        $this->sectores = DB::table('info_sector')->where('city_id', $city_id)->orderBy('name')->get();
    }

    public function render(Request $request)
    {

        $this->getStates();
        $this->getCities($this->stateID);
        $this->getSectores($this->cityID);
        //dd($this->searchtxt);
        //dd($this->state);

        $useragent= $_SERVER['HTTP_USER_AGENT'];
        $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
        if($ismobile) $mobile = true; else  $mobile = false; 

        if($this->pressButtom>0){
            $this->pressButtom=0;
            $this->resetPage();
        }
        $types = DB::table('listing_types')->get(); 
        $categories = DB::table('listing_status')->get(); 
        $listings_filter = Listing::where('status',1)->latest();
        $listings_filter->where('available', 1);
        
        if(strlen($this->searchtxt)>2){
            $txt = filter_var ( $this->searchtxt, FILTER_SANITIZE_NUMBER_INT);
            if($txt>999){
                $listings_filter->where('product_code', 'LIKE', '%'.$txt.'%');
                $this->state = null;
            }else{
                $listings_filter->where('address','LIKE',"%$this->searchtxt%");
            }   
            if($listings_filter->count()<1){                
                $listings_filter = Listing::where('status',1)->latest();
                $listings_filter->where('listing_title','LIKE',"%$this->searchtxt%");
            }
        }

        //buscando por tags
        if(strlen($this->tags)>0){
            $listings_filter->where('listingtagstatus', $this->tags);
        }

        //buscando por range años de construccion
        if ($this->range != null) {
            if(strlen($this->range)>=0){
                $listings_filter->where('listyears', $this->range);
            }
        }

        if(strlen($this->category)>2){
            if($this->category == "alquiler" || $this->category == "Alquiler") $this->category = "alquilar";
            if($this->category == "venta") $this->category = "en-venta";
            if($this->category == "proyectos") $this->category = "proyectos";
            $listings_filter->where('listingtypestatus', 'LIKE', "%$this->category%");
        }

        // if($this->type){
        //     $this->ptype = null;
        //     if (is_numeric($this->type)){
        //         $listings_filter->where('listingtype',$this->type);
        //     }else{
        //         $findCat = DB::table('listing_types')->where('type_title', 'LIKE', "%$this->type%")->first();
        //         if( isset($findCat->id) ) $listings_filter->where('listingtype',$findCat->id);
        //         dd($listings_filter);
        //         $this->typeID = $findCat->id;
        //     }
        // }

        //buscador para que funcione type desde el search del banner de la nueva pagina home
        if(strlen($this->ptype)>0){
            //dd($this->ptype);
            $this->type = null;
            //$listings_filter->where('listingtype', $this->ptype);
            if(is_numeric($this->ptype)){
                $listings_filter->where('listingtype', $this->ptype);
            } else {
                $findCat = DB::table('listing_types')->where('type_title', $this->ptype)->first();
                if( isset($findCat->id)) $listings_filter->where('listingtype', $findCat->id);
                $this->typeID = $findCat->id;
            }
        }

        if(strlen($this->bedrooms)>0){
            $this->bedrooms = substr($this->bedrooms, 0, 1);
            $listings_filter->where("bedroom", $this->bedrooms);
        }
        
        if(strlen($this->bathrooms)>0){
            $this->bathrooms = substr($this->bathrooms, 0, 1);
            $listings_filter->where("bathroom", $this->bathrooms);
        }

        if(strlen($this->garage)>0){
            $this->garage = substr($this->garage, 0, 1);
            $listings_filter->where("garage", $this->garage);
        }
        
        // if(strlen($this->bathrooms)>0){
        //     $this->bathrooms = substr($this->bathrooms, 0, 1);
        //     $listings_filter->where("bathroom", $this->bathrooms);
        // }

        if(strlen($this->state)>2){
            $listings_filter->where('state', 'LIKE', '%'.$this->state.'%');
            $this->pstate = null;
        }

        if(strlen($this->pstate)>2){
            $listings_filter->where('state', 'LIKE', '%'.$this->pstate.'%');
            $this->state = null;
        }

        //dd($this->city);

        if(strlen($this->city)>2 && $this->city != "ecuador") $listings_filter->where('city', 'LIKE',  '%'.$this->city.'%'); 

        if($this->sector){
            $listings_filter->where('sector', 'LIKE', '%'.$this->sector.'%');
        }
        
        if(strlen($this->fromprice)>1 && filter_var ( $this->fromprice, FILTER_SANITIZE_NUMBER_INT)>1){
            $fromprice_ = filter_var ( $this->fromprice, FILTER_SANITIZE_NUMBER_INT);
            $listings_filter->where('property_price','>',$fromprice_);
        }
        
        if(strlen($this->uptoprice)>1 && filter_var ( $this->uptoprice, FILTER_SANITIZE_NUMBER_INT)>1){
            $uptoprice_ = filter_var ( $this->uptoprice, FILTER_SANITIZE_NUMBER_INT);
            $listings_filter->where('property_price','<',$uptoprice_);
        }
        
        $listings = $listings_filter->paginate(20);

        return view('livewire.proplist',compact('listings','types','categories','mobile'));
    }
}
