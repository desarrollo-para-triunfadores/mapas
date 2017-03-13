$("#side-recorridos").addClass("active");
$("#side-elem-recorridos-dia").addClass("active");


// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var rutas_activas = [];
var zona_activa = "";
var markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: center,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    map.addListener('zoom_changed', function () {
        zoom = map.getZoom();
    });

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: center
    });
    
    marker.addListener('click', toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}
