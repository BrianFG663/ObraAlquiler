<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word, // Genera una palabra aleatoria para el nombre del proyecto
            'province_id' => Province::factory(), // Asocia un `province_id` usando el factory de Province
            'start_date' => $this->faker->date, // Genera una fecha aleatoria para el inicio
            'end_date' => $this->faker->optional()->date, // Genera una fecha aleatoria para la finalización, puede ser NULL
            'created_at' => now(), // Fecha de creación actual
            'updated_at' => now(), // Fecha de actualización actual
        ];
    }
}