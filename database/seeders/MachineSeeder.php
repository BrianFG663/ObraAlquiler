<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\Machinetype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $tipos = Machinetype::all();

        foreach ($tipos as $tipos) {
            Machine::factory()->count(2)->create([
                'machinetype_id' => $tipos->id,
                'model' => ucfirst($tipos->name) . '-' . fake()->randomElement(['X1', 'A2', 'B3', 'T4', 'C5', 'D6', 'E7']),
            ]);
        }
    }
}
