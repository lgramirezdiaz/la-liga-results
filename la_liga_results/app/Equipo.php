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
}
