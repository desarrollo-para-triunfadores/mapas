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
                            <div class="col-sm-6">
                                <div class="text-right">
                                    <a title="Eliminar el último marcador agregado" onclick="eliminar_ultimo_marcador()" id="boton-remove" class="btn btn-social-icon btn-sm btn-warning"><i class="fa fa-repeat"></i></a>                                   
                                    <a title="Eliminar todos los marcadores" onclick="eliminar_marcadores()" id="boton-borrar" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    <button title="Registrar zona delimitada" type="button" id="boton-modal-guardar" class="btn btn-social-icon btn-sm btn-primary" disabled="true" data-toggle="modal" data-target="#modal-crear">                                       
                                        <i class="fa fa-save"></i>
                                    </button>
                                </div>                              
                            </div> 
                            <div class="col-sm-12">
                                <small class="form-text text-muted"><strong>Información:</strong> el botón de guardar se habilitará cuando haya plantado al menos tres marcadores y haya cerrado la zona.</small>
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
                        <div id="lista" style="width:auto;height:450px; overflow: auto;"></div>
                        <br>
                        <br>
                        <br>
                    </div>                    
                </div>              
            </div>         
        </div>
    </section>
</div>


@include('zonas.formulario.create')

@include('zonas.formulario.msj')





@endsection

@section('script')
<script src="{{ asset('js/crear_zona.js') }}"></script>
@endsection
