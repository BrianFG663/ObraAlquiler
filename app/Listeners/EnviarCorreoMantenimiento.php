<?php

namespace App\Listeners;

use App\Events\MaquinaNecesitaMantenimiento;
use App\Mail\MantenimientoMaquina;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarCorreoMantenimiento
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MaquinaNecesitaMantenimiento $event): void
    {
        
        Mail::to('briangonzaz305@gmail.com')->send(new MantenimientoMaquina($event->maquina));
    }
}

