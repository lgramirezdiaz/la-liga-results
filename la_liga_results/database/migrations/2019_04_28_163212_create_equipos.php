<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');   
            $table->string('Nombre');         
            $table->string('Latitud');
            $table->string('Longitud');       
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `equipos` MODIFY `id` INT NOT NULL');
        DB::statement('ALTER TABLE `equipos` DROP PRIMARY KEY');
        DB::statement('alter table `equipos` add primary key `equipos_nombre_primary`(`Nombre`)');
        DB::statement('ALTER TABLE `equipos` MODIFY `id` INT NOT NULL UNIQUE  AUTO_INCREMENT');
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
