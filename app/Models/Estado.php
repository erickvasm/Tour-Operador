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

    //add estados to estadobase
    public static function addEstado($atributosEstado)
    {
    
        $estado = new Estado();
        $estado->descripcion=$atributosEstado['descripcion'];
        $estado->save();

        return $estado;

    }


    //edit estados in estadobase
    public static function editEstado($atributosEstadoModificados)
    {

        Estado::Where('id_estado', $atributosEstadoModificados['id_estado'])
             ->update([
                 'descripcion' => $atributosEstadoModificados['descripcion'],
             ]);

    }

    //delete estados from estadobase
    public static function deleteEstado($id_estado)
    {
        Estado::Where('id_estado', $id_estado)->delete();
    }

    //get estados by id_estado from estadobase
    public static function getEstadoById($id_estado)
    {
        return Estado::Where('id_estado', $id_estado)->first();
    }





}
