@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<title>Partidos</title>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <form action="{{ route('partidos.create')}}" method="get">
        @csrf
        <button class="btn btn-info" type="submit">Agregar</button>
      </form>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Jornada</td>
          <td>Fecha</td>
          <td>Local</td>
          <td>Visita</td>
          <td>Goles Local</td>
          <td>Goles Visita</td>
          <td colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($partidos as $partido)
        <tr>
            <td>{{$partido->id}}</td>
            <td>{{$partido->Jornada}}</td>
            <td>{{$partido->Fecha}}</td>
            <td>{{$partido->Local}}</td>
            <td>{{$partido->Visita}}</td>
            <td>{{$partido->GolesLocal}}</td>
            <td>{{$partido->GolesVisita}}</td>
            <td><a href="{{ route('partidos.edit',$partido->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('partidos.destroy', $partido->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
      
@endsection