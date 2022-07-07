<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoDeGastos>
 */
class TipoDeGastosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_tipo_gasto' => $this->faker->numberBetween(1, 1000),
            'descripcion' => $this->faker->name,
        ];
    }
}
