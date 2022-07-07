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

    //add TipoDeServicios in the database
    public static function addTipoDeServicios($tipoDeServicios)
    {
        $tipoDeServicio = new TipoDeServicios();
        $tipoDeServicio->descripcion = $tipoDeServicios['descripcion'];
        $tipoDeServicio->save();

        return $tipoDeServicio;
    }

    //get all TipoDeServicios from the database
    public function getTipoDeServicios()
    {
        return $this->all();
    }

    //edit TipoDeServicios in the database
    public static function editTipoDeServicios($tipoDeServicios)
    {
        TipoDeServicios::where('id_tipo_servicio', $tipoDeServicios['id_tipo_servicio'])
            ->update([
                'descripcion' => $tipoDeServicios['descripcion'],
            ]);
    }

    //delete TipoDeServicios from the database
    public static function deleteTipoDeServicios($id_tipo_servicio)
    {
        TipoDeServicios::where('id_tipo_servicio', $id_tipo_servicio)
            ->delete();
    }

    //get TipoDeServicios by id_tipo_servicio from the database
    public static function getTipoDeServiciosByid_tipo_servicio($id_tipo_servicio)
    {
        return TipoDeServicios::ifnd($id_tipo_servicio);
    }
}
