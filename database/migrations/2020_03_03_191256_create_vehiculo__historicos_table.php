<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculoHistoricosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos_historicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vehiculo_id')->unsigned();
            $table->integer('oficina_id')->unsigned();

            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->integer('estado_vehiculo_id')->unsigned();
            $table->integer('reserva_id')->unsigned()->nullable();

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
        Schema::dropIfExists('vehiculo__historicos');
    }
}
