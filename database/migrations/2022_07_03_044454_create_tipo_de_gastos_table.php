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
    protected $primaryKey = 'id_tipo_gasto';
    public function up()
    {
        Schema::create('tipo_de_gastos', function (Blueprint $table) {
            $table -> id('id_tipo_gasto');
            $table -> string('descripcion');
            $table -> timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_de_gastos');
    }
};
