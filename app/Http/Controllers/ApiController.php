<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    
    public function sendlead(Request $req) {
        
        $message = "<br><strong>Nuevo Lead</strong>
                    <br> Nombre: ". strip_tags($req->leadName)."
                    <br> Telef: ".  strip_tags($req->leadPhone)."
                    <br> Email: ".  strip_tags($req->leadEmail)."
                    <br> Interes: ".strip_tags($req->leadInterest)."
                    <br> Mensaje: ".strip_tags($req->leadComment)."
                    <br> Fuente: Website Movil";
                
        $header='';
        $header .= 'From: <leads@casacredito.com>' . "\r\n";
        $header .= "Reply-To: ".'info@casacredito.com'."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail('mvargas@casacredito.com,info@casacredito.com','Lead CasaCredito: '.strip_tags($req->leadName), $message, $header);
        mail('sebas31051999@gmail.com', 'Lead CasaCredito: ' . strip_tags($req->leadName), $message, $header);
    }
    public function getproperties(Request $req) {
        
        $properties = Listing::select('id','product_code','slug','listing_title','address','listingtypestatus','listingtype','property_price','images','heading_details','construction_area','land_area')->where('status',1)->orderBy('product_code','DESC');
        
        if(strlen($req->txt)>2){
            $txt = filter_var ( $req->txt, FILTER_SANITIZE_NUMBER_INT);
            if($txt>999){
                $properties->where('product_code',$txt);
            }else{
                $properties->where('address','LIKE',"%$req->txt%");
            }   
            if($properties->count()<1){                
                $properties = Listing::select('id','listing_title','product_code','address','listingtypestatus','listingtype','property_price','images','heading_details')->where('status',1)->orderBy('product_code','DESC');
                $properties->where('listing_title','LIKE',"%$req->txt%");
            }
        }

        if($req->category){
            if (is_numeric($req->category)){
                $properties->where('listingtype',$req->category);
            }else{
                $urlget = urldecode($req->category);
                $findCat = DB::table('listing_types')->where('type_title',$urlget)->first();
                if( isset($findCat->id) ) $properties->where('listingtype',$findCat->id);
            }
        }
        
        if($req->type)  $properties->where('listingtypestatus',$req->type);
        if($req->state)     $properties->where('state',$req->state);
        if($req->city)      $properties->where('city',$req->city);
        if($req->fromprice) $properties->where('property_price','>',$req->fromprice);
        if($req->uptoprice) $properties->where('property_price','<',$req->uptoprice);
        $sendprops = $properties->get();
        foreach($sendprops as $property){
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

           


        return response()->json($sendprops);
    }




    public function listingscsv(){ 
    
        // $listings  = Listing::where('status', '1')->orderBy('id','desc')->limit(400)->get();
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
                $imgpri = explode("|", $li->images);
    
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
    
    public function getnotifications(){
        $notifications = Comment::select('property_code', 'comment', 'property_price AS new_price', 'property_price_prev AS old_price', 'created_at')
                        ->orderBy('created_at', 'DESC')
                        ->get();
        return $notifications;
    }

    public function getprojectlistings(){
        $projectslistings = Listing::where('listingtagstatus', 5)->where('listingtype', 23)->get();
        foreach ($projectslistings as $projectlisting) {
            $type = DB::table('listing_types')->select('type_title')->where('id', $projectlisting->listingtype)->first();
            $projectlisting->listingtype = $type->type_title;
        }
        return response()->json($projectslistings);
    }

    public function getlistingbyslug($slug){
        $listing = Listing::where('listingtagstatus', 5)->where('listingtype', 23)->where('slug', $slug)->first();
        return response()->json($listing);
    }
}