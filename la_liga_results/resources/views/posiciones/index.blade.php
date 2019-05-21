@extends('layout')
@section('content')

<link rel="stylesheet" href="{{asset('css/default.css')}}">
<title>Tabla de Posiciones</title>
<?php $i = 1; ?>
  <br>
  <div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
        <tr>
          <td>#</td>
          <td>Equipo</td>
          <td>PJ</td>
          <td>PG</td>
          <td>PE</td>
          <td>PP</td>
          <td>GF</td>
          <td>GC</td>
          <td>Dif</td>
          <td>Puntos</td>
          <td colspan="2">Últimos 5 partidos</td>
        </tr>
    </thead>
    <tbody>
        @foreach($posiciones as $posicion)
        <tr>
            <td>{{$i}}</td>
            <td>
              <?php $ImagePath = App\Equipo::escudo($posicion->Equipo)?>
              <img src = {{ URL::asset("$ImagePath") }} width="20" height="20" />
              <a href="{{ route('equipos.show', $posicion->Equipo)}}">{{$posicion->Equipo}}</a>       
            </td>
            <td>{{$posicion->PJ}}</td>
            <td>{{$posicion->PG}}</td>
            <td>{{$posicion->PE}}</td>
            <td>{{$posicion->PP}}</td>
            <td>{{$posicion->GF}}</td>
            <td>{{$posicion->GC}}</td>
            <td>{{$posicion->Dif}}</td>
            <td>{{$posicion->Puntos}}</td>
            <td>{{substr($posicion->UJuegos, -5)}}</td>
        </tr>
        <?php $i = $i+1; ?>
        @endforeach
    </tbody>
  </table>
  </div>
<div>      
@endsection