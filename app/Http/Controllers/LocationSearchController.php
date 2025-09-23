<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationSearchController extends Controller
{
    public function search(Request $request)
    {
        $term = trim($request->get('q') ?? '');
        $stateID = $request->get('state_id');
        $cityID = $request->get('city_id');

        // Normalizar a int o null
        $stateID = (is_numeric($stateID) && (int)$stateID > 0) ? (int)$stateID : null;
        $cityID = (is_numeric($cityID) && (int)$cityID > 0) ? (int)$cityID : null;

        $results = collect();

        // 🔹 Búsqueda general si NO hay state ni city
        if (!$stateID && !$cityID) {
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

            $results = $results->merge($states)->merge($cities);
        }

        // 🔹 Parroquias
        $parishesQuery = DB::table('info_parishes')
            ->select('id', 'name')
            ->where('name', 'like', "%{$term}%");

        if ($cityID) {
            $parishesQuery->where('city_id', $cityID);
        } elseif ($stateID) {
            $parishesQuery->whereIn('city_id', function ($query) use ($stateID) {
                $query->select('id')
                    ->from('info_cities')
                    ->where('state_id', $stateID);
            });
        }

        $parishes = $parishesQuery->limit(5)->get()->map(fn ($row) => [
            'id' => "parish-{$row->id}",
            'label' => $row->name,
            'type' => 'Parroquia',
            'value' => $row->name,
        ]);

        // 🔹 Sectores
        $sectorsQuery = DB::table('info_sector')
            ->select('id', 'name')
            ->where('name', 'like', "%{$term}%");

        if ($cityID) {
            $sectorsQuery->where('city_id', $cityID);
        } elseif ($stateID) {
            $sectorsQuery->whereIn('city_id', function ($query) use ($stateID) {
                $query->select('id')
                    ->from('info_cities')
                    ->where('state_id', $stateID);
            });
        }

        $sectors = $sectorsQuery->limit(5)->get()->map(fn ($row) => [
            'id' => "sector-{$row->id}",
            'label' => $row->name,
            'type' => 'Sector',
            'value' => $row->name,
        ]);

        $results = $results->merge($parishes)->merge($sectors)->take(15);

        return response()->json($results->values());
    }
}
