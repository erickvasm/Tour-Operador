<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDePago extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipo_pago';
    
    public $fillable = [
        'id_tipo_pago',
        'descripcion',
    ];

   
    public static function addTipoDePago($tipoDePagos)
    {
        $tipoDePago = new TipoDePago();
        $tipoDePago->descripcion = $tipoDePagos['descripcion'];
        $tipoDePago->save();

        return $tipoDePago;
    }

    
    public function getTipoDePago()
    {
        return $this->all();
    }

    
    public static function editTipoDePago($tipoDePago)
    {
        TipoDePago::Where('id_tipo_pago', $tipoDePago['id_tipo_pago'])
            ->Update([
                'descripcion' => $tipoDePago['descripcion'],
            ]);
    }

    
    public static function deleteTipoDePago($id_tipo_pago)
    {
        TipoDePago::Where('id_tipo_pago', $id_tipo_pago)
            ->Delete();
    }

   
    public static function getTipoDePagoByid_tipo_pago($id_tipo_pago)
    {
        return TipoDePago::ifnd($id_tipo_pago);
    }
}
