@extends('layouts.app_admin')

@section('content')

	<section>
		
	</section>

	<section class="center">
		
		<div class="container">
			<div class="row">
				
				<h1>Total de Usuarios</h1>
				<hr>

				<table class="table table-striped">
					
					<tr>
						
						<td>ID</td>
						<td>Correo</td>
						<td>Nombre</td>
						<td>Estado</td>
						<td colspan="2">Acciones</td>

					</tr>

					
						
						@foreach ($users as $user)
						<tr>
						<td> {{ $user->id }} </td>
						<td> {{ $user->email }} </td>
						<td> {{ $user->name }} </td>
						<td> {{ $user->state }} </td>
						<td> <a class="btn btn-primary" href="#" role="button">GESTIONAR</a> </td>
						<td> <a class="btn btn-danger" href="#" role="button">ELIMINAR</a> </td>
						</tr>
						@endforeach

				</table>

				{{ $users->links() }}

			</div>
		</div>

	</section>

	<section>
		


	</section>

@endsection