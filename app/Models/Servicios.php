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

    
    public static function addServicios($servicios)
    {
        $servicio = new Servicios();
        $servicio->actividad = $servicios['actividad'];
        $servicio->descripcion = $servicios['descripcion'];
        $servicio->save();

        return $servicio;

    }


    public function getServicios()
    {
        return $this->all();
    }


    public static function editServicios($servicios)
    {

        Servicios::Where('id_servicio', $servicios['id_servicio'])
            ->Update([
                'actividad' => $servicios['actividad'],
                'descripcion' => $servicios['descripcion'],
            ]);
}

 
    public static function deleteServicios($id_servicio)
    {
        Servicios::Where('id_servicio', $id_servicio)
            ->Delete();
    }




}