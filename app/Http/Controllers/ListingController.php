<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Sector;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class ListingController extends Controller
{
       
    public function index(){
        // $ismobile = $this->isMobile();
        return view('admin.listing.index');
    }
    
    public function create(){

        $currentRouteName = Route::currentRouteName();
        
        $lastcode = Listing::where('product_code','!=','')->orderBy('product_code','desc')->first();
        //$lastcode = Listing::latest()->first();

        strlen($lastcode->product_code) > 4 ? $lastcode->product_code = substr($lastcode->product_code, 2) : null;

        //dd($lastcode->product_code);

        $benefits = DB::table('listing_benefits')->get();  
        $services = DB::table('listing_services')->get();  

        //new data to db
        $environments = DB::table('listing_environments')->get();
        $general_characteristics = DB::table('listing_general_characteristics')->get();

        $types = DB::table('listing_types')->get();  
        $details = DB::table('listing_characteristics')->orderBy('charac_titile', 'ASC')->get(); 
        $categories = DB::table('listing_status')->get();
        $tags = DB::table('listing_tags')->get();
        
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $optAttrib = [];
        foreach($states as $state){
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }

        $optAttribSector = []; 

        return view('admin.listing.add-tw',compact('benefits','services','types','categories','tags','details','states','optAttrib','lastcode', 'environments', 'general_characteristics', 'optAttribSector', 'currentRouteName'));
    }   
    public function store(Request $request){

        $listing = Listing::where('product_code', $request->product_code)->first();

        if(isset($request->listing_title)){
            $slug = Str::of($request->listing_title) ->trim()->slug()->limit(70,'').'-'.rand(10000, 99999);
            $request->merge(['slug' => $slug]);
        }
        $request->merge(['user_id' => Auth::id()]);
        
        if(is_array($request->checkBene)) $request->merge(['listingcharacteristic' => implode(",", $request->checkBene)]); 
        else $request->merge(['listingcharacteristic' => '']);

        if(is_array($request->checkgc)) $request->merge(['listinggeneralcharacteristics' => implode(",", $request->checkgc)]); 
        else $request->merge(['listinggeneralcharacteristics' => '']);

        if(is_array($request->checkEnvir)) $request->merge(['listingenvironments' => implode(",", $request->checkEnvir)]); 
        else $request->merge(['listingenvironments' => '']);
        
        if(is_array($request->checkServ)) $request->merge(['listinglistservices' => implode(",", $request->checkServ)]); 
        else $request->merge(['listinglistservices' => '']);
        
        if(is_array($request->updatedImages)) $request->merge(['images' => implode("|", $request->updatedImages)]); 
        else $request->merge(['images' => '']);

        $result=[];        $ii=0;
        foreach($request->all() as $key=>$value){ if("detail" == substr($key,0,6)) $result[] = $value; }
        $bathrooms=0;$bedrooms=0;$garage=0;
        if(count($result)>0){
            $request->merge(['heading_details' => json_encode($result)]);
            //return count($result);
            foreach ($result as $r) {
                for ($i=0; $i < count($r); $i++) { 
                    if($r[$i] == 49 || $r[$i] == 86 || $r[$i] == 41) $bedrooms = $bedrooms + $r[$i+1];
                    if($r[$i] == 48 || $r[$i] == 76 || $r[$i] == 81) $bathrooms = $bathrooms + $r[$i+1];
                    if($r[$i] == 43) $garage = $garage + $r[$i+1];
                }
            }
        } else {
            $request->merge(['heading_details' => '']);
        }
        //return "bedrooms " . $bedrooms . " bathrooms " . $bathrooms . " garage " . $garage;
        
        $uploads=[];

        if ($request->hasFile('galleryImages')) {
            foreach($request->file('galleryImages') as $image){
                if ($image->isValid()) {
                    $validate = $image->getClientOriginalExtension();
                    if(in_array($validate,['jpeg','jpg','png','JPG','PNG'])){
                        $img = Image::make($image);
                        $img2 = Image::make($image);
                        $img3 = Image::make($image);
                        $mime = $img->mime();
                        if ($mime == 'image/jpeg') $ext = '.jpg';
                        elseif ($mime == 'image/png') $ext = '.png';
                        else $ext = '';
                        if(strlen($ext)>0){
                            $folder = 'uploads/listing/';
                            $nameFile = "IMG_$listing->id-".uniqid().$ext;
                            $img->save($folder.$nameFile);
                            $uploads[]= $nameFile;
                            
                            $folder2 = 'uploads/listing/600/';                                 
                            $img2->fit(600,400 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $img2->save($folder2.$nameFile, 40);
                            
                            $folder3 = 'uploads/listing/300/';                                 
                            $img3->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $img3->save($folder3.$nameFile, 40);

                            //agregando marca de agua
                            $folder_1 = 'uploads/listing/thumb/';
                            //$namefile = "THUMB_IMG_$listing->id-".uniqid().$ext;
                            $watermark = Image::make(public_path('img/MARCADEAGUA.png'));
                            $imageWidth = $img->width();

                            $watermarkSize = round(10 * $imageWidth / 40);
                            $watermark->resize($watermarkSize, null, function($constraint){$constraint->aspectRatio();});

                            $img->insert($watermark, 'center', 0, 0);
                            $img->save($folder_1.$nameFile);

                            $folder_2 = 'uploads/listing/thumb/600/';
                            $img2->fit(600,400 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $imageWidth2 = $img2->width();
                            $watermarkSize = round(10 * $imageWidth2 / 40);
                            $watermark->resize($watermarkSize, null, function($constraint){$constraint->aspectRatio();});

                            $img2->insert($watermark, 'center', 0, 0);
                            $img2->save($folder_2.$nameFile, 40);

                            $folder_3 = 'uploads/listing/thumb/300/';
                            $img3->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $imageWidth3 = $img3->width();
                            $watermarkSize = round(10 * $imageWidth3 / 40);
                            $watermark->resize($watermarkSize, null, function($constraint){$constraint->aspectRatio();});

                            $img3->insert($watermark, 'center', 0, 0);
                            $img3->save($folder_3.$nameFile, 40);
                        }
                    } elseif ($validate == "mp4"){
                        $namefile = $listing->slug.".".$image->getClientOriginalExtension();
                        $filepath = public_path() . '/uploads/video/';
                        $image->move($filepath, $namefile);
                        $listing->video = $namefile;
                    }
                }
            }            
        }

        if(count($uploads)>0){
            $save_uploads = implode("|", $uploads);
            if(strlen($request->images)>2){
                $listing->update(['images'  =>  $request->images.'|'.$save_uploads   ]);
            }else{
                $listing->update(['images'  => $save_uploads   ]);
            }   
        }

        if(!$listing){
            $listing = Listing::create($request->all());
        } else {
            //set numero de habitaciones, baños y garage para los filtros
            $listing->listing_title = $request->listing_title;
            if(!isset($listing->slug)) $listing->slug = $request->slug;

            $listing->bedroom = $bedrooms;
            $listing->bathroom = $bathrooms;
            $listing->garage = $garage;

            $listing->num_factura = $request->num_factura;

            $listing->meta_description = $request->meta_description;
            $listing->keywords = $request->keywords;
            $listing->Front = $request->Front;
            $listing->Fund = $request->Fund;
            $listing->land_area = $request->land_area;
            $listing->construction_area = $request->construction_area;
            $listing->property_price = $request->property_price;
            $listing->property_price_min = $request->property_price_min;

            $listing->aval = $request->aval;

            //new values
            $listing->owner_address = $request->owner_address;
            $listing->cadastral_key = $request->cadastral_key;
            $listing->aliquot = $request->aliquot;
            $listing->observations_type_property = $request->observations_type_property;
            $listing->listinggeneralcharacteristics = $request->listinggeneralcharacteristics;
            $listing->listingenvironments = $request->listingenvironments;
            if($request->cavity_error == "on") $listing->cavity_error = 1; else $listing->cavity_error = 0;
            if($request->vip == "on") $listing->vip = 1; else $listing->vip = 0;
            if($request->mortgaged == "on") $listing->mortgaged = 1; else $listing->mortgaged = 0;      

            $listing->listing_description = $request->listing_description;
            $listing->listing_type = $request->listing_type;
            $listing->address = $request->address;

            //save sector
            $listing->sector = $request->sector;

            $listing->state = $request->state;
            $listing->city = $request->city;
            $listing->listingtype = $request->listingtype;

            if($request->listingtype == 26) $listing->planing_license = $request->planing_license;
            // if($request->listingtype != null && $request->fragment == "second"){
            //     $codeCategory = DB::table('listing_types')->select('code')->where('id', $request->listingtype)->first();
            //     if($codeCategory != null){
            //         $listing->product_code = $codeCategory->code.$listing->product_code;
            //     }
            // }

            //$listing->mortgaged = $request->mortgaged;

            if($request->mortgaged == "on"){
                $listing->entity_mortgaged = $request->entity_mortgaged;
                $listing->mount_mortgaged = $request->mount_mortgaged;
                $listing->warranty = $request->warranty; 
            } else{
                $listing->entity_mortgaged = null;
                $listing->mount_mortgaged = null;
                $listing->warranty = null; 
            }

            $listing->listingcharacteristic = $request->listingcharacteristic;
            $listing->listinglistservices = $request->listinglistservices;
            $listing->listingtypestatus = $request->listingtypestatus;
            $listing->listingtagstatus = $request->listingtagstatus;

            $listing->listyears = $request->listyears;
            $listing->lat = $request->lat;
            $listing->lng = $request->lng;

            $listing->available = $request->available;
            
            $listing->user_id = $request->user_id;

            $listing->heading_details = $request->heading_details;
            $listing->owner_name = $request->owner_name;
            $listing->owner_email = $request->owner_email;

            $listing->identification = $request->identification;
            $listing->phone_number = $request->phone_number;

            $listing->status = $request->status;

            if($request->niv_constr <= 0) $listing->niv_constr = null; else $listing->niv_constr = $request->niv_constr;
            if($request->num_pisos <= 0) $listing->num_pisos = null; else $listing->num_pisos = $request->num_pisos;
            if($request->pisos_constr <= 0) $listing->pisos_constr = null; else $listing->pisos_constr = $request->pisos_constr;

            $tiktok_html = str_replace('max-width: 605px;min-width: 325px;', 'min-width: 100%;', $request->tiktokcode);
            if($tiktok_html) $listing->tiktokcode = $tiktok_html;

            //$listing->credit_vip = $request->credit_vip;
            //bloqueando la propiedad una vez creada
            //$listing->locked = true;
            if(!$listing->locked && ($listing->owner_name != null || $request->owner_name != null) && ($listing->identification != null || $request->identification != null) && ($listing->phone_number != null || $request->phone_number != null) && ($listing->owner_email != null || $request->owner_email != null) && ($listing->owner_address != null || $request->owner_address != null)) $listing->locked = true;
            
            if($request->currentUrl == "admin.housing.property.create") $listing->property_by = 'Housing';
            if($request->currentUrl == "admin.promotora.property.create") $listing->property_by = 'Promotora';
            else $listing->property_by = 'Casa Credito';

            $listing->contact_at = $listing->created_at;

            $listing->save();
        }

        // $isvalid = $this->iscomplete($listing);
        // if(!$isvalid){
        //     $delete_at = Carbon::parse($listing->created_at)->addDay();
        //     $listing->delete_at = $delete_at;
        // } else {
        //     $listing->delete_at = null;
        // } 
        // $listing->save();

        // if($request->fragment == "first" || $request->fragment == "second" || $request->fragment == "third"){
        return response()->json([
            'success' => true,
            'fragment' => $request->fragment,
            'productcode' => $listing->product_code
        ]);
        // } else if($request->fragment == "fourth") {
        //     return redirect()->route('admin.listings.edit',compact('listing'))->with('status','Propiedad Creada');
        // }

    }
    
    public function edit(Listing $listing){
        // if(Auth::user()->role != "administrator" && $listing->user_id!= Auth::id()){
        //     return redirect()->route('admin.listings.show',compact('listing'));
        // }
        $currentRouteName = Route::currentRouteName();

        $isvalid = $this->iscomplete($listing);

        $benefits = DB::table('listing_benefits')->get();   
        $services = DB::table('listing_services')->get();

        //new data to db
        $environments = DB::table('listing_environments')->get();
        $general_characteristics = DB::table('listing_general_characteristics')->get();

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

        $optAttribSector = [];
        $cityID = 0;
        foreach($cities as $city){
            if($listing->city == $city->name){$cityID = $city->id;}
            $optAttribSector[$city->name] = ['data-id' => $cityID];
        }

        $sectores = Sector::where('city_id', $cityID)->get();

        return view('admin.listing.add-tw',compact('listing','benefits','services','types','categories',
                    'tags','details','states','optAttrib','cities', 'isvalid', 'environments', 'general_characteristics', 'isvalid', 'sectores', 'optAttribSector', 'currentRouteName'));
    } 

    public function update(Request $request, Listing $listing){

        $value_change = "";
        if($request->listing_type != $listing->listing_type) $value_change .= "plan,";
        //if($request->status != $listing->status) $value_change .= "estado,";
        if(isset($request->owner_name) && $request->owner_name != $listing->owner_name) $value_change .= "nombre de propietario, ";
        if(isset($request->identification) && $request->identification != $listing->identification) $value_change .= "identificación, ";
        if(isset($request->phone_number) && $request->phone_number != $listing->phone_number) $value_change .= "telefono, ";
        if(isset($request->owner_email) && $request->owner_email != $listing->owner_email) $value_change .= "email, ";
        if($request->available != $listing->available) $value_change .= "disponibilidad, ";
        if($request->listing_title != $listing->listing_title) $value_change .= "titulo de propiedad, ";
        if($request->meta_description != $listing->meta_description) $value_change .= "metadescripcion, ";
        if(isset($request->property_price) && $request->property_price != $listing->property_price) $value_change .= "precio, ";
        if(isset($request->property_price_min) && $request->property_price_min != $listing->property_price_min) $value_change .= "precio minimo, ";
        if($request->construction_area != $listing->construction_area) $value_change .= "area de construccion, ";
        if($request->land_area != $listing->land_area) $value_change .= "area de terreno, ";
        if($request->Front != $listing->Front) $value_change .= "frente, ";
        if($request->Fund != $listing->Fund) $value_change .= "fondo, ";
        if($request->listyears != $listing->listyears) $value_change .= "años de construccion, ";
        if($request->aval != $listing->aval) $value_change .= "avaluo de la propiedad, ";
        if($request->state != $listing->state) $value_change .= "provincia, ";
        if($request->city != $listing->city) $value_change .= "ciudad, ";
        if($request->address != $listing->address) $value_change .= "direccion, ";
        if($request->lat != $listing->lat) $value_change .= "latitud, ";
        if($request->lng != $listing->lng) $value_change .= "longitud, ";
        if($request->listingtype != $listing->listingtype) $value_change .= "categoria, ";
        if($request->listingtypestatus != $listing->listingtypestatus) $value_change .= "tipo, ";
        if($request->listingtagstatus != $listing->listingtagstatus) $value_change .= "etiquetas, ";
        if($request->listing_description != $listing->listing_description) $value_change .= "descripcion";

        if($value_change != ""){
            DB::table('updated_listing')->insert([
                'listing_id' => $listing->id,
                'property_code' => $listing->product_code,
                'value_change' => $value_change,
                'user_id' => Auth::user()->id,
            ]);
        }

        if(isset($request->listing_title) && !isset($listing->slug)){
            $slug = Str::of($request->listing_title) ->trim()->slug()->limit(70,'').'-'.rand(10000, 99999);
            $request->merge(['slug' => $slug]);
        }

        if(Auth::user()->role != "administrator") $this->authorize('update', $listing);
        if(is_array($request->checkBene)) $request->merge(['listingcharacteristic' => implode(",", $request->checkBene)]); 
        else $request->merge(['listingcharacteristic' => '']);

        if(is_array($request->checkgc)) $request->merge(['listinggeneralcharacteristics' => implode(",", $request->checkgc)]); 
        else $request->merge(['listinggeneralcharacteristics' => '']);

        if(is_array($request->checkEnvir)) $request->merge(['listingenvironments' => implode(",", $request->checkEnvir)]); 
        else $request->merge(['listingenvironments' => '']);
        
        if(is_array($request->checkServ)) $request->merge(['listinglistservices' => implode(",", $request->checkServ)]); 
        else $request->merge(['listinglistservices' => '']);
        
        if(is_array($request->updatedImages)) $request->merge(['images' => implode("|", $request->updatedImages)]); 
        else $request->merge(['images' => '']);

        if(!$request->updatedVideo && $listing->video != null) $listing->video = null;

        $result=[];        $ii=0;
        foreach($request->all() as $key=>$value){ if("detail" == substr($key,0,6)) $result[] = $value; }
        $bedrooms=0;$bathrooms=0;$garage=0;
        if(count($result)>0){
            $request->merge(['heading_details' => json_encode($result)]);
            foreach ($result as $r) {
                for ($i=0; $i < count($r); $i++) { 
                    if($r[$i] == 49 || $r[$i] == 86 || $r[$i] == 41 || $r[$i] == 115) $bedrooms = $bedrooms + $r[$i+1];
                    if($r[$i] == 48 || $r[$i] == 76 || $r[$i] == 81) $bathrooms = $bathrooms + $r[$i+1];
                    if($r[$i] == 43) $garage = $garage + $r[$i+1];
                }
            }
        } else {
            $request->merge(['heading_details' => '']);
        }

        if(isset($request->property_price) && $request->property_price != $listing->property_price && $listing->property_price > 0){
            $comment = Comment::create([
                'listing_id' => $listing->id,
                'user_id' => Auth::user()->id,
                'property_code' => $listing->product_code,
                'type' => 'price',
                'comment' => $request->comment,
                'property_price_prev' => $listing->property_price,
                'property_price' => $request->property_price,
                'property_price_min_prev' => $listing->property_price,
                'property_price_min' => $request->property_price_min,
            ]);
        }

        // if(!$listing->locked && ($listing->owner_name != null || $request->owner_name != null) && ($listing->identification != null || $request->identification != null) && ($listing->phone_number != null || $request->phone_number != null) && ($listing->owner_email != null || $request->owner_email != null)) $listing->locked = true;

        if(Auth::user()->role == "administrator" && $listing->status == null && $request->status == 1){
            $comment = Comment::create([
                'listing_id' => $listing->id,
                'user_id' => Auth::user()->id,
                'property_code' => $listing->product_code,
                'type' => 'status',
                'comment' => 'Se publico la propiedad en la página web',
                'value' => 1
            ]);
        }

        $listing->fill($request->all());

        if($request->tiktokcode){
            $tiktok_html = str_replace('max-width: 605px;min-width: 325px;', 'min-width: 100%;', $request->tiktokcode);
            $listing->tiktokcode = $tiktok_html;
        }
        
        //set variables bedroom bathroom y garage
        $listing->bedroom = $bedrooms;
        $listing->bathroom = $bathrooms;
        $listing->garage = $garage;

        if($request->niv_constr <= 0) $listing->niv_constr = null; else $listing->niv_constr = $request->niv_constr;
        if($request->num_pisos <= 0) $listing->num_pisos = null; else $listing->num_pisos = $request->num_pisos;
        if($request->pisos_constr <= 0) $listing->pisos_constr = null; else $listing->pisos_constr = $request->pisos_constr;

        //new values
        $listing->owner_address = $request->owner_address;
        $listing->cadastral_key = $request->cadastral_key;
        $listing->aliquot = $request->aliquot;
        $listing->observations_type_property = $request->observations_type_property;
        $listing->listinggeneralcharacteristics = $request->listinggeneralcharacteristics;
        $listing->listingenvironments = $request->listingenvironments;
        if($request->cavity_error == "on") $listing->cavity_error = 1; else $listing->cavity_error = 0;
        if($request->vip == "on") $listing->vip = 1; else $listing->vip = 0;
        if($request->morgaged == "on") $listing->mortgaged = 1; else $listing->mortgaged = 0;
        
        //$listing->mount_mortgage = $request->mount_mortgage;

        if($request->listingtype == 26) $listing->planing_license = $request->planing_license;
        if($request->mortgaged == "on") $listing->mortgaged = 1; else $listing->mortgaged = 0;
        if($request->mortgaged == "on"){
            $listing->entity_mortgaged = $request->entity_mortgaged;
            $listing->mount_mortgaged = $request->mount_mortgaged;
            $listing->warranty = $request->warranty;
        } else {
            $listing->entity_mortgaged = null;
            $listing->mount_mortgaged = null;
            $listing->warranty = null;
        }

        if(!isset($listing->slug)) $listing->slug = $request->slug;

        //set if listing credit vip
        //$listing->credit_vip = $request->credit_vip;

        if(!$listing->locked && ($listing->owner_name != null || $request->owner_name != null) && ($listing->identification != null || $request->identification != null) && ($listing->phone_number != null || $request->phone_number != null) && ($listing->owner_email != null || $request->owner_email != null) && ($listing->owner_address != null || $request->owner_address != null)) $listing->locked = true;

        $uploads=[];

        if ($request->hasFile('galleryImages')) {
            foreach($request->file('galleryImages') as $image){
                if ($image->isValid()) {
                    $validate = $image->getClientOriginalExtension();
                    if(in_array($validate,['jpeg','jpg','png','heic','heif'])){
                        $img = Image::make($image);
                        $img2 = Image::make($image);
                        $img3 = Image::make($image);
                        $mime = $img->mime();
                        if ($mime == 'image/jpeg') $ext = '.jpg';
                        elseif ($mime == 'image/png') $ext = '.png';
                        elseif($mime == 'image/heic') $ext = '.heic';
                        elseif($mime == 'image/heif') $ext = '.heif';
                        else $ext = '';
                        if(strlen($ext)>0){
                            $folder = 'uploads/listing/';
                            $nameFile = "IMG_$listing->id-".uniqid().$ext;
                            $img->save($folder.$nameFile);
                            $uploads[]= $nameFile;
                            
                            $folder2 = 'uploads/listing/600/';                                 
                            $img2->fit(600,400 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $img2->save($folder2.$nameFile, 40);
                            
                            $folder3 = 'uploads/listing/300/';                                 
                            $img3->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $img3->save($folder3.$nameFile, 40);

                            //agregando marca de agua
                            $folder_1 = 'uploads/listing/thumb/';
                            //$namefile = "THUMB_IMG_$listing->id-".uniqid().$ext;
                            $watermark = Image::make(public_path('img/MARCADEAGUA.png'));
                            $imageWidth = $img->width();

                            $watermarkSize = round(10 * $imageWidth / 40);
                            $watermark->resize($watermarkSize, null, function($constraint){$constraint->aspectRatio();});

                            $img->insert($watermark, 'center', 0, 0);
                            $img->save($folder_1.$nameFile);

                            $folder_2 = 'uploads/listing/thumb/600/';
                            $img2->fit(600,400 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $imageWidth2 = $img2->width();
                            $watermarkSize = round(10 * $imageWidth2 / 40);
                            $watermark->resize($watermarkSize, null, function($constraint){$constraint->aspectRatio();});

                            $img2->insert($watermark, 'center', 0, 0);
                            $img2->save($folder_2.$nameFile, 40);

                            $folder_3 = 'uploads/listing/thumb/300/';
                            $img3->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $imageWidth3 = $img3->width();
                            $watermarkSize = round(10 * $imageWidth3 / 40);
                            $watermark->resize($watermarkSize, null, function($constraint){$constraint->aspectRatio();});

                            $img3->insert($watermark, 'center', 0, 0);
                            $img3->save($folder_3.$nameFile, 40);
                        }
                    } elseif($validate == "mp4" || $validate == "MOV"){
                        $namefile = $listing->slug.".".$image->getClientOriginalExtension();
                        $filepath = public_path() . '/uploads/video/';
                        $image->move($filepath, $namefile);
                        $listing->video = $namefile;
                    }
                }
            }            
        }

        if(count($uploads)>0){
            $save_uploads = implode("|", $uploads);
            if(strlen($request->images)>2){
                $listing->update(['images'  =>  $request->images.'|'.$save_uploads   ]);
            }else{
                $listing->update(['images'  => $save_uploads   ]);
            }
            

        }

        // $isvalid = $this->iscomplete($listing);
        // if(!$isvalid){
        //     $delete_at = Carbon::parse($listing->created_at)->addDay();
        //     $listing->delete_at = $delete_at;
        // } else {
        //     $listing->delete_at = null;
        // }

        $listing->save();

        // return response()->json([
        //     'listing' => $listing
        // ]);

        $messages = ['status'=>'Propiedad Actualizada'];
        //$messages = array_merge($messages, ['alert'=>'Hola Mundo']);

        if(isset($request->edit)){
            if($listing->property_by == "Housing"){
                return redirect()->route('admin.housing.property.edit', compact('listing'))->with($messages);
            } else {
                return redirect()->route('admin.listings.edit',compact('listing'))->with($messages);
            }
        } else {
            return response()->json([
                'success' => true,
                'fragment' => $request->fragment
            ]);
        }

    }
    
    public function show(Listing $listing){
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
    
    public function seo(Listing $listing){
        $data['listings'] = Listing::selectRaw('count(*) as total,state,address')->where('status',1)->where('state','Azuay')->orderBy('total','desc')->groupBy('address')->get();
        return view('admin.seo.index',$data);
    }
    
    public function reslug(Listing $listing){
        if(Auth::id()==123){
            $slug = Str::of($listing->listing_title) ->trim()->slug()->limit(70,'').'-'.rand(10000, 99999);
            $listing->update(['slug' => $slug]);
        }
    }

    public function show_listing($id){
        $propertie = Listing::where('id', $id)->first();
        //$similarProperties = Listing::where('available', 1);

        $similarProperties = []; $nearbyproperties = []; $nearbyproperties_aux = [];
;        if($propertie){
            $similarProperties = Listing::where('state', 'LIKE', "%$propertie->state%")->where('city', 'LIKE', "%$propertie->city%")->where('address', 'LIKE', "%$propertie->address%")->where('listingtype', 'LIKE', "%$propertie->listingtype%")->where('available', 1)->where("product_code", "!=", $propertie->product_code)->latest()->take(10)->get();
            $nearbyproperties = Listing::select('product_code', 'lat', 'lng', 'listing_title', 'id', 'address')
                                        ->where('address', 'LIKE', "%$propertie->address%")
                                        ->where('listingtype', 'LIKE', "%$propertie->listingtype%")
                                        ->where('available', 1)->where('product_code', '!=', $propertie->product_code)
                                        ->where(DB::raw('LENGTH(lat)'), '>', 5)
                                        ->where(DB::raw('LENGTH(lng)'), '>', 5)
                                        ->latest()->take(10)->get();
        }

        foreach ($nearbyproperties as $nb) {
            if(Str::startsWith($nb->lat, '-') && Str::startsWith($nb->lng, '-') && Str::contains($nb->lat, '.') && Str::contains($nb->lng, '.')){
                array_push($nearbyproperties_aux, $nb);
            }
        }
        //dd($nearbyproperties_aux);
        
        $comments = DB::table('comments')->where('type', '!=', 'price')->where('listing_id', $id)->orderBy('created_at', 'desc')->get();
        $benefits = DB::table('listing_benefits')->get();
        $services = DB::table('listing_services')->get();
        $details = DB::table('listing_characteristics')->get();
        $general_characteristics = DB::table('listing_general_characteristics')->get();
        $environments = DB::table('listing_environments')->get();
        return view('admin.listing.show-tw', compact('propertie', 'benefits', 'services', 'details', 'comments', 'similarProperties', 'nearbyproperties_aux', 'general_characteristics', 'environments'));
    }

    public function unlocked($id){
        $listing = Listing::where('id', $id)->first();
        $listing->locked = false;
        $listing->save();
        return redirect()->route('admin.listings.edit', $listing)->with('message', 'Propiedad ' . $listing->product_code . ' desbloqueada');
    }

    public function iscomplete(Listing $listing){
        
        $isvalid = true;

        $address = "";
        if($listing->address) $address = $listing->address;
        if($listing->sector) $address = $listing->sector;

        if($listing->listing_type == null || $listing->owner_name == null || $listing->identification == null || $listing->phone_number == null || $listing->owner_email == null || $listing->owner_address == null || $listing->listing_title == null || $listing->listing_description == null || $listing->state == null || $listing->city == null || $address == null || $listing->construction_area == null || $listing->land_area == null || $listing->Front == null || $listing->Fund == null || $listing->property_price == null || $listing->property_price_min == null || $listing->lat == null || $listing->lng == null || $listing->listyears === null || $listing->listinglistservices == "" || $listing->listinggeneralcharacteristics == "" || $listing->listingenvironments == "" || $listing->listingcharacteristic == "" || $listing->aval == null || $listing->images == "") $isvalid = false;    
        $aux_heading_details = json_decode($listing->heading_details);
        if($aux_heading_details[0][0] == null || count($aux_heading_details[0]) <= 1) $isvalid = false;
        
        if($listing->property_by != "Housing"){
            if($listing->cadastral_key == null) $isvalid = false;
            else $isvalid = true;
        }

        if($listing->property_by != "Housing"){
            if($listing->mortgaged && ($listing->entity_mortgaged == null || $listing->mount_mortgaged == null || $listing->warranty == null)) $isvalid = false;
        }
        
        if($listing->listing_type == 2 && $listing->num_factura == null) $isvalid = false;
        
        return $isvalid;
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

    public function postedfacebook($listing_id){
        $listing = Listing::where('id', $listing_id)->first();
        $listing->posted_on_facebook = !$listing->posted_on_facebook;
        $listing->date_posted_facebook != null ? null : $listing->date_posted_facebook = date(now());
        $listing->save();

        return redirect()->back();
    }

    // public function delete($listing_id){
    //     $listing = Listing::where('id', $listing_id)->first();
    //     $listing->delete();
    //     return redirect()->route('admin.properties');
    // }
}
