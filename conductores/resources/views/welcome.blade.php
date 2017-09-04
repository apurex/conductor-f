<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
     @extends('layouts.app')

@section('content')

<section id="loader" class="header">
    <section class="bg-color">
        
    <div class="container">
    <div class="row">

        <div class="col-md-8 center-block no-float text-center">

            <div class="banner-title">
                <h1>Bienvenidos a VeneCars</h1>
            </div>

            <div class="banner-title banner-subtitle">
                <p> -- Red de choferes de Venezuela, Conseguir el chofer para el viaje jamás fue tan fácil. -- </p>
            </div>

            <div class="row btn-loader">
                
                <a href="{{ route('viajero') }}" title="" class="btn btn-warning btn-margin">Como Funcionaa</a>
                @if(Auth::check() == false)
                <a href="{{ route('register') }}" title="" class="btn btn-warning btn-margin">Unirme</a>
                @endif

            </div>

        </div>

        
    </div>
</div>

    </section>
</section>

<section id="roles" class="roles">

    <div class="container">
        <div class="row">

        <div class="col-md-3">
            
            <h1 class="title-about">Elige tu Rol</h1>
            <hr class="line">

        </div>

        <div class="col-md-9">
            
            <div class="col-md-8 center-block no-float imagen">
                
                <div class="col-md-6">
                <img src="img/viajero.jpg" alt="">

                <a href="{{ route('viajero') }}" title="" class="btn btn-warning">VIAJERO</a>
                </div>

                <div class="col-md-6">
                <img src="img/conductor.jpg" alt="">

                <a href="{{ route('conductor') }}" title="" class="btn btn-warning">CONDUCTOR</a>
                </div>

            </div>

        </div>
            
        </div>
    </div>
    
</section>

<section id="nosotros" class="about">

    <div class="container">
        <div class="row">

        <div class="col-md-3">
            
            <h1 class="title-about">Que Somos</h1>

            <hr class="line">

        </div>

        <div class="col-md-9">
            
            <p>
                Venecars es una red de choferes en crecimiento, brindándote una fácil solución a la hora de viajar pues te ponemos a disposiciones múltiples perfiles con lo que puedes elegir la mejor opción que se adapte a ti.
             </p> 

             <br>

                <p>Funcionamos con intermediarios entre el viajero registrado en nuestra plataforma y los choferes dispuestos a prestar sus servicios. Y lo mejor de todo desde cualquier lugar ya sea desde tu PC y/o Tablet o teléfono inteligente.</p>

                

        </div>

        </div>
    </div>
    
</section>

<section id="resumen" class="resumen">
    
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                
                <h1 class="title-about">Da un vistazo </h1>
                <hr class="line">

            </div>
            
            <div class="col-md-9 imagen">
                
                <div class="col-md-4 text-center">
                    
                    <div class="item center-block no-float">
                        <img src="img/mano.svg" alt="">
                    </div>

                    <h3>Simple</h3>

                    <p>
                        Lo que buscas está a tan solo unos clicks. 
                    </p>
                </div>

                <div class="col-md-4 text-center">
                    
                    <div class="item center-block no-float">
                        <img src="img/apreton-de-manos.svg" alt="">
                    </div>

                    <h3>Confianza</h3>

                    <p>
                        Revisa la reputación y comentarios de terceros sobre el chofer, para que puedas viajar con más tranquilidad.
                    </p>

                </div>

                <div class="col-md-4 text-center">
                    
                    <div class="item center-block no-float">
                        <img src="img/descansando.svg" alt="">
                    </div>

                    <h3>Confort</h3>

                    <p>
                        Tan solo llama y di a dónde quieres ir, que nosotros nos encargamos de ir por ti.
                    </p>

                </div>

            </div>

        </div>
    </div>

</section>


@endsection
