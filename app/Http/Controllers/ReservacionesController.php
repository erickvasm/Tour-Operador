<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservacionesRequest;
use App\Http\Requests\UpdateReservacionesRequest;
use App\Models\Reservaciones;

class ReservacionesController extends Controller
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
     * @param  \App\Http\Requests\StoreReservacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservacionesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservacionesRequest  $request
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservacionesRequest $request, Reservaciones $reservaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservaciones  $reservaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservaciones $reservaciones)
    {
        //
    }
}
