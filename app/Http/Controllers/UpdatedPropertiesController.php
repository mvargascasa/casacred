<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdatedPropertiesController extends Controller
{
    public function index(){

        $properties = Listing::where('available', 1)->orderBy('contact_at', 'asc')->paginate(10);

        foreach ($properties as $property) {
            if ($property->contact_at === null) {
                // Si contact_at es nulo, mostrar el botón de actualización
                $property->showUpdateButton = true;
                $property->nextContactDate = null; // No hay fecha de próximo contacto
            } else {
                // Lógica existente para fechas no nulas
                $contactDate = Carbon::parse($property->contact_at);
                $nextContactDate = $contactDate->copy()->addDays(30);
                $today = Carbon::now();
    
                $property->showUpdateButton = $today->greaterThanOrEqualTo($nextContactDate);
                $property->nextContactDate = $nextContactDate->format('Y-m-d H:i:s');
            }
        }

        return view('admin.updated-listing.index', compact('properties'));

    }
}
