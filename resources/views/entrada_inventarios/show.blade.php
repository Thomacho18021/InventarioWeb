@extends('adminlte::layouts.app')

@section('htmlheader_title')
Detalle Entrada Inventario
@endsection

@section('contentheader_title')
Detalle de entrada inventario
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/entradainventario') }}"> Entrada Inventario</a></li>
    <li class="active">Detalle</li>
</ol>
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Detalle Entrada Inventario</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="codigo">Descripción:</label>
                                <p>{{ $entrada->descripcion }}</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="codigo">Estado:</label>
                                @if($entrada->estado == 0)
                                <span class="badge badge-success">Activo</span>
                                @elseif($entrada->estado == 1)
                                <span class="badge badge-warning">Anulada</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover">
                            <thead style="background-color: #A9D0F5">
                                <th>Artículo</th>
                                <th>Cantidad</th>
                            </thead>
                            <tbody>
                                @foreach($detalles as $det)
                                <tr>
                                    <td>{{ $det->articulo }}</td>
                                    <td>{{ $det->cantidad }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="{{ url('/entradainventario') }}"><button type="button" class="btn btn-default">Cancelar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
