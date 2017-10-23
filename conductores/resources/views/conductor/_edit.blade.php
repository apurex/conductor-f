	<form class="form-horizontal" action="{{ Route('conduct_update')}}" method="POST">
	
						{{ method_field('put') }}

					{{ csrf_field() }}
						<div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Telefono</label>
						    <div class="col-sm-10">
						      <input type="tel" class="form-control" name="phone" id="inputEmail3" placeholder="Telefono" value="{{ $conduct->phone }}" required autofocus>
						    </div>
						  </div>
	
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Marca del Vehiculo</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_m" id="inputEmail3" placeholder="Modelo" value="{{$conduct->car_m }}" required autofocus>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Modelo y Año</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_ma" id="inputEmail3" placeholder="Modelo y Año" value="{{$conduct->car_ma}}" required autofocus>
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Estado del Vehiculo</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="car_state" id="inputEmail3" placeholder="Condicion del mismo, nuevo, optimo,etc." value="{{$conduct->car_state}}" required autofocus>
						    </div>
						  </div>
	
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Descripcion Corta</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="short" id="inputPassword3" placeholder="Descripcion" value="{{$conduct->short}}" required autofocus>
						    </div>
						  </div>
	
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Descripcion De su Servicio</label>
						    <div class="col-sm-10">
	
						      <textarea class="form-control" name="body" rows="3"  placeholder="Da una breve descripcion de tu servicio">{{$conduct->body}}</textarea>
	
						    </div>
						  </div>
	
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" class="btn btn-primary">ENVIAR</button>
						    </div>
						  </div>
	
	</form>

			<h3 class="text-center">Fotos Del Vehiculo Maximo 4</h3>
			

			@for($i=1;$i<=4;$i++)


			<div class="col-md-3">

					<div class="row">
					  @if(isset($carros['car_'.$i]))
					    <div class="thumbnail" id="thumb{{$i}}">
					      <img src="{{url($carros['car_'.$i])}}" class="car_im{{$i}}" alt="...">
					      <div class="caption">
							<button type="button" class="btn btn-primary text-center" onclick="ocultar({{$i}})" id="car_button{{$i}}">Actualizar</button>
					      </div>
					    </div>
					  @endif
							 <form action="{{ Route('conduct_img')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="dropzone @if(isset($carros['car_'.$i])) hidden @endif" id="image{{$i}}">
										{{ csrf_field() }}
										 
								 <input type="hidden" name="num" value="{{$i}}">
							</form>
					</div>

				
			</div>
			@endfor
			

				