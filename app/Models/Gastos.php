<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gastos extends Model
{
    use HasFactory;

    public $fillable = [
        'id_gasto',
        'fecha',
        'monto',
        'descripcion',
        'gasto_vehiculo',
        'tipo_gasto_fk'
    ];
}
