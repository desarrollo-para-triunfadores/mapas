@extends('partes.index')

@section('title')
Usuarios registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Usuarios
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Usuarios</li>
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
                                        <label>&nbsp;Filtrar usuarios</label>
                                        <select  style="width: 100%"id="select_usuario" class="select2 form-control form-control-sm" multiple="multiple">
                                            @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->id}}">{{$usuario->name}}</option>                                                    
                                            @endforeach
                                        </select> 
                                        <small class="form-text text-muted"><strong>Información:</strong> seleccione uno o más usuarios para filtrarlos en la lista de usuarios.</small>
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
                                            <i class="fa fa-plus-circle"></i> &nbsp;registrar usuario
                                        </button>
                                        <small class="form-text text-muted">&nbsp;</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <br>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                            <h3 class="box-title"> Registros</h3>
                        </div>
                        <div class="box-body">                            
                            @include('partes.msj_acciones')
                            <ul class="users-list clearfix">
                                @foreach($usuarios as $usuario)
                                <li class="li_user" id="{{$usuario->id}}">
                                    @if ($usuario->imagen === "sin imagen")                                                                                                                                    
                                    <img style="width:128px;height:128px" alt="User Image" class="img-circle" src="{{ asset('imagenes/usuarios/sin-logo.png') }}" alt="User Avatar">                                                               
                                    @else
                                    <img style="width:128px;height:128px" alt="User Image" class="img-circle" src="{{ asset('imagenes/usuarios/' . $usuario->imagen) }}" alt="User Avatar">                                
                                    @endif                                        
                                    <h3 class="users-list-name"> {{$usuario->name}}</h3>
                                    <h5 align="center"> {{$usuario->email}} </h5> 
                                    <div class="text-center">
                                        <a onclick="completar_campos({{$usuario}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$usuario->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </div>
                                    <span class="users-list-date">registrado {{ $usuario->created_at->diffForHumans() }}</span>
                                </li> 
                                @endforeach
                            </ul>
                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('usuarios.formulario.create')
@include('usuarios.formulario.editar')
@include('usuarios.formulario.confirmar')


@endsection
@section('script') 
<script src="{{ asset('js/usuarios.js') }}"></script>
@endsection
