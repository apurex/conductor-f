@extends('layouts.app')

@section('content')

<div class="container">

<div class="row">

	<div class="col-md-8">

	    <h2>Creating Pay</h2>
	    @include('payout._form', ['payout' => $payout])

	</div>

	<div class="col-md-4">
		
		<h2>Cuentas</h2>

		<div>
			<div class="items-img">
				<img src="../img/bbva.png" alt="" class="img-responsive">
			</div>
			

			<p>Datos</p>
		</div>

		<div>

			<div class="items-img">
				<img src="../img/mercantil.jpg" alt="" class="img-responsive">
			</div>
			
			<p>Datos</p>
		</div>

		<div>

			<div class="items-img">
				<img src="../img/bdv.png" alt="" class="img-responsive">
			</div>
			
			<p>Datos</p>
		</div>

	</div>

</div>

</div>

@endsection