@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
Home
@endsection

@section('menuderecho')
<ol class="breadcrumb">
    <li class="active">Home</li>
</ol>
@endsection

@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Home</h3>
					</div>
					<div class="box-body">
						Bienvenido(a) {{ Auth::user()->name }} al Sistema Web de Inventario
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
