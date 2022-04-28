@extends('adminlte::layouts.app')

@section('htmlheader_title')
Productos
@endsection

@section('main-content')

<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Productos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
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
                        <table id="tablaProductos" class="table table-bordered table-hover">
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
                                <th>Estado</th>
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
                                        <td><?php if($prod->estado == 0) echo "Activo"; else echo "Inactivo"; ?></td>
                                        <td></td>
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

