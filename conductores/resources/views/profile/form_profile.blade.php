<div class="form-group">
	
	{!! Form::label('name'), 'Nombre' !!}
	{!! Form::text('name'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
	
	{!! Form::label('last_name'), 'Apellido' !!}
	{!! Form::text('last_name'), null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
	
	{!! Form::submit(ENVIAR, ['class' => 'btn btn-primary'] !!}

</div>