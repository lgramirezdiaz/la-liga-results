@extends('layout')
@section('content')


<title> Partidos específicos </title>

<table class="table">
    <thead>
        <tr>
            <td colspan="6" align="center">Partidos</td>
        </tr>
        <tr>
            <th>Jornada</th>
            <th>Fecha</th>
            <th>Local</th>
            <th>Visita</th>
            <th>GolesLocal</th>
            <th>GolesVisita</th>

        </tr>
    </thead>
    <tbody>
        @foreach($partidos as $partido)
            <tr>
                <td>{{$partido -> Jornada}}</td>
                <td>{{$partido -> Fecha}}</td>
                <td>{{$partido -> Local}}</td>
                <td>{{$partido -> Visita}}</td>
                <td>{{$partido -> GolesLocal}}</td>
                <td>{{$partido -> GolesVisita}}</td>
            </tr>
    
        @endforeach
    
    </tbody>
    <tfoot></tfoot>


</table>


@endsection