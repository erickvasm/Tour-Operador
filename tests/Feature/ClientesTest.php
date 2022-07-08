<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;

class ClientesTest extends TestCase
{	

	use RefreshDatabase;

   /** @test */
   public function obtener_cliente_por_id()
   {

   
      $datosCliente = [
         'nombre'=>'Antonio Carlos Jobim',
         'correo'=>'carlos@email.com'
      ];

      $cliente = Clientes::addCliente($datosCliente);

      $this->assertEquals(1,Clientes::all()->count());

   
      $idClienteABuscar = $cliente->id_cliente;


      $clienteBuscado = Clientes::getClienteById($idClienteABuscar);

      $this->assertNotNull($clienteBuscado);
   }


   /** @test */
   public function agregar_clientes_a_los_registros()
   {

      $atributosCliente = [
         'nombre'=>'Maria Dolores',
         'correo'=>'maria@email.com'
      ];
    
      $cliente = Clientes::addCliente($atributosCliente);

      $this->assertEquals(1,Clientes::all()->count());   

   }


   /** @test */
   public function actualizar_los_registros_del_cliente()
   {

    
      $atributosCliente = [
         'nombre'=>'Maria Dolores',
         'correo'=>'maria@email.com'
      ];
    
      $cliente = Clientes::addCliente($atributosCliente);

      $this->assertEquals(1,Clientes::all()->count());


      $atributosClienteModificados = [
         'id_cliente'=>$cliente->id_cliente,
         'nombre'=>'Marcos Alvira',
         'correo'=>'marcos@email.com'
      ];

      Clientes::editCliente($atributosClienteModificados);

      $cliente->refresh();


      $this->assertEquals('Marcos Alvira',$cliente->nombre);


   }


    /** @test */
   public function eliminar_los_registros_de_cliente()
   {

    
      $atributosCliente = [
         'nombre'=>'Maria Dolores',
         'correo'=>'maria@email.com'
      ];
    
      $cliente = Clientes::addCliente($atributosCliente);

      $this->assertEquals(1,Clientes::all()->count());

      Clientes::deleteCliente($cliente->id_cliente);

      $this->assertEquals(0,Clientes::all()->count());


   }





}
