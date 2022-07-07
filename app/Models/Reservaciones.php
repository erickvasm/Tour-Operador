<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservaciones extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_reservacion';

    public $fillable = [
        'id_reservacion',
        'fecha_reserva',
       'cliente_fk',
   ];

    //add Reservaciones in the database
    public static function addReservaciones($reservaciones)
    {
        $reservacion = new Reservaciones();
        $reservacion->fecha_reserva = $reservaciones['fecha_reserva'];
        $reservacion->cliente_fk = $reservaciones['cliente_fk'];
        $reservacion->save();

        return $reservacion;

    }

    //get all Reservaciones from the database
    public function getReservaciones()
    {
        return $this->all();
    }

    //edit Reservaciones in the database
    public static function editReservaciones($reservaciones)
    {

        Reservaciones::Where('id_reservacion', $reservaciones['id_reservacion'])
            ->Update([
                'fecha_reserva' => $reservaciones['fecha_reserva'],
                'cliente_fk' => $reservaciones['cliente_fk'],
            ]);

    }

    //delete Reservaciones from the database
    public static function deleteReservaciones($id_reservacion)
    {
        Reservaciones::Where('id_reservacion', $id_reservacion)
            ->Delete();

    }

}
