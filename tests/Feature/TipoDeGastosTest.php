<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TipoDeGastos;


class TipoDeGastosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function agregar_un_tipo_de_gasto_a_los_registros()
    {       
        $tipoDeGastos = [
            'descripcion' => 'Gasto 1'
        ];
        
        $tipoDeGastoModified = TipoDeGastos::addTipoDeGastos($tipoDeGastos);

        $this->assertEquals(1, TipoDeGastos::all()->count());
       
    }

    /** @test */
    public function actualizar_un_tipo_de_gasto()
    {
        $tipoDeGastos = [
            'descripcion' => 'Modificado TipoDeGasto',
        ];

        $elTipoTipoDeGastos=TipoDeGastos::addTipoDeGastos($tipoDeGastos);

        $tipoDeGastoModified = [
            'id_tipo_gasto' => $elTipoTipoDeGastos->id_tipo_gasto,
            'descripcion' => 'Modificado TipoDeGasto',
        ];

        TipoDeGastos::editTipoDeGastos($tipoDeGastoModified);

        $elTipoTipoDeGastos->refresh();

        $this->assertEquals('Modificado TipoDeGasto', $elTipoTipoDeGastos->descripcion);
    }


    /** @test */
    public function eliminar_un_tipo_de_gasto_de_los_registros()
    {
        $tipoDeGastos = [
            'descripcion' => 'Gasto 1'
        ];

        $elTipoTipoDeGastos=TipoDeGastos::addTipoDeGastos($tipoDeGastos);

        TipoDeGastos::deleteTipoDeGastos($elTipoTipoDeGastos->id_tipo_gasto);

        $this->assertEquals(0, TipoDeGastos::all()->count());
    }


}
