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
      <form method="post" action="{{ route('partidos.update', $partido->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Jornada</label>
          <input type="number" class="form-control" name="jornada" value={{ $partido->Jornada }} />
        </div>
        <div class="form-group">
          <label for="price">Fecha</label>
          <input type="date" class="form-control" name="fecha" value={{ $partido->Fecha }} />
        </div>
        <div class="form-group">
          <label for="quantity">Local:</label>
          <input type="text" class="form-control" name="local" value={{ $partido->Local }} />
        </div>
        <div class="form-group">
            <label for="quantity">Visita:</label>
            <input type="text" class="form-control" name="visita" value={{ $partido->Visita }} />
        </div>
        <div class="form-group">
            <label for="quantity">Goles Local:</label>
            <input type="number" class="form-control" name="goles_local" value={{ $partido->GolesLocal }} />
        </div>
        <div class="form-group">
            <label for="quantity">Goles Visita:</label>
            <input type="number" class="form-control" name="goles_visita" value={{ $partido->GolesVisita }} />
        </div>
              
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
  </div>
</div>
@endsection