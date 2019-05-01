<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Equipo;
use App\Partido;

class Posicion extends Model
{
    //
    protected $table = 'posiciones';
    protected $fillable = [
        'Equipo',
        'PJ',
        'PG',
        'PE',
        'PP',
        'GF',
        'GC',
        'Dif',
        'Puntos',
        'UJuegos'
      ];

      public static function crearPosiciones() {
            $equipos = Equipo::all();
            foreach ($equipos as $equipo){
                echo $equipo->Nombre;
                $partidos = $equipo->partidos;
                foreach ($partidos as $partido){
                    echo "\nPartido: $partido->Local - $partido->Visita - Jornada = $partido->Jornada";
                    Posicion::creaPosicion($partido, $equipo->Nombre);
                }

            }
       }

       public static function creaPosicion(Partido $partido, $nombre_equipo){
           $posicion = null;
            if ($nombre_equipo == $partido->Local){ //Caso Equipo Local
                $ultimo = "P";
                $puntos = 0;
                if($partido->GolesLocal > $partido->GolesVisita ){
                    $puntos = 3;
                    $ultimo = "G";
                }
                else{
                    if ($partido->GolesLocal == $partido->GolesVisita){
                    $puntos = 1;
                    $ultimo = "E";
                    }
                }
                    $posicion = new Posicion([
                        'Equipo' => $partido->Local,
                        'PJ' => 1,
                        'PG' => ($puntos == 3)?1:0,
                        'PE' =>($puntos == 1)?1:0,
                        'PP' =>($puntos == 0)?1:0,
                        'GF' =>$partido->GolesLocal,
                        'GC' =>$partido->GolesVisita,
                        'Dif' =>$partido->GolesLocal - $partido->GolesVisita ,
                        'Puntos' =>$puntos,
                        'UJuegos' =>$ultimo
                      ]);

            }else{ //Caso Equipo Visita
                $ultimo = "P";
                $puntos = 0;
                if($partido->GolesLocal < $partido->GolesVisita ){
                    $puntos = 3;
                    $ultimo = "G";
                }
                else{
                    if ($partido->GolesLocal == $partido->GolesVisita){
                    $puntos = 1;
                    $ultimo = "E";
                    }
                }
                    $posicion = new Posicion([
                        'Equipo' => $partido->Visita,
                        'PJ' => 1,
                        'PG' => ($puntos == 3)?1:0,
                        'PE' =>($puntos == 1)?1:0,
                        'PP' =>($puntos == 0)?1:0,
                        'GF' =>$partido->GolesVisita,
                        'GC' =>$partido->GolesLocal,
                        'Dif' =>$partido->GolesVisita - $partido->GolesLocal ,
                        'Puntos' =>$puntos,
                        'UJuegos' =>$ultimo
                      ]);
            }
            //Preguntar por las demás jornadas o guardar de una vez
            if ($partido->Jornada != 1){
             //Obtener el último registro con ese equipo, sumar la información y guardar el nuevo registro

                $info_anterior = Posicion::where([['PJ','=', $partido->Jornada - 1],['Equipo','=',$posicion->Equipo]])->firstOrFail();
                $posicion->PJ = $posicion->PJ + $info_anterior->PJ;
                $posicion->PG = $posicion->PG + $info_anterior->PG;
                $posicion->PE = $posicion->PE + $info_anterior->PE;
                $posicion->PP = $posicion->PP + $info_anterior->PP;
                $posicion->GF = $posicion->GF + $info_anterior->GF;
                $posicion->GC = $posicion->GC + $info_anterior->GC;
                $posicion->Dif = $posicion->GF - $posicion->GC;
                $posicion->Puntos = $posicion->Puntos + $info_anterior->Puntos;
                $posicion->UJuegos = $info_anterior->UJuegos.$posicion->UJuegos;

            }
            $posicion->save();
       }
}
