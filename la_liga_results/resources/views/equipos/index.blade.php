@extends('layout')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<title>Equipos</title>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <form action="{{ route('equipos.create')}}" method="get">
        @csrf
        <button class="btn btn-info" type="submit">Agregar</button>
      </form>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Id</td>
          <td>Nombre</td>
          <td>Latitud</td>
          <td>Longitud</td>
          <td colspan="2">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{$equipo->id}}</td>
            <td><a href="{{ route( 'equipos.match', $equipo->Nombre ) }}">{{$equipo->Nombre}}</a></td>
            <td>{{$equipo->Latitud}}</td>
            <td>{{$equipo->Longitud}}</td>
            <td><a href="{{ route('equipos.edit',$equipo->Nombre)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('equipos.destroy', $equipo->Nombre)}}" method="post">
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