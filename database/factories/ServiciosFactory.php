<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicios>
 */
class ServiciosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_servicio' => $this->faker->numberBetween(1, 1000),
            'actividad' => $this->faker->name,
            'descripcion' => $this->faker->text,
        ];
    }
}
