@extends('layout')
@section('content')

<title> Jornada {{$jornada}} </title>

<div class="row" align="center">
    <div class="col-md-12">
        <table class="table table-striped" style="width: 75%">
            <thead class="thead-light">
                <tr>
                    <td colspan="6" align="center">
                        @if($jornada > 1)
                            <?php 
                            $anterior = $jornada - 1;
                            echo "<a href='/partidos/jornada/$anterior'><i class='fas fa-chevron-circle-left'></i></a>"; 
                            ?>
                        @endif
                        <strong>&nbsp;&nbsp;&nbsp;Jornada {{$jornada}}&nbsp;&nbsp;&nbsp;</strong>
                        @if($jornada < 38)
                            <?php 
                            $siguiente = $jornada + 1;
                            echo "<a href='/partidos/jornada/$siguiente'><i class='fas fa-chevron-circle-right'></i></a>"; 
                            ?>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <th>Local</th>
                    <th>Resultado</th>
                    <th>Visita</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach($partidos as $jornada)
                    <?php $ImagePath = App\Equipo::escudo($jornada->Local) ?>
                    <?php $Image2Path = App\Equipo::escudo($jornada->Visita) ?>
                    <tr>
                        <td>{{$jornada -> Fecha}}</td>
                        <td>
                            <img src = {{ URL::asset("$ImagePath") }} width="25" height="25" />
                            {{$jornada -> Local }} 
                        </td>
                        <td>{{$jornada->GolesLocal}} - {{$jornada->GolesVisita}} </td>
                        <td>
                            <img src = {{ URL::asset("$Image2Path") }} width="25" height="25" />    
                            {{$jornada -> Visita}} 
                        </td>          
                    </tr>
            
                @endforeach
            
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
</div>
@endsection