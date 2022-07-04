<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservacionItem extends Model
{
    use HasFactory;


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

}
