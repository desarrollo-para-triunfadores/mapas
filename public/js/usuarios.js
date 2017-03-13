$("#side-general").addClass("active");
$("#side-ele-usuarios").addClass("active");

$('#select_usuario').on('change', function (evt) {
    $(".li_user").addClass("hide");
    if ($("#select_usuario").val() !== null) {
        $("#select_usuario").val().forEach(function (div) {
            $("#" + div).removeClass("hide");
        });
    } else {
        $(".li_user").removeClass("hide");
    }
});

function completar_campos(usuario) {
    $('#name').val(usuario.name);
    $('#email').val(usuario.email);
    $('#form-update').attr('action', '/usuarios/' + usuario.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/usuarios/' + id);
    $('#boton-modal-borrar').click();
}