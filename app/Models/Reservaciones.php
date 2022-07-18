<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReservacionItem;

class Reservaciones extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_reservacion';

    public $fillable = [
        'id_reservacion',
        'fecha_reserva',
       'cliente_fk',
   ];

  
    public static function addReservaciones($reservaciones)
    {
        $reservacion = new Reservaciones();
        $reservacion->fecha_reserva = $reservaciones['fecha_reserva'];
        $reservacion->cliente_fk = $reservaciones['cliente_fk'];
        $reservacion->save();

        return $reservacion;

    }

  
    public function getReservaciones()
    {
        return $this->all();
    }

    
    public static function editReservaciones($reservaciones)
    {

        Reservaciones::Where('id_reservacion', $reservaciones['id_reservacion'])
            ->Update([
                'fecha_reserva' => $reservaciones['fecha_reserva'],
                'cliente_fk' => $reservaciones['cliente_fk'],
            ]);

    }

  
    public static function deleteReservaciones($id_reservacion)
    {
        Reservaciones::Where('id_reservacion', $id_reservacion)
            ->Delete();

    }


   

   
    public function reservacionItems() {
        return $this->hasMany(ReservacionItem::class,'reservacion_fk','id_reservacion');
    }

    public function addReservacionItem($reservacionItem) {

        $metodo = ($reservacionItem instanceof ReservacionItem)?'save':'saveMany';

        $this->reservacionItems()->$metodo($reservacionItem);

    }

}
