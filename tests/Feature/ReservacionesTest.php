<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reservaciones;
use App\Models\ReservacionItem;
use App\Models\Clientes;
use App\Models\Servicios;
use App\Models\Proveedor;
use App\Models\TipoDeServicios;
use App\Models\TipoDePago;
use App\Models\ChoferVehiculo;
use App\Models\Estado;


class ReservacionesTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function agregar_un_item_de_reservacion(){
        $cliente = Clientes::factory()->create();
        $servicio = Servicios::factory()->create();
        $proveedor = Proveedor::factory()->create();
        $tipoDeServicio = TipoDeServicios::factory()->create();
        $tipoPago = TipoDePago::factory()->create();
        $choferVehiculo = ChoferVehiculo::factory()->create();
        $estado = Estado::factory()->create();
        $reservacion = [
            'fecha_reserva' => '2020-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ];
        Reservaciones::addReservaciones($reservacion);
    

        $reservacionItem = [
            'fecha_hora' => '2020-01-01',
            'numero_vuelo'=> 120,
            'pasajeros' => 2,
            'tarifa' => 100,
            'observaciones' => 'observaciones',
            'estado_fk' => $estado->id_estado,
            'servicio_fk' => $servicio->id_servicio,
            'tipo_pago_fk' => $tipoPago->id_tipo_pago,
            'proveedor_fk' => $proveedor->id_proveedor,
            'tipo_servicio_fk' => $tipoDeServicio->id_tipo_servicio,
            'chofer_vehiculo_fk' => $choferVehiculo->id_chofer_vehiculo,
            'reservacion_fk' => Reservaciones::all()->last()->id_reservacion
        ];

        $reservacionItem = ReservacionItem::addReservacionItem($reservacionItem);

        $this->assertEquals(1, ReservacionItem::all()->count());



    }


    
    /** @test */
    public function ingresar_una_reservacion()
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
    public function editar_una_reservacion()
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
    public function eliminar_una_reservacion()
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





    /** @test */
    public function agregar_un_item_a_la_reservacion()
    {
        $cliente =Clientes::factory()->create();
        $reservacion=Reservaciones::addReservaciones([
            'fecha_reserva' => '2020-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ]);

        $reservacionItem = ReservacionItem::factory()->create();
        
        $reservacion->addReservacionItem($reservacionItem);


        $this->assertEquals(1,$reservacion->reservacionItems()->count());

    }



    /** @test */
    public function agregar_varios_item_a_la_reservacion()
    {
        $cliente =Clientes::factory()->create();
        $reservacion=Reservaciones::addReservaciones([
            'fecha_reserva' => '2020-01-01',
            'cliente_fk' => $cliente->id_cliente,

        ]);

        $reservacionItems = ReservacionItem::factory(3)->create();
        
        $reservacion->addReservacionItem($reservacionItems);

        $this->assertEquals(3,$reservacion->reservacionItems()->count());

    }


}
