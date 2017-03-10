@extends('partes.index')

@section('title')
Zonas registradas
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Recorridos
            <small>del día</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-road"></i> Recorridos</a></li>          
            <li class="active">Recorridos del día</li>
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
                            <div class="col-sm-2">
                                <div class="radio">
                                    <label>
                                        <input onclick="showMarkers();" type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                        mostrar marcadores
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2">               
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
                <div class="box box-solid">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <label>&nbsp;Filtrar zonas</label>
                                        <select style="width: 100%" id="select_zonas" class="select2 form-control form-control-sm" multiple="multiple">
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
                    <div class="box-body" style="width:auto;height:490px; overflow: auto;">
                        <div class="box-group" id="accordion">
                            @foreach($zonas as $zona)
                            <div id="div{{$zona->id}}" class="panel box li_zona" style="border-top-color:  {{$zona->color}}">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" onclick="instanciar_zona('{{$zona->id}}', '{{$zona->nombre}}', '{{$zona->color}}', '{{$zona->created_at->diffForHumans()}}', {{$zona->coordenadas}});" href="#{{$zona->id}}" aria-expanded="false">
                                            {{$zona->nombre}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$zona->id}}" class="panel-collapse collapse" aria-expanded="true">
                                    <div class="box-body">                                        
                                        <td>{{$zona->descripcion}}</td>                                   
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
            <div class="col-md-8">

                <div class="box box-solid">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <label>&nbsp;Filtrar preventistas</label>
                                        <select style="width: 100%" id="select_preventista" class="select2 form-control form-control-sm" multiple="multiple">
                                            @foreach($rutas as $ruta)
                                            <option value="{{$ruta->preventista->dni}}">{{$ruta->preventista->apellido}} {{$ruta->preventista->nombre}}</option>                                                    
                                            @endforeach
                                        </select> 
                                        <small class="form-text text-muted"><strong>Información:</strong> seleccione uno o más preventistas para filtrarlos en la lista de recorridos.</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="box box-default" style="width:auto;height:530px;">
                    <div class="box-header with-border">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <h3 class="box-title">Recorridos del día</h3>
                    </div>
                    <div class="box-body" style="background-color:#fafafa;">                       
                        <div id="lista" style="width:auto;height:530px; overflow: auto;">
                            @foreach($rutas as $ruta)
                            <div id="{{$ruta->preventista->dni}}" class="box box-widget widget-user-2">                   
                                <div class="widget-user-header" style="background-color:{{$ruta->preventista->color}};">
                                    <div class="widget-user-image">
                                        @if ($ruta->preventista->imagen === "sin imagen")                                           
                                        <div class="form-group">                                                            
                                            <img style="width:64px;height:64px" class="img-circle" src="{{ asset('imagenes/preventistas/sin-logo.png') }}" alt="User Avatar">                                
                                        </div>  
                                        @else
                                        <img style="width:64px;height:64px" class="img-circle" src="{{ asset('imagenes/preventistas/' . $ruta->preventista->imagen) }}" alt="User Avatar">                                
                                        @endif   
                                    </div>                             
                                    <h3 class="widget-user-username"><strong>{{$ruta->preventista->apellido}} {{$ruta->preventista->nombre}}</strong></h3>
                                    <h5 class="widget-user-desc">Preventista. DNI: {{$ruta->preventista->dni}}</h5>
                                </div>
                                <div class="box-footer no-padding">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li id="{{'tab_' . $ruta->id.'_1'}}" onclick="color_solapa('1', '{{$ruta->id}}' ,'{{$ruta->preventista->color}}');" class="active" style=" border-top-color: {{$ruta->preventista->color}}"><a href="{{'#panel_' . $ruta->id.'_1'}}" data-toggle="tab" aria-expanded="false">Datos generales</a></li>
                                            <li id="{{'tab_' . $ruta->id.'_2'}}" onclick="color_solapa('2', '{{$ruta->id}}' ,'{{$ruta->preventista->color}}');" class=""><a href="{{'#panel_' . $ruta->id.'_2'}}" data-toggle="tab" aria-expanded="true">Marcadores</a></li>                                           
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="{{'panel_' . $ruta->id.'_1'}}">
                                                <ul class="nav nav-stacked">
                                                    <li>
                                                        <a>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input onchange="instanciar_recorrido('{{$ruta->preventista->color}}', '{{$ruta->id}}', $(this).prop('checked') , {{$ruta->coordenadas}});" type="checkbox">  
                                                                    <strong>Visualizar recorrido</strong>
                                                                </label>
                                                            </div> 
                                                        </a>
                                                    </li>
                                                    <li><a><strong>Celular:</strong> {{$ruta->celular->marca}} {{$ruta->celular->modelo}} - serial: {{$ruta->celular->serial}}</a></li>
                                                    <li><a><strong>Fecha y hora de salida:</strong> {{$ruta->fecha_inicio}} - {{$ruta->hora_inicio}}</a></li>
                                                    <li><a><strong>Fecha y hora de vuelta:</strong> {{$ruta->fecha_fin}} - {{$ruta->hora_fin}}</a></li>
                                                    <li><a><strong>Distancia recorrida:</strong> {{number_format($ruta->distancia_ruta(),3, ',', '.')}} km</a></li>
                                                </ul>
                                            </div>
                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="{{'panel_' . $ruta->id.'_2'}}">
                                                <ul class="timeline">                                                                                                                                                                                                          
                                                    <li>
                                                        <i class="fa fa-flag-checkered" style="background-color:{{$ruta->preventista->color}};"></i>
                                                        <div class="timeline-item">          
                                                            <span class="time"><i class="fa fa-clock-o"></i> {{$ruta->hora_inicio}}</span>
                                                            <h3 class="timeline-header">Inicio del recorrido</h3>
                                                            <div class="timeline-body">
                                                                <ul>
                                                                    <li>
                                                                        <strong>Fecha:</strong> {{$ruta->fecha_inicio}}
                                                                    </li>
                                                                    <li>
                                                                        <strong>Hora:</strong> {{$ruta->hora_inicio}}
                                                                    </li>
                                                                </ul>
                                                            </div>                                                        
                                                        </div>
                                                    </li>  

                                                    @foreach($ruta->coordenadas as $coordenada)
                                                    <li>
                                                        <i class="fa fa-map-marker" style="background-color:{{$ruta->preventista->color}};"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fa fa-clock-o"></i> {{$coordenada->hora}}</span>
                                                            <h3 class="timeline-header">Ping del celular</h3>
                                                            <div class="timeline-body">
                                                                <ul>
                                                                    <li>
                                                                        <strong>Latitud:</strong> {{$coordenada->latitud}}
                                                                    </li>
                                                                    <li>
                                                                        <strong>Longitud:</strong> {{$coordenada->longitud}}
                                                                    </li>
                                                                </ul>
                                                            </div>                                                        
                                                        </div>
                                                    </li>    
                                                    @endforeach
                                                    <li>
                                                        <i class="fa fa-flag-checkered" style="background-color:{{$ruta->preventista->color}};"></i>
                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fa fa-clock-o"></i> {{$ruta->hora_fin}}</span>
                                                            <h3 class="timeline-header">Fin del recorrido</h3>
                                                            <div class="timeline-body">
                                                                <ul>
                                                                    <li>
                                                                        <strong>Fecha:</strong> {{$ruta->fecha_fin}}
                                                                    </li>
                                                                    <li>
                                                                        <strong>Hora:</strong> {{$ruta->hora_fin}}
                                                                    </li>
                                                                </ul>
                                                            </div>                                                        
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-clock-o bg-gray"></i>
                                                    </li>
                                                </ul>
                                            </div>                                          
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="{{ asset('js/recorridos.js') }}"></script>
@endsection
