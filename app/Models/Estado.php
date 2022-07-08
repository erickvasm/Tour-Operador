<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_estado';
 


    public $fillable = [
        'id_estado',
        'descripcion',
    ];


    public static function addEstado($atributosEstado)
    {
    
        $estado = new Estado();
        $estado->descripcion=$atributosEstado['descripcion'];
        $estado->save();

        return $estado;

    }


 
    public static function editEstado($atributosEstadoModificados)
    {

        Estado::Where('id_estado', $atributosEstadoModificados['id_estado'])
             ->update([
                 'descripcion' => $atributosEstadoModificados['descripcion'],
             ]);

    }

    
    public static function deleteEstado($id_estado)
    {
        Estado::Where('id_estado', $id_estado)->delete();
    }

   
    public static function getEstadoById($id_estado)
    {
        return Estado::Where('id_estado', $id_estado)->first();
    }





}
