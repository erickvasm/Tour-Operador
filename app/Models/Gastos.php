<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_gasto';


    public $fillable = [
        'id_gasto',
        'fecha',
        'monto',
        'descripcion',
        'gasto_vehiculo',
        'tipo_gasto_fk'
    ];


  
    public static function addGasto($atributosGasto)
    {
    
        $gasto = new Gastos();
        $gasto->fecha=$atributosGasto['fecha'];
        $gasto->monto=$atributosGasto['monto'];
        $gasto->descripcion=$atributosGasto['descripcion'];
        $gasto->gasto_vehiculo=$atributosGasto['gasto_vehiculo'];
        $gasto->tipo_gasto_fk=$atributosGasto['tipo_gasto_fk'];
        $gasto->save();

        return $gasto;

    }


    
    public static function editGasto($atributosGastoModificados)
    {

        Gastos::Where('id_gasto', $atributosGastoModificados['id_gasto'])
             ->update([
                 'fecha' => $atributosGastoModificados['fecha'],
                 'monto' => $atributosGastoModificados['monto'],
                 'descripcion' => $atributosGastoModificados['descripcion'],
                 'gasto_vehiculo' => $atributosGastoModificados['gasto_vehiculo']
             ]);

    }

  
    public static function deleteGasto($id_gasto)
    {
        Gastos::Where('id_gasto', $id_gasto)->delete();
    }

 
    public static function getGastoById($id_gasto)
    {
        return Gastos::Where('id_gasto', $id_gasto)->first();
    }



}
