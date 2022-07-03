<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoDeGastosRequest;
use App\Http\Requests\UpdateTipoDeGastosRequest;
use App\Models\TipoDeGastos;

class TipoDeGastosController extends Controller
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
     * @param  \App\Http\Requests\StoreTipoDeGastosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoDeGastosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDeGastos  $tipoDeGastos
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDeGastos $tipoDeGastos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDeGastos  $tipoDeGastos
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDeGastos $tipoDeGastos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoDeGastosRequest  $request
     * @param  \App\Models\TipoDeGastos  $tipoDeGastos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoDeGastosRequest $request, TipoDeGastos $tipoDeGastos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDeGastos  $tipoDeGastos
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDeGastos $tipoDeGastos)
    {
        //
    }
}
