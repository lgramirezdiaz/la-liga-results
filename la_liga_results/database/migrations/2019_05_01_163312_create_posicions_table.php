<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosicionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posiciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Equipo');
            $table->integer('PJ');
            $table->integer('PG');
            $table->integer('PE');
            $table->integer('PP');
            $table->integer('GF');
            $table->integer('GC');
            $table->integer('Dif');
            $table->integer('Puntos');
            $table->string('UJuegos');
            $table->timestamps();
            $table -> foreign('Equipo') -> references('Nombre') -> on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posicions');
    }
}
