@extends('partes.index')

@section('title')
Preventistas registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Celulares
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Celulares</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <h3 class="box-title"> Registros</h3>
                    </div>
                    <div class="box-body ">                            
                        @include('partes.msj_acciones')
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Fecha alta</th>
                                    <th>Acciones</th>               
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Serial</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Fecha alta</th>
                                    <th>Acciones</th>       
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($celulares as $celular)
                                <tr>
                                    <td>{{$celular->serial}}</td>
                                    <td>{{$celular->marca}}</td>
                                    <td>{{$celular->modelo}}</td>
                                    <td>{{$celular->created_at->format('d/m/Y')}}</td>
                                    <td>  
                                        <a onclick="completar_campos({{$celular}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$celular->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un celular" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar celular
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('celulares.formulario.create')
@include('celulares.formulario.editar')
@include('celulares.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/celulares.js') }}"></script>
@endsection
