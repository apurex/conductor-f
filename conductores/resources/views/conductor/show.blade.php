@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Conductores</h2>

        <hr>

       

            <div class="row">
                        
                    <div class="col-md-3">

                        @if (Storage::disk('local')->exists( '{{Auth::user()->id}} . {{Auth::user()->extension}}'))
                           
                            <img src="{{ url('storage/imgs/')}}/{{Auth::user()->id}}.{{Auth::user()->extension}}" alt="" class="img-responsive">

                        @else
                            
                           <img src="img/profile.png" alt="">

                        @endif
                    </div>    
                    <div class="col-md-3 text-capitalize">
                            
                            <h2>Datos Personales</h2>

                            <p>Name: {{ $conduct->user->name }}</p>
                            <p>State: {{ $conduct->state }}</p>

                        </div>
                        <div class="col-md-3 text-capitalize">
                            
                        <h2>Datos Del Auto</h2>

                        <p>Auto: {{ $conduct['car-m'] }}</p>
                        <p>Modelo: {{ $conduct['car-ma'] }}</p>
                        <p>Estado: {{ $conduct->state }}</p>

                        </div>
                


            </div>

            <hr>

        
    </div>
    <h2>Comentarios</h2>
    @if( Auth::check() )

        @php
            // Con esto me traigo los comentarios que estan en esta pagina
            $comments = App\Comment::where("user_id_where_comment","=",$conduct->user_id)->get();
        @endphp
        
        @foreach($comments as $comment)
             <div class="row">
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


        @if($conduct->user_id != Auth::user()->id)
            @php
                $comment = new App\Comment;
                $comment->user_id_where_comment = $conduct->user_id;
            @endphp
            @include('comment._form', ['comment' => $comment])
        @endif

    @endif
</div>
@endsection