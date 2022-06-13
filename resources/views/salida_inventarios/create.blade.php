@extends('adminlte::layouts.app')

@section('htmlheader_title')
Crear Salida Inventario
@endsection

@section('contentheader_title')
Crear Salida inventario
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/salidainventario') }}">Salida Inventario</a></li>
    <li class="active">Crear</li>
</ol>
@endsection

@section('main-content')
<div class="container-fluid spark-screen">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Salida Inventario</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            {!! Form::open(['method' => 'POST', 'route' => ['guardar_nueva_salida_inventario'], 'autocomplete' => 'off', 'class' => 'form-horizontal']) !!}
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <label for="descripcion" class="control-label">Descripción*</label>
                                    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Descripción', 'maxlength' => '191']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('descripcion'))
                                    <p class="help-block">
                                        {{ $errors->first('descripcion') }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row fondo_agregar_productos">
                                        <div class="col-sm-4 margen_agregar_productos">
                                            <label>Artículo <span style="color: red;">(*Seleccione)</span></label>
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <select class="form-control select2" name="pid_articulo" id="pid_articulo" data-live-search="true">
                                                        <option value="">[Seleccione]</option>
                                                        @foreach($articulos as $articulo)
                                                        <option value="{{ $articulo->id }}_{{ $articulo->stock }}" data-subtext="Stock: {{ $articulo->stock }}">{{ $articulo->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 margen_agregar_productos">
                                            <label for="pstock">Stock</label>
                                            <input type="number" name="pstock" id="pstock" class="form-control" readonly>
                                        </div>
                                        <div class="col-sm-3 margen_agregar_productos">
                                            <label for="pcantidad" title="Cantidad">Cantidad <span style="color: red;">(*Ingrese)</span></label>
                                            <input type="number" name="pcantidad" id="pcantidad" value="0" step="0.01" min="0" class="form-control">
                                        </div>
                                        <div class="col-sm-2 margen_agregar_productos">
                                            <br>
                                            <button type="button" class="btn btn-success form-control btnagregar" id="bt_add" title="Agregar producto al inventario">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="table-responsive">
                                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                                    <thead style="background-color: #A9D0F5">
                                                        <th>Opciones</th>
                                                        <th>Producto</th>
                                                        <th style="width:20%">Cantidad</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1" name="guardar" id="guardar">
                                        Guardar
                                    </button>
                                    <a href="{{ url('/salidainventario') }}">
                                        <button type="button" class="btn btn-secondary waves-effect">
                                            Cancelar
                                        </button>
                                    </a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extrasjavascript')
<script>
    $(document).ready(function() {
        $('#bt_add').click(function() {
            agregar();
        })
        limpiar();
    });

    //cada vez que se cambie el articulo se ejecuta
    $('#pid_articulo').change(mostrarValores);

    function mostrarValores() {
        datosArticulo = document.getElementById('pid_articulo').value.split('_');
        $('#pstock').val(datosArticulo[1]);
    }

    //variables
    var cont = 0;
    $('#guardar').hide();

    function agregar() {
        datosArticulo = document.getElementById('pid_articulo').value.split('_');
        id_articulo = datosArticulo[0];
        articulo = $('#pid_articulo option:selected').text();
        cantidad = $('#pcantidad').val();
        stock = $('#pstock').val();

        if (id_articulo != "" && cantidad != "" && cantidad > 0) {
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button class="btn btn-sm btn-danger" type"button" onclick="eliminar(' + cont + ');">X</button></td><td><input type="hidden" name="fila_articulo[' + cont + ']" id="fila_articulo[' + cont + ']" value="' + cont + '"><input type="hidden" name="articulo[' + cont + ']" id="articulo" value="' + id_articulo + '">' + articulo + '</td><td><input type="hidden" name="cantidad[' + cont + ']" value="' + cantidad + '"><input type="text" value="' + cantidad + '" class="form-control" disabled></td></tr>';
            //aumentar el contador
            cont++;
            //limpiar los controles
            limpiar();

            evaluar();

            //agregar la fila a la tabla
            $('#detalles').append(fila);

            cantidad = 0;
            stock = 0;
        } else {
            alert('Error al ingresar el producto, revise los datos del articulo');
        }
    }

    function limpiar() {
        $('#pcantidad').val('');
    }

    function evaluar() {
        if (cont > 0) {
            $('#guardar').show();
        } else {
            $('#guardar').hide();
        }
    }

    function eliminar(index) {
        $('#fila' + index).remove();
    }
</script>
@endsection