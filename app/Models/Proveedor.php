<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    public $fillable = [
        'id_proveedor',
        'nombre',
        'correo',
        
    ];
//add multiple proveedors to database
public static function addProveedor($Proveedors)
{
    foreach ($Proveedors as $proveedor) {
        $proveedor->save();
    }
}


}
