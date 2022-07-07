<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reservaciones;
use App\Models\Clientes;

class ReservacionesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function addReservacion()
    {
        $cliente =Clientes::factory()->create();
        $reservaciones = [
            'fecha_reserva' => '2020-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ];

        $reservacionModified = Reservaciones::addReservaciones($reservaciones);

        $this->assertEquals(1, Reservaciones::all()->count());

    }

    /** @test */
    public function editReservacion()
    {
        $cliente =Clientes::factory()->create();
        $reservaciones = [
            'fecha_reserva' => '2020-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ];

        $elReservacion=Reservaciones::addReservaciones($reservaciones);

        $reservacionModified = [
            'id_reservacion' => $elReservacion->id_reservacion,
            'fecha_reserva' => '2022-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ];

        Reservaciones::editReservaciones($reservacionModified);

        $elReservacion->refresh();

        $this->assertEquals('2022-01-01', $elReservacion->fecha_reserva);
    }

    /** @test */
    public function deleteReservacion()
    {
        $cliente =Clientes::factory()->create();
        $reservaciones = [
            'fecha_reserva' => '2020-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ];

        $Reservacion=Reservaciones::addReservaciones($reservaciones);

      $this->assertEquals(1, Reservaciones::all()->count());

        Reservaciones::deleteReservaciones($Reservacion->id_reservacion);

        $this->assertEquals(0, Reservaciones::all()->count());
    }


}
