<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estado;

class EstadosTest extends TestCase
{
    

    use RefreshDatabase;


    /** @test */
    public function obtener_estado_por_id()
    {

     
        $datosEstado = [
            'descripcion'=>'Finalizado',
        ];

        $estado = Estado::addEstado($datosEstado);

        $this->assertEquals(1,Estado::all()->count());

      
        $idEstadoABuscar = $estado->id_estado;

        $estadoBuscado = Estado::getEstadoById($idEstadoABuscar);

        $this->assertNotNull($estadoBuscado);
    }


    /** @test */
    public function agregar_un_estado()
    {

        $atributosEstado = [
            'descripcion'=>'Finalizado',
        ];
    
        $estado = Estado::addEstado($atributosEstado);

        $this->assertEquals(1,Estado::all()->count());   

    }



    /** @test */
    public function editar_un_estado()
    {

     
        $atributosEstado = [
            'descripcion'=>'Finalizado',
        ];
    
        $estado = Estado::addEstado($atributosEstado);

        $this->assertEquals(1,Estado::all()->count());


        $atributosEstadoModificados = [
            'id_estado'=>$estado->id_estado,
            'descripcion'=>'En Proceso'
        ];

        Estado::editEstado($atributosEstadoModificados);

        $estado->refresh();


        $this->assertEquals('En Proceso',$estado->descripcion);


    }


    /** @test */
    public function eliminar_un_estado()
    {

        
        $atributosEstado = [
            'descripcion'=>'Finalizado'
        ];
    
        $estado = Estado::addEstado($atributosEstado);

        $this->assertEquals(1,Estado::all()->count());

        Estado::deleteEstado($estado->id_estado);

        $this->assertEquals(0,Estado::all()->count());


    }



}
