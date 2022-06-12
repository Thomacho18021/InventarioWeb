@extends('adminlte::layouts.app')

@section('htmlheader_title')
Productos
@endsection

@section('contentheader_title')
Listado de productos
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Productos</li>
</ol>
@endsection

@section('main-content')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Productos</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <a href="{{ url('productos/new') }}" class="btn btn-success">Nuevo Producto</a>
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
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Stock</th>
                                <th>Stock Crítico</th>
                                <th>Fecha Registro</th>
                                <th>Ultima Actualización</th>
                                <th>Ubicación</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                <?php if($listado_productos){ foreach ($listado_productos as $prod) { ?>
                                    <tr>
                                        <td><?php echo $prod->id; ?></td>
                                        <td><?php echo $prod->codigo; ?></td>
                                        <td><?php echo $prod->nombre; ?></td>
                                        <td><?php if($prod->categoria) echo $prod->categoria->nombre; ?></td>
                                        <td><?php echo $prod->stock; ?></td>
                                        <td><?php echo $prod->stock_critico; ?></td>
                                        <td><?php echo $prod->created_at; ?></td>
                                        <td><?php echo $prod->updated_at; ?></td>
                                        <td><?php echo $prod->ubicacion; ?></td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ url('/productos/editar') }}/{{ $prod->id }}">Editar</a>
                                            <a class="btn btn-danger btn-sm" href="{{ url('/eliminar_producto') }}/{{ $prod->id }}">Eliminar</a>
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
