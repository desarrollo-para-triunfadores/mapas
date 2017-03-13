@extends('partes.index')

@section('title')
Preventistas registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Preventistas
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Preventistas</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-9">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <label>&nbsp;Filtrar preventistas</label>
                                        <select  id="select_preventista" style="width: 100%" class="select2 form-control form-control-sm" multiple="multiple">
                                            @foreach($preventistas as $preventista)
                                            <option value="{{$preventista->id}}">{{$preventista->apellido}} {{$preventista->nombre}}</option>                                                    
                                            @endforeach
                                        </select> 
                                        <small class="form-text text-muted"><strong>Información:</strong> seleccione uno o más preventistas para filtrarlos en la lista de preventistas.</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <label>&nbsp;Nuevo</label>
                                        <button title="Registrar un usuario" type="button" id="boton-modal-crear" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-crear">
                                            <i class="fa fa-plus-circle"></i> &nbsp;registrar preventista
                                        </button>
                                        <small class="form-text text-muted">&nbsp;</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
               
                <div class="col-md-12">                    
                    @include('partes.msj_acciones')                    
                </div>
                @foreach($preventistas as $preventista)
                <div id="div{{$preventista->id}}" class="col-md-4 li_preventista">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header" style="background-color:{{$preventista->color}};">
                            <div class="widget-user-image">
                                @if ($preventista->imagen === "sin imagen")                                           
                                <img style="width:64px;height:64px" class="img-circle" src="{{ asset('imagenes/preventistas/sin-logo.png') }}" alt="User Avatar">                                
                                @else
                                <img  style="width:64px;height:64px" class="img-circle" src="{{ asset('imagenes/preventistas/' . $preventista->imagen) }}" alt="User Avatar">                                
                                @endif   
                            </div>  
                            <h3 class="widget-user-username"><strong>{{$preventista->apellido}} {{$preventista->nombre}}</strong></h3>
                            <h5 class="widget-user-desc">Registrado {{ $preventista->created_at->diffForHumans() }}</h5>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#"><strong>Código de preventista:</strong> {{$preventista->codigo}}</a></li>
                                <li><a href="#"><strong>DNI:</strong> {{$preventista->dni}}</a></li>
                                <li><a href="#"><strong>Cantidad de recorridos:</strong> <span class="pull-right badge" style="background-color:{{$preventista->color}};">{{$preventista->rutas->count()}}</span></a></li>                                                                                        
                            </ul>
                        </div>
                        <div class="box-footer">
                            <span class="text-left"><strong>&nbsp;&nbsp;&nbsp;Acciones:</strong></span>
                            <div class="pull-right box-tools">                                
                                <button type="button" class="btn btn-warning btn-sm" onclick="completar_campos({{$preventista}})" title="Editar este registro">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="abrir_modal_borrar({{$preventista->id}})" title="Eliminar este registro">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@include('preventistas.formulario.create')
@include('preventistas.formulario.editar')
@include('preventistas.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/preventistas.js') }}"></script>
@endsection
