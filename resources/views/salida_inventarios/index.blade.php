@extends('adminlte::layouts.app')

@section('htmlheader_title')
Salida Inventario
@endsection

@section('contentheader_title')
Listado de salidas inventarios
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Salida Inventario</li>
</ol>
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Salida Inventario</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <a href="{{ url('salidainventario/new') }}" class="btn btn-success">Nueva Salida Inventario</a>
                            </p>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable" class="table table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                <?php
                                    if($list_inventarios){
                                        foreach ($list_inventarios as $row) {
                                ?>
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->descripcion }}</td>
                                    <td>{{ $row->fecha }}</td>
                                    <td>
                                        <a href="{{ url('/') }}/salidainventario/detalle/{{ $row->id }}" title="Visualizar" class="btn btn-sm btn-info">Visualizar</a>
                                        <a href="{{ url('/') }}/salidainventario/eliminar/{{ $row->id }}" title="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('Esta seguro que desea eliminar el inventario?')">Eliminar</a>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
