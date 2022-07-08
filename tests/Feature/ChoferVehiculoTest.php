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
   public function obtener_chofer_vehiculo_por_id()
   {

      
      $datosChoferVehiculo = [
         'nombre_chofer'=>'Antonio Carlos Jobim',
         'placa_vehiculo'=>'SDHASO99'
      ];

      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($datosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());

     
      $idChoferVehiculoABuscar = $choferVehiculo->id_chofer_vehiculo;


     
      $choferVehiculoBuscado = ChoferVehiculo::getChoferVehiculoById($idChoferVehiculoABuscar);

      $this->assertNotNull($choferVehiculoBuscado);
   }


   /** @test */
   public function agregar_un_chofer_a_vehiculo()
   {

      $atributosChoferVehiculo = [
         'nombre_chofer'=>'Jose Antonio',
         'placa_vehiculo'=>'B928883'
      ];
    
      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($atributosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());   

   }



   /** @test */
   public function editar_un_chofer_vehiculo()
   {

     
      $atributosChoferVehiculo = [
        'nombre_chofer'=>'Jose Antonio',
        'placa_vehiculo'=>'B928883'
      ];
    
      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($atributosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());


    

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
   public function eliminar_chofer_de_los_registros()
   {

      
      $atributosChoferVehiculo = [
         'nombre_chofer'=>'Spike Spiegel',
         'placa_vehiculo'=>'B8282771'
      ];
    
      $choferVehiculo = ChoferVehiculo::addChoferVehiculo($atributosChoferVehiculo);

      $this->assertEquals(1,ChoferVehiculo::all()->count());

      ChoferVehiculo::deleteChoferVehiculo($choferVehiculo->id_chofer_vehiculo);

      $this->assertEquals(0,ChoferVehiculo::all()->count());


   }





}
