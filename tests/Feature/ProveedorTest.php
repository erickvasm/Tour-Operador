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
        $proveedores = [
            'nombre' => 'Proveedor 1',
            'correo' => 'correo@correo'
        ];

        $proveedorModified = Proveedor::addProveedor($proveedores);

        $this->assertEquals(1, Proveedor::all()->count());


    }


    //update proveedor in the database
    /** @test */
    public function update_proveedor_in_the_database()
    {
       
        $proveedores = [
            'nombre' => 'Proveedor 1',
            'correo' => 'correo@correo'
        ];
        $elProveedor=Proveedor::addProveedor($proveedores);
        print($elProveedor);
        $proveedorModified = [
            'id_proveedor' => $elProveedor->id_proveedor,
            'nombre' => 'Proveedor 1 Modificado',
            'correo' => 'correo@correo'
        ];
        
        Proveedor::editProveedor($proveedorModified);
        
        $elProveedor->refresh();
        
        $this->assertEquals('Proveedor 1 Modificado', $elProveedor->nombre);
    }
       
      
    
    //delete proveedor from the database
    /** @test */
    public function delete_proveedor_from_the_database()
    {
        $proveedores = [
            'nombre' => 'Proveedor 1',
            'correo' => 'correo@correo'
        ];
        $elProveedor=Proveedor::addProveedor($proveedores);
        
        Proveedor::deleteProveedor($elProveedor->id_proveedor);
    
        
        $this->assertEquals(0, Proveedor::all()->count());
    }




}
