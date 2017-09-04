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
                        <div class="panel-heading">Registrame</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Last name</label>

                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('direction') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Dirección</label>

                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="direction" value="{{ old('direction') }}" required autofocus>

                                        @if ($errors->has('direction'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('direction') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Estado</label>

                                    <div class="col-md-6">
                                    <select class="form-control" name="state">

                                          <option value="amazonas">Amazonas</option>
                                          <option value="anzoategui">Anzoátegui</option>
                                          <option value="apure">Apure</option>
                                          <option value="aragua">Aragua</option>
                                          <option value="barinas">Barinas</option>
                                          <option value="bolivar">Bolívar</option>
                                          <option value="carabobo">Carabobo</option>
                                          <option value="cojedes">Cojedes</option>
                                          <option value="delta-amacuro">Delta Amacuro</option>
                                          <option value="distrito-capital">Distrito Capital</option>
                                          <option value="falcon">Falcón</option>
                                          <option value="guarico">Guárico</option>
                                          <option value="lara">Lara</option>
                                          <option value="merida">Mérida</option>
                                          <option value="miranda">Miranda</option>
                                          <option value="monagas">Monagas</option>
                                          <option value="nueva-esparta">Nueva Esparta</option>
                                          <option value="portuguesa">Portuguesa</option>
                                          <option value="sucre">Sucre</option>
                                          <option value="tachira">Táchira</option>
                                          <option value="trujillo">Trujillo</option>
                                          <option value="vargas">Vargas</option>
                                          <option value="yaracuy">Yaracuy</option>
                                          <option value="zulia">Zulia</option>
                                          
                                    </select>

                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">Su Rol</label>

                                    <div class="col-md-6">

                                    <div class="radio">
                                      <label>
                                        <input type="radio" name="roles" id="optionsRadios1" value="1" checked>
                                        Conductor
                                      </label>

                                        <label>
                                        <input type="radio" name="roles" id="optionsRadios2" value="2">
                                        Viajero
                                      </label>

                                    </div>

                                        @if ($errors->has('roles'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('roles') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Register
                                        </button>
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
