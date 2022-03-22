@extends('layouts.dash')
@section('header')
<title>Dashboard</title>
@endsection

@section('content')
    <div class="col-md-10 p-4">
        @php $ii=0; @endphp
            @foreach(array_filter(explode("|", $listing->images)) as $img)               

                @php
                if(strlen($img)>5){
                    $filename = 'uploads/listing/'.$img; 
                    $imgname=$img;
                    if (file_exists($filename)) {
                        $img = Image::make($filename);
                        $img2 = Image::make($filename);
                        $mime = $img->mime();
                        if ($mime == 'image/jpeg') $ext = '.jpg';
                        elseif ($mime == 'image/png') $ext = '.png';
                        else $ext = '';
                        if(strlen($ext)>0){
                            $folder = 'uploads/listing/600/';                                 
                            $img->fit(600,400 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $img->save($folder.$imgname, 40);
                            
                            $folder2 = 'uploads/listing/300/';                                 
                            $img2->fit(300,200 , function ($constraint) { $constraint->upsize(); $constraint->aspectRatio(); });
                            $img2->save($folder2.$imgname, 40);
                        }

                    } else {
                    echo $ii++." The file $filename does not exist <br>";
                    }
                }
                @endphp
                 <div class="row">
                    <div class="col-sm-4">
                        <img width="300" src="{{asset('uploads/listing',)}}/{{$imgname}}">
                    </div>
                    <div class="col-sm-4">
                        <img width="200" src="{{asset('uploads/listing/600')}}/{{$imgname}}">
                    </div>
                    <div class="col-sm-2">
                        <img width="100" src="{{asset('uploads/listing/300')}}/{{$imgname}}">
                    </div>
                </div>
            @endforeach
    </div>
    @foreach(array_filter(explode("|", $listing->images)) as $img)              
                
       
    @endforeach

@endsection