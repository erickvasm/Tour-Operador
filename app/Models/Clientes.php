<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Clientes extends Model
{
    use HasFactory;


    protected $primaryKey = 'id_cliente';

    public $fillable = [
        'id_cliente',
        'nombre',
        'correo'
   ];


    public static function addCliente($atributosCliente)
    {
    
        $cliente = new Clientes();
        $cliente->nombre=$atributosCliente['nombre'];
        $cliente->correo=$atributosCliente['correo'];
        $cliente->save();

        return $cliente;

    }


    public static function editCliente($atributosClienteModificados)
    {

        Clientes::Where('id_cliente', $atributosClienteModificados['id_cliente'])
             ->update([
                 'nombre' => $atributosClienteModificados['nombre'],
                 'correo' => $atributosClienteModificados['correo']
             ]);

    }

  
    public static function deleteCliente($id_cliente)
    {
        Clientes::Where('id_cliente', $id_cliente)->delete();
    }


    public static function getClienteById($id_cliente)
    {
        return Clientes::Where('id_cliente', $id_cliente)->first();
    }



}
