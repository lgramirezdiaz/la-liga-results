@extends('layout')
@section('content')

<link rel="stylesheet" href="{{asset('css/default.css')}}">
<title>Equipos</title>
<div class="uper">
    <!--  <form action="{{ route('equipos.create')}}" method="get">
        @csrf
        <button class="btn btn-info btn-sm" type="submit">Agregar</button>
      </form> -->
  <table class="table table-striped table-sm">
    <thead>
        <tr>
          <td>Id</td>
          <td>Nombre</td>
          <td>Latitud</td>
          <td>Longitud</td>
          <td colspan="2" align="center">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{$equipo->id}}</td>
            <td>
              <?php $ImagePath = App\Equipo::escudo($equipo->Nombre)?>
              <img src = {{ URL::asset("$ImagePath") }} width="20" height="20" />
              <a href="{{ route( 'equipos.match', $equipo->Nombre ) }}">{{$equipo->Nombre}}</a>  
            </td>
            <td>{{$equipo->Latitud}}</td>
            <td>{{$equipo->Longitud}}</td>
            <td align="center"><a href="{{ route('equipos.edit',$equipo->Nombre)}}" class="btn btn-primary btn-sm">Editar</a></td>
            <td align="center">
                <form action="{{ route('equipos.destroy', $equipo->Nombre)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<div>
      
@endsection