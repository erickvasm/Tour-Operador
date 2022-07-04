<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;

class ClientesTest extends TestCase
{
     /** @test */
     public function addCliente()
     {
         $clientes = Clientes::factory(1)->create();

         Clientes::addClientes($clientes);

         $this->assertEquals(1, $cliente->count());
        
     }
}
