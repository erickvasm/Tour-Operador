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

    //add TipoDePago in the database
    public static function addTipoDePago($tipoDePagos)
    {
        $tipoDePago = new TipoDePago();
        $tipoDePago->descripcion = $tipoDePagos['descripcion'];
        $tipoDePago->save();

        return $tipoDePago;
    }

    //get all TipoDePago from the database
    public function getTipoDePago()
    {
        return $this->all();
    }

    //edit TipoDePago in the database
    public static function editTipoDePago($tipoDePago)
    {
        TipoDePago::Where('id_tipo_pago', $tipoDePago['id_tipo_pago'])
            ->Update([
                'descripcion' => $tipoDePago['descripcion'],
            ]);
    }

    //delete TipoDePago from the database
    public static function deleteTipoDePago($id_tipo_pago)
    {
        TipoDePago::Where('id_tipo_pago', $id_tipo_pago)
            ->Delete();
    }

    //get TipoDePago by id_tipo_pago from the database
    public static function getTipoDePagoByid_tipo_pago($id_tipo_pago)
    {
        return TipoDePago::ifnd($id_tipo_pago);
    }
}
