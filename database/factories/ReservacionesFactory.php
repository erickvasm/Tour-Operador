<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservaciones>
 */
class ReservacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_reservacion' => $this->faker->numberBetween(1, 1000),
            'fecha_reserva' => $this->faker->dateTime,
            'cliente_fk' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
