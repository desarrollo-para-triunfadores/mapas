$("#side-zonas").addClass("active");
$("#side-elem-registrar-zona").addClass("active");


// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.
var map;
var markers = [];
var poly;
var zoom = 13;
var colores = {
    1: "callout-danger",
    2: "callout-success",
    3: "callout-warning",
    4: "callout-info"
};



function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: {lat: -27.450247333548926, lng: -58.987441062927246},
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });

    poly = new google.maps.Polyline({
        strokeColor: '#000000',
        strokeOpacity: 1.0,
        strokeWeight: 3
    });



    poly.setMap(map);

// This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function (event) {
        addMarker(event.latLng, false);
    });

}



function comparar_ejes(p1, p2) {
    var valores = {
        mayor: p1,
        menor: p2
    };

    if (p1 < p2) {
        valores = {
            mayor: p2,
            menor: p1
        };
    }
    return valores;
}


function punto_interseccion(m_viejo, m_nuevo, seg_viejo, seg_nuevo) {

//Se utiliza el método de igualación adaptado para poder resolver el sistema de ecuaciones.

    var interseccion_valida = false;
    var A = m_viejo * (-1);
//    console.log("A =" + A);
    var B = 1;
    var C = ((m_viejo * (-1)) * seg_viejo.punto_1.x) + seg_viejo.punto_1.y;


    var D = m_nuevo * (-1);
    var E = 1;
    var F = ((m_nuevo * (-1)) * seg_nuevo.punto_1.x) + seg_nuevo.punto_1.y;


    var y_interseccion = ((F * A) - (D * C)) / ((E * A) - (D * B));
    var x_interseccion = (C - (B * y_interseccion)) / A;


    var punto = {
        x: x_interseccion,
        y: y_interseccion
    };


    var valores_x_viejo = comparar_ejes(seg_viejo.punto_1.x, seg_viejo.punto_2.x);
    var valores_y_viejo = comparar_ejes(seg_viejo.punto_1.y, seg_viejo.punto_2.y);

    var valores_x_nuevo = comparar_ejes(seg_nuevo.punto_1.x, seg_nuevo.punto_2.x);
    var valores_y_nuevo = comparar_ejes(seg_nuevo.punto_1.y, seg_nuevo.punto_2.y);



    if ((((valores_x_viejo.menor < x_interseccion) && (valores_x_viejo.mayor > x_interseccion)) && ((valores_y_viejo.menor < y_interseccion) && (valores_y_viejo.mayor > y_interseccion))) &&
            (((valores_x_nuevo.menor < x_interseccion) && (valores_x_nuevo.mayor > x_interseccion)) && ((valores_y_nuevo.menor < y_interseccion) && (valores_y_nuevo.mayor > y_interseccion)))) {

        interseccion_valida = true;

    }
//    console.log(interseccion_valida);
    return interseccion_valida;
}






function comprobar_interseccion(seg_viejo, seg_nuevo) {

    var interseccion = false;
    var comparte_region = true;

//El primer if y else if tratan de desechar a los que no comparten regiones en los ejes 
    if (((seg_viejo.punto_1.x < seg_nuevo.punto_1.x) && (seg_viejo.punto_1.x < seg_nuevo.punto_2.x) &&
            (seg_viejo.punto_2.x < seg_nuevo.punto_1.x) && (seg_viejo.punto_2.x < seg_nuevo.punto_2.x)) ||
            ((seg_viejo.punto_1.x > seg_nuevo.punto_1.x) && (seg_viejo.punto_1.x > seg_nuevo.punto_2.x) &&
                    (seg_viejo.punto_2.x > seg_nuevo.punto_1.x) && (seg_viejo.punto_2.x > seg_nuevo.punto_2.x))) {

        comparte_region = false;

    } else if (((seg_viejo.punto_1.y < seg_nuevo.punto_1.y) && (seg_viejo.punto_1.y < seg_nuevo.punto_2.y) &&
            (seg_viejo.punto_2.y < seg_nuevo.punto_1.y) && (seg_viejo.punto_2.y < seg_nuevo.punto_2.y)) ||
            ((seg_viejo.punto_1.y > seg_nuevo.punto_1.y) && (seg_viejo.punto_1.y > seg_nuevo.punto_2.y) &&
                    (seg_viejo.punto_2.y > seg_nuevo.punto_1.y) && (seg_viejo.punto_2.y > seg_nuevo.punto_2.y))) {

        comparte_region = false;

    }

    if (comparte_region) { // Si se detecta que exite probabilidad de intersección entonces se procede a verificar la pendiente del primer segmento y se verifica la intersección.

        if (seg_viejo.punto_1.x === seg_viejo.punto_2.x) {

            if (((seg_nuevo.punto_1.x < seg_viejo.punto_1.x) && (seg_viejo.punto_1.x < seg_nuevo.punto_2.x)) ||
                    ((seg_nuevo.punto_1.x > seg_viejo.punto_1.x) && (seg_viejo.punto_1.x > seg_nuevo.punto_2.x))) {
                interseccion = true;
            }
        } else if (seg_viejo.punto_1.y === seg_viejo.punto_2.y) {

            if (((seg_nuevo.punto_1.y < seg_viejo.punto_1.y) && (seg_viejo.punto_1.y < seg_nuevo.punto_2.y)) ||
                    ((seg_nuevo.punto_1.y > seg_viejo.punto_1.y) && (seg_viejo.punto_1.y > seg_nuevo.punto_2.y))) {
                interseccion = true;
            }
        }
        else {

            var m_viejo = (seg_viejo.punto_2.y - seg_viejo.punto_1.y) / (seg_viejo.punto_2.x - seg_viejo.punto_1.x);

            var y_seg_nuevo_punto_1 = (m_viejo * (seg_nuevo.punto_1.x - seg_viejo.punto_1.x)) + seg_viejo.punto_1.y;

            var y_seg_nuevo_punto_2 = (m_viejo * (seg_nuevo.punto_2.x - seg_viejo.punto_1.x)) + seg_viejo.punto_1.y;



            if ((seg_nuevo.punto_1.y < y_seg_nuevo_punto_1) && (seg_nuevo.punto_2.y > y_seg_nuevo_punto_2) || (seg_nuevo.punto_1.y > y_seg_nuevo_punto_1) && (seg_nuevo.punto_2.y < y_seg_nuevo_punto_2)) {

                var m_nuevo = (seg_nuevo.punto_2.y - seg_nuevo.punto_1.y) / (seg_nuevo.punto_2.x - seg_nuevo.punto_1.x);

                interseccion = punto_interseccion(m_viejo, m_nuevo, seg_viejo, seg_nuevo);

            }
        }
    }

    return interseccion;
}


function addMarker(location, ultimo) {
    if ($('#boton-modal-guardar').is(':disabled')) {
        var i = 0;
        if (ultimo) {
            i = 1;
        }
        var path = poly.getPath();
        var cruce = false;
        if (path.getLength() > 2) {
            var seg_nuevo = {
                punto_1: {
                    x: markers[path.getLength() - 1].getPosition().lat(),
                    y: markers[path.getLength() - 1].getPosition().lng()
                }, punto_2: {
                    x: location.lat(),
                    y: location.lng()
                }
            };
            for (i; i < (path.getLength() - 2); i++) {
                var seg_viejo = {
                    punto_1: {
                        x: markers[i].getPosition().lat(),
                        y: markers[i].getPosition().lng()
                    }, punto_2: {
                        x: markers[i + 1].getPosition().lat(),
                        y: markers[i + 1].getPosition().lng()
                    }
                };
                cruce = comprobar_interseccion(seg_viejo, seg_nuevo);
                if (cruce) {
                    break;
                }
            }
            if (cruce === false) {
                var marker = new google.maps.Marker({
                    position: location,
                    animation: google.maps.Animation.DROP,
                    icon: 'http://localhost/mapas/public/imagenes/add-placemark.png',
                    title: '#' + (path.getLength() + 1),
                    map: map
                });
                path.push(location);
                markers.push(marker);
                if (ultimo) {
                    $('#boton-modal-guardar').attr('disabled', false);
                    $('#boton-modal-guardar').click();
                } else {
                    agregar_etiqueta(marker, path.getLength());
                    marker.addListener('click', function (event) {
                        cerrar_zona(marker.title);
                    });
                    window.location = "#m" + path.getLength();
                }
            } else if (cruce === true) {
                lanzar_msj("msj-info-1");
            } else {
                alert("etc");
            }
        } else {
            var marker = new google.maps.Marker({
                position: location,
                animation: google.maps.Animation.DROP,
                icon: 'http://localhost/mapas/public/imagenes/add-placemark.png',
                title: '#' + (path.getLength() + 1),
                map: map
            });
            path.push(location);
            agregar_etiqueta(marker);
            markers.push(marker);
            marker.addListener('click', function (event) {
                cerrar_zona(event.latLng);
            });
        }
    } else {
        lanzar_msj("msj-info-2");
    }

}

