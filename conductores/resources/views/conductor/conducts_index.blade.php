@extends('layouts.app')

@section('content')

<section>
    


</section>

<section class="center">
    
    <div class="container">
    <div class="row">
        
        <h2>Conductores</h2>

        <hr>

            <div class="row">

                @foreach ($conducts as $conduct)

                  <div class="col-sm-6 col-md-4">

                    <div class="thumbnail conduct">

                    @php
                        // Obtendo el user con el id actual.
                        $user = App\User::where('id', $conduct->user_id)->first();
                    @endphp

                    @if($user->extension != null)

                      <img src="{{ url('storage/imgs/')}}/{{$conduct->user_id}}.{{$user->extension}}" alt="...">

                    @else 

                      <img src="{{ url('img/')}}/profile.png" alt="">

                    @endif

                      <div class="caption">
                        <h3>{{ $conduct->name }} {{ $conduct->last_name }}</h3>
                        <p> {{ $conduct->short }} Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo voluptatibus neque, facilis harum dolor non magnam aliquam odit autem esse atque, laborum, at repellendus laudantium dolorum rerum recusandae assumenda quia? </p>

                        <p> <a href="{{ route('conduct_show', ['id' => $conduct->id]) }}" class="btn btn-primary" role="button">VER</a> <a href="#" class="btn btn-default" role="button">CONTACTAR</a> </p>
                      </div>

                    </div>

                  </div>

                @endforeach              

            </div>

        

        

    </div>
</div>

</section>



<section>
    


</section>

@endsection