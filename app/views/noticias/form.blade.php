<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('titulo')}}
		{{ Form::text('titulo', null, array('class'=>'form-control','required'=>'true'))}}<br>
		{{ Form::label('publicacion' , 'Fecha de Publicación')}}
		{{ Form::text('publicacion', null, array('class'=>'form-control datepicker','required'=>'true'))}}<br>
		{{ Form::label('imagen')}}
		{{ Form::file('imagen', null, array('class'=>'form-control','required'=>'true'))}}<br>
	</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
	<div class="form-group">
		{{ Form::label('contenido')}}
		{{ Form::textarea('contenido', null, array('class'=>'form-control','required'=>'true'))}}<br>
	</div>
</div>