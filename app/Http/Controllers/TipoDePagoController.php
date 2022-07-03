<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoDePagoRequest;
use App\Http\Requests\UpdateTipoDePagoRequest;
use App\Models\TipoDePago;

class TipoDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoDePagoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoDePagoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDePago $tipoDePago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDePago $tipoDePago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoDePagoRequest  $request
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoDePagoRequest $request, TipoDePago $tipoDePago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDePago  $tipoDePago
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDePago $tipoDePago)
    {
        //
    }
}
