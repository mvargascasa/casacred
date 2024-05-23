<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DownloadController extends Controller
{
    public function download($listing_id) {
        $listing = Listing::where('id', $listing_id)->first();
    
        if (!$listing) {
            return "Listado no encontrado.";
        }
    
        $images = explode('|', $listing->images);
    
        if (count($images) > 0) {
            $array_images = [];

            $watermark = Image::make(public_path('img/MARCADEAGUA.png'));
            
            // Reducir la opacidad de la marca de agua al 50%
            $watermark->opacity(50);
    
            foreach ($images as $image) {
                $imagePath = public_path() . "/uploads/listing/" . $image;
    
                // Verifica que el archivo exista
                if (!file_exists($imagePath)) {
                    return "Imagen no encontrada: " . $image;
                }
    
                // Intenta crear una instancia de la imagen
                try {
                    $img = Image::make($imagePath);
                } catch (\Exception $e) {
                    return "Fuente de imagen no legible: " . $image;
                }
    
                $imageWidth = $img->width();
    
                $watermarkSize = round(10 * $imageWidth / 40);
                $watermark->resize($watermarkSize, null, function($constraint) {
                    $constraint->aspectRatio();
                });
    
                $img->insert($watermark, 'center', 0, 0);
    
                // Guarda la imagen con la marca de agua en una ubicación temporal
                $outputPath = public_path('uploads/listing/thumb/' . basename($image));
                $img->save($outputPath);
    
                $array_images[] = $outputPath;
            }
    
            $zip = new \ZipArchive();
            $filename = $listing->product_code . "_IMG.zip";
            $zipPath = public_path($filename);
    
            if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
                foreach ($array_images as $file) {
                    $relativeName = basename($file);
                    $zip->addFile($file, $relativeName);
                }
                $zip->close();
    
                // Verifica que el archivo ZIP se haya creado correctamente
                if (file_exists($zipPath)) {
                    return response()->download($zipPath)->deleteFileAfterSend(true);
                } else {
                    return "Error al crear el archivo ZIP.";
                }
            } else {
                return "No se pudo crear el archivo ZIP.";
            }
        } else {
            return "La propiedad no contiene imágenes.";
        }
    }
}
