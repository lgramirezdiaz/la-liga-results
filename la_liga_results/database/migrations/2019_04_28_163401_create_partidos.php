<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Jornada');
            $table->date('Fecha');
            $table->string('Local');
            $table->string('Visita');
            $table->integer('GolesLocal');
            $table->integer('GolesVisita');
            $table->timestamps();
            $table -> foreign('Local') -> references('Nombre') -> on('equipos');
            $table -> foreign('Visita') -> references('Nombre') -> on('equipos');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
