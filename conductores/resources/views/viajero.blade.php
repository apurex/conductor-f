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
            
            <div class="col-md-8 center-block no-float">

                <h1 class="title-about text-center">Para Viajeros</h1>
                <hr class="line2">

                <p> <span class="fonts-top"> Sin complicaciones </span> Solo ingresa y únete a nuestra plataforma, y dispone de los cientos de choferes que ponemos a tu disposición. </p>

                <br>

                <p> <span class="fonts-top"> Viaje seguro </span> Contamos con sistema de reputación y comentario, para que conozcas las opiniones de otros sobre tu posible chofer. </p>

                <br>

                <p> <span class="fonts-top"> Más seguridad </span> Todo chofer que busque entrar en nuestra plataforma debe pasar por una revisión personal, tanto del auto como del perfil para asegurar que toda la información este en regla. ¡Te Ofrecemos lo mejor! </p>

                <br>

                <p><span class="fonts-top2"> ¡¡Y lo mejor de todo Gratis.!! </span></p>
                <br>
                <a href="{{ route('register') }}" class="btn btn-success btn-lg">REGISTRARME</a>

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