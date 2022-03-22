<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index(){       
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();      
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            $useragent= $_SERVER['HTTP_USER_AGENT'];
            $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
        }else{ $ismobile = false; }

        if($ismobile) return view('indexmobile',compact('states'));
        else          return view('indexweb',compact('states'));

    }

    public function home(){
        return view('home');
    }

    public function creditos(){
        return view('creditos');
    }

    public function propiedades(){
        $listings = Listing::where('status',1)->orderBy('id','desc')->paginate(12);
        return view('propiedades',compact('listings'));
    }

    public function indextest(){
        return view('webtail/index');
    }

    public function mobile(){
        return view('indexmobile');
    }

    public function mobiledet(Listing $listing){
        $benefits = DB::table('listing_benefits')->get();   
        $services = DB::table('listing_services')->get();
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->get();  
        return view('detailmobile',compact('listing','details','benefits','services','types'));
    }
    
    

    public function detail(Listing $listing){
        $mobile = false; 
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            $useragent= $_SERVER['HTTP_USER_AGENT'];
            $ismobile=preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|zh-cn|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4));
            if($ismobile) $mobile = true; else  $mobile = false; 
        }else{ $ismobile = false; }

        $benefits = DB::table('listing_benefits')->get();   
        $services = DB::table('listing_services')->get();
        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->get();  
        if($ismobile) return view('detailmobile',compact('listing','details','benefits','services','types'));
        else          return view('detailprop',compact('listing','details','benefits','services','types','mobile'));
    }
    
    public function getcities($id){
            $cities = DB::table('info_cities')->where('state_id',$id)->get(); 
            return response()->json($cities);      
    }    
    
    public function notariausa(){
        return view('services.notariausa');
    }         
    
    public function serviciosall(){
        $services=Service::where('status',1)->where('parent',0)->get();
        foreach($services as $serv){
            
            echo '<img src="'.url('uploads/services',$serv->image).'">';
            echo '<a href="'.url('servicios/'.$serv->slug).'">'.$serv->title.'</a><br>';

        }
        
    }
    
    public function servicios(Service $service){
        $services=Service::where('status',1)->where('parent',$service->id)->get();
        return view('services.subs',compact('services','service'));
    }     
    
    public function servicio(Service $service){        
        $otros = Service::where('status',1)->where('parent',$service->parent)->get();
        return view('services.detail',compact('service','otros'));
    }  
    
    public function sendlead(Request $request){

        $message = "<br><strong>Nuevo Lead</strong>
                    <br> Nombre: ". strip_tags($request->fname)."
                    <br> Telef: ".  strip_tags($request->tlf)."
                    <br> Email: ".  strip_tags($request->email)."
                    <br> Interes: ".strip_tags($request->interest)."
                    <br> Mensaje: ".strip_tags($request->message)."
                    <br> Fuente: Website ";
                
        $header='';
        $header .= 'From: <leads@casacredito.com>' . "\r\n";
        $header .= "Reply-To: ".'info@casacredito.com'."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail('mvargas@casacredito.com,info@casacredito.com','Lead CasaCredito: '.strip_tags($request->fname), $message, $header);
    }    
    
    public function politicas(){
        return view('politicas');
    }     
    
    public function seo(){
        $listings = Listing::where('status',1)->latest()->get();
        return view('seo',compact('listings'));
    } 

    
    public function listingscsv(){ 

		$listings  = Listing::where('status', '1')->latest()->limit(500)->get();

		if(count($listings)>0){

			$delimiter = ",";			
			$filename = "listings_" . date('Y-m-d') . ".csv";			
			$f = fopen('php://memory', 'w');			
			 $fields = array(	'id',
								'mpn',
								'brand',
								'availability',
								'condition',
								'link',
								'image_link',
								'additional_image_link',
								'title',
								'description',
								'address.city',
								'address.region',
								'address.country',
								'address.postal_code',
								'listing_type',
								'num_baths',
								'num_beds',
								'num_units',
								'property_type',
								'price', 
								'inventory',
								'year_built',
								'google_product_category');	
			fputcsv($f, $fields, $delimiter);
			
			foreach($listings as $li){	

				$imgcover="https://casacredito.com/uploads/listing/";	
				$imgpri = array_filter(explode("|", $li->images));

				if(isset($imgpri[0]))
					$imgpri = $imgcover.$imgpri[0];
				else
					$imgpri = $imgcover.$li->cover_image;

				$li->images = $imgcover.str_replace("|", ",$imgcover", $li->images);
				$condition = 'Nueva';
				if($li->listingtagstatus==6) $condition = 'Usada';

				$lineData = array(	$li->id,	
									$li->product_code, 
									'Casa Credito Inmobiliaria',
									'in stock',
									'new',
									'https://casacredito.com/propiedad/'.$li->slug,
									$imgpri,
									$li->images,
									ucwords(strtolower($li->listing_title)), 
									strip_tags($li->listing_description), 
									'Cuenca',
									'Azuay',
									'Ecuador',
									'010202',
									'new_listing',
									'1',
									'1',
									'1',									
									'house',
									$li->property_price.' USD',
									'1',
									'2020',
									'Real State'
								);
				fputcsv($f, $lineData, $delimiter);
			}
			header('Access-Control-Allow-Origin: *');
			fseek($f, 0);			
			header('Content-Type: text/csv');
			header('Content-Disposition: attachment; filename="' . $filename . '";');
			fpassthru($f);
		}
        
	}
	


}
