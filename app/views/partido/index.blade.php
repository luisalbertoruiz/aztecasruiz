@extends('layout.main')
@section('title')
Partidos Aztecas Ruiz F.C.
@stop
@section('header')
	@include('layout.header')
@stop
@section('navbar')
	@include('layout.navbaradmin')
@stop
@section('content')
<div class="col-xs-12 col-sm-12 col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h2 class="panel-title"><span class="glyphicon glyphicon-play"></span> Partidos</h2>
			{{ HTML::link(URL::to('/admin/partido/create'), '&nbsp;Nuevo', array('class' => 'btn btn-primary btn-sm pull-right glyphicon glyphicon-plus pull-right','style'=>'margin:-25px -10px 0 0')) }}
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>vs Equipo</th>
							<th>Dia</th>
							<th>Horario</th>
							<th>Cancha</th>
							<th>Acciones</th>

						</tr>
					</thead>
					<tbody>
						@foreach($partidos as $partido)
						<tr>
							<td>{{ $partido->equipo->nombre }}</td>
							<td>{{ $partido->dia }}</td>
							<td>{{ date('h:i a',strtotime($partido->horario)) }}
							<td>{{ $partido->cancha->nombre }}</td>
							<td>
							{{ link_to_route('admin.partido.show','',$partido->id, array('class' => 'btn btn-success btn-xs glyphicon glyphicon-eye-open')) }}
							{{ link_to_route('admin.partido.edit','',$partido->id, array('class' => 'btn btn-warning btn-xs glyphicon glyphicon-pencil')) }}
							<a href="javascript:;" onclick="eliminaRegistro('{{URL::to('/admin/partido/'.$partido->id)}}','{{$partido->id}}');" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="eliminar"><i class="glyphicon glyphicon-trash"></i></a>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('admin.partido.destroy', $partido->id),'id'=>$partido->id)) }}{{ Form::close() }}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<br><br>
			</div>
		</div>
	</div>
</div>
<div id="dialog" title="¿Deseas eliminar el registro?">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span> Se eliminara permanentemente</p>
</div>
@stop
@section('css')
{{ HTML::style('css/dataTables.bs.css') }}
{{ HTML::style('css/toastr.css') }}
@stop
@section('js')
{{ HTML::script('js/dataTables.js') }}
{{ HTML::script('js/dataTables.bs.js') }}
{{ HTML::script('js/toastr.js') }}
@stop
@section('script')
<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$('table').DataTable({
			"lengthMenu": [[5, 10, -1],[5, 10, 'Todo']],
			"order": [[ 1, "desc" ]]
		});
		$("#dialog").dialog({
			resizable: false,
			height:170,
			modal: true,
			autoOpen: false,
			show: {
			effect: "bounce",
			duration: 500
			},
			hide: {
			effect: "fade",
			duration: 50
			}
		});
	});
function eliminaRegistro (url,id) {
	$( "#dialog" ).dialog( "open" );
	$( "#dialog" ).dialog({
		buttons: {
			"No": function() {
				$( this ).dialog( "close" );

			},
			"Si": function() {
				$( this ).dialog( "close" );
				$('#'+id).submit();
			}
		}
	});
}
</script>
@stop