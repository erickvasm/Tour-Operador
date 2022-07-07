<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Estado;

class EstadosTest extends TestCase
{
    

    use RefreshDatabase;



    public function getEstadoById()
    {

        //CREAR UN ESTADO
        $datosEstado = [
            'descripcion'=>'Finalizado',
        ];

        $estado = Estado::addEstado($datosEstado);

        $this->assertEquals(1,Estado::all()->count());

        //EL ID DEL ESTADO A BUSCAR
        $idEstadoABuscar = $estado->id_estado;


        //BUSCAR ESTADO
        $estadoBuscado = Estado::getEstadoById($idEstadoABuscar);

        $this->assertNotNull($estadoBuscado);
    }


    /** @test */
    public function addEstado()
    {

        $atributosEstado = [
            'descripcion'=>'Finalizado',
        ];
    
        $estado = Estado::addEstado($atributosEstado);

        $this->assertEquals(1,Estado::all()->count());   

    }



    /** @test */
    public function editEstado()
    {

        //CREACION DEL ESTADO
        $atributosEstado = [
            'descripcion'=>'Finalizado',
        ];
    
        $estado = Estado::addEstado($atributosEstado);

        $this->assertEquals(1,Estado::all()->count());


        //EDITAR ATRIBUTOS DEL ESTADO

        $atributosEstadoModificados = [
            'id_estado'=>$estado->id_estado,
            'descripcion'=>'En Proceso'
        ];

        Estado::editEstado($atributosEstadoModificados);

        $estado->refresh();


        $this->assertEquals('En Proceso',$estado->descripcion);


    }




    /** @test */
    public function deleteEstado()
    {

        //CREACION DEL ESTADO
        $atributosEstado = [
            'descripcion'=>'Finalizado'
        ];
    
        $estado = Estado::addEstado($atributosEstado);

        $this->assertEquals(1,Estado::all()->count());


        //ELIMINAR ESTADO
        Estado::deleteEstado($estado->id_estado);

        $this->assertEquals(0,Estado::all()->count());


    }



}
