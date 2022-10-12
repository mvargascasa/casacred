<?php

namespace App\Http\Controllers;

use App\Models\SeoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    public function index(){
        $pages = SeoPage::all();
        return view('admin.seo.indexnew', compact('pages'));
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
        $seopage = SeoPage::create($request->all());
        return redirect()->route('admin.seo.edit', $seopage)->with('status', true);
    }

    public function edit(SeoPage $seopage){
        $states = DB::table('info_states')->where('country_id',63)->orderBy('name')->get();
        $types = DB::table('listing_types')->get();
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
        $seopage->title = $request->title;
        $seopage->info_header = $request->info_header;
        $seopage->state = $request->state;
        $seopage->city = $request->city;
        $seopage->type = $request->type;
        $seopage->info_footer = $request->info_footer;
        $seopage->meta_description = $request->meta_description;
        $seopage->keywords = $request->keywords;
        $seopage->title_google = $request->title_google;
        if($seopage->slug != $request->slug){
            $seopage->old_slug = $seopage->slug;
            $seopage->slug = $request->slug;
        }
        $seopage->save();
        if($seopage) return redirect()->back()->with('status', true);
        else return redirect()->back()->with('status', false);
    }

    public function delete($id){
        $seopage = SeoPage::find($id);
        $seopage->delete();
        //return $isDeleted;
        return redirect()->route('admin.seo.index')->with('isdeleted', 'Se elimino el elemento');
    }
}   
