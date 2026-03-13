<?php

namespace App\Services;

class CardinalZoneService
{
    /**
     * Ciudades con su centro de referencia definido.
     * Agregar nuevas ciudades aquí cuando sea necesario.
     */
    private const CITY_CENTERS = [
        'cuenca'         => ['lat' => -2.9001285, 'lng' => -79.0058965, 'radius' => 0.012],
        'gualaceo'       => ['lat' => -2.8893,    'lng' => -78.7731,    'radius' => 0.008],
        'paute'          => ['lat' => -2.7793,    'lng' => -78.7631,    'radius' => 0.008],
        'santa isabel'   => ['lat' => -3.3415,    'lng' => -79.2981,    'radius' => 0.008],
        'yunguilla'      => ['lat' => -3.3415,    'lng' => -79.2981,    'radius' => 0.008],
        'sigsig'         => ['lat' => -3.0585,    'lng' => -78.7856,    'radius' => 0.008],
        'girón'          => ['lat' => -3.1578,    'lng' => -79.1511,    'radius' => 0.008],
    ];

    /**
     * Calcula la zona cardinal dado lat, lng y ciudad.
     * Si la ciudad no está en el listado, usa las coordenadas
     * del centroide geográfico calculado desde lat/lng (fallback).
     */
    public function calculate(?float $lat, ?float $lng, ?string $city = null): ?string
    {
        if ($lat === null || $lng === null || $lat == 0 || $lng == 0) {
            return null;
        }

        $center = $this->getCityCenter($city);

        if ($center === null) {
            // Ciudad no reconocida: no podemos calcular zona cardinal con sentido
            return null;
        }

        $diffLat = $lat - $center['lat']; // positivo = norte, negativo = sur
        $diffLng = $lng - $center['lng']; // positivo = este,  negativo = oeste

        // Si está dentro del radio central → "centro"
        if (abs($diffLat) <= $center['radius'] && abs($diffLng) <= $center['radius']) {
            return 'centro';
        }

        // Determinar el eje dominante
        if (abs($diffLat) >= abs($diffLng)) {
            return $diffLat > 0 ? 'norte' : 'sur';
        }

        return $diffLng > 0 ? 'este' : 'oeste';
    }

    /**
     * Busca el centro de la ciudad en el catálogo.
     * Normaliza el nombre para evitar problemas de mayúsculas/tildes.
     */
    private function getCityCenter(?string $city): ?array
    {
        if (empty($city)) {
            return self::CITY_CENTERS['cuenca']; // default
        }

        $normalized = strtolower(trim($this->removeAccents($city)));

        foreach (self::CITY_CENTERS as $key => $center) {
            if (str_contains($normalized, $key) || str_contains($key, $normalized)) {
                return $center;
            }
        }

        return null; // Ciudad no reconocida
    }

    private function removeAccents(string $string): string
    {
        return strtr($string, [
            'á' => 'a',
            'é' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ú' => 'u',
            'Á' => 'a',
            'É' => 'e',
            'Í' => 'i',
            'Ó' => 'o',
            'Ú' => 'u',
            'ñ' => 'n',
            'Ñ' => 'n',
        ]);
    }

    public function getLabel(string $zone): string
    {
        $labels = [
            'norte'  => 'Norte',
            'sur'    => 'Sur',
            'este'   => 'Este',
            'oeste'  => 'Oeste',
            'centro' => 'Centro',
        ];

        return $labels[$zone] ?? $zone;
    }

    public static function getAllZones(): array
    {
        return ['norte', 'sur', 'este', 'oeste', 'centro'];
    }
}
