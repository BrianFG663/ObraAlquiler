<?php
namespace App\Listeners;

use App\Events\MaquinaNecesitaMantenimiento;
use App\Mail\MantenimientoMaquina;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarCorreoMantenimiento
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MaquinaNecesitaMantenimiento $event): void
    {
        $maquina = $event->maquina->load('maintenances');

        if ($maquina->maintenances->isNotEmpty()) {
            $ultimo_km = $maquina->maintenances->last()->kilometers_maintenances;
            $km_sin_mantenimiento = $maquina->life_time_km - $ultimo_km;

            if ($km_sin_mantenimiento > $maquina->maintenance_km) {
                Mail::to('briangonzaz305@gmail.com')->send(new MantenimientoMaquina($maquina));
            }
        } else {
            if ($maquina->life_time_km > $maquina->maintenance_km) {
                Mail::to('briangonzaz305@gmail.com')->send(new MantenimientoMaquina($maquina));
            }
        }
    }
}