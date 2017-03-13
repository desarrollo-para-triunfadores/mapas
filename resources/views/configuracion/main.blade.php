@extends('partes.index')

@section('title')
Zonas registradas
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Configuraciones
            <small>generales</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href="#"><i class="fa fa-gear"></i> Configuración</a></li>                 
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <br>
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-map" aria-hidden="true"></i>
                        <h3 class="box-title">Centro del mapa</h3>
                    </div>
                    <div class="box-body">
                        <div id="map" style="width:auto;height:432px;">
                        </div>
                    </div>  
                    <div class="box-footer text-black">
                        <div class="row">                           
                            <div class="col-sm-12">
                                <small class="form-text text-muted"><strong>Información:</strong> mueva el marcador y ajuste el nivel del zoom para que esta sea la vista por defecto en todos los mapas del sistema.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i>
                        <h3 class="box-title"> Colores del sistema</h3>
                    </div>
                    <div class="box-body ">                            
                        <ul class="list-unstyled clearfix">
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px; background: #367fa9;"></span>
                                        <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin">Azul</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                        <span style="display:block; width: 20%; float: left; height: 17px; background: #fefefe;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 17px; background: #fefefe;"></span>
                                    </div><div><span style="display:block; width: 20%; float: left; height: 40px; background: #222;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div></a>
                                <p class="text-center no-margin">Blanco</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div><span style="display:block; width: 20%; float: left; height: 17px;" class="bg-purple-active"></span><span class="bg-purple" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin">Púrpura</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-green-active"></span>
                                        <span class="bg-green" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin">Verde</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-red-active"></span>
                                        <span class="bg-red" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin">Rojo</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-yellow-active"></span>
                                        <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin">Amarillo</p></li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px; background: #367fa9;"></span>
                                        <span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Azul Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                        <span style="display:block; width: 20%; float: left; height: 17px; background: #fefefe;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 17px; background: #fefefe;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Blanco Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-purple-active"></span>
                                        <span class="bg-purple" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Púrpura Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-green-active"></span>
                                        <span class="bg-green" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Verde Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover"><div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-red-active"></span>
                                        <span class="bg-red" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px">Rojo Light</p>
                            </li>
                            <li style="float:left; width: 33.33333%; padding: 5px;">
                                <a href="javascript:void(0);" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 17px;" class="bg-yellow-active"></span>
                                        <span class="bg-yellow" style="display:block; width: 80%; float: left; height: 17px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 40px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 40px; background: #f4f5f7;"></span>
                                    </div>
                                </a>
                                <p class="text-center no-margin" style="font-size: 12px;">Amarillo Light</p>
                            </li>
                        </ul>  
                    </div> 
                    <div class="box-footer text-black">
                        <div class="row">                           
                            <div class="col-sm-12">
                                <small class="form-text text-muted"><strong>Información:</strong> haga click sobre el esquema de color que le guste, el mismo quedará asociado únicamente al usuario logueado.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="{{ asset('js/configuracion.js') }}"></script>
<script>
var zoom = parseInt('{{ Auth::user()->configuracion->zoom }}');
var center = {lat: parseFloat('{{ Auth::user()->configuracion->latitud }}'), lng: parseFloat('{{ Auth::user()->configuracion->longitud }}')};
</script>
@endsection
