<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\Maintenance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $machines = Machine::all();

        if ($machines->count() < 16) {
            $this->command->error("Se necesitan al menos 16 máquinas para este seeder.");
            return;
        }


        $machines_2 = $machines->take(10); // primeros 10
        $machines_3 = $machines->slice(10, 3); // siguientes 3
        $machine_4 = $machines->slice(13, 1)->first(); // siguiente 1
        $machine_0 = $machines->slice(14, 1)->first(); // última 1 (sin mantenimientos)

        // Crear 2 mantenimientos para 10 máquinas
        foreach ($machines_2 as $machine) {
            Maintenance::factory()->count(2)->create([
                'machine_id' => $machine->id,
            ]);
        }

        // Crear 3 mantenimientos para 3 máquinas
        foreach ($machines_3 as $machine) {
            Maintenance::factory()->count(3)->create([
                'machine_id' => $machine->id,
            ]);
        }

        // Crear 4 mantenimientos para 1 máquina
        Maintenance::factory()->count(4)->create([
            'machine_id' => $machine_4->id,
        ]);

    }
}
