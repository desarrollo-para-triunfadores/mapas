


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Guardar zona</h4>
            </div>
            <div class="modal-body">

                <div class="box-body">


                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre:</label>
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'campo requerido', 'maxlength' => '50', 'required']) !!} 
                    </div>          
                    <div class="form-group">
                        <label>Color:</label>

                        <div class="input-group my-colorpicker2 colorpicker-element">
                            <input class="form-control" type="text">
                            {!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'escoja un color', 'maxlength' => '50']) !!} 
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'placeholder' => 'campo opcional - máx. 140 carácteres']) !!}

                    </div>


                </div>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>


            </div>

        </div>
    </div>
</div>