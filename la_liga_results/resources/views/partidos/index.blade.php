@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/default.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>Partidos</title>
<br><br>
<div class="row">
  <div class="col-md-12">
    <table id="tablePositions" class="table table-striped table-sm">
      <thead>
          <tr>
            <th>Jornada</th>
            <th>Fecha</th>
            <th>Local</th>
            <td>Visita</th>
            <th>Goles Local</th>
            <th>Goles Visita</th>
            <th>Mapa</th>
          </tr>
      </thead>
    </table>
  </div>
</div>

<script>
        $(function() {
              $('#tablePositions').DataTable({            
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
              ajax: '{{ url('partidos/all') }}',
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