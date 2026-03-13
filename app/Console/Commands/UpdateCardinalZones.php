<?php

namespace App\Console\Commands;

use App\Models\Listing;
use App\Services\CardinalZoneService;
use Illuminate\Console\Command;

class UpdateCardinalZones extends Command
{
    protected $signature = 'listings:update-cardinal-zones 
                            {--force : Recalcular incluso las que ya tienen zona asignada}
                            {--city= : Filtrar solo por ciudad específica (ej: Cuenca)}
                            {--dry-run : Mostrar resultados sin guardar}';

    protected $description = 'Calcula y asigna la zona cardinal (norte/sur/este/oeste/centro) a las propiedades según sus coordenadas';

    public function handle()
    {
        $service  = new CardinalZoneService();
        $force    = $this->option('force');
        $cityFilter = $this->option('city');
        $dryRun   = $this->option('dry-run');

        $query = Listing::whereNotNull('lat')
            ->whereNotNull('lng')
            ->where('lat', '!=', '')
            ->where('lng', '!=', '');

        if (!$force) {
            $query->whereNull('cardinal_zone');
        }

        if ($cityFilter) {
            $query->where('city', 'LIKE', "%$cityFilter%");
        }

        $total = $query->count();

        if ($total === 0) {
            $this->info('No hay propiedades para procesar.');
            return 0;
        }

        $this->info("Propiedades a procesar: {$total}");
        if ($dryRun) $this->warn('MODO DRY-RUN: no se guardará nada.');

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $counts   = ['norte' => 0, 'sur' => 0, 'este' => 0, 'oeste' => 0, 'centro' => 0, 'sin_zona' => 0, 'omitidas' => 0];
        $updated  = 0;

        $query->chunk(100, function ($listings) use ($service, $dryRun, $bar, &$counts, &$updated) {
            foreach ($listings as $listing) {

                // Sanitizar: reemplazar coma por punto (datos europeos)
                $latRaw = str_replace(',', '.', (string) $listing->lat);
                $lngRaw = str_replace(',', '.', (string) $listing->lng);

                $lat = (float) $latRaw;
                $lng = (float) $lngRaw;

                // ✅ Validar que sean coordenadas geográficas reales
                $latValida = ($lat !== 0.0 && $lat >= -90  && $lat <= 90);
                $lngValida = ($lng !== 0.0 && $lng >= -180 && $lng <= 180);

                if (!$latValida || !$lngValida) {
                    $counts['omitidas']++;

                    // ✅ Limpiar coordenadas inválidas en la BD (ponerlas en null)
                    if (!$dryRun) {
                        $listing->timestamps = false;
                        $listing->lat = null;
                        $listing->lng = null;
                        $listing->cardinal_zone = null;
                        $listing->save();
                    }

                    $bar->advance();
                    continue;
                }

                $zone = $service->calculate($lat, $lng, $listing->city);

                if ($zone === null) {
                    $counts['sin_zona']++;
                    $bar->advance();
                    continue;
                }

                if (!$dryRun) {
                    $listing->timestamps = false;
                    $listing->cardinal_zone = $zone;
                    $listing->save();
                }

                $counts[$zone]++;
                $updated++;
                $bar->advance();
            }
        });

        $bar->finish();
        $this->line('');
        $this->line('');

        // Tabla resumen
        $this->info('Proceso completado' . ($dryRun ? ' (dry-run, nada guardado)' : '') . ':');
        $this->table(
            ['Zona', 'Propiedades'],
            [
                ['Norte',                                    $counts['norte']],
                ['Sur',                                      $counts['sur']],
                ['Este',                                     $counts['este']],
                ['Oeste',                                    $counts['oeste']],
                ['Centro',                                   $counts['centro']],
                ['Sin zona (ciudad no reconocida)',           $counts['sin_zona']],
                ['Omitidas y limpiadas (coords inválidas)',  $counts['omitidas']],
                ['TOTAL ACTUALIZADAS',                       $updated],
            ]
        );

        return 0;
    }
}
