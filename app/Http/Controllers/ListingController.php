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
        
        $slug = Str::of($request->listing_title) ->trim()->slug()->limit(70,'').'-'.rand(10000, 99999);
        $request->merge(['slug' => $slug]);
        $request->merge(['user_id' => Auth::id()]);

        
        
        if(is_array($request->checkBene)) $request->merge(['listingcharacteristic' => implode(",", $request->checkBene)]); 
        else $request->merge(['listingcharacteristic' => '']);
        
        if(is_array($request->checkServ)) $request->merge(['listinglistservices' => implode(",", $request->checkServ)]); 
        else $request->merge(['listinglistservices' => '']);
        
        if(is_array($request->updatedImages)) $request->merge(['images' => implode("|", $request->updatedImages)]); 
        else $request->merge(['images' => '']);

        $result=[];        $ii=0;
        foreach($request->all() as $key=>$value){ if("detail" == substr($key,0,6)) $result[] = $value; }
        if(count($result)>0)$request->merge(['heading_details' => json_encode($result)]);
        else $request->merge(['heading_details' => '']);

        $listing = Listing::create($request->all());

        //bloqueando la propiedad una vez creada
        $listing->locked = true;
        $listing->save();
        
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



        return redirect()->route('admin.listings.edit',compact('listing'))->with('status','Propiedad Creada');
    }
    
    public function edit(Listing $listing){
        // if(Auth::user()->role != "administrator" && $listing->user_id!= Auth::id()){
        //     return redirect()->route('admin.listings.show',compact('listing'));
        // }
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
                    'tags','details','states','optAttrib','cities'));
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
        if(count($result)>0)$request->merge(['heading_details' => json_encode($result)]);
        else $request->merge(['heading_details' => '']);

        if($request->property_price != $listing->property_price){
            $comment = Comment::create([
                'listing_id' => $listing->id,
                'property_code' => $listing->product_code,
                'comment' => $request->comment,
                'property_price_prev' => $listing->property_price,
                'property_price' => $request->property_price,
                'property_price_min_prev' => $listing->property_price,
                'property_price_min' => $request->property_price_min,
            ]);
        }

        if(!$listing->locked) $listing->locked = true;

        $listing->fill($request->all());
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
        $benefits = DB::table('listing_benefits')->get();
        $services = DB::table('listing_services')->get();
        $details = DB::table('listing_characteristics')->get();  
        return view('admin.listing.show-tw', compact('propertie', 'benefits', 'services', 'details'));
    }

    public function unlocked($id){
        $listing = Listing::where('id', $id)->first();
        $listing->locked = false;
        $listing->save();
        return redirect()->route('admin.listings.edit', $listing)->with('message', 'Propiedad ' . $listing->product_code . ' desbloqueada');
    }
}
