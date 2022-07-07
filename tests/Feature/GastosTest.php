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
    public function getGastoById()
    {
        //CREAR UN TIPO DE GASTO
        $tipoDeGasto =TipoDeGastos::factory()->create();


        //CREAR UN GASTO
        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];

        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());

        //EL ID DEL GASTO A BUSCAR
        $idGastoABuscar = $gasto->id_gasto;


        //BUSCAR GASTO
        $gastoBuscado = Gastos::getGastoById($idGastoABuscar);

        $this->assertNotNull($gastoBuscado);
    }



    /** @test */
    public function addGasto(){

        //CREAR UN TIPO DE GASTO
        $tipoDeGasto =TipoDeGastos::factory()->create();

        //CREAR UN GASTO
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
    public function editGasto()
    {
        
        //CREAR UN TIPO DE GASTO
        $tipoDeGasto =TipoDeGastos::factory()->create();


        //CREACION DEL GASTO
        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];
    
        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());


        //EDITAR ATRIBUTOS DEL GASTO
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
    public function deleteGasto()
    {
        //CREAR UN TIPO DE GASTO
        $tipoDeGasto =TipoDeGastos::factory()->create();

        //CREACION DEL GASTO
        $datosGasto = [
            'fecha' => (new \DateTime('NOW')),
            'monto' => (2219.22),
            'descripcion' => 'Pago de gasolina',
            'gasto_vehiculo' => (true),
            'tipo_gasto_fk' => $tipoDeGasto->id_tipo_gasto
        ];
    
        $gasto = Gastos::addGasto($datosGasto);

        $this->assertEquals(1,Gastos::all()->count());


        //ELIMINAR GASTO
        Gastos::deleteGasto($gasto->id_gasto);

        $this->assertEquals(0,Gastos::all()->count());


    }

}
