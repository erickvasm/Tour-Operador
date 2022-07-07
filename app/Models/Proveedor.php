<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_proveedor';

    public $fillable = [
        'id_proveedor',
        'nombre',
        'correo',
        
    ];
//add multiple proveedors to database
public static function addProveedor($proveedores)
{
$proveedor = new Proveedor();
$proveedor->nombre = $proveedores['nombre'];
$proveedor->correo = $proveedores['correo'];
$proveedor->save();
return $proveedor;
    
}

//edit proveedor in the database
public static function editProveedor($Proveedor)
{

    Proveedor::Where('id_proveedor', $Proveedor['id_proveedor'])
        ->Update([
            'nombre' => $Proveedor['nombre'],
            'correo' => $Proveedor['correo'],
        ]);


}

//delete proveedor from the database
public static function deleteProveedor($id_proveedor)
{
    Proveedor::Where('id_proveedor', $id_proveedor)
        ->Delete();

}



}