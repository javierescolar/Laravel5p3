@extends('app')

@section('content')

<div class="container">
    
    <div class="col-md-4">
        <h1>The nearest store is located in ...</h1>
        <h3 class="marginTopLeft">{{$localizacion['ciudad']}}</h3>
        <h5 class="marginTopLeft">Longitud: {{$localizacion['lng']}}</h5>
        <h5 class="marginTopLeft">Latitud: {{$localizacion['lat']}}</h5>
       
    </div>
    <div class="col-md-8">
        <div id="coor" data-lat="{{$localizacion['lat']}}" data-lng="{{$localizacion['lng']}}" data-name="{{$localizacion['ciudad']}}"></div>
        <div id="map" class="col-md-12 col-xs-12"></div>
    </div>


</div>


<script>
    var map, marker;

    function initMap() {
        var lat = parseFloat(document.getElementById("coor").dataset.lat);
        var lng = parseFloat(document.getElementById("coor").dataset.lng);
        var nombre = document.getElementById("coor").dataset.name;

        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: lat, lng: lng},
            zoom: 12
        });
        var marker = new google.maps.Marker({
            position: {lat: lat, lng: lng},
            map: map,
            title: nombre
        });

    }
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEGiDXOm42SzBR2AiFuA8hQYVy-VVtiZY&callback=initMap">
</script>        
@endsection
