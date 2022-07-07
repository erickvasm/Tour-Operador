<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TipoDePago;

class TipoDePagosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    
    public function addTipoDePago()
    {
        $tipoDePagos = [
            'descripcion' => 'Pago 1'
        ];
        
        $tipoDePagoModified = TipoDePago::addTipoDePago($tipoDePagos);
        
        $this->assertEquals(1, TipoDePago::all()->count());
        
    }

    /** @test */
    public function editTipoDePago()
    {
        $tipoDePago = [
            'descripcion' => 'Modificado TipoDePago',
        ];

        $elTipoTipoDePago=TipoDePago::addTipoDePago($tipoDePago);

        $tipoDePagoModified = [
            'id_tipo_pago' => $elTipoTipoDePago->id_tipo_pago,
            'descripcion' => 'Modificado TipoDePago',
        ];

        TipoDePago::editTipoDePago($tipoDePagoModified);

        $elTipoTipoDePago->refresh();

        $this->assertEquals('Modificado TipoDePago', $elTipoTipoDePago->descripcion);
    }

    /** @test */
    public function deleteTipoDePago()
    {
        $tipoDePago = [
            'descripcion' => 'Gasto 1'
        ];

        $elTipoTipoDePago=TipoDePago::addTipoDePago($tipoDePago);

        TipoDePago::deleteTipoDePago($elTipoTipoDePago->id_tipo_pago);

        $this->assertEquals(0, TipoDePago::all()->count());
    }
}
