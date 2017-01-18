@extends('app')

@section('content')

<div class="container">
    
    <div class="col-md-4">
        <h1>The nearest store is located in ...</h1>
        <h3 class="marginTopLeft" style="margin-left: 0em;">{{$localizacion['ciudad']}}</h3>
        <h5 class="marginTopLeft">Longitud: {{$localizacion['lng']}}</h5>
        <h5 class="marginTopLeft">Latitud: {{$localizacion['lat']}}</h5>
       
    </div>
    <div class="col-md-8">
        <div id="coor" data-lat="{{$localizacion['lat']}}" data-lng="{{$localizacion['lng']}}" data-name="{{$localizacion['ciudad']}}"></div>
        <div id="map" class="col-md-12 col-xs-12"></div>
    </div>


</div>


<script src="{{ URL::to('/') }}/js/map.js">
    
</script>

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEGiDXOm42SzBR2AiFuA8hQYVy-VVtiZY&callback=initMap">
</script>        
@endsection
