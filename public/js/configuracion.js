$("#side-recorridos").addClass("active");
$("#side-elem-recorridos-dia").addClass("active");


// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var rutas_activas = [];
var zona_activa = "";
var marker = "";

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: center,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    map.addListener('zoom_changed', function () {
        zoom = map.getZoom();
        $("#zoom").val(zoom);
    });

    marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: center
    });

    marker.addListener('dragend', function () {
        center = {
            lat: marker.getPosition().lat(),
            lng: marker.getPosition().lng()
        };
        $("#latitud").val(center.lat);
        $("#longitud").val(center.lng);
           $("#info").html("<strong>Información:</strong> mueva el marcador y ajuste el nivel del zoom para que esta sea la vista por defecto en todos los mapas del sistema. <b>Nivel de zoom:</b> "+zoom+". <b>Latitud:</b> "+center.lat.toFixed(6)+". <b>Longitud:</b> "+center.lng.toFixed(6)+".");
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


function cambiar_info(tab) {
    if (tab === "#tab_2") {
        $("#info").html("<strong>Información:</strong> haga click sobre el esquema de color que le guste, el mismo quedará asociado únicamente al usuario logueado.");
    } else {
        $("#info").html("<strong>Información:</strong> mueva el marcador y ajuste el nivel del zoom para que esta sea la vista por defecto en todos los mapas del sistema. <b>Nivel de zoom:</b> "+zoom+". <b>Latitud:</b> "+center.lat.toFixed(6)+". <b>Longitud:</b> "+center.lng.toFixed(6)+".");
    }
}