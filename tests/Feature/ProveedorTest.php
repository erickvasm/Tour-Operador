<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Proveedor;

class ProveedorTest extends TestCase
{
    use RefreshDatabase;
    //test if proveedor is added to database
    /** @test */  
    public function proveedor_is_added_to_database()
    {
        $proveedor = Proveedor::factory(2)->make();
        $this->post('/proveedor', $proveedor->toArray());
        Proveedor::addProveedor($proveedor);
        $this->assertEquals(2, Proveedor::count());
    }

}
