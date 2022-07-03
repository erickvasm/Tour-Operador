<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChoferVehiculo extends Model
{
    use HasFactory;

    public $fillable = [
        'id_chofer_vehiculo',
        'nombre_chofer',
        'placa_vehiculo'
    ];
}
