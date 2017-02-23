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
                            <div class="col-sm-12">
                                <strong id="fecha_creacion">
                                    <br>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Registros</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-group" id="accordion">
                            @foreach($zonas as $zona)
                            <div class="panel box" style="border-top-color:  {{$zona->color}}">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" onclick="instanciar_zona('{{$zona->id}}', '{{$zona->nombre}}', '{{$zona->color}}', '{{$zona->created_at->diffForHumans()}}', {{$zona->coordenadas}});" href="#{{$zona->id}}" aria-expanded="false">
                                            {{$zona->nombre}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$zona->id}}" class="panel-collapse collapse" aria-expanded="true">
                                    <div class="box-body">
                                        <td>{{  $zona->descripcion }}</td>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
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
                        <div id="lista" style="width:auto;height:432px; overflow: auto;">
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="{{ asset('js/mostrar_zona.js') }}"></script>
@endsection
