<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Proveedor;

class ProveedorTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */  
    public function agregar_un_proveedor_a_los_registros()
    {
        $proveedores = [
            'nombre' => 'Proveedor 1',
            'correo' => 'correo@correo'
        ];

        $proveedorModified = Proveedor::addProveedor($proveedores);

        $this->assertEquals(1, Proveedor::all()->count());


    }

    /** @test */
    public function actualizar_los_resgitros_de_un_proveedor()
    {
       
        $proveedores = [
            'nombre' => 'Proveedor 1',
            'correo' => 'correo@correo'
        ];
        $elProveedor=Proveedor::addProveedor($proveedores);
      
        $proveedorModified = [
            'id_proveedor' => $elProveedor->id_proveedor,
            'nombre' => 'Proveedor 1 Modificado',
            'correo' => 'correo@correo'
        ];
        
        Proveedor::editProveedor($proveedorModified);
        
        $elProveedor->refresh();
        
        $this->assertEquals('Proveedor 1 Modificado', $elProveedor->nombre);
    }
       
      
    /** @test */
    public function eliminar_los_registros_de_un_proveedor()
    {
        $proveedores = [
            'nombre' => 'Proveedor 1',
            'correo' => 'correo@correo'
        ];
        $elProveedor=Proveedor::addProveedor($proveedores);

        $this->assertEquals(1, Proveedor::all()->count());
        
        Proveedor::deleteProveedor($elProveedor->id_proveedor);
    
        
        $this->assertEquals(0, Proveedor::all()->count());
    }


}
