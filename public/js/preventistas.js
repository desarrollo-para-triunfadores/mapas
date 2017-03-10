$("#side-general").addClass("active");
$("#side-ele-preventistas").addClass("active");

$('#select_preventista').on('change', function (evt) {
    $(".li_preventista").addClass("hide");
    if ($("#select_preventista").val() !== null) {
        $("#select_preventista").val().forEach(function (div) {
            $("#div" + div).removeClass("hide");
        });
    } else {
        $(".li_preventista").removeClass("hide");
    }
});

function completar_campos(preventista) {
    $('#nombre').val(preventista.nombre);
    $('#apellido').val(preventista.apellido);
    $('#color').val(preventista.color);
    $('#codigo').val(preventista.codigo);
    $('#dni').val(preventista.dni);
    $('#form-update').attr('action', '/preventistas/' + preventista.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/preventistas/' + id);
    $('#boton-modal-borrar').click();
}