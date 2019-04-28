@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<title>Editar Partido</title>
<div class="card uper">
  <div class="card-header">
    Editar Partido
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('equipos.update', $equipo->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="nombre" value={{ $equipo->Nombre }} />
        </div>
        <div class="form-group">
          <label for="price">Latitud</label>
          <input type="text" class="form-control" name="latitud" value={{ $equipo->Latitud }} />
        </div>
        <div class="form-group">
          <label for="quantity">Longitud:</label>
          <input type="text" class="form-control" name="longitud" value={{ $equipo->Longitud }} />
        </div>            
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection