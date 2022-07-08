<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeGastos extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_tipo_gasto';

    public $fillable = [
        'id_tipo_gasto',
        'descripcion'
    ];

    
    public static function addTipoDeGastos($tipoDeGastos)
    {
        $tipoDeGasto = new TipoDeGastos();
        $tipoDeGasto->descripcion = $tipoDeGastos['descripcion'];
        $tipoDeGasto->save();

        return $tipoDeGasto;
    }

   
    public function getTipoDeGastos()
    {
        return $this->all();
    }

    
    public static function editTipoDeGastos($tipoDeGastos)
    {
        TipoDeGastos::Where('id_tipo_gasto', $tipoDeGastos['id_tipo_gasto'])
            ->Update([
                'descripcion' => $tipoDeGastos['descripcion'],
            ]);
    }

    
    public static function deleteTipoDeGastos($id_tipo_gasto)
    {
        TipoDeGastos::Where('id_tipo_gasto', $id_tipo_gasto)
            ->Delete();
    }

    
    public static function getTipoDeGastosByid_tipo_gasto($id_tipo_gasto)
    {
        return TipoDeGastos::ifnd($id_tipo_gasto);
    }

}
