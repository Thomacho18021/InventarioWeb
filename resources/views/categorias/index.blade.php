@extends('adminlte::layouts.app')

@section('htmlheader_title')
Categorias
@endsection

@section('contentheader_title')
Listado de categorias
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categorias</li>
</ol>
@endsection

@section('main-content')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Categorias</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <a href="{{ url('categorias/new') }}" class="btn btn-success">Nueva Categoria</a>
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
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                <?php if($listado_categorias){ foreach ($listado_categorias as $cat) { ?>
                                    <tr>
                                        <td><?php echo $cat->id; ?></td>
                                        <td><?php echo $cat->nombre; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/categorias/editar') }}/{{ $cat->id }}">Editar</a>
                                            <a class="btn btn-danger btn-sm" href="{{ url('/eliminar_categoria') }}/{{ $cat->id }}">Eliminar</a>
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
