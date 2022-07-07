<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Servicios;

class ServiciosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function addServicio()
    {
        $servicios = [
            'actividad' => 'Actividad 1',
            'descripcion' => 'Servicio 1'
        ];

        $servicioModified = Servicios::addServicios($servicios);

        $this->assertEquals(1, Servicios::all()->count());

    }

    /** @test */
    public function editServicio()
    {
        $servicios = [
            'actividad' => 'Actividad 1',
            'descripcion' => 'Servicio 1'
        ];

        $elServicio=Servicios::addServicios($servicios);

        $servicioModified = [
            'id_servicio' => $elServicio->id_servicio,
            'actividad' => 'Actividad 1 Modificado',
            'descripcion' => 'Servicio 1 Modificado'
        ];

        Servicios::editServicios($servicioModified);

        $elServicio->refresh();

        $this->assertEquals('Actividad 1 Modificado', $elServicio->actividad);
    }

    /** @test */
    public function deleteServicio()
    {
        $servicios = [
            'actividad' => 'Actividad 1',
            'descripcion' => 'Servicio 1'
        ];

        $elServicio=Servicios::addServicios($servicios);

        $this->assertEquals(1, Servicios::all()->count());

        Servicios::deleteServicios($elServicio->id_servicio);

        $this->assertEquals(0, Servicios::all()->count());
    }





}
