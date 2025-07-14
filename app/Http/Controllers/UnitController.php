<?php

namespace App\Http\Controllers;

use App\Enums\UnitStatus;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'listing_id' => 'required|exists:listings,id',
            'name' => 'required|string|max:255',
            'unit_number' => 'nullable|string|max:255',
            'floor' => 'nullable|integer',
            'area_m2' => 'nullable|numeric',
            'bedrooms' => 'nullable|numeric',
            'bathrooms' => 'nullable|numeric',
            'price' => 'nullable|numeric',
            'min_price' => 'nullable|numeric'
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $validator->errors()
            ], 422);
        }
    
        $validated = $validator->validated();
    
        $unit = new Unit();
        $unit->listing_id = $validated['listing_id'];
        $unit->name = $validated['name'];
        $unit->unit_number = $validated['unit_number'] ?? null;
        $unit->floor = $validated['floor'] ?? null;
        $unit->area_m2 = $validated['area_m2'] ?? null;
        $unit->bedrooms = $validated['bedrooms'] ?? null;
        $unit->bathrooms = $validated['bathrooms'] ?? null;
        $unit->price = $validated['price'] ?? null;
        $unit->min_price = $validated['min_price'] ?? null;
        $unit->status = UnitStatus::AVAILABLE;
        $unit->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Unidad creada correctamente',
            'unit' => $unit
        ]);
    }
}
