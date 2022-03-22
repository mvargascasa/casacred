<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services=Service::orderBy('status','desc')->orderBy('title')->get();
        return view('admin.services.index',compact('services'));
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(service $service)
    {
        //
    }
    
    public function edit(Service $service)
    {
        $services = Service::where('parent',0)->where('status',1)->orderBy('title')->get();
        return view('admin.services.edit',compact('service','services'));
    }
    
    public function update(Request $request, Service $service)
    {        
        $service->fill($request->all());
        $service->save(); 
        //img Icon
        if ($request->hasFile('imgicon')) {
            if ($request->file('imgicon')->isValid()) {
                $validate = $request->file('imgicon')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgicon'));

                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/services/';
                        $nameFile = "IMG_$service->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);

                        $service->update(['image'  => $nameFile]);
                    }
                }
            }
        }

        //img Header
        if ($request->hasFile('imgheader')) {
            if ($request->file('imgheader')->isValid()) {
                $validate = $request->file('imgheader')->getClientOriginalExtension();
                if(in_array($validate,['jpeg','jpg','png'])){
                    $img = Image::make($request->file('imgheader'));
                    $mime = $img->mime();
                    if ($mime == 'image/jpeg') $ext = '.jpg';
                    elseif ($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $folder = 'uploads/services/';
                        $nameFile = "IMG_$service->id-".uniqid().$ext;
                        $img->save($folder.$nameFile);
                        $service->update(['headerimg'  => $nameFile]);
                    }
                }
            }
        }

        return redirect()->route('admin.services.edit',compact('service'))->with('status','Servicio Actualizado');
    }
    
    public function destroy(service $service)
    {
        //
    }
}
