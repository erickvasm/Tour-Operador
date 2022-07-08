<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Gastos;
use App\Models\TipoDeGastos;



class GastosTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function obtener_gasto_por_id()
    {
        
        $tipoDeGasto =TipoDeGastos::factory()->create();

        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];

        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());


        $idGastoABuscar = $gasto->id_gasto;

        $gastoBuscado = Gastos::getGastoById($idGastoABuscar);

        $this->assertNotNull($gastoBuscado);
    }



    /** @test */
    public function agregar_un_gasto(){

        $tipoDeGasto =TipoDeGastos::factory()->create();

        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];

        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());


    }



    /** @test */
    public function actualizar_un_gasto()
    {
        
        $tipoDeGasto =TipoDeGastos::factory()->create();

        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];
    
        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());

        $atributosGastoModificados = [
            'id_gasto' => $gasto->id_gasto,
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Refracciones nuevas',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];

        Gastos::editGasto($atributosGastoModificados);

        $gasto->refresh();


        $this->assertEquals('Refracciones nuevas',$gasto->descripcion);

    }




    /** @test */
    public function eliminar_un_gasto()
    {
        $tipoDeGasto =TipoDeGastos::factory()->create();

        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];
    
        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());

        Gastos::deleteGasto($gasto->id_gasto);

        $this->assertEquals(0,Gastos::all()->count());


    }

}
