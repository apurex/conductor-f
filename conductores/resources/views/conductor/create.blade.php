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

						<h2 class="text-center">Por Favor Subir Fotos del Vehiculo </h2>

							@php 

													
								$directory = 'storage/imgs/cars/car_' . Auth::user()->id;
								$files = Storage::files($directory);
								$coun = count($files);

							@endphp

								@for ($i = 1; $i <= $coun; $i++)
								<div class="row button-margin">
										<div class="col-md-2">
											<div class="imagen imagen-car">



												@if(Storage::disk('public')->exists($directory . '/' . $files[$i]))

													<img src="{{ url($directory)}}/{{$files[$i]}}" alt="" class="img-resposive">

												@else 
													
													<img src="{{ url('img/')}}/profile.png" alt="" class="img-resposive">

												@endif

											</div>
										</div>
										<div class="col-md-10">
											<form action="{{Route('conduct_img')}}" method="post" method="POST" enctype="multipart/form-data">
												{{ csrf_field() }}
												
												<input type="file" name="file" id="exampleInputFile">
												<input type="hidden" name="nro" value="{{ $i }}">
												<button type="submit" class="btn btn-primary">ENVIAR</button>
												
											</form>
										</div>
										
								</div>
								@endfor
							
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