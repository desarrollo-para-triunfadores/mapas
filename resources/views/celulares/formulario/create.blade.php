<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar celular</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/celulares" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Serial:</label>
                        <input name="serial" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>     
                    <div class="form-group">
                        <label for="formGroupExampleInput">Modelo:</label>
                        <input name="modelo" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>  
                    <div class="form-group">
                        <label for="formGroupExampleInput">Marca:</label>
                        <input name="marca" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>                                      
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar celular</button>
            </div>
        </div>          
    </div>
</div>