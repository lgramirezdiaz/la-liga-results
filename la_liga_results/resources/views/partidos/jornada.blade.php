@extends('layout')
@section('content')

<title> Jornada {{$jornada}} </title>

<div class="row" align="center">
    <div class="col-md-10">
        <table class="table table-striped" style="width: 75%">
            <thead class="thead-light">
                <tr>
                    <td colspan="6" align="center"><strong>Jornada {{$jornada}}</strong></td>
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
                    <tr>
                        <td>{{$jornada -> Fecha}}</td>
                        <td>{{$jornada -> Local }} </td>
                        <td>{{$jornada->GolesLocal}} - {{$jornada->GolesVisita}} </td>
                        <td>{{$jornada -> Visita}} </td>          
                    </tr>
            
                @endforeach
            
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
    <div class="col-md-2">

    </div>

</div>
