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
     public function addCliente()
     {
         $clientes = Clientes::factory(3)->create();

         Clientes::addClientes($clientes);

         $this->assertEquals(3, Clientes::all()->count());
        
     }
}
