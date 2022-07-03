<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGastosRequest;
use App\Http\Requests\UpdateGastosRequest;
use App\Models\Gastos;

class GastosController extends Controller
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
     * @param  \App\Http\Requests\StoreGastosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGastosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function show(Gastos $gastos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function edit(Gastos $gastos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGastosRequest  $request
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGastosRequest $request, Gastos $gastos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gastos  $gastos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gastos $gastos)
    {
        //
    }
}
