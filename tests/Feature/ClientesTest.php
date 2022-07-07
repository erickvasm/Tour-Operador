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
   public function getClienteById()
   {

      //CREAR UN CLIENTE
      $datosCliente = [
         'nombre'=>'Antonio Carlos Jobim',
         'correo'=>'carlos@email.com'
      ];

      $cliente = Clientes::addCliente($datosCliente);

      $this->assertEquals(1,Clientes::all()->count());

      //EL ID DEL CLIENTE A BUSCAR
      $idClienteABuscar = $cliente->id_cliente;


      //BUSCAR CLIENTE
      $clienteBuscado = Clientes::getClienteById($idClienteABuscar);

      $this->assertNotNull($clienteBuscado);
   }


   /** @test */
   public function addCliente()
   {

      $atributosCliente = [
         'nombre'=>'Maria Dolores',
         'correo'=>'maria@email.com'
      ];
    
      $cliente = Clientes::addCliente($atributosCliente);

      $this->assertEquals(1,Clientes::all()->count());   

   }



   /** @test */
   public function editCliente()
   {

      //CREACION DEL CLIENTE
      $atributosCliente = [
         'nombre'=>'Maria Dolores',
         'correo'=>'maria@email.com'
      ];
    
      $cliente = Clientes::addCliente($atributosCliente);

      $this->assertEquals(1,Clientes::all()->count());


      //EDITAR ATRIBUTOS DEL CLIENTE

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
   public function deleteCliente()
   {

      //CREACION DEL CLIENTE
      $atributosCliente = [
         'nombre'=>'Maria Dolores',
         'correo'=>'maria@email.com'
      ];
    
      $cliente = Clientes::addCliente($atributosCliente);

      $this->assertEquals(1,Clientes::all()->count());


      //ELIMINAR CLIENTE
      Clientes::deleteCliente($cliente->id_cliente);

      $this->assertEquals(0,Clientes::all()->count());


   }





}
