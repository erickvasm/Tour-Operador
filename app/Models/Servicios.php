<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_servicio';


    public $fillable = [
    	'id_servicio',
    	'actividad',
    	'descripcion',

    ];

    //add Servicios in the database
    public static function addServicios($servicios)
    {
        $servicio = new Servicios();
        $servicio->actividad = $servicios['actividad'];
        $servicio->descripcion = $servicios['descripcion'];
        $servicio->save();

        return $servicio;

    }

    //get all Servicios from the database
    public function getServicios()
    {
        return $this->all();
    }

    //edit Servicios in the database
    public static function editServicios($servicios)
    {

        Servicios::Where('id_servicio', $servicios['id_servicio'])
            ->Update([
                'actividad' => $servicios['actividad'],
                'descripcion' => $servicios['descripcion'],
            ]);
}

    //delete Servicios from the database
    public static function deleteServicios($id_servicio)
    {
        Servicios::Where('id_servicio', $id_servicio)
            ->Delete();
    }




}