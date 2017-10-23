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
					
					<div class="row title-p">
						
						<div class="col-md-4">

						@if ($extension != null)
						   
							<img src="{{ url('storage/imgs/')}}/{{$conduct->user_id}}.{{$extension}}" alt="" class="img-responsive">

						@else
						    
						   <img src="{{ url('img/')}}/profile.png" alt="">

						@endif
						@if(Auth::user()->roles != 1)
							<div class="">
								<a href="#" class="btn btn-warning center-block no-float" title="">CONTACTAR</a>
							</div>
                        <div>
@php
$votos = App\Score::where("conduct_id","=",$conduct->id)->get();
$totalvotos = count($votos);
@endphp

    @if($user_voto === null)

    <div class="col-sm-12">

      <form action="{{Route('store_score_path')}}" id="form_voto" method="post">
        {{ csrf_field() }}
         Votar:
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-danger">
              <input type="radio" name="score" id="option1" required value="-1" autocomplete="off"> <i  class="fa fa-minus"></i>
            </label>
            <label class="btn btn-warning">
              <input type="radio" name="score" id="option2" required value="0" autocomplete="off"> <i  class="fa fa-circle-o"></i>
            </label>
            <label class="btn btn-success">
              <input type="radio" name="score" id="option3" required value="1" autocomplete="off"> <i  class="fa fa-plus"></i>
            </label>
            <input type="hidden" name="conduct_id" value="{{$conduct->id}}">
            <input type="hidden" name="review" value="">
          </div>
          <button type="submit" class="btn btn-default">Votar</button></form>
    </div> 
    @endif

        @endif

<div class="col-sm-12">

@php
if(isset($votos)&&count($votos)>0){
$negativos=0;
$positivos=0;
$neutros=0;
foreach($votos as $voto){

    if($voto->score == -1){
        $negativos++;
    }elseif($voto->score == '1'){
        $positivos++;

    }else{
        $neutros++;
    }
}
if($totalvotos>0){
$negativos = $negativos/$totalvotos*100;
$positivos = $positivos/$totalvotos*100;
$neutros = $neutros/$totalvotos*100;
}
@endphp
                            Puntuacion: Total Votos: {{$totalvotos}}<div class="progress">
  <div class="progress-bar progress-bar-danger" style="width: {{$negativos}}%">
    <span class="sr-only">{{$negativos}} mal (success)</span>
  </div>
  <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: {{$neutros}}%">
    <span class="sr-only">{{$neutros}} Complete (warning)</span>
  </div>
  <div class="progress-bar progress-bar-success" style="width: {{$positivos}}%">
    <span class="sr-only">{{$positivos}} Complete (danger)</span>
  </div>@php } @endphp
</div></div>

                        </div>
                        
						</div>

						<div class="col-md-4 text-capitalize">
							
							<h2>Datos Personales</h2>
                    <dl class="dl-horizontal">
                          <dt>Name:</dt><dd>{{ $conduct->name }}</dd>
                          <dt>State:</dt><dd>{{ $conduct->state }}</dd>

                        </dl>
						</div>


						<div class="col-md-4 text-capitalize">
							
						<h2>Datos Del Auto</h2>

                        <dl class="dl-horizontal">
                          <dt>Auto:</dt><dd>{{ $conduct->car_m }}</dd>
                          <dt>Modelo:</dt><dd>{{ $conduct->car_ma }}</dd>
                          <dt>Estado:</dt><dd>{{ $conduct->car_state }}</dd>
                        </dl>
						</div>

					</div>

					

            <div class="container">
<div class="row">
              <div class="row">
                <div class="container">
                  <h2>Descripcion:</h2>
              
              <p> {{ $conduct->body }} </p>
                </div>
              
            </div>

          <div class="row">

            <div class="container">
              <div class="text-center">
            
            <h2>Fotos del vehiculo <small> <strong> Click a la imagen para Agrandar</strong></small> </h2>

          </div>

          @for ($i = 0; $i < count($carros); $i++)
          
            <div class="col-md-3">
               <a href="#myLargeModalLabel" class="" data-toggle="modal" data-target=".car_{{$i}}"><img src="{{url($carros[$i])}}" alt="" class="img-responsive img-thumbnail"></a>
            </div>

            <div class="modal fade car_{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <img src="{{ url($carros[$i]) }}" alt="" class="img-responsive">
                </div>
              </div>
            </div>
          @endfor
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

    @if( Auth::check() )

        @php
            // Con esto me traigo los comentarios que estan en esta pagina
            $comments = App\Comment::where("user_id_where_comment","=",$conduct->user_id)->get();
        @endphp
        
        @foreach($comments as $comment)
             <div class="container-fluid">
                <div class="col-md-12">
                    <h2>
                        
                        @if($comment->wasCreatedBy( Auth::user() ))
                        <small class="pull-right">
                            <a href="#" class="btn btn-info">Edit</a>
                            <form action="{{ route('delete_comment_path', ['comment' => $comment->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                        </small>
                        @endif
                    </h2>
                    <p><b>{{ $comment->name }} {{ $comment->last_name }}</b> <small>{{ $comment->created_at->diffForHumans() }}</small> </p>
                    <p>{{ $comment->content }}</p>
                </div>
             </div>
            <hr>
        @endforeach
    <!--- Formulario de comentario -->
<div class="container-fluid">
<div class="col-sm-12">
    @if(Auth::user()->roles != 1)
        @if($conduct->user_id != Auth::user()->id)
            @php
                $comment = new App\Comment;
                $comment->user_id_where_comment = $conduct->user_id;
            @endphp
            @include('comment._form', ['comment' => $comment])
        @endif
      @endif
    @endif
</div>
</div>

@endsection
