<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChoferVehiculo>
 */
class ChoferVehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_chofer_vehiculo' => $this->faker->numberBetween(1, 1000),
            'nombre_chofer' => $this->faker->name,
            'placa_vehiculo' => $this->faker->unique()->bothify('#######'),
        ];
    }
}
