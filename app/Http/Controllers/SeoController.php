<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\NavbarItems;
use App\Models\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class SeoController extends Controller
{
    
    //SEOPAGES
    public function index(){
        return view('admin.seo.indexnew');
    }

    public function indexpages(){
        $pages = SeoPage::paginate(10);
        return view('admin.seo.listseopages', compact('pages'));
    }


    //INDEX NAVBAR
    public function indexnavbar(){
        $navbar_items = DB::table('navbar_items')->get();
        return view('admin.seo.indexnavbar', compact('navbar_items'));
    }

    public function createnavbar(){
        return view('admin.seo.editnavbar');
    }

    public function editnavbar($id){
        $navbar_item = NavbarItems::where('id', $id)->first();
        return view('admin.seo.editnavbar', compact('navbar_item'));
    }

    public function storenavbar(Request $request){
        $navbar_item = NavbarItems::create($request->all());
        $arrayitems = [];
        if(isset($request->anchor_text) || isset($request->link)){
            for ($i=0; $i < count($request->anchor_text); $i++) { 
                $arrayitems[$i] = $request->anchor_text[$i].'|'.$request->link[$i];
            }
        }
        $navbar_item->items = $arrayitems;
        $navbar_item->save();
        return redirect()->route('admin.seo.navbar.edit', $navbar_item->id);
    }

    public function updatenavbar(Request $request, $id){
        $navbar_item = NavbarItems::where('id', $id)->first();
        $arrayitems = [];
        if(isset($request->anchor_text) || isset($request->link)){
            for ($i=0; $i < count($request->anchor_text); $i++) { 
                $arrayitems[$i] = $request->anchor_text[$i].'|'.$request->link[$i];
            }
        }
        $navbar_item->category_name = $request->category_name;
        $navbar_item->items = $arrayitems;
        $navbar_item->save();
        return redirect()->route('admin.seo.navbar.edit', $navbar_item->id);
    }

    public function create(){
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $types = DB::table('listing_types')->get();
        $optAttrib = [];
        foreach($states as $state){
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }
        
        return view('admin.seo.createpage', compact('states', 'optAttrib', 'types'));
    }

    public function store(Request $request){
        //return $request;
        if($request->category == 1){
            $cities = Listing::select('city')->where('city', '!=', null)->distinct()->get();
            //return $cities;
            foreach ($cities as $city) {
                $state_id = DB::table('info_cities')->select('state_id')->where('name', "LIKE",  "%$city->city%")->first();
                $state = DB::table('info_states')->select('name')->where('id', $state_id->state_id)->first();
                $page = SeoPage::where('city', 'LIKE', $city->city)->where('type', $request->type)->where('typestatus', $request->typestatus)->first();
                $title = str_replace('{ciudad}', $city->city, $request->title);
                if(!isset($page)){
                    SeoPage::create([
                        "title" => $title,
                        "category" => $request->category,
                        "slug" => Str::lower(str_replace('ciudad', $city->city, $request->slug)),
                        "title_google" => str_replace('{ciudad}', $city->city, $request->title_google),
                        "state" => $state->name,
                        "city" => $city->city,
                        "type" => $request->type,
                        "typestatus" => $request->typestatus,
                        "meta_description" => "Encuentra las mejores ". $title ." , descubre una gran variedad de casas para que consigas la que se adapte con tus gustos y necesidades.",
                        "info_header" => str_replace('{ciudad}', $city->city, $request->info_header),
                        "info_footer" => str_replace('{ciudad}', $city->city, $request->info_footer)
                    ]);
                    //return $seopage;
                }
            }
            return redirect()->route('admin.seo.pages.index')->with('status', true);

        } else if($request->category == 0){
            $seopage = SeoPage::create($request->all());
            // if($request->bgimageheader){
            //     $folder = 'uploads/seopages/';
            //     $img = Image::make($request->bgimageheader);
            //     $img->fit(1200, 1000, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
            //     $img->save($folder.$seopage->slug."_".$seopage->id);
            //     $seopage->url_image = $folder.$seopage->slug."_".$seopage->id;
            // }
    
            $arraylinks = [];
            if(isset($request->anchor_text) || isset($request->link)){
                for ($i=0; $i < count($request->anchor_text); $i++) { 
                    $arraylinks[$i] = $request->anchor_text[$i].'|'.$request->link[$i];
                }
            }
    
            $arraylinks_g = [];
            if(isset($request->anchor_text_g) || isset($request->link_g)){
                for ($i=0; $i < count($request->anchor_text_g); $i++) { 
                    $arraylinks_g[$i] = $request->anchor_text_g[$i].'|'.$request->link_g[$i];
                }
            }
    
            $seopage->meta_description = "Encuentra las mejores " . $seopage->title . " , descubre una gran variedad de casas para que consigas la que se adapte con tus gustos y necesidades.";
            $seopage->similarlinks = $arraylinks;
            $seopage->similarlinks_g = $arraylinks_g;
    
            $seopage->save();
            return redirect()->route('admin.seo.edit', $seopage)->with('status', true);
        }
    }

    public function edit(SeoPage $seopage){
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $types = DB::table('listing_types')->get();
        //$similarlinks = SeoPage::select('title', 'slug')->where('city', $seopage->city)->get();
        $optAttrib = [];
        $getCities=0;
        foreach($states as $state){
            if($seopage->state==$state->name){ $getCities=$state->id; }
            $optAttrib[$state->name] = ['data-id' => $state->id];
        }
        $cities = DB::table('info_cities')->where('state_id',$getCities)->get();
        return view('admin.seo.createpage', compact('seopage', 'states', 'optAttrib', 'types', 'cities'));
    }

    public function update(Request $request, SeoPage $seopage){
        $arraylinks = [];
        if(isset($request->anchor_text) || isset($request->link)){
            for ($i=0; $i < count($request->anchor_text); $i++) { 
                $arraylinks[$i] = $request->anchor_text[$i].'|'.$request->link[$i];
            }
        }

        $arraylinks_g = [];
        if(isset($request->anchor_text_g) || isset($request->link_g)){
            for ($i=0; $i < count($request->anchor_text_g); $i++) { 
                $arraylinks_g[$i] = $request->anchor_text_g[$i].'|'.$request->link_g[$i];
            }
        }

        if($request->bgimageheader){
            $folder = 'uploads/seopages/';
            $img = Image::make($request->bgimageheader);
            $mime = $img->mime();
            if ($mime == 'image/jpeg') $ext = '.webp';
            elseif ($mime == 'image/png') $ext = '.webp';
            elseif ($mime == 'image/webp') $ext = '.webp';
            else $ext = '';
            $namefile = "img_".$seopage->slug."_".$seopage->id.$ext;
            $img->fit(1300, 900, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
            $img->save($folder.$namefile);
            $seopage->url_image = $folder.$namefile;
        }
        $seopage->title = $request->title;
        $seopage->description = $request->description;
        if($request->category == 0){
            $seopage->state = null;
            $seopage->city = null;
        } else {
            $seopage->state = $request->state;
            $seopage->city = $request->city;
        }
        $seopage->category = $request->category;
        $seopage->info_header = $request->info_header;
        $seopage->type = $request->type;
        $seopage->typestatus = $request->typestatus;
        $seopage->info_footer = $request->info_footer;
        $seopage->similarlinks = $arraylinks;
        if($request->category == 0) $seopage->subtitle_if_general = $request->subtitle_if_general;
        else $seopage->subtitle_if_general = null;
        $seopage->similarlinks_g = $arraylinks_g;
        $seopage->meta_description = $request->meta_description;
        $seopage->keywords = $request->keywords;
        $seopage->title_google = $request->title_google;
        if($seopage->slug != $request->slug){
            $seopage->old_slug = $seopage->slug;
            $seopage->slug = $request->slug;
        }
        // if(isset($request->similarlink)){
        //     $title = ""; $slug = ""; $position = 0;
        //     foreach($request->similarlink as $similarlink){
        //         $position = strpos($similarlink, '|');
        //         $title = substr($similarlink, 0, $position);
        //         $slug = substr($similarlink, $position+1);
        //         LinksSeoPage::create([
        //             "id_seo_page" => $seopage->id,
        //             "link_title" => $title,
        //             "slug" => $slug
        //         ]);
        //     }
        // }
        $seopage->save();
        if($seopage) return redirect()->back()->with('status', true);
        else return redirect()->back()->with('status', false);
    }

    public function delete($id){
        $seopage = SeoPage::find($id);
        $seopage->delete();
        //return $isDeleted;
        return redirect()->route('admin.seo.pages.index')->with('isdeleted', 'Se elimino el elemento');
    }
}   