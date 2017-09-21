@extends('layouts.app_admin')

@section('content')

<section>
    


</section>


<section class="center">
    <div class="container">
        <div class="row">
    
        <h1 class="text-center">Panel de Administracion</h1>
        <hr>

        <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    @php

                                        // Obtengo el nro de usuarios
                                        $user_cont = App\User::where('roles', 2)->count();

                                    @endphp

                                    <div class="huge"> {{ $user_cont }} </div>
                                    <div>USUARIOS</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('show_user') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                
                                    @php

                                        // Obtengo el nro de CONDUCTORES
                                        $user_cont = App\User::where('roles', 1)->count();

                                    @endphp

                                    <div class="huge">{{ $user_cont }}</div>
                                    <div>CONDUCTORES</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('show_conduct') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-life-ring fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    @php

                                        // Obtengo el nro de CONDUCTORES sin perfil activado
                                        $user_cont = App\Conduct::where('verif', 0)->count();

                                    @endphp

                                    <div class="huge">{{$user_cont}}</div>
                                    <div>PERFILES POR ACTIVAR</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-handshake-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    @php

                                        // Obtengo el nro de pagos
                                        $pay_cont = App\Payout::where('active', 0)->count();

                                    @endphp
                                    {{ $pay_cont }}</div>
                                    <div>PAGOS POR CONFIRMAR</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('show_pagos') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Todos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 
        </div>
    </div>
</section>

<section>

</section>

@endsection
