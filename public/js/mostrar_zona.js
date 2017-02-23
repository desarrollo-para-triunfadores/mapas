// In the following example, markers appear when the user clicks on the map.
// The markers are stored in an array.
// The user can then click an option to hide, show or delete the markers.



//var markers = [];
//var poly;


function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: {lat: -27.450247333548926, lng: -58.987441062927246},
        mapTypeId: google.maps.MapTypeId.TERRAIN
    });
}

function instanciar_zona(id, nombre, color, fecha, coordenadas) {

    if ($("#" + id).hasClass("in")) {
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
        $("#fecha_creacion").html("El registro fue creado " + fecha);
        for (var i = 0; i < coordenadas.length; i++) {
            vertices[i] = {lat: parseFloat(coordenadas[i]['latitud']), lng: parseFloat(coordenadas[i]['longitud'])};
            $("#lista").append('<div class="callout ' + colores[num_color] + '"><h4>Vértice #' + (i + 1) + ':</h4><p><strong>Latitud:</strong> ' + vertices[i]['lat'] + '. <strong>Longitud:</strong> ' + vertices[i]['lng'] + '.</p></div>');
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
    }

}

//
//
//
//function comparar_ejes(p1, p2) {
//    var valores = {
//        mayor: p1,
//        menor: p2
//    };
//
//    if (p1 < p2) {
//        valores = {
//            mayor: p2,
//            menor: p1
//        };
//    }
//    return valores;
//}
//
//
//function punto_interseccion(m_viejo, m_nuevo, seg_viejo, seg_nuevo) {
//
////Se utiliza el método de igualación adaptado para poder resolver el sistema de ecuaciones.
//
//    var interseccion_valida = false;
//    var A = m_viejo * (-1);
////    console.log("A =" + A);
//    var B = 1;
//    var C = ((m_viejo * (-1)) * seg_viejo.punto_1.x) + seg_viejo.punto_1.y;
//
//
//    var D = m_nuevo * (-1);
//    var E = 1;
//    var F = ((m_nuevo * (-1)) * seg_nuevo.punto_1.x) + seg_nuevo.punto_1.y;
//
//
//    var y_interseccion = ((F * A) - (D * C)) / ((E * A) - (D * B));
//    var x_interseccion = (C - (B * y_interseccion)) / A;
//
//
//    var punto = {
//        x: x_interseccion,
//        y: y_interseccion
//    };
//
////    console.log(punto);
//
//    var valores_x_viejo = comparar_ejes(seg_viejo.punto_1.x, seg_viejo.punto_2.x);
//    var valores_y_viejo = comparar_ejes(seg_viejo.punto_1.y, seg_viejo.punto_2.y);
//
//    var valores_x_nuevo = comparar_ejes(seg_nuevo.punto_1.x, seg_nuevo.punto_2.x);
//    var valores_y_nuevo = comparar_ejes(seg_nuevo.punto_1.y, seg_nuevo.punto_2.y);
//
//
//
//    if ((((valores_x_viejo.menor < x_interseccion) && (valores_x_viejo.mayor > x_interseccion)) && ((valores_y_viejo.menor < y_interseccion) && (valores_y_viejo.mayor > y_interseccion))) &&
//            (((valores_x_nuevo.menor < x_interseccion) && (valores_x_nuevo.mayor > x_interseccion)) && ((valores_y_nuevo.menor < y_interseccion) && (valores_y_nuevo.mayor > y_interseccion)))) {
//
//        interseccion_valida = true;
//
//    }
////    console.log(interseccion_valida);
//    return interseccion_valida;
//}
//
//
//
//
//
//
//function comprobar_interseccion(seg_viejo, seg_nuevo) {
//
//    var interseccion = false;
//    var comparte_region = true;
//
////El primer if y else if tratan de desechar a los que no comparten regiones en los ejes 
//    if (((seg_viejo.punto_1.x < seg_nuevo.punto_1.x) && (seg_viejo.punto_1.x < seg_nuevo.punto_2.x) &&
//            (seg_viejo.punto_2.x < seg_nuevo.punto_1.x) && (seg_viejo.punto_2.x < seg_nuevo.punto_2.x)) ||
//            ((seg_viejo.punto_1.x > seg_nuevo.punto_1.x) && (seg_viejo.punto_1.x > seg_nuevo.punto_2.x) &&
//                    (seg_viejo.punto_2.x > seg_nuevo.punto_1.x) && (seg_viejo.punto_2.x > seg_nuevo.punto_2.x))) {
//
//        comparte_region = false;
//
//    } else if (((seg_viejo.punto_1.y < seg_nuevo.punto_1.y) && (seg_viejo.punto_1.y < seg_nuevo.punto_2.y) &&
//            (seg_viejo.punto_2.y < seg_nuevo.punto_1.y) && (seg_viejo.punto_2.y < seg_nuevo.punto_2.y)) ||
//            ((seg_viejo.punto_1.y > seg_nuevo.punto_1.y) && (seg_viejo.punto_1.y > seg_nuevo.punto_2.y) &&
//                    (seg_viejo.punto_2.y > seg_nuevo.punto_1.y) && (seg_viejo.punto_2.y > seg_nuevo.punto_2.y))) {
//
//        comparte_region = false;
//
//    }
//
//    if (comparte_region) { // Si se detecta que exite probabilidad de intersección entonces se procede a verificar la pendiente del primer segmento y se verifica la intersección.
//
//        if (seg_viejo.punto_1.x === seg_viejo.punto_2.x) {
//
//            if (((seg_nuevo.punto_1.x < seg_viejo.punto_1.x) && (seg_viejo.punto_1.x < seg_nuevo.punto_2.x)) ||
//                    ((seg_nuevo.punto_1.x > seg_viejo.punto_1.x) && (seg_viejo.punto_1.x > seg_nuevo.punto_2.x))) {
//                interseccion = true;
//            }
//        } else if (seg_viejo.punto_1.y === seg_viejo.punto_2.y) {
//
//            if (((seg_nuevo.punto_1.y < seg_viejo.punto_1.y) && (seg_viejo.punto_1.y < seg_nuevo.punto_2.y)) ||
//                    ((seg_nuevo.punto_1.y > seg_viejo.punto_1.y) && (seg_viejo.punto_1.y > seg_nuevo.punto_2.y))) {
//                interseccion = true;
//            }
//        }
//        else {
//
//            var m_viejo = (seg_viejo.punto_2.y - seg_viejo.punto_1.y) / (seg_viejo.punto_2.x - seg_viejo.punto_1.x);
//
//            var y_seg_nuevo_punto_1 = (m_viejo * (seg_nuevo.punto_1.x - seg_viejo.punto_1.x)) + seg_viejo.punto_1.y;
//
//            var y_seg_nuevo_punto_2 = (m_viejo * (seg_nuevo.punto_2.x - seg_viejo.punto_1.x)) + seg_viejo.punto_1.y;
//
//
//
//            if ((seg_nuevo.punto_1.y < y_seg_nuevo_punto_1) && (seg_nuevo.punto_2.y > y_seg_nuevo_punto_2) || (seg_nuevo.punto_1.y > y_seg_nuevo_punto_1) && (seg_nuevo.punto_2.y < y_seg_nuevo_punto_2)) {
//
//                var m_nuevo = (seg_nuevo.punto_2.y - seg_nuevo.punto_1.y) / (seg_nuevo.punto_2.x - seg_nuevo.punto_1.x);
//
//                interseccion = punto_interseccion(m_viejo, m_nuevo, seg_viejo, seg_nuevo);
//
//            }
////
////
////
////            var casa = {
////                interseccion: interseccion,
////                m_arriba: seg_viejo.punto_2.y - seg_viejo.punto_1.y,
////                m_abajo: seg_viejo.punto_2.x - seg_viejo.punto_1.x,
////                y1: seg_nuevo.punto_1.y,
////                y2: seg_nuevo.punto_2.y,
////                y1_nuevo: y_seg_nuevo_punto_1,
////                y2_nuevo: y_seg_nuevo_punto_2,
////                m: m_viejo,
////                seg_viejo: seg_viejo,
////                seg_nuevo: seg_nuevo
////
////            };
//
////            console.log(casa);
//        }
//    }
//
//    return interseccion;
//}
//
//
//
//
//// Adds a marker to the map and push to the array.
//function addMarker(location, ultimo) {
//    var i = 0;
//    if (ultimo) {
//        i = 1;
//    }
//    var path = poly.getPath();
//    var colores = {
//        1: "callout-danger",
//        2: "callout-success",
//        3: "callout-warning",
//        4: "callout-info"
//    };
//
//    var num_color = Math.floor(Math.random() * (5 - 1)) + 1;
//// Because path is an MVCArray, we can simply append a new coordinate
//// and it will automatically appear.
//
//
//
//// Add a new marker at the new plotted point on the polyline.
//
//
//
//
//    var cruce = false;
//
//
//    if (path.getLength() > 2) {
////        console.log(path.getLength());
//// console.log(path.getLength() - 2);
////       alert(path.getLength());
//        var seg_nuevo = {
//            punto_1: {
//                x: markers[path.getLength() - 1].getPosition().lat(),
//                y: markers[path.getLength() - 1].getPosition().lng()
//            }, punto_2: {
//                x: location.lat(),
//                y: location.lng()
//            }
//        };
//
//
//        for (i; i < (path.getLength() - 2); i++) {
//            var seg_viejo = {
//                punto_1: {
//                    x: markers[i].getPosition().lat(),
//                    y: markers[i].getPosition().lng()
//                }, punto_2: {
//                    x: markers[i + 1].getPosition().lat(),
//                    y: markers[i + 1].getPosition().lng()
//                }
//            };
//            cruce = comprobar_interseccion(seg_viejo, seg_nuevo);
//            if (cruce) {
//                break;
//            }
//        }
//
//
//
//
//
//        if (cruce === false) {
//
//
//
//            var marker = new google.maps.Marker({
//                position: location,
//                icon: 'http://localhost/~hacho/mapas/public/imagenes/add-placemark.png',
//                title: '#' + (path.getLength() + 1),
//                map: map
//            });
//
//            path.push(location);
//
//
//            markers.push(marker);
//
//
//            if (ultimo) {
//                $('#boton-modal').click();
//            } else {
//                $("#lista").append('<div class="callout ' + colores[num_color] + '"><h4>Marcador #' + path.getLength() + ':</h4><p><strong>Latitud:</strong> ' + marker.getPosition().lat() + '. <strong>Longitud:</strong> ' + marker.getPosition().lng() + '.</p></div>');
//                marker.addListener('click', function (event) {
//                    cerrar_zona(marker.title);
//                });
//            }
//
//
//
//
////            console.log(cruce);
//        } else if (cruce === true) {
//            $('#boton-modal-informacion').click();
//
//        } else {
//            alert("etc");
//        }
//
//
//    } else {
//        var marker = new google.maps.Marker({
//            position: location,
//            icon: 'http://localhost/~hacho/mapas/public/imagenes/add-placemark.png',
//            title: '#' + (path.getLength() + 1),
//            map: map
//        });
//
//        path.push(location);
//
//        $("#lista").append('<div class="callout ' + colores[num_color] + '"><h4>Marcador #' + path.getLength() + ':</h4><p><strong>Latitud:</strong> ' + marker.getPosition().lat() + '. <strong>Longitud:</strong> ' + marker.getPosition().lng() + '.</p></div>');
//
//        markers.push(marker);
//
//        marker.addListener('click', function (event) {
//            cerrar_zona(event.latLng);
//        });
//
////        console.log(cruce);
//    }
//}
//
//
//
//
//
//function cerrar_zona(location) {
//    var path = poly.getPath();
//
//    if (path.getLength() > 2) {
//        if (location === markers[0].getPosition()) {
//            addMarker(location, true);
//        }
//    } else {
//        $('#boton-modal-advertencia').click();
//    }
//
//}
//
//// Sets the map on all markers in the array.
//function setMapOnAll(map) {
//    for (var i = 0; i < markers.length; i++) {
//        markers[i].setMap(map);
//    }
//}
//
//// Removes the markers from the map, but keeps them in the array.
//function clearMarkers() {
//    setMapOnAll(null);
//}
//
//// Shows any markers currently in the array.
//function showMarkers() {
//    setMapOnAll(map);
//}
//
//// Deletes all markers in the array by removing references to them.
//function deleteMarkers() {
//    clearMarkers();
//    markers = [];
//    poly.setMap(null);
//    poly.setPath();
//}
//
//function enviar() {
////    console.log("nombre " +$('#nombre').val());
////    console.log("desc "+ $('#color').val());
////    console.log("color"+ $('#detalle').val());
//
//
//    var vertices = [];
//    var path = poly.getPath();
//
//    for (var i = 0; i < (path.getLength() - 1); i++) {
//        vertices [i] = {
//            lat: markers[i].getPosition().lat(),
//            lng: markers[i].getPosition().lng()
//        };
//    }
//
//
//    $.ajax({
//        dataType: 'json',
//        url: "/zonas/create",
//        data: {
//            nombre: $('#nombre').val(),
//            color: $('#color').val(),
//            descripcion: $('#descripcion').val(),
//            vertices: vertices
//                    //    descripcion: $('#detalle').val()
//                    // marcadores: markers
//        },
//        success: function (data) {
//            /*
//             * Una vez completado el proceso se muestra el mensaje de exito.
//             */
//            console.log(data);
//        }
//    });
//}
//
//
