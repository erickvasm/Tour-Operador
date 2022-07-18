<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Estado;
use App\Models\Servicios;
use App\Models\TipoDePago;
use App\Models\Proveedor;
use App\Models\TipoDeServicios;
use App\Models\ChoferVehiculo;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservacionItem>
 */
class ReservacionItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_reservacion_item'=>$this->faker->numberBetween(1, 1000),
            'fecha_hora'=>$this->faker->dateTime(),
            'numero_vuelo'=>$this->faker->numberBetween(1,1000), 
            'pasajeros'=>$this->faker->numberBetween(1,1000),
            'tarifa'=>$this->faker->numberBetween(1,1000),
            'observaciones'=>$this->faker->text(15),
            'estado_fk'=>Estado::factory()->create()->id_estado,
            'servicio_fk'=>Servicios::factory()->create()->id_servicio,
            'tipo_pago_fk'=>TipoDePago::factory()->create()->id_tipo_pago,
            'proveedor_fk'=>Proveedor::factory()->create()->id_proveedor,
            'tipo_servicio_fk'=>TipoDeServicios::factory()->create()->id_tipo_servicio,
            'chofer_vehiculo_fk'=>ChoferVehiculo::factory()->create()->id_chofer_vehiculo
        ];
    }
}
