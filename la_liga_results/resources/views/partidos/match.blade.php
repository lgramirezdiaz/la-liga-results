@extends('layout')
@section('content')

<script src="{{ URL::asset('js/partidosJS/match.js') }}"></script>
<script src="https://unpkg.com/ag-grid-enterprise@20.2.0/dist/ag-grid-enterprise.min.js"></script>
<title> Partidos específicos </title>
<!-- <table class="table table-striped">
    <thead class="thead-light">
        <tr>
            <td colspan="6" align="center"><strong>Partidos</strong></td>
        </tr>
        <tr>
            <th>Jornada</th>
            <th>Fecha</th>
            <th>Local</th>
            <th>Visita</th>
            <th>GolesLocal</th>
            <th>GolesVisita</th>

        </tr>
    </thead>
    <tbody>
        @foreach($partidos as $partido)
            <tr>
                <td>{{$partido -> Jornada}}</td>
                <td>{{$partido -> Fecha}}</td>
                <td>{{$partido -> Local}}</td>
                <td>{{$partido -> Visita}}</td>
                <td>{{$partido -> GolesLocal}}</td>
                <td>{{$partido -> GolesVisita}}</td>
            </tr>
    
        @endforeach
    
    </tbody>
    <tfoot></tfoot>


</table>

-->

<div id="myGrid" style="height: 750px;" class="ag-theme-material"></div>
<div class="row">
    <div class = "col-md-12">
        <div id="myGrid" style="height: 100%;" class="ag-theme-material"></div>
    </div>
</div>
<script>
    rowsData = '{!! $partidos !!}';
    initialize();
</script>



@endsection