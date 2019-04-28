<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    //
    protected $table = 'partidos';
    protected $fillable = [
        'Jornada',
        'Fecha',
        'Local',
        'Visita',
        'GolesLocal',
        'GolesVisita'
      ];
}
