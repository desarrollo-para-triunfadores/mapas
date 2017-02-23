


// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var rutas_activas = [];
var zona_activa = "";
var markers = [];
var zoom = 13;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: {lat: -27.450247333548926, lng: -58.987441062927246},
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    map.addListener('zoom_changed', function () {
        zoom = map.getZoom();
    });
}

function color_aleatorio() {
    var colores = {
        1: "callout-danger",
        2: "callout-success",
        3: "callout-warning",
        4: "callout-info"
    };
    var num = Math.floor(Math.random() * (5 - 1)) + 1;
    return colores[num];
}


function instanciar_zona(id, nombre, color, fecha, coordenadas) {
    var vertices = [];
    var zoom =
            initMap();

    if ($("#" + id).hasClass("in")) {
        zona_activa = "";
    } else {
        for (var i = 0; i < coordenadas.length; i++) {
            vertices[i] = {lat: parseFloat(coordenadas[i]['latitud']), lng: parseFloat(coordenadas[i]['longitud'])};
        }
        var zona = new google.maps.Polygon({
            paths: vertices,
            strokeColor: color,
            strokeOpacity: 0.8,
            strokeWeight: 3,
            fillColor: color,
            fillOpacity: 0.35
        });
        zona.setMap(map);
        zona_activa = zona;
    }

    markers = [];
    for (var i = 0; i < rutas_activas.length; i++) {
        var ruta = new google.maps.Polyline({
            path: rutas_activas[i]['marcadores'],
            geodesic: true,
            strokeColor: rutas_activas[i]['color'],
            strokeOpacity: 1.0,
            strokeWeight: 2
        });

        ruta.setMap(map);
        for (var r = 0; r < rutas_activas[i]['datos'].length; r++) {
            var marker = new google.maps.Marker({
                position: rutas_activas[i]['marcadores'][r],
                map: map,
                icon: 'http://localhost/mapas/public/imagenes/add-placemark.png',
                title: "Fecha y hora: " + rutas_activas[i]['datos'][r]['fecha'] + " - " + rutas_activas[i]['datos'][r]['hora'] + ". Coordenadas de latitud: " + rutas_activas[i]['marcadores'][r]['lat'] + ". Coordenadas de longitud: " + rutas_activas[i]['marcadores'][r]['lng'] + "."
            });
            markers.push(marker);
        }
    }
    if ($("#optionsRadios2").is(':checked')) {
        setMapOnAll(null);
    }
}


function instanciar_recorrido(color, id, valor, coordenadas) {

    initMap();

    if (zona_activa !== "") {
        zona_activa.setMap(map);
    }

    var marcadores = [];
    var datos = [];

    for (var i = 0; i < coordenadas.length; i++) {
        marcadores[i] = {lat: parseFloat(coordenadas[i]['latitud']), lng: parseFloat(coordenadas[i]['longitud'])};
        datos [i] = {fecha: coordenadas[i]['fecha'],
            hora: coordenadas[i]['hora']
        };
    }
    if (valor) { //valor representa al estado del check en la vista
        rutas_activas.push({color: color, id: id, marcadores: marcadores, datos: datos});
    } else {
        for (var i = 0; i < rutas_activas.length; i++) {
            if (rutas_activas[i]['id'] === id) {
                rutas_activas.splice(i, 1);
            }
        }
    }
    markers = [];
    for (var i = 0; i < rutas_activas.length; i++) {
        var ruta = new google.maps.Polyline({
            path: rutas_activas[i]['marcadores'],
            geodesic: true,
            strokeColor: rutas_activas[i]['color'],
            strokeOpacity: 1.0,
            strokeWeight: 2
        });

        ruta.setMap(map);
        for (var r = 0; r < rutas_activas[i]['datos'].length; r++) {
            var marker = new google.maps.Marker({
                position: rutas_activas[i]['marcadores'][r],
                map: map,
                icon: 'http://localhost/mapas/public/imagenes/add-placemark.png',
                title: "Fecha y hora: " + rutas_activas[i]['datos'][r]['fecha'] + " - " + rutas_activas[i]['datos'][r]['hora'] + ". Coordenadas de latitud: " + rutas_activas[i]['marcadores'][r]['lat'] + ". Coordenadas de longitud: " + rutas_activas[i]['marcadores'][r]['lng'] + "."
            });
            markers.push(marker);
        }
    }
    if ($("#optionsRadios2").is(':checked')) {
        setMapOnAll(null);
    }
}


function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}


function clearMarkers() {
    setMapOnAll(null);
}


function showMarkers() {
    setMapOnAll(map);
}

function color_solapa(num_tab, id, color) {
    $("#tab_" + id + "_1").css("border-top-color", "transparent");
    $("#tab_" + id + "_2").css("border-top-color", "transparent");
    $("#tab_" + id + "_" + num_tab).css("border-top-color", color);
}