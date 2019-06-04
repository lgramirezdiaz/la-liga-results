@extends('layout')
@section('content')

<script src="https://unpkg.com/ag-grid-enterprise@20.2.0/dist/ag-grid-enterprise.min.js"></script>
<link rel="stylesheet" href="{{asset('css/default.css')}}">
<title> Partidos específicos </title>
<br>
<table id="mytable" class="table table-striped table-sm">
    <thead class="thead-light">
        <tr>
            <td colspan="6" align="center"><strong>Partidos del Equipo: {{$equipo}}</strong></td>
        </tr>
        <tr>
            <th>Jornada</th>
            <th>Fecha</th>
            <th>Local</th>
            <th>Visita</th>
            <th>GolesLocal</th>
            <th>GolesVisita</th>
            <th>Mapa</th>
        </tr>
    </thead>
</table>
<script>
$(document).ready(function() {
  let equipo = '{!!$equipo!!}';
  $('#mytable').DataTable({
      language : {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      },
      processing: true,
      serverSide: true,
      ajax: `{{ url('partidos/equipo/${equipo}') }}`,
      columns: [
              { data: 'Jornada', name: 'Jornada' },
              { data: 'Fecha', name: 'Fecha' },
              { data: 'Local', name: 'Local' },
              { data: 'Visita', name: 'Visita' },
              { data: 'GolesLocal', name: 'GolesLocal' },
              { data: 'GolesVisita', name: 'GolesVisita' },
              { data: 'id', name: 'Mapa', render:function(data, type, row){
                    return "<a href='/partidos/encuentro_mapa/"+ row.id +"'>" +"<i class='fas fa-map-marked-alt'>"+ "</a>"
                    }
              },
       ]
    });
});
</script>
@endsection