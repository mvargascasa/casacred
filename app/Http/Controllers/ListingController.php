<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ListingController extends Controller
{
       
    public function index(){
        return view('admin.listing.index');
    }
    
    public function create(){
        $lastcode = Listing::where('product_code','!=','')->orderBy('product_code','desc')->first();
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

        return view('admin.listing.add-tw',compact('benefits','services','types','categories','tags','details','states','optAttrib','lastcode'));
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
                            $watermark = Image::make(public_path('img/logo-watermark.png'));
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

            $listing->meta_description = $request->meta_description;
            $listing->keywords = $request->keywords;
            $listing->Front = $request->Front;
            $listing->Fund = $request->Fund;
            $listing->land_area = $request->land_area;
            $listing->construction_area = $request->construction_area;
            $listing->property_price = $request->property_price;
            $listing->property_price_min = $request->property_price_min;

            $listing->aval = $request->aval;

            $listing->listing_description = $request->listing_description;
            $listing->listing_type = $request->listing_type;
            $listing->address = $request->address;
            $listing->state = $request->state;
            $listing->city = $request->city;
            $listing->listingtype = $request->listingtype;

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
    
            //bloqueando la propiedad una vez creada
            //$listing->locked = true;
            if(!$listing->locked && ($listing->owner_name != null || $request->owner_name != null) && ($listing->identification != null || $request->identification != null) && ($listing->phone_number != null || $request->phone_number != null) && ($listing->owner_email != null || $request->owner_email != null)) $listing->locked = true;
            $listing->save();
        }

        return redirect()->route('admin.listings.edit',compact('listing'))->with('status','Propiedad Creada');
    }
    
    public function edit(Listing $listing){
        // if(Auth::user()->role != "administrator" && $listing->user_id!= Auth::id()){
        //     return redirect()->route('admin.listings.show',compact('listing'));
        // }

        $isvalid = $this->iscomplete($listing);

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
        return view('admin.listing.add-tw',compact('listing','benefits','services','types','categories',
                    'tags','details','states','optAttrib','cities', 'isvalid'));
    } 

    public function update(Request $request, Listing $listing){

        if(Auth::user()->role != "administrator") $this->authorize('update', $listing);
        if(is_array($request->checkBene)) $request->merge(['listingcharacteristic' => implode(",", $request->checkBene)]); 
        else $request->merge(['listingcharacteristic' => '']);
        
        if(is_array($request->checkServ)) $request->merge(['listinglistservices' => implode(",", $request->checkServ)]); 
        else $request->merge(['listinglistservices' => '']);
        
        if(is_array($request->updatedImages)) $request->merge(['images' => implode("|", $request->updatedImages)]); 
        else $request->merge(['images' => '']);

        $result=[];        $ii=0;
        foreach($request->all() as $key=>$value){ if("detail" == substr($key,0,6)) $result[] = $value; }
        $bedrooms=0;$bathrooms=0;$garage=0;
        if(count($result)>0){
            $request->merge(['heading_details' => json_encode($result)]);
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

        if($request->property_price != $listing->property_price && $listing->property_price > 0){
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

        if(!$listing->locked && ($listing->owner_name != null || $request->owner_name != null) && ($listing->identification != null || $request->identification != null) && ($listing->phone_number != null || $request->phone_number != null) && ($listing->owner_email != null || $request->owner_email != null)) $listing->locked = true;

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
        
        //set variables bedroom bathroom y garage
        $listing->bedroom = $bedrooms;
        $listing->bathroom = $bathrooms;
        $listing->garage = $garage;

        $listing->save();

        $uploads=[];

        if ($request->hasFile('galleryImages')) {
            foreach($request->file('galleryImages') as $image){
                if ($image->isValid()) {
                    $validate = $image->getClientOriginalExtension();
                    if(in_array($validate,['jpeg','jpg','png'])){
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
                            $watermark = Image::make(public_path('img/logo-watermark.png'));
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
        $messages = ['status'=>'Propiedad Actualizada'];
        //$messages = array_merge($messages, ['alert'=>'Hola Mundo']);

        return redirect()->route('admin.listings.edit',compact('listing'))->with($messages);
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
        return view('admin.listing.show-tw', compact('propertie', 'benefits', 'services', 'details', 'comments', 'similarProperties', 'nearbyproperties_aux'));
    }

    public function unlocked($id){
        $listing = Listing::where('id', $id)->first();
        $listing->locked = false;
        $listing->save();
        return redirect()->route('admin.listings.edit', $listing)->with('message', 'Propiedad ' . $listing->product_code . ' desbloqueada');
    }

    public function iscomplete(Listing $listing){
        
        $isvalid = true;

        if(!isset($listing->listing_title) || $listing->listing_title == "" || !isset($listing->images) || $listing->images == "" || !isset($listing->meta_description) || $listing->meta_description == "" || !isset($listing->Front) || $listing->Front == "" || !isset($listing->Fund) || $listing->Fund == "" || !isset($listing->land_area) || $listing->land_area == "" || !isset($listing->construction_area) || $listing->construction_area == "" || !isset($listing->property_price) || $listing->property_price == "" || !isset($listing->property_price_min) || $listing->property_price_min == "" || !isset($listing->listing_description) || $listing->listing_description == "" || !isset($listing->listing_type) || $listing->listing_type == "" || !isset($listing->address) || $listing->address == "" || !isset($listing->state) || $listing->state == "" || !isset($listing->city) || $listing->city == "" || !isset($listing->listingtype) || $listing->listingtype == "" || !isset($listing->listingcharacteristic) || $listing->listingcharacteristic == "" || !isset($listing->listinglistservices) || $listing->listinglistservices == "" || !isset($listing->listingtypestatus) || $listing->listingtypestatus == "" || !isset($listing->listingtagstatus) || $listing->listingtagstatus == "" || !isset($listing->listyears) || $listing->listyears == "" || !isset($listing->lat) || $listing->lat == "" || !isset($listing->lng) || $listing->lng == "" || !isset($listing->available)  || $listing->available == "" || !isset($listing->heading_details) || $listing->heading_details == "" || !isset($listing->owner_name) || $listing->owner_name == "" || !isset($listing->owner_email) || $listing->owner_email == "" || !isset($listing->identification) || $listing->identification == "" || !isset($listing->phone_number) || $listing->phone_number == ""){
            $isvalid = false;
        }

        return $isvalid;
    }
}
