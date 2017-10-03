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

<section class="center">
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Completar Perfil</div>
	
	                <div class="panel-body">
	
	                @if(count($errors) > 0)
						
						<div class="alert alert-danger">
							
							@foreach($errors->all() as $error)
	
							<li>{{ $error }}</li>
	
							@endforeach
	
						</div>
	
	                @endif
	                    
	                    <div class="">
				            @include('layouts._messages')
				        </div>

				        @include('conductor._edit')

						<!-- <form class="form-horizontal" action="{{ Route('conduct_store')}}" method="POST">
	
						{{ csrf_field() }}
	
						<div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
						    <div class="col-sm-10">
						      <input type="tel" class="form-control" name="phone" id="inputEmail3" placeholder="Telefono" value="{{ old('phone') }}" required autofocus>
						    </div>
						  </div>
	
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Marca del Vehiculo</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_m" id="inputEmail3" placeholder="Modelo" value="{{ old('car_m') }}" required autofocus>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Modelo y Año</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_ma" id="inputEmail3" placeholder="Modelo y Año" value="{{ old('car_ma') }}" required autofocus>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Estado del Vehiculo</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_state" id="inputEmail3" placeholder="Condicion del mismo, nuevo, optimo,etc." value="{{ old('car_state') }}" required autofocus>
						    </div>
						  </div>
	
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Descripcion Corta</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="short" id="inputPassword3" placeholder="Descripcion" value="{{ old('short') }}" required autofocus>
						    </div>
						  </div>
	
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Descripcion De su Servicio</label>
						    <div class="col-sm-10">
	
						      <textarea class="form-control" name="body" rows="3" value="{{ old('body') }}"></textarea>
	
						    </div>
						  </div>
	
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-primary">ENVIAR</button>
						    </div>
						  </div>
	
						</form> -->

						<h2 class="text-center">Por Favor Subir Fotos del Vehiculo </h2>

						<div class="col-md-6 imagen-car">
							
							<div class="imagen">
								<img src="{{ url('img/')}}/profile.png" alt="" class="img-resposive">
							</div>

							<form action="{{Route('conduct_img')}}" method="post" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								
								<input type="file" name="file" id="exampleInputFile">
								<input type="hidden" name="nro" value="1">
								<button type="submit" class="btn btn-primary">ENVIAR</button>
								
							</form>
						</div>

						<div class="col-md-6 imagen-car" class="imagen">
								<div class="imagen">
								<img src="{{ url('img/')}}/profile.png" alt="" class="img-resposive">
							</div>
							

							<form action="{{Route('conduct_img')}}" method="post" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								
								<input type="file" name="file" id="exampleInputFile">
								<input type="hidden" name="nro" value="2">
								<button type="submit" class="btn btn-primary">ENVIAR</button>
								
							</form>
						</div>

						<div class="col-md-6 imagen-car" class="imagen">
							
								<div class="imagen">
								<img src="{{ url('img/')}}/profile.png" alt="" class="img-resposive">
							</div>
							

							<form action="{{Route('conduct_img')}}" method="post" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								
								<input type="file" name="file" id="exampleInputFile">
								<input type="hidden" name="nro" value="3">
								<button type="submit" class="btn btn-primary">ENVIAR</button>
								
							</form>
						</div>

						<div class="col-md-6 imagen-car" class="imagen">
							
								<div class="imagen">
								<img src="{{ url('img/')}}/profile.png" alt="" class="img-resposive">
							</div>
							

							<form action="{{Route('conduct_img')}}" method="post" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								
								<input type="file" name="file" id="exampleInputFile">
								<input type="hidden" name="nro" value="4">
								<button type="submit" class="btn btn-primary">ENVIAR</button>
								
							</form>
						</div>
	
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>

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