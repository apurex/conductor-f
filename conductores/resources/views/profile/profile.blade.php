@extends('layouts.app')

@section('content')

        <div class="">
            @include('layouts._messages')
        </div>

<section>

				<div class="container">
					
					<div class="row title-p">
						
						<div class="col-md-4">

						@if (Auth::user()->extension != null)
						   
							<img src="{{ url('storage/imgs/')}}/{{Auth::user()->id}}.{{Auth::user()->extension}}" alt="" class="img-responsive">

						@else
						    
						   <img src="img/profile.png" alt="">

						@endif
						

						</div>

						<div class="col-md-4 text-capitalize">
							
							<h2>Datos Personales</h2>

							<div>Nombre: {{ Auth::user()->name }}</div>
							<div>Estado: {{ Auth::user()->state }}</div>
							
						</div>

					@if(Auth::user()->roles==1)
						@php
						$conduct = App\Conduct::where('user_id',Auth::user()->id)->first();
						@endphp
						<div class="col-md-4 text-capitalize">
							
						<h2>Datos Del Auto</h2>

						<p>Auto: {{$conduct->car_m}}</p>
						<p>Modelo: {{$conduct->car_ma}}</p>
						<p>Estado: {{$conduct->car_state}}</p>
						<div>Lema: {{$conduct->short}}</div>
						</div>
					@endif

					</div>
@if(Auth::user()->roles==1)
	<div class="row">
		
		<div class="row">
			<h2>Descripcion:</h2>
			
			<p>{{ $conduct->body }} </p>
		</div>

	<div class="row">

	<div class="text-center">
		
		<h2>Fotos del vehiculo <small> <strong> Click a la imagen para Agrandar</strong></small> </h2>

	</div>
		
		<div class="col-md-3">
			
			<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="img/auto.jpg" alt="" class="img-responsive img-thumbnail"></a>
		</div>

		<div class="col-md-3">
			
			<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car2"><img src="img/car2.jpg" alt="" class="img-responsive img-thumbnail"></a>

		</div>

		<div class="col-md-3">
			
			<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car3"><img src="img/car3.jpg" alt="" class="img-responsive img-thumbnail"></a>

		</div>

		<div class="col-md-3">
			
			<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car4"><img src="img/car2.jpg" alt="" class="img-responsive img-thumbnail"></a>

		</div>

	</div>

	</div>


<!-- aqui los comentarios si es un conductor -->
@php
$comments = App\Comment::where('user_id_where_comment',Auth::user()->id)->get();
@endphp
<div class="row">
	<h2>Comentarios</h2>
	@foreach($comments as $comment)
	<div class="col-md-8">
		<p><b>{{ $comment->name }} {{ $comment->last_name }}</b> <small>{{ $comment->created_at->diffForHumans() }}</small> </p>
        <p>{{ $comment->content }}</p>
	</div>
	@endforeach
</div>
@endif
				</div>
	
</section>

<!-- Imagenes de los Carros. -->

<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="img/auto.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

<div class="modal fade car2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="img/car2.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

<div class="modal fade car3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="img/car3.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

<div class="modal fade car4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="img/auto.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

	<section class="bottom">
    <div class="container">
        <div class="row">
            
            <div class="">
                <p> &nbsp; </p>
            </div>

        </div>
    </div>
        
    </section>

@endsection