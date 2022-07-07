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



    //add clientes to clientebase
    public static function addCliente($atributosCliente)
    {
    
        $cliente = new Clientes();
        $cliente->nombre=$atributosCliente['nombre'];
        $cliente->correo=$atributosCliente['correo'];
        $cliente->save();

        return $cliente;

    }


    //edit clientes in clientebase
    public static function editCliente($atributosClienteModificados)
    {

        Clientes::Where('id_cliente', $atributosClienteModificados['id_cliente'])
             ->update([
                 'nombre' => $atributosClienteModificados['nombre'],
                 'correo' => $atributosClienteModificados['correo']
             ]);

    }

    //delete clientes from clientebase
    public static function deleteCliente($id_cliente)
    {
        Clientes::Where('id_cliente', $id_cliente)->delete();
    }

    //get clientes by id_cliente from clientebase
    public static function getClienteById($id_cliente)
    {
        return Clientes::Where('id_cliente', $id_cliente)->first();
    }



}
