<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula');
            $table->integer('modelo_id')->unsigned(); //Set INTEGER columns as UNSIGNED (MySQL)
            $table->integer('transmision_id')->unsigned(); 
            $table->integer('combustible_id')->unsigned(); 
            $table->integer('categoria_id')->unsigned(); 
            $table->integer('estado_vehiculo_id')->unsigned(); 
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
        Schema::dropIfExists('vehiculos');
    }
}
