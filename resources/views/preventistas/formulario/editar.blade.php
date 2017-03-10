<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar usuario</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Detalles del perfil</h3>
                    <br>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Apellido/s:</label>
                        <input id="apellido" name="apellido" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>     
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre/s:</label>
                        <input id="nombre" name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>  
                    <div class="form-group">
                        <label for="formGroupExampleInput">DNI:</label>
                        <input id="dni" name="dni" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>   
                    <div class="form-group">
                        <label for="formGroupExampleInput">Código de preventista:</label>
                        <input id="codigo" name="codigo" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div> 
                    <div class="form-group">
                        <label>Color:</label>
                        <div class="input-group my-colorpicker2 colorpicker-element">
                            <input id="color" name="color" placeholder="haga click en el recuadro de la derecha para seleccionar un color." class="form-control" type="text">
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen de perfil:</label>
                        <input name="imagen" type="file" class="form-control-file" aria-describedby="fileHelp">                         
                    </div>                    
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update').click()">actualizar usuario</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>