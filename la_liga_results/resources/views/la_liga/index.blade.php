@extends('layout')
@section('content')


<script type="text/javascript" src="{{ asset('js/aux_map_script.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_WJCl5f7CdRjy8U0DTdvsfEDVjOioS5w&callback=initMap" async defer></script>
<link rel="stylesheet" href="{{ asset('css/map.css')}}">
<link rel="stylesheet" href="{{ asset('css/default.css')}}">
<br>
<div style="align:center;">
  <h3>La Liga</h3>
  <div id="map"></div>
</div>


<script>
  var map;
  var equipos = {!!$json!!};

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: 36.127123,
        lng: -5.343804
      },
      zoom: 4
    });

    cargar_markers()
  }

  function cargar_markers() {
    for (equipo of equipos) {
      let location = {}
      location.lat = parseFloat(equipo.Latitud)
      location.lng = parseFloat(equipo.Longitud)
      let marker = new google.maps.Marker({
        position: location,
        label: equipo.Nombre,
        map: map,
        icon: verifica_escudo(equipo.Nombre)
      });
      let infowindow = new google.maps.InfoWindow({
        content: equipo.Nombre
      });
      marker.addListener('click', function() {
        infowindow.open(map, marker);
      });

    }
  }
</script>

@endsection