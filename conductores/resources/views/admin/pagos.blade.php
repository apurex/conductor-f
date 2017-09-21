@extends('layouts.app_admin')

@section('content')

	<section>
		
	</section>

	<section class="center">
		
		<div class="container">
			<div class="row">
				
				<h1>Total de Pagos</h1>
				<hr>

				<table class="table table-striped">
					
					<tr>
						
						<td>ID</td>
						<td>Nombre</td>
						
						<td>Ultimo Pago</td>
						<td>Plan</td>
						<td>Dias restantes</td>
						<td>Fecha de Venc.</td>
						<td>Estado</td>
						<td colspan="2">Acciones</td>

					</tr>

					
						
						@foreach ($payouts as $payout)
						<tr>
						<td> {{ $payout->id }} </td>
						<td> {{ $payout->name }} {{ $payout->last_name }} </td>
						
						<td> {{ $payout->last_payout }} </td>
						<td> {{ $payout->num_ref }} </td>
						<td> {{ $payout->left_days }} </td>
						<td> {{ $payout->exp_date }} </td>
						@if($payout->active == 0)
							<td>Sin Confirmar</td>
						@else 
							<td>Confirmado</td>
						@endif
						<td> 
						<form action="{{ route('confirm_pago') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <input type="hidden" name="id" value="{{ $payout->id }}">
                <button type="submit" class='btn btn-primary'>Confirmar Pago</button>
            </form> </td>
						<td> <a class="btn btn-danger" href="#" role="button">ELIMINAR</a> </td>
						</tr>
						@endforeach

				</table>

				

			</div>
		</div>

	</section>

	<section>
		


	</section>

@endsection