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
                          <div class="panel-heading">Editar Perfil</div>

                          <div class="panel-body">
                             
                  <div class="row col-md-6 no-float center-block">

                        @if(count($errors) > 0)
            
                          <div class="alert alert-danger">
                            
                            @foreach($errors->all() as $error)
                
                            <li>{{ $error }}</li>
                
                            @endforeach
                
                          </div>
  
                        @endif

                    <div class="imagen">

                    @if(Auth::user()->extension != null)

                      <img src="{{ url('storage/imgs/')}}/{{Auth::user()->id}}.{{Auth::user()->extension}}" alt="" class="img-resposive">

                    @else 

                      <img src="{{ url('img/')}}/profile.png" alt="">

                    @endif

                    </div>
                              

                    <form class="form-horizontal" action="{{ Route('img_store')}}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                      <div class="form-group">

                        <label for="exampleInputFile">Foto de Perfil</label>
                        <input type="file" name="file" id="exampleInputFile">
                        <p class="help-block">Subir Foto de Perfil</p>

                      </div>

                      <div class="form-group">

                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </div>

                      </div>            

                    </form>

                  </div>

                          <br>

                          <div class="row">
                              
                             <form class="form-horizontal" action="{{ Route('update_profile')}}" method="POST">

                              {{ csrf_field() }}
                              {{ method_field('put') }}

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Nombre" value="{{ Auth::user()->name }}">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="inputPassword3" class="col-sm-2 control-label">Apellido</label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="last_name" id="inputPassword3" placeholder="Apellido" value="{{ Auth::user()->last_name }}">
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