function agregar_etiqueta(marker) {
    var num_color = Math.floor(Math.random() * (5 - 1)) + 1;
    $("#lista").append('<div class="callout ' + colores[num_color] + '"><h4>Marcador ' + marker.title + ':</h4><p><strong>Latitud:</strong> ' + marker.getPosition().lat() + '. <strong>Longitud:</strong> ' + marker.getPosition().lng() + '.</p></div>');
}

function completar_marcadores() {
    $("#lista").empty();
    for (var tt = 0; tt <= markers.length; tt++) {
        agregar_etiqueta(markers[tt]);
    }
}




function eliminar_ultimo_marcador() {
    var path = poly.getPath();
    markers.splice(markers.length - 1, 1);
    path.pop(path.b[path.length - 1]);

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        center: {
            lat: markers[markers.length - 1].getPosition().lat(),
            lng: markers[markers.length - 1].getPosition().lng()
        },
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });
    poly.setMap(map);
    setMapOnAll(map);
    map.addListener('click', function (event) {
        addMarker(event.latLng, false);
    });
    map.addListener('zoom_changed', function () {
        zoom = map.getZoom();
    });
    $('#boton-modal-guardar').attr('disabled', true);
    completar_marcadores();
}



function cerrar_zona(location) {
    var path = poly.getPath();
    if (path.getLength() > 2) {
        if (location === markers[0].getPosition()) {
            addMarker(location, true);
        }
    } else {
        lanzar_msj("msj-warning");
    }

}


function lanzar_msj(tipo) {
    $("#modal-advertencia").removeClass("modal-warning");
    $("#modal-advertencia").removeClass("modal-info");
    switch (tipo) {
        case "msj-warning":
            $("#modal-advertencia").addClass("modal-warning");
            $('#advertencia-title').html("¡Atención!");
            $('#advertencia-contenido').html("Una zona de control debe al menos poseer tres marcadores que actúen como vértices del área. Verifique y vuelva a intentar.");
            break;
        case "msj-info-2":
            $("#modal-advertencia").addClass("modal-info");
            $('#advertencia-title').html("Información:");
            $('#advertencia-contenido').html("No puede agreagar más marcadores debido a que la zona ya fue delimitada. Puede seguir agregando si borra el último marcador colocado.");
            break;
        case "msj-info-1":
            $("#modal-advertencia").addClass("modal-info");
            $('#advertencia-title').html("Información:");
            $('#advertencia-contenido').html("Para lograr un control efectivo y eficiente sobre la zona dibujada no se admiten cruzar los segmentos que conforman los lados de la misma.");
            break;
    }
    $('#boton-modal-advertencia').click();
}


// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function eliminar_marcadores() {
    $('#boton-modal-guardar').attr('disabled', true);
    $("#lista").empty();
    markers = [];
    initMap();
}

function enviar() {

    var vertices = [];
    var path = poly.getPath();

    for (var i = 0; i < (path.getLength() - 1); i++) {
        vertices [i] = {
            lat: markers[i].getPosition().lat(),
            lng: markers[i].getPosition().lng()
        };
    }


    $.ajax({
        dataType: 'json',
        url: "/zonas/create",
        data: {
            nombre: $('#nombre').val(),
            color: $('#color').val(),
            descripcion: $('#descripcion').val(),
            vertices: vertices
        },
        success: function (data) {
            if (data === '"1"') {
                window.location = "/zonas";
            }
        }
    });
}


