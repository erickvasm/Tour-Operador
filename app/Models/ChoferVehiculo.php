<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferVehiculo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_chofer_vehiculo';

    public $fillable = [
        'id_chofer_vehiculo',
        'nombre_chofer',
        'placa_vehiculo'
    ];


    //add clientes to clientebase
    public static function addChoferVehiculo($atributosChoferVehiculo)
    {
    
        $choferVehiculo = new ChoferVehiculo();
        $choferVehiculo->nombre_chofer=$atributosChoferVehiculo['nombre_chofer'];
        $choferVehiculo->placa_vehiculo=$atributosChoferVehiculo['placa_vehiculo'];
        $choferVehiculo->save();

        return $choferVehiculo;

    }


    //edit clientes in clientebase
    public static function editChoferVehiculo($atributosChoferVehiculoModificados)
    {

        ChoferVehiculo::Where('id_chofer_vehiculo', $atributosChoferVehiculoModificados['id_chofer_vehiculo'])
             ->update([
                 'nombre_chofer' => $atributosChoferVehiculoModificados['nombre_chofer'],
                 'placa_vehiculo' => $atributosChoferVehiculoModificados['placa_vehiculo']
             ]);

    }

    //delete clientes from clientebase
    public static function deleteChoferVehiculo($id_chofer_vehiculo)
    {
        ChoferVehiculo::Where('id_chofer_vehiculo', $id_chofer_vehiculo)->delete();
    }

    //get clientes by id_cliente from clientebase
    public static function getChoferVehiculoById($id_chofer_vehiculo)
    {
        return ChoferVehiculo::Where('id_chofer_vehiculo', $id_chofer_vehiculo)->first();
    }





}
