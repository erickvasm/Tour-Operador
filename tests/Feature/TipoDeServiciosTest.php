<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TipoDeServicios;

class TipoDeServiciosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function addTipoDeServicio()
    {
        $tipoDeServicios = [
            'descripcion' => 'Servicio 1'
        ];

        $tipoDeServicioModified = TipoDeServicios::addTipoDeServicios($tipoDeServicios);

        $this->assertEquals(1, TipoDeServicios::all()->count());
    }

    /** @test */
    public function editTipoDeServicio()
    {
        $tipoDeServicios = [
            'descripcion' => 'Modificado Servicio',
        ];

        $elTipoTipoDeServicios=TipoDeServicios::addTipoDeServicios($tipoDeServicios);

        $tipoDeServicioModified = [
            'id_tipo_servicio' => $elTipoTipoDeServicios->id_tipo_servicio,
            'descripcion' => 'Modificado Servicio',
        ];

        TipoDeServicios::editTipoDeServicios($tipoDeServicioModified);

        $elTipoTipoDeServicios->refresh();

        $this->assertEquals('Modificado Servicio', $elTipoTipoDeServicios->descripcion);
    }

    /** @test */
    public function deleteTipoDeServicio()
    {
        $tipoDeServicios = [
            'descripcion' => 'Gasto 1'
        ];

        $elTipoTipoDeServicios=TipoDeServicios::addTipoDeServicios($tipoDeServicios);
        
        TipoDeServicios::deleteTipoDeServicios($elTipoTipoDeServicios->id_tipo_servicio);

        $this->assertEquals(0, TipoDeServicios::all()->count());
    }
}
