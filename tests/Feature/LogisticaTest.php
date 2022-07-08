<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Reservaciones;
use App\Models\Clientes;
use App\Models\Estado;
use App\Models\Servicios;
use App\Models\TipoDePago;
use App\Models\Proveedor;
use App\Models\TipoDeServicios;
use App\Models\ChoferVehiculo;
use App\Models\ReservacionItem;


 

class LogisticaTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function modificarElEstadoDelServicio(){

        /*CREAR RESERVACION*/
        $cliente = Clientes::factory()->create();

        //->Crear la Reservacion
        $reservacion = Reservaciones::addReservaciones([
            'fecha_reserva'=>'2020-01-01',
            'cliente_fk'=>$cliente->id_cliente
        ]);


        /*CREAR RESERVACION ITEM*/
        
        //->Crear un Estado (EN PROCESO)
        $estadoEnProceso = Estado::factory()->create();
        $estadoEnProceso->descripcion="En Proceso";
        $estadoEnProceso->update();

         //->Crear un Estado (Finalizado)
        $estadoModificado = Estado::factory()->create();
        $estadoModificado->descripcion="Finalizado";
        $estadoModificado->update();

        //->Crear un Servicio
        $servicio = Servicios::factory()->create();

        //->Crear un TipoDePago
        $tipoDePago = TipoDePago::factory()->create();
        
        //->Crear un Proveedor
        $proveedor = Proveedor::factory()->create();

        //->Crear un TipoDeServicio
        $tipoDeServicio = TipoDeServicios::factory()->create();

        //->Crear un ChoferVehiculo
        $choferVehiculo = ChoferVehiculo::factory()->create();
        //->Crear una ReservacionItem
        $reservacionItem = ReservacionItem::addReservacionItem([
            'fecha_hora'        =>  (new \DateTime('NOW')),
            'numero_vuelo'      =>  502, 
            'pasajeros'         =>  2,
            'tarifa'            =>  7500,
            'observaciones'     =>  'Hola Mundo',
            'reservacion_fk'    =>  $reservacion->id_reservacion,
            'estado_fk'         =>  $estadoEnProceso->id_estado,
            'servicio_fk'       =>  $servicio->id_servicio,
            'tipo_pago_fk'      =>  $tipoDePago->id_tipo_pago,
            'proveedor_fk'      =>  $proveedor->id_proveedor,
            'tipo_servicio_fk'  =>  $tipoDeServicio->id_tipo_servicio,
            'chofer_vehiculo_fk'=>  $choferVehiculo->id_chofer_vehiculo
        ]);

        $this->assertEquals('En Proceso',Estado::getEstadoById($reservacionItem->estado_fk)->descripcion);



        /*MODIFICAR EL ESTADO*/
        $reservacionItemModificado = ReservacionItem::editReservacionItem([
          'id_reservacion_item'   =>  $reservacionItem->id_reservacion_item,
          'fecha_hora'            =>  (new \DateTime('NOW')),
          'numero_vuelo'          =>  502, 
          'pasajeros'             =>  2,
          'tarifa'                =>  7500,
          'observaciones'         =>  'Hola Mundo',
          'reservacion_fk'        =>  $reservacion->id_reservacion,
          'estado_fk'             =>  $estadoModificado->id_estado,
          'servicio_fk'           =>  $servicio->id_servicio,
          'tipo_pago_fk'          =>  $tipoDePago->id_tipo_pago,
          'proveedor_fk'          =>  $proveedor->id_proveedor,
          'tipo_servicio_fk'      =>  $tipoDeServicio->id_tipo_servicio,
          'chofer_vehiculo_fk'    =>  $choferVehiculo->id_chofer_vehiculo
        ]);

        $reservacionItem->refresh();


