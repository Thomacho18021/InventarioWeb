@extends('adminlte::layouts.app')

@section('htmlheader_title')
Productos
@endsection

@section('contentheader_title')
Crear producto
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/productos') }}">Productos</a></li>
    <li class="active">Crear</li>
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
            <div class="col-12 col-md-12">
              {!! Form::open(['method' => 'POST', 'route' => ['guardar_nuevo_producto'], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group row">
                  <label for="codigo" class="col-sm-2 control-label">Código</label>
                  <div class="col-sm-10">
                    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control', 'placeholder' => 'Codigo', 'maxlength' => '191']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('codigo'))
                    <p class="help-block">
                      {{ $errors->first('codigo') }}
                    </p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombre" class="col-sm-2 control-label">Nombre*</label>
                  <div class="col-sm-10">
                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre', 'required' => '', 'maxlength' => '191']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('nombre'))
                    <p class="help-block">
                      {{ $errors->first('nombre') }}
                    </p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="id_categoria" class="col-sm-2 control-label">Categoria</label>
                  <div class="col-sm-10">
                    <select id="id_categoria" name="id_categoria" class="form-control">
                      <option value="">[Seleccione]</option>
                      @foreach($categorias as $cat)
                      <option value="{{ $cat->id }}">{{$cat -> nombre}}</option>
                      @endforeach
                    </select>
                    <p class="help-block"></p>
                    @if($errors->has('id_categoria'))
                    <p class="help-block">
                      {{ $errors->first('id_categoria') }}
                    </p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="stock" class="col-sm-2 control-label">Stock*</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.01" name="stock" id="stock" class="form-control" placeholder="Stock" maxlength="191" required>
                    <p class="help-block"></p>
                    @if($errors->has('stock'))
                    <p class="help-block">
                      {{ $errors->first('stock') }}
                    </p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="stock_critico" class="col-sm-2 control-label">Stock Critico*</label>
                  <div class="col-sm-10">
                    <input type="number" step="0.01" name="stock_critico" id="stock_critico" class="form-control" placeholder="Stock Critico" maxlength="191" required>
                    <p class="help-block"></p>
                    @if($errors->has('stock_critico'))
                    <p class="help-block">
                      {{ $errors->first('stock_critico') }}
                    </p>
                    @endif
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ubicacion" class="col-sm-2 control-label">Ubicación</label>
                  <div class="col-sm-10">
                    {!! Form::text('ubicacion', old('ubicacion'), ['class' => 'form-control', 'placeholder' => 'Ubicación']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ubicacion'))
                    <p class="help-block">
                      {{ $errors->first('ubicacion') }}
                    </p>
                    @endif
                  </div>
                </div>
                <div class="form-group mb-0">
                  <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                      Guardar
                    </button>
                    <a href="{{ url('/productos') }}">
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