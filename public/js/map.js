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