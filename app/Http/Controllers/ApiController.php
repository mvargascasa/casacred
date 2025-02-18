<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $header .= 'From: <leads@grupohousing.com>' . "\r\n";
        $header .= "Reply-To: ".'info@grupohousing.com'."\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail('mvargas@casacredito.com,info@casacredito.com','Lead Grupo Housing: '.strip_tags($req->leadName), $message, $header);
        mail('sebas31051999@gmail.com', 'Lead Grupo Housing: ' . strip_tags($req->leadName), $message, $header);
    }
    public function getproperties(Request $req) {
        
        $properties = Listing::select('id','product_code','slug','listing_title','address','listingtypestatus','listingtype','property_price','images','heading_details','construction_area','land_area', 'available', 'status', 'property_by', 'user_id', 'created_at', 'contact_at')->with('user')->orderBy('product_code','DESC');
        
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
                            if(empty($singleedetails[$i])){ 
                                $garage+=0; 
                            } else {
                                if(is_numeric($singleedetails[$i])){
                                    $garage += $singleedetails[$i];
                                }
                                //$garage+=$singleedetails[$i]; 
                            }
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

    public function listActivatedProperties(Request $request){

        //return response()->json($request->all());

        $query = Listing::where('status', '1');

        // Lista de palabras a eliminar (stop words)
        $stopWords = ['de', 'en', 'para', 'y', 'a', 'el', 'la', 'los', 'las'];

        // Mapeo de tipos de propiedad con sus respectivos IDs
        $propertyTypeMap = [
            'casas' => 23,
            'departamentos' => 24,
            'casas comerciales' => 25,
            'terrenos' => 26,
            'quintas' => 29,
            'haciendas' => 30,
            'locales comerciales' => 32,
            'oficinas' => 35,
            'suites' => 36,
            'edificio' => 37,
            'colonial' => 38,
            'hotel' => 39,
            'en proyecto' => 40,
            'fábrica' => 41,
            'parqueadero' => 42,
            'bodega' => 43,
            'naves industriales' => 45
        ];

        // Mapeo de estados de venta/alquiler
        $statusMap = [
            'venta' => ['en-venta', 'on-sale'],
            'renta' => ['alquilar', 'rent'],
            'alquiler' => ['alquilar', 'rent']
        ];

        // Si hay un valor en 'listing_title', realizar la búsqueda
        if ($request->has('listing_title') && $request->listing_title != null) {
            // Separar las palabras clave
            $keywords = explode(' ', $request->input('listing_title'));

            // Eliminar las palabras que están en la lista de stop words
            $filteredKeywords = array_filter($keywords, function ($keyword) use ($stopWords) {
                return !in_array(strtolower($keyword), $stopWords); // Convertimos a minúsculas para asegurar la eliminación
            });

            // Variables para almacenar los criterios de búsqueda
            $propertyTypeIds = [];    // IDs de tipo de propiedad
            $statusTypes = [];        // Tipos de estado de venta/alquiler
            $locationKeywords = [];   // Palabras clave para ubicaciones

            foreach ($filteredKeywords as $keyword) {
                $lowerKeyword = strtolower($keyword);

                // Verificar si es un tipo de propiedad
                if (array_key_exists($lowerKeyword, $propertyTypeMap)) {
                    $propertyTypeIds[] = $propertyTypeMap[$lowerKeyword];
                }

                // Verificar si es un estado de venta/alquiler
                if (array_key_exists($lowerKeyword, $statusMap)) {
                    $statusTypes = array_merge($statusTypes, $statusMap[$lowerKeyword]);
                }

                // Si no es un tipo de propiedad ni un estado, se asume que es una ubicación
                if (!array_key_exists($lowerKeyword, $propertyTypeMap) && !array_key_exists($lowerKeyword, $statusMap)) {
                    $locationKeywords[] = $keyword; // Usamos la palabra original (no convertida a minúsculas)
                }
            }

            // Construir la consulta
            $query->where(function ($q) use ($propertyTypeIds, $statusTypes, $locationKeywords) {
                // Si se encontraron IDs de tipos de propiedad, buscar en 'listingtype'
                if (count($propertyTypeIds) > 0) {
                    $q->whereIn('listingtype', $propertyTypeIds);
                }

                // Si se encontraron estados de venta/alquiler, buscar en 'listingtypestatus'
                if (count($statusTypes) > 0) {
                    $q->whereIn('listingtypestatus', $statusTypes);
                }

                // Si hay palabras clave de ubicación, buscar en 'address', 'city', 'state', o 'listing_title'
                if (count($locationKeywords) > 0) {
                    $q->where(function ($subquery) use ($locationKeywords) {
                        foreach ($locationKeywords as $location) {
                            $subquery->orWhere('address', 'LIKE', '%' . $location . '%')
                                    ->orWhere('city', 'LIKE', '%' . $location . '%')
                                    ->orWhere('state', 'LIKE', '%' . $location . '%')
                                    ->orWhere('listing_title', 'LIKE', '%' . $location . '%');
                        }
                    });
                }
            });
        }


        // if ($request->has('listing_title') && $request->listing_title != null) {
        //     $query->where('listing_title', 'LIKE', '%' . $request->input('listing_title') . '%');
        // }

        if ($request->has('product_code') && $request->product_code != null) {
            $query->where('product_code', $request->input('product_code'));
        }

        if ($request->has('sector') && $request->sector != null) {
            $query->where('sector', 'LIKE', '%' . $request->input('sector') . '%');
        }

        if ($request->has('city') && $request->city != null) {
            $query->where('city', 'LIKE', '%' . $request->input('city') . '%');
        }

        if ($request->has('state') && $request->state != null) {
            $query->where('state', 'LIKE', '%' . $request->input('state') . '%');
        }

        if ($request->has('min_price') && $request->has('max_price') && $request->min_price != null && $request->max_price != null) {
            $query->whereBetween('property_price', [$request->input('min_price'), $request->input('max_price')]);
        } elseif ($request->has('min_price') && $request->min_price != null) {
            $query->where('property_price', '>=', $request->input('min_price'));
        } elseif ($request->has('max_price') && $request->max_price != null) {
            $query->where('property_price', '<=', $request->input('max_price'));
        }

        $page = $request->input('page', 1); // Página actual, por defecto es 1
        $properties = $query->orderBy('product_code', 'desc')->paginate(10, ['*'], 'page', $page);

        return response()->json($properties);
    }

    public function getPropertieBySlug($slug){

        $propertie = Listing::where('slug', $slug)->first();

        return response()->json($propertie);

    }

    public function getPropertyType($type){

        $property_type = DB::table('listing_types')->where('id', $type)->first();

        return response()->json($property_type);

    }

    public function getTransactionType($transaction){

        $id_transaction = 0;

        switch ($transaction) {
            case 'en-venta':
            case 'En venta':
            case 'on sale':
                $id_transaction = 1;
                break;

            case 'alquilar':
                $id_transaction = 2;
                break;
            
            case 'proyectos':
                $id_transaction = 3;
                break;
        }
        
        $property_transaction = DB::table('listing_status')->where('id', $id_transaction)->first();

        return response()->json($property_transaction);
    }

    public function getDetails(){

        $details = DB::table('listing_characteristics')->get();

        return response()->json($details);

    }

    public function getServices(){

        $services = DB::table('listing_services')->get();

        return response()->json($services);

    }

    public function getGeneralCharacteristics(){

        $general_characteristics = DB::table('listing_general_characteristics')->get();

        return response()->json($general_characteristics);

    }

    public function getEnvironments(){

        $environments = DB::table('listing_environments')->get();

        return response()->json($environments);
        
    }

    public function listingscsv(){ 
    
        // $listings  = Listing::where('status', '1')->orderBy('id','desc')->limit(400)->get();
        $listings = Listing::where('status', '1')->where('available', '1')->latest()->limit(500)->get();
    
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
                                'google_product_category'
                            );	
            fputcsv($f, $fields, $delimiter);
            
            foreach($listings as $li){	
    
                $imgcover="https://grupohousing.com/uploads/listing/";	
                $imgpri = explode("|", $li->images);
    
                if(isset($imgpri[0]))
                    $imgpri = $imgcover.$imgpri[0];
                else
                    $imgpri = $imgcover.$li->cover_image;
    
                $li->images = $imgcover.str_replace("|", ",$imgcover", $li->images);
                $condition = 'Nueva';
                if($li->listingtagstatus==6) $condition = 'Usada';

                $description = strip_tags($li->listing_description);
    
                $lineData = array(	$li->id,	
                                    $li->product_code, 
                                    'Casa Credito Inmobiliaria',
                                    'in stock',
                                    'new',
                                    'https://grupohousing.com/propiedad/'.$li->slug,
                                    $imgpri,
                                    $li->images,
                                    ucwords(strtolower($li->listing_title)), 
                                    ucwords(strtolower($description)), 
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
                                    '536'
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
        $projectslistings = Listing::where('listingtagstatus', 5)->where('listingtype', 23)->where('available', 1)->get();
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

    public function listPropertiesHousing(){
        
        $properties = Listing::select('id', 'product_code', 'listing_title', 'listing_description', 'bedroom', 'bathroom', 'garage', 'property_price')->where('property_by', 'Housing')->get();

        return $properties;

    }

    public function propertyById($id){
        
        $listing = Listing::where('id', $id)->first();
        
        if($listing){
            return response()->json($listing);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Property ' . $id . ' not found'
            ]);
        }
    }

    public function propertyByCode($code){

        $listing = Listing::where('product_code', 'LIKE', '%' . $code . '%')->first();

        if($listing){
            return response()->json($listing);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Property ' . $code . ' not found'
            ]);
        }
    }

    public function getavailableproperties(){

        $properties = Listing::select('id','product_code','slug','listing_title','address','listingtypestatus','listingtype','property_price','images','heading_details','construction_area','land_area', 'available', 'status', 'property_by', 'user_id', 'created_at', 'contact_at')->where('available', 1)->get();
        return response()->json($properties);
    }

    public function updatedPropertie($property_code){
        $updated_properties = DB::table('updated_listing')->where('property_code', $property_code)->get();
        return response()->json($updated_properties);
    }
}