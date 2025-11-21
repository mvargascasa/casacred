<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DownloadController extends Controller
{
    public function download(Request $request, $listing_id)
    {
        // 1. Obtener el parámetro de la marca de agua, por defecto es 'true' (con marca)
        $withWatermark = $request->get('watermark', 'true') === 'true';

        $listing = Listing::where('id', $listing_id)->first();

        if (!$listing) {
            return "Listado no encontrado.";
        }

        $images = explode('|', $listing->images);

        if (count($images) > 0) {
            $array_images = [];

            // Inicializar la marca de agua SOLO si es necesaria
            if ($withWatermark) {
                $watermark = Image::make(public_path('img/MARCADEAGUA.png'));
                // Reducir la opacidad de la marca de agua al 50%
                $watermark->opacity(50);
            }

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

                // APLICAR MARCA DE AGUA SOLO SI $withWatermark ES TRUE
                if ($withWatermark) {
                    $imageWidth = $img->width();

                    // Tu lógica de redimensionamiento de marca de agua
                    $watermarkSize = round(10 * $imageWidth / 40);
                    $watermark->resize($watermarkSize, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $img->insert($watermark, 'center', 0, 0);
                }

                // Guardar la imagen modificada/original
                // IMPORTANTE: Asegúrate de que el directorio 'thumb' exista
                $outputPath = public_path('uploads/listing/thumb/' . basename($image));
                $img->save($outputPath);

                $array_images[] = $outputPath;
            }

            // Resto del código para crear y descargar el ZIP
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
