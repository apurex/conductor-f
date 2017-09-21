@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <h2>Conductores</h2>

        <hr>

        @foreach ($conducts as $conduct)

            <div class="row">
                        
                <div class="col-md-3">
                            
                <a href="{{ route('conductor_path', ['conduct' => $conduct->id]) }}">{{ $conduct->user->name }} {{ $conduct->user->last_name }}</a>

                </div>

                <div class="col-md-9">
                            
                    <p> hola {{ $conduct->short }} HOLA {{ $conduct->body }} </p>

                </div>

            </div>

            <hr>

        @endforeach

        

    </div>
</div>
@endsection