<?php

namespace App\Http\Controllers;

use App\Models\ReservacionItem;
use App\Http\Requests\StoreReservacionItemRequest;
use App\Http\Requests\UpdateReservacionItemRequest;

class ReservacionItemController extends Controller
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
     * @param  \App\Http\Requests\StoreReservacionItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservacionItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservacionItem  $reservacionItem
     * @return \Illuminate\Http\Response
     */
    public function show(ReservacionItem $reservacionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservacionItem  $reservacionItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservacionItem $reservacionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservacionItemRequest  $request
     * @param  \App\Models\ReservacionItem  $reservacionItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservacionItemRequest $request, ReservacionItem $reservacionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservacionItem  $reservacionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservacionItem $reservacionItem)
    {
        //
    }
}
