<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDeServicios extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo_servicio';

    public $fillable = [
        'id_tipo_servicio',
        'descripcion',
    ];

   
    public static function addTipoDeServicios($tipoDeServicios)
    {
        $tipoDeServicio = new TipoDeServicios();
        $tipoDeServicio->descripcion = $tipoDeServicios['descripcion'];
        $tipoDeServicio->save();

        return $tipoDeServicio;
    }

  
    public function getTipoDeServicios()
    {
        return $this->all();
    }

   
    public static function editTipoDeServicios($tipoDeServicios)
    {
        TipoDeServicios::where('id_tipo_servicio', $tipoDeServicios['id_tipo_servicio'])
            ->update([
                'descripcion' => $tipoDeServicios['descripcion'],
            ]);
    }

   
    public static function deleteTipoDeServicios($id_tipo_servicio)
    {
        TipoDeServicios::where('id_tipo_servicio', $id_tipo_servicio)
            ->delete();
    }

   
    public static function getTipoDeServiciosByid_tipo_servicio($id_tipo_servicio)
    {
        return TipoDeServicios::ifnd($id_tipo_servicio);
    }
}
