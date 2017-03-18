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
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color:{{$preventista->color}};">
                            <h3 class="widget-user-username"><b>{{$preventista->apellido}} {{$preventista->nombre}}</b></h3>
                            <h5 class="widget-user-desc">Registrado {{ $preventista->created_at->diffForHumans() }}</h5>
                        </div>
                        <div class="widget-user-image">
                           @if ($preventista->imagen === "sin imagen")                                           
                                <img style="width:90px;height:90px" class="img-circle" src="{{ asset('imagenes/preventistas/sin-logo.png') }}" alt="User Avatar">                                
                                @else
                                <img  style="width:90px;height:90px" class="img-circle" src="{{ asset('imagenes/preventistas/' . $preventista->imagen) }}" alt="User Avatar">                                
                                @endif   
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Código de preventista</h5>
                                        <span class=" badge" style="background-color:{{$preventista->color}};">{{$preventista->codigo}}</span>
                                      
                                    </div>
                                </div>
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">DNI</h5>
                                        <span class=" badge" style="background-color:{{$preventista->color}};">{{$preventista->dni}}</span>
                                    
                                    </div>
                                </div>                                
                            </div>                               
                            <hr>                            
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Cantidad de recorridos</h5>
                                        <span class=" badge" style="background-color:{{$preventista->color}};">{{$preventista->rutas->count()}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 border-right">
                                    <div class="description-block text-center">                                       
                                        <a onclick="completar_campos({{$preventista}})"  title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$preventista->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                  
                                    </div>
                                </div>
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
