<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $primaryKey = 'id_reservacion_item';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion_items', function (Blueprint $table) {
            $table->id('id_reservacion_item')->autoIncrement();
            $table->dateTime('fecha_hora');
            $table->integer('numero_vuelo');
            $table->integer('pasajeros');
            $table->integer('tarifa');
            $table->string('observaciones');
            $table->unsignedBigInteger('reservacion_fk')->nullable();
            $table->foreign('reservacion_fk')->references('id_reservacion')->on('reservaciones')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('estado_fk');
            $table->foreign('estado_fk')->references('id_estado')->on('estados')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('servicio_fk');
            $table->foreign('servicio_fk')->references('id_servicio')->on('servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('tipo_pago_fk');
            $table->foreign('tipo_pago_fk')->references('id_tipo_pago')->on('tipo_de_pagos')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('proveedor_fk');
            $table->foreign('proveedor_fk')->references('id_proveedor')->on('proveedors')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('tipo_servicio_fk');
            $table->foreign('tipo_servicio_fk')->references('id_tipo_servicio')->on('tipo_de_servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('chofer_vehiculo_fk');
            $table->foreign('chofer_vehiculo_fk')->references('id_chofer_vehiculo')->on('chofer_vehiculos')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacion_items');
    }
};
