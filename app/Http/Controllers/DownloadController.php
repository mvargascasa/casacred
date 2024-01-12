<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function download($listing_id){

        $listing = Listing::where('id', $listing_id)->first();

        $images = explode('|', $listing->images);

        if(count($images)>0){
            $array_images = [];
    
            foreach ($images as $image) {
                $array_images[] = public_path() . "/uploads/listing/" . $image;
            }
    
            //return $array_images;
    
            $zip = new \ZipArchive();
    
            $filename = $listing->product_code."_IMG.zip";
    
            if($zip->open(public_path($filename), \ZipArchive::CREATE) == TRUE){
                
                $files = $array_images;
                
                foreach ($files as $key => $value) {
                    
                    $relativeName = basename($value);
                    $zip->addFile($value, $relativeName);
    
                }
    
                $zip->close();
            }
    
            return response()->download(public_path($filename));
        } else {
            return "La propiedad no contiene imagenes";
        }

    }
}
