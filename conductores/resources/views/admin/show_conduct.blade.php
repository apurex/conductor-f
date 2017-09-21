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
						@if($conduct->verif == 0)
							<td> Inactivo </td>
						@else 
							<td> Activo </td>
						@endif

						<td> 
						
						<form action="{{ route('verif_perfil') }}" method="POST">

			                {{ csrf_field() }}
			                {{ method_field('put') }}

			                <input type="hidden" name="id" value="{{ $conduct->id }}">
			                <button type="submit" class='btn btn-primary'>Acivar Perfil</button>
			            </form>
						
						<!-- <a class="btn btn-primary" href="#" role="button">GESTIONAR</a> --> 

						</td>
						<td> 

							<form action="{{ route('delete_conduct', ['conduct_de' => $conduct->id]) }}" method="POST">	
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="hidden" name="id" value="{{ $conduct->id }}">
								<button type="submit" class="btn btn-danger">Borrar</button>
							</form>

							<!-- <a class="btn btn-danger" href="#" role="button">ELIMINAR</a> --> 

						</td>


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