        $this->assertEquals('Finalizado',Estado::getEstadoById($reservacionItem->estado_fk)->descripcion);




    }


    /** @test */
    public function modificarElTipoDeServicioDelServicio(){


        /*CREAR RESERVACION*/
        $cliente = Clientes::factory()->create();

        //->Crear la Reservacion
        $reservacion = Reservaciones::addReservaciones([
            'fecha_reserva'=>'2020-01-01',
            'cliente_fk'=>$cliente->id_cliente
        ]);


        /*CREAR RESERVACION ITEM*/
        
        //->Crear un Estado (EN PROCESO)
        $estado = Estado::factory()->create();

        //->Crear un Servicio
        $servicio = Servicios::factory()->create();

        //->Crear un TipoDePago
        $tipoDePago = TipoDePago::factory()->create();
        
        //->Crear un Proveedor
        $proveedor = Proveedor::factory()->create();

        //->Crear un TipoDeServicio
        $tipoDeServicioTransfer= TipoDeServicios::addTipoDeServicios([
            'descripcion' => 'Transfer'
        ]);


        //->Crear un TipoDeServicio
        $tipoDeServicioSalida = TipoDeServicios::addTipoDeServicios([
            'descripcion' => 'Salida'
        ]);


        //->Crear un ChoferVehiculo
        $choferVehiculo = ChoferVehiculo::factory()->create();
        //->Crear una ReservacionItem
        $reservacionItem = ReservacionItem::addReservacionItem([
            'fecha_hora'        =>  (new \DateTime('NOW')),
            'numero_vuelo'      =>  502, 
            'pasajeros'         =>  2,
            'tarifa'            =>  7500,
            'observaciones'     =>  'Hola Mundo',
            'reservacion_fk'    =>  $reservacion->id_reservacion,
            'estado_fk'         =>  $estado->id_estado,
            'servicio_fk'       =>  $servicio->id_servicio,
            'tipo_pago_fk'      =>  $tipoDePago->id_tipo_pago,
            'proveedor_fk'      =>  $proveedor->id_proveedor,
            'tipo_servicio_fk'  =>  $tipoDeServicioTransfer->id_tipo_servicio,
            'chofer_vehiculo_fk'=>  $choferVehiculo->id_chofer_vehiculo
        ]);

        $this->assertEquals('Transfer',TipoDeServicios::findOrFail($reservacionItem->tipo_servicio_fk)->descripcion);



        /*MODIFICAR EL ESTADO*/
        $reservacionItemModificado = ReservacionItem::editReservacionItem([
          'id_reservacion_item'   =>  $reservacionItem->id_reservacion_item,
          'fecha_hora'            =>  (new \DateTime('NOW')),
          'numero_vuelo'          =>  502, 
          'pasajeros'             =>  2,
          'tarifa'                =>  7500,
          'observaciones'         =>  'Hola Mundo',
          'reservacion_fk'        =>  $reservacion->id_reservacion,
          'estado_fk'             =>  $estado->id_estado,
          'servicio_fk'           =>  $servicio->id_servicio,
          'tipo_pago_fk'          =>  $tipoDePago->id_tipo_pago,
          'proveedor_fk'          =>  $proveedor->id_proveedor,
          'tipo_servicio_fk'      =>  $tipoDeServicioSalida->id_tipo_servicio,
          'chofer_vehiculo_fk'    =>  $choferVehiculo->id_chofer_vehiculo
        ]);


        $reservacionItem->refresh();

        $this->assertEquals('Salida',TipoDeServicios::findOrFail($reservacionItem->tipo_servicio_fk)->descripcion);



    }

    /** @test */
    public function asignarChoferYVehiculoAlServicio(){

        /*CREAR RESERVACION*/
        $cliente = Clientes::factory()->create();

        //->Crear la Reservacion
        $reservacion = Reservaciones::addReservaciones([
            'fecha_reserva'=>'2020-01-01',
            'cliente_fk'=>$cliente->id_cliente
        ]);


        /*CREAR RESERVACION ITEM*/
        
        //->Crear un Estado
        $estado = Estado::factory()->create();

        //->Crear un Servicio
        $servicio = Servicios::factory()->create();

        //->Crear un TipoDePago
        $tipoDePago = TipoDePago::factory()->create();
        
        //->Crear un Proveedor
        $proveedor = Proveedor::factory()->create();

        //->Crear un TipoDeServicio
        $tipoDeServicio = TipoDeServicios::factory()->create();

        //->Crear un ChoferVehiculo
        $choferVehiculoMarcos = ChoferVehiculo::addChoferVehiculo([
            'nombre_chofer'=>'Marcos',
            'placa_vehiculo'=>'B9922'
        ]);

        //->Crear un ChoferVehiculo
        $choferVehiculoMaria = ChoferVehiculo::addChoferVehiculo([
            'nombre_chofer'=>'Maria',
            'placa_vehiculo'=>'B9922'
        ]);

        //->Crear una ReservacionItem
        $reservacionItem = ReservacionItem::addReservacionItem([
            'fecha_hora'        =>  (new \DateTime('NOW')),
            'numero_vuelo'      =>  502, 
            'pasajeros'         =>  2,
            'tarifa'            =>  7500,
            'observaciones'     =>  'Hola Mundo',
            'reservacion_fk'    =>  $reservacion->id_reservacion,
            'estado_fk'         =>  $estado->id_estado,
            'servicio_fk'       =>  $servicio->id_servicio,
            'tipo_pago_fk'      =>  $tipoDePago->id_tipo_pago,
            'proveedor_fk'      =>  $proveedor->id_proveedor,
            'tipo_servicio_fk'  =>  $tipoDeServicio->id_tipo_servicio,
            'chofer_vehiculo_fk'=>  $choferVehiculoMarcos->id_chofer_vehiculo
        ]);

        $this->assertEquals('Marcos',ChoferVehiculo::getChoferVehiculoById($reservacionItem->chofer_vehiculo_fk)->nombre_chofer);



        /*MODIFICAR EL ESTADO*/
        $reservacionItemModificado = ReservacionItem::editReservacionItem([
          'id_reservacion_item'   =>  $reservacionItem->id_reservacion_item,
          'fecha_hora'            =>  (new \DateTime('NOW')),
          'numero_vuelo'          =>  502, 
          'pasajeros'             =>  2,
          'tarifa'                =>  7500,
          'observaciones'         =>  'Hola Mundo',
          'reservacion_fk'        =>  $reservacion->id_reservacion,
          'estado_fk'             =>  $estado->id_estado,
          'servicio_fk'           =>  $servicio->id_servicio,
          'tipo_pago_fk'          =>  $tipoDePago->id_tipo_pago,
          'proveedor_fk'          =>  $proveedor->id_proveedor,
          'tipo_servicio_fk'      =>  $tipoDeServicio->id_tipo_servicio,
          'chofer_vehiculo_fk'    =>  $choferVehiculoMaria->id_chofer_vehiculo
        ]);


        $reservacionItem->refresh();

        $this->assertEquals('Maria',ChoferVehiculo::getChoferVehiculoById($reservacionItem->chofer_vehiculo_fk)->nombre_chofer);



    }



    /** @test */
    public function asignarProveedorAlServicio(){

        /*CREAR RESERVACION*/
        $cliente = Clientes::factory()->create();

        //->Crear la Reservacion
        $reservacion = Reservaciones::addReservaciones([
            'fecha_reserva'=>'2020-01-01',
            'cliente_fk'=>$cliente->id_cliente
        ]);


        /*CREAR RESERVACION ITEM*/
        
        //->Crear un Estado
        $estado = Estado::factory()->create();

        //->Crear un Servicio
        $servicioCanopy = Servicios::addServicios([
            'actividad' => 'Canopy',
            'descripcion' => 'Se realiza Canopy'
        ]);

        //->Crear un Servicio
        $servicioAlpinismo = Servicios::addServicios([
            'actividad' => 'Alpinismo',
            'descripcion' => 'Se realiza Alpinismo'
        ]);

        //->Crear un TipoDePago
        $tipoDePago = TipoDePago::factory()->create();
        
        //->Crear un Proveedor
        $proveedor = Proveedor::factory()->create();

        //->Crear un TipoDeServicio
        $tipoDeServicio = TipoDeServicios::factory()->create();

        //->Crear un ChoferVehiculo
        $choferVehiculo = ChoferVehiculo::factory()->create();

        //->Crear una ReservacionItem
        $reservacionItem = ReservacionItem::addReservacionItem([
            'fecha_hora'        =>  (new \DateTime('NOW')),
            'numero_vuelo'      =>  502, 
            'pasajeros'         =>  2,
            'tarifa'            =>  7500,
            'observaciones'     =>  'Hola Mundo',
            'reservacion_fk'    =>  $reservacion->id_reservacion,
            'estado_fk'         =>  $estado->id_estado,
            'servicio_fk'       =>  $servicioCanopy->id_servicio,
            'tipo_pago_fk'      =>  $tipoDePago->id_tipo_pago,
            'proveedor_fk'      =>  $proveedor->id_proveedor,
            'tipo_servicio_fk'  =>  $tipoDeServicio->id_tipo_servicio,
            'chofer_vehiculo_fk'=>  $choferVehiculo->id_chofer_vehiculo
        ]);

        $this->assertEquals('Canopy',Servicios::find($reservacionItem->servicio_fk)->actividad);



        /*MODIFICAR EL ESTADO*/
        $reservacionItemModificado = ReservacionItem::editReservacionItem([
          'id_reservacion_item'   =>  $reservacionItem->id_reservacion_item,
          'fecha_hora'            =>  (new \DateTime('NOW')),
          'numero_vuelo'          =>  502, 
          'pasajeros'             =>  2,
          'tarifa'                =>  7500,
          'observaciones'         =>  'Hola Mundo',
          'reservacion_fk'        =>  $reservacion->id_reservacion,
          'estado_fk'             =>  $estado->id_estado,
          'servicio_fk'           =>  $servicioAlpinismo->id_servicio,
          'tipo_pago_fk'          =>  $tipoDePago->id_tipo_pago,
          'proveedor_fk'          =>  $proveedor->id_proveedor,
          'tipo_servicio_fk'      =>  $tipoDeServicio->id_tipo_servicio,
          'chofer_vehiculo_fk'    =>  $choferVehiculo->id_chofer_vehiculo
        ]);


        $reservacionItem->refresh();

        $this->assertEquals('Alpinismo',Servicios::find($reservacionItem->servicio_fk)->actividad);



    }


    /** @test */
    public function modificarTipoDePagoAlServicio(){



        /*CREAR RESERVACION*/
        $cliente = Clientes::factory()->create();

        //->Crear la Reservacion
        $reservacion = Reservaciones::addReservaciones([
            'fecha_reserva'=>'2020-01-01',
            'cliente_fk'=>$cliente->id_cliente
        ]);


        /*CREAR RESERVACION ITEM*/
        
        //->Crear un Estado
        $estado = Estado::factory()->create();

        //->Crear un Servicio
        $servicio = Servicios::addServicios([
            'actividad' => 'Canopy',
            'descripcion' => 'Se realiza Canopy'
        ]);

        //->Crear un TipoDePago
        $tipoDePagoTarjeta = TipoDePago::addTipoDePago([
            'descripcion'=>'Tarjeta'
        ]);

        //->Crear un TipoDePago
        $tipoDePagoEfectivo = TipoDePago::addTipoDePago([
            'descripcion'=>'Efectivo'
        ]);
        
        //->Crear un Proveedor
        $proveedor = Proveedor::factory()->create();

        //->Crear un TipoDeServicio
        $tipoDeServicio = TipoDeServicios::factory()->create();

        //->Crear un ChoferVehiculo
        $choferVehiculo = ChoferVehiculo::factory()->create();

        //->Crear una ReservacionItem
        $reservacionItem = ReservacionItem::addReservacionItem([
            'fecha_hora'        =>  (new \DateTime('NOW')),
            'numero_vuelo'      =>  502, 
            'pasajeros'         =>  2,
            'tarifa'            =>  7500,
            'observaciones'     =>  'Hola Mundo',
            'reservacion_fk'    =>  $reservacion->id_reservacion,
            'estado_fk'         =>  $estado->id_estado,
            'servicio_fk'       =>  $servicio->id_servicio,
            'tipo_pago_fk'      =>  $tipoDePagoTarjeta->id_tipo_pago,
            'proveedor_fk'      =>  $proveedor->id_proveedor,
            'tipo_servicio_fk'  =>  $tipoDeServicio->id_tipo_servicio,
            'chofer_vehiculo_fk'=>  $choferVehiculo->id_chofer_vehiculo
        ]);

        $this->assertEquals('Tarjeta',TipoDePago::find($reservacionItem->tipo_pago_fk)->descripcion);



        /*MODIFICAR EL ESTADO*/
        $reservacionItemModificado = ReservacionItem::editReservacionItem([
          'id_reservacion_item'   =>  $reservacionItem->id_reservacion_item,
          'fecha_hora'            =>  (new \DateTime('NOW')),
          'numero_vuelo'          =>  502, 
          'pasajeros'             =>  2,
          'tarifa'                =>  7500,
          'observaciones'         =>  'Hola Mundo',
          'reservacion_fk'        =>  $reservacion->id_reservacion,
          'estado_fk'             =>  $estado->id_estado,
          'servicio_fk'           =>  $servicio->id_servicio,
          'tipo_pago_fk'          =>  $tipoDePagoEfectivo->id_tipo_pago,
          'proveedor_fk'          =>  $proveedor->id_proveedor,
          'tipo_servicio_fk'      =>  $tipoDeServicio->id_tipo_servicio,
          'chofer_vehiculo_fk'    =>  $choferVehiculo->id_chofer_vehiculo
        ]);


        $reservacionItem->refresh();

        $this->assertEquals('Efectivo',TipoDePago::find($reservacionItem->tipo_pago_fk)->descripcion);






    }




}
