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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear rol Admin </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin_create') }}">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
    
                                 <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="admin-name" id="inputEmail3" required autofocus>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                  <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                                  </div>
                                </div>
                           
                        </form>
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
