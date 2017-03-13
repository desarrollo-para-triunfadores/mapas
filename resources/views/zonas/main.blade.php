@extends('partes.index')

@section('title')
Zonas registradas
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Zonas
            <small>registros</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> zona</a></li>          
            <li class="active">zonas registradas</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
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
                            <div class="col-sm-2 text-left">
                                <div class="radio">
                                    <label>
                                        <input onclick="showMarkers();" type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        mostrar marcadores
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 text-left">               
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
            <div class="col-md-6">
                <div class="box box-solid">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <label>&nbsp; Filtrar zonas</label>
                                        <select  style="width: 100%" id="select_zonas" class="select2 form-control form-control-sm" multiple="multiple">
                                            @foreach($zonas as $zona)
                                            <option value="{{$zona->id}}">{{$zona->nombre}}</option>                                                    
                                            @endforeach
                                        </select> 
                                        <small class="form-text text-muted"><strong>Información:</strong> seleccione una o más zonas para filtrar en la lista de zonas.</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-map-o" aria-hidden="true"></i>
                        <h3 class="box-title">Registros de zonas</h3>
                    </div>
                    <div class="box-body" style="width:auto;height:440px; overflow: auto;">
                        @include('partes.msj_acciones')
                        <div class="box-group" id="accordion">
                            @foreach($zonas as $zona)
                            <div id="div{{$zona->id}}" class="panel box li_zona" style="border-top-color:  {{$zona->color}}">
                                <div class="box-header with-border">
                                    <div class="col-sm-6">                         
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion" onclick="instanciar_zona('{{$zona->id}}', '{{$zona->nombre}}', '{{$zona->color}}',  {{$zona->coordenadas}});" href="#{{$zona->id}}" aria-expanded="false">
                                                {{$zona->nombre}}
                                            </a>
                                        </h4>                                       
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-right">
                                            <a onclick="completar_campos({{$zona}})" title="Editar este registro" class="btn btn-social-icon btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                            <a onclick="abrir_modal_borrar({{$zona->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                      
                                        </div>                              
                                    </div> 
                                </div>
                                <div id="{{$zona->id}}" class="panel-collapse collapse" aria-expanded="true">
                                    <div class="box-body">
                                        <td>{{  $zona->descripcion }}. El registro fue creado <strong>{{  $zona->created_at->diffForHumans() }}.</strong></td>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                    </div>
                    <div class="box-footer text-black">
                        <div class="row">                            
                            <div class="col-sm-12">
                                <small class="form-text text-muted"><strong>Información:</strong> para visualizar una zona haga un click en el nombre de la misma.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h3 class="box-title">Vértices</h3>
                    </div>
                    <div class="box-body">
                        <div id="lista" style="width:auto;height:550px; overflow: auto;">
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@include('zonas.formulario.editar')
@include('zonas.formulario.confirmar')

@endsection

@section('script')
<script src="{{ asset('js/mostrar_zona.js') }}"></script>
<script>
    var zoom = parseInt('{{ Auth::user()->configuracion->zoom }}');
    var center = {lat: parseFloat('{{ Auth::user()->configuracion->latitud }}'), lng: parseFloat('{{ Auth::user()->configuracion->longitud }}')};
</script>
@endsection
