@extends('layout')

@section('content')
<title>Crear Partido</title>
<div class="container">
        <h1>Insertar Partido</h1>
       <table class="table table-striped">
          <tbody>
             <tr>
                <td colspan="1">
                   <form method="post" action="{{ route('partidos.store') }}" class="well form-horizontal">
                        @csrf
                      <fieldset>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Jornada</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span><input id="jornada" name="jornada" placeholder="Jornada" class="form-control" required="true" value="" type="number"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Fecha</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="far fa-clock"></i></span><input id="fecha" name="fecha" placeholder="Fecha" class="form-control" required="true" value="" type="date"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Local</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-home"></i></span><input id="local" name="local" placeholder="Local" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Visita</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-suitcase"></i></span><input id="visita" name="visita" placeholder="Visita" class="form-control" required="true" value="" type="text"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Goles del Local</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-futbol"></i></span><input id="goles_local" name="goles_local" placeholder="Goles del Local" class="form-control" required="true" value="" type="number"></div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Goles del Visitante</label>
                            <div class="col-md-4 inputGroupContainer">
                               <div class="input-group"><span class="input-group-addon"><i class="fas fa-futbol"></i></span><input id="goles_visita" name="goles_visita" placeholder="Goles del Visitante" class="form-control" required="true" value="" type="number"></div>
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