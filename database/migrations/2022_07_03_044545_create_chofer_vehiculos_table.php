<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    protected $primaryKey = 'id_chofer_vehiculo';

    public function up()
    {
        Schema::create('chofer_vehiculos', function (Blueprint $table) {
            $table->id('id_chofer_vehiculo');
            $table->string('nombre_chofer');
            $table->string('placa_vehiculo');
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
        Schema::dropIfExists('chofer_vehiculos');
    }
};
