@extends('adminlte::layouts.app')

@section('htmlheader_title')
Categorias
@endsection

@section('contentheader_title')
Editar categoria
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{ url('/categorias') }}">Categorias</a></li>
    <li class="active">Editar</li>
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
            <div class="col-12 col-md-12">
              {!! Form::model($categoria, ['method' => 'POST', 'route' => ['actualizar_categoria'], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                <input type="hidden" name="id_categoria" value="{{ $categoria->id }}">
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
                <div class="form-group mb-0">
                  <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                      Guardar
                    </button>
                    <a href="{{ url('/categorias') }}">
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