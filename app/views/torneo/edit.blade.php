@extends('layout.main')
@section('title')
Editar {{ $torneo->nombre }} Aztecas Ruiz F.C.
@stop
@section('header')
	@include('layout.header')
@stop
@section('navbar')
	@include('layout.navbaradmin')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title"><span class="glyphicon glyphicon-calendar"></span> Editar Torneo {{ $torneo->nombre }}</h2>
		</div>
		<div class="panel-body">
			{{ Form::model($torneo,array('method'=>'PUT', 'route' => array('admin.torneo.update', $torneo->id))) }}
				@include('torneo.form')
				<button type="submit" class="btn btn-success pull-right">Actualizar</button>
				<a class="btn btn-primary" href='{{ URL::previous() }}'>Regresar</a>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop