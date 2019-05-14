<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'Nombre'; 
    public $incrementing = false;
    
    protected $fillable = [
        'Nombre',
        'Latitud',
        'Longitud'
      ];

      public function partidos()
      {
        $local = $this->hasMany('App\Partido','Local');
        $visita = $this->hasMany('App\Partido','Visita');
        return  $local->union($visita)->orderBy('Jornada','ASC');
      }


      
}
