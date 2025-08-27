<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationSearchController extends Controller
{
    public function search(Request $request){
        
        $term = trim($request->get('q'));

        if (!$term) {
            return response()->json([]);
        }

        $results = collect();

        // Provincias
        $states = DB::table('info_states')
            ->select('id', 'name')
            ->where('name', 'like', "%{$term}%")
            ->limit(5)
            ->get()
            ->map(fn ($row) => [
                'id' => "state-{$row->id}",
                'label' => $row->name,
                'type' => 'Provincia',
                'value' => $row->name,
            ]);

        // Ciudades
        $cities = DB::table('info_cities')
            ->select('id', 'name')
            ->where('name', 'like', "%{$term}%")
            ->limit(5)
            ->get()
            ->map(fn ($row) => [
                'id' => "city-{$row->id}",
                'label' => $row->name,
                'type' => 'Ciudad',
                'value' => $row->name,
            ]);

        // Parroquias
        $parishes = DB::table('info_parishes')
            ->select('id', 'name')
            ->where('name', 'like', "%{$term}%")
            ->limit(5)
            ->get()
            ->map(fn ($row) => [
                'id' => "parish-{$row->id}",
                'label' => $row->name,
                'type' => 'Parroquia',
                'value' => $row->name,
            ]);

        // Sectores
        $sectors = DB::table('info_sector')
            ->select('id', 'name')
            ->where('name', 'like', "%{$term}%")
            ->limit(5)
            ->get()
            ->map(fn ($row) => [
                'id' => "sector-{$row->id}",
                'label' => $row->name,
                'type' => 'Sector',
                'value' => $row->name,
            ]);

        $results = $states
            ->merge($cities)
            ->merge($parishes)
            ->merge($sectors)
            ->take(15); // máximo 15 resultados

        return response()->json($results->values());
    }

}
