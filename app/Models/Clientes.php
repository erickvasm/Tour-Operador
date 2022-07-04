<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Clientes extends Model
{
    use HasFactory;

    public $fillable = [
        'id_cliente',
        'nombre',
        'correo'
   ];

   //add clientes to clientebase
    public static function addClientes($clientes)
    {
        foreach ($clientes as $cliente) {
            $cliente->save();
        }
    }







    //get all clientes from clientebase
    public function getClientes()
    {
        return $this->all();
    }

    //edit clientes in clientebase
    public function editClientes($cliente)
    {
        $this->where('id_cliente', $cliente['id_cliente'])
             ->update([
                 'nombre' => $cliente['nombre'],
                 'correo' => $cliente['correo']
             ]);
    }

    //delete clientes from clientebase
    public function deleteClientes($id_cliente)
    {
        $this->where('id_cliente', $id_cliente)
             ->delete();
    }

    //get clientes by id_cliente from clientebase
    public function getClienteByid_cliente($id_cliente)
    {
        return $this->where('id_cliente', $id_cliente)
                    ->first();
    }
}
