@extends('layouts.app')

@section('content')

<section class="top">

<div class="container">
    <div class="row">
        
        <div class="">
            @include('layouts._messages')
        </div>

    </div>
</div>
    
</section>

<section class="center">

				<div class="container">
					
					<div class="row title-p">
						
						<div class="col-md-6">

						@if (Auth::user()->extension != null)
						   
							<img src="{{ url('storage/imgs/')}}/{{Auth::user()->id}}.{{Auth::user()->extension}}" alt="" class="img-responsive">

						@else
						    
						   <img src="img/profile.png" alt="">

						@endif
						
							<div class="">
								<a href="#" class="btn btn-warning center-block no-float" title="">CONTACTAR</a>
							</div>

						</div>

						<div class="col-md-3 text-capitalize">
							
							<h2>Datos Personales</h2>

							<p>Name {{ Auth::user()->name }}</p>
							<p>State: {{ Auth::user()->state }}</p>

						</div>


						<div class="col-md-3 text-capitalize">
							
						<h2>Datos Del Auto</h2>

						<p>Auto: FIAT</p>
						<p>Modelo: Palio</p>
						<p>Estado: Optimo</p>

						</div>

					</div>

					<div class="row">
						
						<div class="row">
							<h2>Descripcion:</h2>
							
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas quasi labore officia, illo fugit fugiat in sunt nam dignissimos. Recusandae rem sapiente eveniet enim impedit, soluta nihil odit, nulla deserunt. 
							
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio suscipit in consequatur incidunt quidem id illum, voluptate eum delectus nulla vel praesentium quae rem harum debitis, obcaecati tempora distinctio nobis. </p>
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