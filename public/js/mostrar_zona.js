$("#side-zonas").addClass("active");
$("#side-elem-zonas-registradas").addClass("active");

var map;
var markers = [];
var zona_activa = "";


function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: center,
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    map.addListener('zoom_changed', function () {
        zoom = map.getZoom();
    });
}

function instanciar_zona(id, nombre, color, coordenadas) {
    if ($("#" + id).hasClass("in")) {
        zona_activa = "";
        center = {lat: -27.450247333548926, lng: -58.987441062927246};
        initMap();

        $("#lista").empty();
    } else {
        var vertices = [];
        var colores = {
            1: "callout-danger",
            2: "callout-success",
            3: "callout-warning",
            4: "callout-info"
        };
        var num_color = Math.floor(Math.random() * (5 - 1)) + 1;
        initMap();
        $("#lista").empty();
        for (var i = 0; i < coordenadas.length; i++) {
            vertices[i] = {lat: parseFloat(coordenadas[i]['latitud']), lng: parseFloat(coordenadas[i]['longitud'])};
            $("#lista").append('<div class="callout ' + colores[num_color] + '"><h4>Vértice #' + (i + 1) + ':</h4><p><strong>Latitud:</strong> ' + vertices[i]['lat'].toFixed(6) + '. <strong>Longitud:</strong> ' + vertices[i]['lng'].toFixed(6) + '.</p><input id="check' + (i + 1) + '" onchange="instanciar_marcador(' + vertices[i]['lat'] + ', ' + vertices[i]['lng'] + ', ' + (i + 1) + ')" type="checkbox"> Resaltar </div>');
        }

        var zona = new google.maps.Polygon({
            paths: vertices,
            strokeColor: color,
            strokeOpacity: 0.8,
            strokeWeight: 3,
            fillColor: color,
            fillOpacity: 0.35
        });
        center = {lat: parseFloat(coordenadas[0]['latitud']), lng: parseFloat(coordenadas[0]['longitud'])};
        initMap();
        console.log(center);
        zona_activa = zona;
        zona.setMap(map);
    }
}


function instanciar_marcador(lat, lng, num) {
    if ($('#check' + num).prop('checked')) {
        var marker = new google.maps.Marker({
            position: {
                lat: parseFloat(lat),
                lng: parseFloat(lng)
            },
            map: map,
            animation: google.maps.Animation.DROP,
            icon: 'http://localhost/mapas/public/imagenes/add-placemark.png',
            title: "#" + num
        });
        markers.push(marker);
    } else {
        var posicion = "";
        for (var i = 0; i < markers.length; i++) {
            if ((markers[i].getPosition().lat() === lat) && (markers[i].getPosition().lng() === lng)) {
                posicion = i;
                break;
            }
        }
        markers.splice(i, 1);
        initMap();
        zona_activa.setMap(map);
        showMarkers();
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

$('#select_zonas').on('change', function (evt) {
    $(".li_zona").addClass("hide");
    if ($("#select_zonas").val() !== null) {
        $("#select_zonas").val().forEach(function (div) {
            $("#div" + div).removeClass("hide");
        });
    } else {
        $(".li_zona").removeClass("hide");
    }
});


function completar_campos(zona) {
    $('#nombre').val(zona.nombre);
    $('#color').val(zona.color);
    $('#descripcion').val(zona.descripcion);
    $('#form-update').attr('action', '/zonas/' + zona.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/zonas/' + id);
    $('#boton-modal-borrar').click();
}