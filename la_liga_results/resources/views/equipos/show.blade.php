@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<title>{{ $equipo->Nombre }}</title>
<div class="card uper">
  <div class="card-header">
    Información del Equipo
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
        <div class="form-group">
          <label for="name">Nombre</label>
          <input type="text" class="form-control" name="nombre" value= "{{ $equipo->Nombre }}" readonly />
        </div>
        <div class="form-group">
          <label for="price">Latitud</label>
          <input type="text" class="form-control" name="latitud" value= "{{ $equipo->Latitud }}" readonly/>
        </div>
        <div class="form-group">
          <label for="quantity">Longitud:</label>
          <input type="text" class="form-control" name="longitud" value= "{{ $equipo->Longitud }}" readonly/>
        </div>            
  </div>
</div>
@endsection