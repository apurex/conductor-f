@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @if(isset($conduct)&&$conduct->completed == 0)
        <div class="alert alert-warning"><a href="{{ route('conduct_create') }}">Completa tu perfil</a> como conductor para que aparezcas en el <a href="{{ route('conducts') }}">catalogo de conductores</a></div>
        @endif
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h3>Bienvenido</h3>
                    <div>Aun te queda un paso mas</div>
                    <div>visita y ve mas conductores</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
