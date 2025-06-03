<?php

namespace Database\Seeders;

use App\Models\Machinetype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'grua',
            'dumper',
            'retroexcavadora',
            'tuneladora',
            'topadora',
            'aplanadora',
            'excavadora',
            'buldoser'
        ];

        foreach ($tipos as $tipo) {
            Machinetype::create(['name' => $tipo]);
        }
    }
}
