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


    public static function PJornada($id){
      $jornada = Partido::where('Jornada', '=', $id) -> get();
      return $jornada;
    }


}
