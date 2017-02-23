
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