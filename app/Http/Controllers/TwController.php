<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contactos;
use App\Models\Listing;
use App\Models\Oportunidades;
use App\Models\User;
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
        $details = DB::table('listing_characteristics')->orderBy('charac_titile', 'ASC')->get(); 
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

        $isvalid = $this->iscomplete($listing);

        if(Auth::user()->role != "administrator" && $listing->user_id!= Auth::id()){
            return redirect()->route('admin.listingshow',compact('listing'));
        }
        $benefits = DB::table('listing_benefits')->get();   
        $services = DB::table('listing_services')->get();
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->orderBy('charac_titile', 'ASC')->get();  
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
                    'tags','details','states','optAttrib','cities', 'isvalid'));
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
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $users = DB::select("select id, name from users where (role = 'ASESOR' and status = 1) or (role = 'administrator' and name = 'KAREN' or role = 'administrator' and name = 'SILVANA' or role = 'administrator' and name = 'MARIELA' or role = 'administrator' and name = 'MICHELLE' or role = 'administrator' and name = 'FERNANDA')");
        $ismobile = $this->isMobile();
        return view('admin.listing.index', compact('states', 'users', 'ismobile'));
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

    public function setcomment(Request $request){

        $listing = Listing::select('product_code')->where('id', $request->listing_id)->first();

        $newcomment = Comment::create([
            'listing_id' => $request->listing_id,
            'user_id' => Auth::user()->id,
            'property_code' => $listing->product_code,
            'type' => $request->type,
            'value' => $request->value,
            'comment' => $request->comment
        ]);

        if($newcomment){return true;} 
        else {return false;}
    }

    public function isMobile(){
        $mobile = false; 
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            $useragent= $_SERVER['HTTP_USER_AGENT'];
            $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
            if($ismobile) $mobile = true; else  $mobile = false; 
        }else{ $ismobile = false; }
        return $mobile;
    }

    public function iscomplete(Listing $listing){
        
        $isvalid = true;

        if($listing->listing_type == null || $listing->owner_name == null || $listing->identification == null || $listing->phone_number == null || $listing->owner_email == null || $listing->available == null || $listing->listing_title == null || $listing->meta_description == null || $listing->property_price == null || $listing->property_price_min == null || $listing->construction_area == null || $listing->land_area == null || $listing->Front == null || $listing->Fund == null || $listing->listyears == null || $listing->state == null || $listing->city == null || $listing->address == null || $listing->lat == null || $listing->lng == null || $listing->listingtype == null || $listing->listingtypestatus == null || $listing->listingtagstatus == null || $listing->listing_description == null || $listing->images == null || $listing->heading_details == null) $isvalid = false;

        // if(!isset($listing->listing_title) || $listing->listing_title == "" || !isset($listing->images) || $listing->images == "" || !isset($listing->meta_description) || $listing->meta_description == "" || !isset($listing->Front) || $listing->Front == "" || !isset($listing->Fund) || $listing->Fund == "" || !isset($listing->land_area) || $listing->land_area == "" || !isset($listing->construction_area) || $listing->construction_area == "" || !isset($listing->property_price) || $listing->property_price == "" || !isset($listing->property_price_min) || $listing->property_price_min == "" || !isset($listing->listing_description) || $listing->listing_description == "" || !isset($listing->listing_type) || $listing->listing_type == "" || !isset($listing->address) || $listing->address == "" || !isset($listing->state) || $listing->state == "" || !isset($listing->city) || $listing->city == "" || !isset($listing->listingtype) || $listing->listingtype == "" || !isset($listing->listingcharacteristic) || $listing->listingcharacteristic == "" || !isset($listing->listinglistservices) || $listing->listinglistservices == "" || !isset($listing->listingtypestatus) || $listing->listingtypestatus == "" || !isset($listing->listingtagstatus) || $listing->listingtagstatus == "" || !isset($listing->listyears) || $listing->listyears == "" || !isset($listing->lat) || $listing->lat == "" || !isset($listing->lng) || $listing->lng == "" || !isset($listing->available)  || $listing->available == "" || !isset($listing->heading_details) || $listing->heading_details == "" || !isset($listing->owner_name) || $listing->owner_name == "" || !isset($listing->owner_email) || $listing->owner_email == "" || !isset($listing->identification) || $listing->identification == "" || !isset($listing->phone_number) || $listing->phone_number == ""){
        //     $isvalid = false;
        // }
        return $isvalid;
    }
}
