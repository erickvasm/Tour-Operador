<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChoferVehiculoRequest;
use App\Http\Requests\UpdateChoferVehiculoRequest;
use App\Models\ChoferVehiculo;

class ChoferVehiculoController extends Controller
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
     * @param  \App\Http\Requests\StoreChoferVehiculoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChoferVehiculoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChoferVehiculo  $choferVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(ChoferVehiculo $choferVehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChoferVehiculo  $choferVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(ChoferVehiculo $choferVehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChoferVehiculoRequest  $request
     * @param  \App\Models\ChoferVehiculo  $choferVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChoferVehiculoRequest $request, ChoferVehiculo $choferVehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChoferVehiculo  $choferVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChoferVehiculo $choferVehiculo)
    {
        //
    }
}
