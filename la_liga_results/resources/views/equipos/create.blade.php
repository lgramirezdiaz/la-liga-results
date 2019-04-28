@extends('layout')

@section('content')
<title>Crear Equipo</title>
<div class="container">
        <h1>Insertar Equipo</h1>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <form method="post" action="{{ route('equipos.store') }}" class="well form-horizontal">
                        @csrf
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-user-circle"></i></span><input id="nombre" name="nombre" placeholder="Nombre" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Latitud</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span><input id="latitud" name="latitud" placeholder="Latitud" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Longitud</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span><input id="longitud" name="longitud" placeholder="Longitud" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">    
                                <label class="col-md-4 control-label"></label>                   
                                <div class="col-md-4 inputGroupContainer">
                                   <div class="input-group"><input id="aceptar" name="aceptar"  value="Aceptar" type="submit" class="btn btn-primary"></div>
                                </div>
                             </div>                        
                      </fieldset>
                   </form>
                </td>
             </tr>
          </tbody>
       </table>
    </div>
    @endsection