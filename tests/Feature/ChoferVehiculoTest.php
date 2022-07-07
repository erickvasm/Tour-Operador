<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ChoferVehiculo;

class ChoferVehiculoTest extends TestCase
{

    use RefreshDatabase;



   /** @test */
   public function getChoferVehiculoById()
   {

      //CREAR UN CHOFER VEHICULO
      $datosChoferVehiculo = [
         'nombre_chofer'=>'Antonio Carlos Jobim',
         'placa_vehiculo'=>'SDHASO99'
      ];

      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($datosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());

      //EL ID DEL CHOFER VEHICULO A BUSCAR
      $idChoferVehiculoABuscar = $choferVehiculo->id_chofer_vehiculo;


      //BUSCAR CHOFER VEHICULO
      $choferVehiculoBuscado = ChoferVehiculo::getChoferVehiculoById($idChoferVehiculoABuscar);

      $this->assertNotNull($choferVehiculoBuscado);
   }


   /** @test */
   public function addChoferVehiculo()
   {

      $atributosChoferVehiculo = [
         'nombre_chofer'=>'Jose Antonio',
         'placa_vehiculo'=>'B928883'
      ];
    
      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($atributosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());   

   }



   /** @test */
   public function editChoferVehiculo()
   {

      //CREACION DEL CHOFER VEHICULO
      $atributosChoferVehiculo = [
        'nombre_chofer'=>'Jose Antonio',
        'placa_vehiculo'=>'B928883'
      ];
    
      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($atributosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());


      //EDITAR ATRIBUTOS DEL CHOFER VEHICULO

      $atributosChoferVehiculoModificdos = [
         'id_chofer_vehiculo'=>$choferVehiculo->id_chofer_vehiculo,
         'nombre_chofer'=>'Ramon Armando',
         'placa_vehiculo'=>'B772291'
      ];

      ChoferVehiculo::editChoferVehiculo($atributosChoferVehiculoModificdos);

      $choferVehiculo->refresh();


      $this->assertEquals('Ramon Armando',$choferVehiculo->nombre_chofer);


   }




    /** @test */
   public function deleteChoferVehiculo()
   {

      //CREACION DEL CHOFER VEHICULO
      $atributosChoferVehiculo = [
         'nombre_chofer'=>'Spike Spiegel',
         'placa_vehiculo'=>'B8282771'
      ];
    
      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($atributosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());


      //ELIMINAR CHOFER VEHICULO
      ChoferVehiculo::deleteChoferVehiculo($choferVehiculo->id_chofer_vehiculo);

      $this->assertEquals(0,ChoferVehiculo::all()->count());


   }





}
