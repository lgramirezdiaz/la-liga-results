<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = [
        'Nombre',
        'Latitud',
        'Longitud'
      ];
}
