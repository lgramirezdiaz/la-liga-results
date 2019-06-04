@extends('layout')
@section('content')
<link rel="stylesheet" href="{{asset('css/default.css')}}">
<?php 
    $partido = $info['partido'];
    $local = $info['local'];
    $visita = $info['visita'];
    $ImageLocal = App\Equipo::escudo($local);
    $ImageVisita = App\Equipo::escudo($visita);
?>

<style>
      #map {
        height: 400px;
      }
</style>
<script type="text/javascript" src="{{ asset("js/aux_map_script.js") }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_WJCl5f7CdRjy8U0DTdvsfEDVjOioS5w"></script>
<script>
    function initialize() {
        /*var pais = { lat: {{ $local->Latitud }}, lng: {{ $local->Longitud }} };  
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: pais
        });

       //Esto se debe hacer para cada equipo
        var ayr = { lat: {{ $local->Latitud }}, lng: {{ $local->Longitud }} }; //Latitud y longitud del equipo       
        addMarker(ayr, "{{ $local->Nombre }}", map);
        var ayr2 = { lat: {{ $visita->Latitud }}, lng: {{ $visita->Longitud }} }; //Latitud y longitud del equipo       
        addMarker(ayr2, "{{ $visita->Nombre }}", map);*/


        //INICIO
        //-----------------------------------------Para la ruta----------------------------------------- 
    var directionsService = new google.maps.DirectionsService();
    var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});

   /*var myOptions = {
     zoom:7,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   }*/

   var map2 = new google.maps.Map(document.getElementById("map"), 
   {
     zoom:7,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   });
   directionsDisplay.setMap(map2);

   var st=new google.maps.LatLng({{ $local->Latitud }}, {{ $local->Longitud }});    //Origen
   var en=new google.maps.LatLng({{ $visita->Latitud }}, {{ $visita->Longitud }});    //Destino

 // Start/Finish icons
 
 var icono1 = verifica_escudo("{{ $local->Nombre }}");
var icono2 = verifica_escudo("{{ $visita->Nombre }}");

 var icons = {
  start: new google.maps.MarkerImage(
    icono1,      //URL Escudo del equipo local
   new google.maps.Size( 65, 65 ),                // (width,height)
   new google.maps.Point( 0, 0 ),               // The origin point (x,y)
   new google.maps.Point( 0, 20 ),               // The anchor point (x,y)
   new google.maps.Size( 30, 30 ),
   new google.maps.Point( 9, 8 )
  ),
 
  
  end: new google.maps.MarkerImage(
    icono2,  //URL Escudo del equipo visitante
   new google.maps.Size( 65, 65 ),                // (width,height)
   new google.maps.Point( 0, 0 ),               // The origin point (x,y)
   new google.maps.Point( 0, 20 ),               // The anchor point (x,y)
   new google.maps.Size( 30, 30 ),
   new google.maps.Point( 9, 8 )
   )
 };
   
 var request = {
       origin: st,         //Origen
       destination:en,    //Destino
       travelMode: document.getElementById('Modo').value       
 };

   directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
         // Display the distance:
         document.getElementById('distance').innerHTML +=
            (parseFloat(response.routes[0].legs[0].distance.value)/1000).toFixed(2) + " km";
            
         document.getElementById('duration').innerHTML +=
            (fancyTimeFormat(response.routes[0].legs[0].duration.value));
            
         directionsDisplay.setDirections(response);
         var leg = response.routes[0].legs[0];
         makeMarker( leg.start_location, icons.start, 'Santo Domingo');
         makeMarker( leg.end_location, icons.end, 'Campus Lagunilla');        
      }
   });
   
function makeMarker( position, icon, title ) {
 var marker = new google.maps.Marker({
    position: position,
    map: map2,
    icon: icon,
    title: title
 });
 
var contentString = '<div id="content">'+
      '<h1 id="firstHeading" style=background-color:lightblue;>'+title+'</h1>'+
      '<div id="bodyContent";>'+
      '<p><b>'+title+'</b>, es un equipo de la '+'Universidad Nacional'+'</p>'+
      '<p>Información en Wikipedia: <a href="https://es.wikipedia.org/w/index.php?title='+title+'">'+title+'</a> '+ '</p>'+
      '</div>'+
      '</div>';
 
  google.maps.event.addListener(marker,'click',function() {
    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });
  infowindow.open(map2,marker);
  });
}   
   
function fancyTimeFormat(time)
{   
    // Hours, minutes and seconds
    var hrs = ~~(time / 3600);
    var mins = ~~((time % 3600) / 60);
    var secs = time % 60;

    // Output like "1:01" or "4:03:59" or "123:03:59"
    var ret = "";

    if (hrs > 0) {
        ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
    }

    ret += "" + mins + ":" + (secs < 10 ? "0" : "");
    ret += "" + secs;
    return ret;
}   
        //FIN
    }

      // Adds a marker to the map.
    function addMarker(location, label, map) {
      var marker = new google.maps.Marker({
        position: location,
        label: label,
        map: map,
        icon: verifica_escudo(label)
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

    
</script>

<title>Partido</title>
<div class="card uper">
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
    <div class="table-responsive">
        <table class="table table-striped table-sm"  style="text-align: center">
            <thead>
                <tr>
                    <td>
                        <a href="{{ route('equipos.show', $partido->Local)}}">{{$partido->Local}}</a>
                    </td>
                    <td>{{$partido->Fecha}}</td>
                    <td>
                        <a href="{{ route('equipos.show', $partido->Visita)}}">{{$partido->Visita}}</a>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php $ImagePath = App\Equipo::escudo($partido->Local)?>
                        <img src = {{ URL::asset("$ImagePath") }} width="50" height="50" />       
                    </td>
                    <td>{{$partido->GolesLocal}} : {{$partido->GolesVisita}}</td>
                    <td>
                        <?php $ImagePath = App\Equipo::escudo($partido->Visita)?>
                        <img src = {{ URL::asset("$ImagePath") }} width="50" height="50" />       
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                      <div id="duration">Duración : </div>
                      <div id="distance">Distancia: </div>

                      <div>
                        <b>Modo de viaje:</b>
                        <select id="Modo">
                          <option value="WALKING">Caminando</option>
                          <option value="DRIVING">Manejando</option>
                          <option value="TRANSIT">Bus</option>
                          <option value="BICYCLING">Bicicleta</option>
                        </select>
                        <br>
                        <input type="button" id="submit" onclick="window.location.reload();" value="Enviar consulta">
                      </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="map" class="form-group">Mapa</div>
  </div>
</div>
@endsection