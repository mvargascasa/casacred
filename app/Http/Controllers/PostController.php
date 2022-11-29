<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){
        return view('admin.post.create');
    }

    //'status', 'reading_time', 'publication_title', 'title_google', 'metadescription', 'content', 'first_image', 'second_image',

    public function store(Request $request){

        $name_firstimage = "";
        if($request->hasFile("first_image")){
            $imagen = $request->file("first_image");
            if($imagen->isValid()){
                $validate = $imagen->getClientOriginalExtension();
                if(in_array($validate, ['jpeg', 'jpg', 'png', 'JPG', 'PNG'])){
                    $img = Image::make($imagen);
                    $mime = $img->mime();
                    if($mime == 'image/jpeg') $ext = '.jpg';
                    elseif($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $ruta = public_path('uploads/posts/');
                        $namefile = "IMG_".Str::slug($request->publication_title).rand(1000,9999).$ext;
                        $img->fit(1500,900, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
                        $img->save($ruta.$namefile, 72);
                        $name_firstimage = $namefile;
                    }
                }
            }
        }

        $name_secondimage = "";
        if($request->hasFile("second_image")){
            $imagen = $request->file("second_image");
            if($imagen->isValid()){
                $validate = $imagen->getClientOriginalExtension();
                if(in_array($validate, ['jpeg', 'jpg', 'png', 'JPG', 'PNG'])){
                    $img = Image::make($imagen);
                    $mime = $img->mime();
                    if($mime == 'image/jpeg') $ext = '.jpg';
                    elseif($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $ruta = public_path('uploads/posts/');
                        $namefile = "IMG2_".Str::slug($request->publication_title).rand(1000,9999).$ext;
                        $img->fit(900,600, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
                        $img->save($ruta.$namefile, 72);
                        $name_secondimage = $namefile;
                    }
                }
            }
        }

        $post = Post::create([
            'status' => $request->status,
            'reading_time' => $request->reading_time,
            'publication_title' => $request->publication_title,
            'slug' => Str::slug($request->publication_title),
            'title_google' => $request->title_google,
            'metadescription' => $request->metadescription,
            'content' => $request->content,
            'first_image' => $name_firstimage,
            'second_image' => $name_secondimage
        ]);

        if($post){
            return redirect()->back()->with('created', 'Se creo el post '.$post->publication_title);
        } else {
            return "Ocurrio un error al crear el post. Por favor intentelo de nuevo";
        }
    }

    public function edit(Post $post){
        return view('admin.post.create', compact('post'));
    }

    public function update(Request $request, Post $post){

        $name_firstimage = "";
        if($request->hasFile("first_image")){
            $imagen = $request->file("first_image");
            if($imagen->isValid()){
                $validate = $imagen->getClientOriginalExtension();
                if(in_array($validate, ['jpeg', 'jpg', 'png', 'JPG', 'PNG'])){
                    $img = Image::make($imagen);
                    $mime = $img->mime();
                    if($mime == 'image/jpeg') $ext = '.jpg';
                    elseif($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $ruta = public_path('uploads/posts/');
                        $namefile = "IMG_".Str::slug($request->publication_title).rand(1000,9999).$ext;
                        $img->fit(1500,900, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
                        $img->save($ruta.$namefile, 72);
                        $name_firstimage = $namefile;
                    }
                }
            }
        }

        $name_secondimage = "";
        if($request->hasFile("second_image")){
            $imagen = $request->file("second_image");
            if($imagen->isValid()){
                $validate = $imagen->getClientOriginalExtension();
                if(in_array($validate, ['jpeg', 'jpg', 'png', 'JPG', 'PNG'])){
                    $img = Image::make($imagen);
                    $mime = $img->mime();
                    if($mime == 'image/jpeg') $ext = '.jpg';
                    elseif($mime == 'image/png') $ext = '.png';
                    else $ext = '';
                    if(strlen($ext)>0){
                        $ruta = public_path('uploads/posts/');
                        $namefile = "IMG2_".Str::slug($request->publication_title).rand(1000,9999).$ext;
                        $img->fit(900,600, function($constraint){$constraint->upsize(); $constraint->aspectRatio();});
                        $img->save($ruta.$namefile, 72);
                        $name_secondimage = $namefile;
                    }
                }
            }
        }

        $post->fill($request->all());

        if($name_firstimage != "") $post->first_image = $name_firstimage;
        if($name_secondimage != "") $post->second_image = $name_secondimage;

        $post->save();

        return redirect()->route('admin.post.edit', $post)->with('postupdate', 'Se actualizo el post: ' . $post->publication_title);
    }
}
