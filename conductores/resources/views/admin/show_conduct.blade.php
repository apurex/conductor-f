@extends('layouts.app_admin')

@section('content')

	<section>
		
	</section>

	<section class="center">
		
		<div class="container">
			<div class="row">
				
				<h1>Total de Conductores</h1>
				<hr>

				<table class="table table-striped">
					
					<tr>
						
						<td>ID</td>
						<td>Nombre</td>
						<td>Telefono</td>
						<td>Estado</td>
						<td>Perfil</td>
						<td colspan="2">Acciones</td>

					</tr>


					@foreach ($conducts as $conduct)

						<tr>

						<td> {{ $conduct->id }} </td>
						<td> {{ $conduct->name }} {{ $conduct->last_name }}</td>
						<td> {{ $conduct->phone }} </td>
						<td> {{ $conduct->state }} </td>
						<td> Inactivo</td>
						<td> <a class="btn btn-primary" href="#" role="button">GESTIONAR</a> </td>
						<td> <a class="btn btn-danger" href="#" role="button">ELIMINAR</a> </td>


						</tr>
					@endforeach
				</table>

				{{ $conducts->links() }}

			</div>
		</div>

	</section>

	<section>
		


	</section>

@endsection