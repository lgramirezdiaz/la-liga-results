@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<title>{{ $equipo->Nombre }}</title>

<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 300px;
      }
      /* Optional: Makes the sample page fill the window. 
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }*/
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOJbu3uDOvYmkazk3onNIYxvFKn_C3eo4"></script>
<script>
      function initialize() {
        var pais = { lat: {{ $equipo->Latitud }}, lng: {{ $equipo->Longitud }} };  
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: pais
        });

        // This event listener calls addMarker() when the map is clicked.
        google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);
        });
       //Esto se debe hacer para cada equipo
        var ayr = { lat: {{ $equipo->Latitud }}, lng: {{ $equipo->Longitud }} }; //Latitud y longitud del equipo       
        addMarker(ayr, "{{ $equipo->Nombre }}", map);
      }

      // Adds a marker to the map.
      function addMarker(location, label, map) {
        // Add the marker at the clicked location, and add the next-available label
        // from the array of alphabetical characters.
        var marker = new google.maps.Marker({
          position: location,
          label: label,
          map: map
        });
      }

      google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
          <label class="form-control" name="nombre" readonly>{{ $equipo->Nombre }}</label>
        </div>
         
        <div id="map" class="form-group">Mapa</div>           
  </div>
</div>
@endsection