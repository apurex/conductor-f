@extends('layouts.app')

@section('content')

<section class="top">

<div class="container">
    <div class="row">
        
        <div class="">
            <p> &nbsp; </p>
        </div>

    </div>
</div>
    
</section>

<section class="center conduct_show">

				<div class="container">
					
					<div class="row title-p">
						
						<div class="col-md-4">

						@if (Auth::user()->extension != null)
						   
							<img src="{{ url('storage/imgs/')}}/{{Auth::user()->id}}.{{Auth::user()->extension}}" alt="" class="img-responsive">

						@else
						    
						   <img src="{{ url('img/')}}/profile.png" alt="">

						@endif
						
							<div class="">
								<a href="#" class="btn btn-warning center-block no-float" title="">CONTACTAR</a>
							</div>

						</div>

						<div class="col-md-4 text-capitalize">
							
							<h2>Datos Personales</h2>

							<p>Nombre: {{ $conduct->name }}</p>
							<p>Estado: {{ $conduct->state }}</p>

						</div>


						<div class="col-md-4 text-capitalize">
							
						<h2>Datos Del Auto</h2>

						<p>Auto: {{ $conduct->car_m }}</p>
						<p>Modelo: {{ $conduct->car_ma }}</p>
						<p>Estado: {{ $conduct->car_state }}</p>

						</div>

					</div>

					<div class="row">
						
						<div class="row description">
							<h2>Descripcion:</h2>
							
							<p> {{ $conduct->body }} </p>
						</div>

					<div class="row margen">

					<div class="text-center">
						
						<h2>Fotos del vehiculo <small> <strong> Click a la imagen para Agrandar</strong></small> </h2>

					</div>
						
						<div class="col-md-3">
							
							<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="{{ url('img/')}}/auto.jpg" alt="" class="img-responsive img-thumbnail"></a>
						</div>

						<div class="col-md-3">
							
							<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car2"><img src="{{ url('img/')}}/car2.jpg" alt="" class="img-responsive img-thumbnail"></a>

						</div>

						<div class="col-md-3">
							
							<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car3"><img src="{{ url('img/')}}/car3.jpg" alt="" class="img-responsive img-thumbnail"></a>

						</div>

						<div class="col-md-3">
							
							<a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car4"><img src="{{ url('img/')}}/car2.jpg" alt="" class="img-responsive img-thumbnail"></a>

						</div>

					</div>

					</div>

				</div>
	
</section>

<!-- Imagenes de los Carros. -->

<!-- Large modal -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="{{ url('img/')}}/auto.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

<div class="modal fade car2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="{{ url('img/')}}/car2.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

<div class="modal fade car3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="{{ url('img/')}}/car3.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

<div class="modal fade car4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <img src="{{ url('img/')}}/auto.jpg" alt="" class="img-responsive">
    </div>
  </div>
</div>

    
    
	<section class="bottom">
    <div class="container">
        <div class="row">
            
        @if( Auth::check() )

        <!--- Formulario de comentario -->


            @if($conduct->user_id != Auth::user()->id)
                @php
                    $comment = new App\Comment;
                    $comment->user_id_where_comment = $conduct->user_id;
                @endphp
                @include('comment._form', ['comment' => $comment])
            @endif

            @php
                // Con esto me traigo los comentarios que estan en esta pagina
                $comments = App\Comment::where("user_id_where_comment","=",$conduct->user_id)->orderBy('id','desc')->paginate(15);
            @endphp

            <hr>
        
            @include('comment.index')
            
            {{ $comments->links() }}

    @endif
            
        </div>
    </div>
        
    </section>

@endsection