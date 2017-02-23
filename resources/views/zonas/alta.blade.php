@extends('partes.index')

@section('title')
Zonas registradas
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Zonas
            <small>registrar una zona</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> zona</a></li>          
            <li class="active">registrar una zona</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-map" aria-hidden="true"></i>

                        <h3 class="box-title">Mapa</h3>
                    </div>
                    <div class="box-body">
                        <div id="map" style="width:auto;height:432px;">
                        </div>
                    </div>
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="radio">
                                    <label>
                                        <input onclick="showMarkers();" type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        mostrar marcadores
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3">               
                                <div class="radio">
                                    <label>
                                        <input onclick="clearMarkers();" type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        ocultar marcadores 
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h3 class="box-title">Marcadores</h3>
                    </div>
                    <div class="box-body">
                        <div id="lista" style="width:auto;height:432px; overflow: auto;"></div>
                        <br>
                        <br>
                        <br>
                    </div>                    
                </div>              
            </div>         
        </div>
    </section>
</div>

<button type="button" id="boton-modal" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>
<button type="button" id="boton-modal-advertencia" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal_advertencia">
    Launch demo modal
</button>
<button type="button" id="boton-modal-informacion" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal_informacion">
    Launch demo modal
</button>

<div id="modal_advertencia" class="modal fade modal-warning">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">¡Atención!</h4>
            </div>
            <div class="modal-body">
                <p>Una zona de control debe al menos poseer tres marcadores que actúen como vértices del área. Verifique y vuelva a intentar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="modal_informacion" class="modal fade modal-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Información</h4>
            </div>
            <div class="modal-body">
                <p>Para lograr un control efectivo y eficiente sobre la zona dibujada no se admiten cruzar los segmentos que conforman los lados de la misma.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" data-dismiss="modal">cerrar</button>
            </div>
        </div>
    </div>
</div>

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
                        <input id="nombre" class="form-control" id="nombre"  type="text">
                    </div>          
                    <div class="form-group">
                        <label>Color:</label>
                        <div class="input-group my-colorpicker2 colorpicker-element">
                            <input id="color" placeholder="haga click en el recuadro de la derecha para seleccionar un color." class="form-control" type="text">

                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Descripción:</label>
                        <textarea id="descripcion" class="form-control" rows="3" placeholder="breve descripción de no más de 140 caracteres."></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">cerrar</button>
                <button type="button" class="btn btn-primary" onclick="enviar();">guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/crear_zona.js') }}"></script>
@endsection
