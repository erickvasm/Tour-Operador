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


    protected $primaryKey = 'id_gasto';


    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id('id_gasto');
            $table->dateTime('fecha');
            $table->double('monto');
            $table->string('descripcion');
            $table->boolean('gasto_vehiculo');
            $table->foreignId('tipo_gasto_fk');
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
        Schema::dropIfExists('gastos');
    }
};
