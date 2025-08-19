<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Listing;

class UserController extends Controller
{
    public function __construct()    {    
        $this->middleware(function ($request, $next) {
            if (Auth::id()==123 || Auth::id()==147 || Auth::id()==15 || Auth::id()==148 || Auth::user()->email == "graficos@casacredito.com") return $next($request);
            else return redirect()->route('admin.index');
        });           
               
    }   
       
    public function index(Request $request){ 
        $users = User::where('status',1)->orderBy('email','asc')->get();
        return view('admin.users.index',compact('users'));
    }
       
    public function edit(User $user){ 
        return view('admin.users.edit',compact('user'));
    }
       
    public function update(Request $request, User $user){

        //$name_firstimage = null;
        if($request->hasFile("profile_image")){
            $imagen = $request->file("profile_image");
            if($imagen->isValid()){
                $validate = $imagen->getClientOriginalExtension();
                if(in_array($validate, ['jpeg', 'jpg', 'png', 'webp', 'JPG', 'PNG'])){
                    $img = Image::make($imagen);
                    $mime = $img->mime();
                    if($mime == 'image/jpeg') $ext = '.jpg';
                    elseif($mime == 'image/png') $ext = '.png';
                    elseif($mime == 'image/webp') $ext = '.webp';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $ruta = public_path('uploads/profiles/');
                        $namefile = "IMG_".Str::slug($request->name).rand(1000,9999).$ext;
                        $img->fit(300,500, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
                        $img->save($ruta.$namefile, 100);
                        //$name_firstimage = $namefile;
                        $user->profile_photo_path = $namefile;
                    }
                }
            }
        }
        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.index');
    }
    public function changepass(Request $request, User $user){
        $user->update(['password'=> Hash::make($request->password)]);
        return redirect()->back()->with('message','Contraseña actualizada');        
    }

    public function searchuser(Request $request){
        $users = User::name($request->name)->get();
        return view('admin.users.index',compact('users'));
    }

    public function quitwatermark(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $listing = Listing::where('id', $request->watermark)->first();
        if($user->watermark) $user->watermark = false;
        else $user->watermark = true;
        $user->save();
        return redirect()->route('admin.show.listing', $listing);
    }

}
