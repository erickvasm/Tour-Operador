<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservacionItem extends Model
{
    use HasFactory;

	protected $primaryKey = 'id_reservacion_item';


    public $fillable =[
    	'id_reservacion_item',
      	'fecha_hora',
      	'numero_vuelo', 
       	'pasajeros',
       	'tarifa',
       	'observaciones',
       	'reservacion_fk',
       	'estado_fk',
       	'servicio_fk',
       	'tipo_pago_fk',
       	'proveedor_fk',
       	'tipo_servicio_fk',
       	'chofer_vehiculo_fk'
    ];

	public static function addReservacionItem($reservacionItem)
	{
		$reservacionItems = new ReservacionItem();
		$reservacionItems->fecha_hora = $reservacionItem['fecha_hora'];
		$reservacionItems->numero_vuelo = $reservacionItem['numero_vuelo'];
		$reservacionItems->pasajeros = $reservacionItem['pasajeros'];
		$reservacionItems->tarifa = $reservacionItem['tarifa'];
		$reservacionItems->observaciones = $reservacionItem['observaciones'];
		$reservacionItems->reservacion_fk = $reservacionItem['reservacion_fk'];
		$reservacionItems->estado_fk = $reservacionItem['estado_fk'];
		$reservacionItems->servicio_fk = $reservacionItem['servicio_fk'];
		$reservacionItems->tipo_pago_fk = $reservacionItem['tipo_pago_fk'];
		$reservacionItems->proveedor_fk = $reservacionItem['proveedor_fk'];
		$reservacionItems->tipo_servicio_fk = $reservacionItem['tipo_servicio_fk'];
		$reservacionItems->chofer_vehiculo_fk = $reservacionItem['chofer_vehiculo_fk'];
		$reservacionItems->save();
		return $reservacionItems;
	}

	public static function getReservacionItem()
	{
		return ReservacionItem::all();
	}

	public static function editReservacionItem($reservacionItem)
	{
		ReservacionItem::Where('id_reservacion_item', $reservacionItem['id_reservacion_item'])
			->Update([
				'fecha_hora' => $reservacionItem['fecha_hora'],
				'numero_vuelo' => $reservacionItem['numero_vuelo'],
				'pasajeros' => $reservacionItem['pasajeros'],
				'tarifa' => $reservacionItem['tarifa'],
				'observaciones' => $reservacionItem['observaciones'],
				'reservacion_fk' => $reservacionItem['reservacion_fk'],
				'estado_fk' => $reservacionItem['estado_fk'],
				'servicio_fk' => $reservacionItem['servicio_fk'],
				'tipo_pago_fk' => $reservacionItem['tipo_pago_fk'],
				'proveedor_fk' => $reservacionItem['proveedor_fk'],
				'tipo_servicio_fk' => $reservacionItem['tipo_servicio_fk'],
				'chofer_vehiculo_fk' => $reservacionItem['chofer_vehiculo_fk'],
			]);
	}

	public static function deleteReservacionItem($id_reservacion_item)
	{
		ReservacionItem::Where('id_reservacion_item', $id_reservacion_item)
			->delete();
	}

}
