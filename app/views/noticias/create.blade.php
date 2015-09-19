@extends('layout.main')
@section('title')
Nueva Noticia Pumas Ruiz F.C.
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
			<h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Nueva Noticia</h2>
		</div>
		<div class="panel-body">
			{{ Form::open(array('route' => 'admin.noticia.store', 'files' => true)) }}
				@include('noticias.form')
				<button type="submit" class="btn btn-success pull-right">Registrar</button>
				<a class="btn btn-primary" href='{{ URL::previous() }}'>Regresar</a>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop