$("#side-general").addClass("active");
$("#side-ele-celulares").addClass("active");

function completar_campos(celular) {
    $('#serial').val(celular.serial);
    $('#modelo').val(celular.modelo);
    $('#marca').val(celular.marca);
    $('#form-update').attr('action', '/celulares/' + celular.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/celulares/' + id);
    $('#boton-modal-borrar').click();
}