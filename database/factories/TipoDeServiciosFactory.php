<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoDeServicios>
 */
class TipoDeServiciosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_tipo_servicio' => $this->faker->numberBetween(1, 100),
            'descripcion' => $this->faker->word,
        ];
    }
}
