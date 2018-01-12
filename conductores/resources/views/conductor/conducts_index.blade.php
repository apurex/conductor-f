@extends('layouts.app')

@section('content')

<section>
    
</section>

<section class="center">
    
    <div class="container">
    <div class="row">
        <div class="col-md-4"><h2>Conductores</h2></div>
   <div class="col-md-6">     
<form class="form-inline conduct-filtrar" method="POST" id="form" action="{{ route('conducts_buscar') }}"> {{ csrf_field() }}
      <div class="form-group">
        <label for="estado">Filtrar por estado</label>
         <select class="form-control" name="state" id="estados">

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
                                          
                                    </select><button type="submit" class="btn btn-info">Filtar</button>
      </div>
      
      </form></div></div>
        <hr>
{{--
            <div class="row" id="conductores">

            @if(count($conducts)<1)
              <div class="alert alert-info">
                NO hay resultados
              </div>
            @endif
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
                        <p> {{ $conduct->short }} </p>

                        <p> <a href="{{ route('conduct_show', ['id' => $conduct->id]) }}" class="btn btn-primary" role="button">VER</a> <a href="#" class="btn btn-default" role="button">CONTACTAR</a> </p>
                      </div>

                    </div>

                  </div>

                @endforeach              

            </div>
--}}
<conductores></conductores>
</div>

</section>
{{--
Auqi ta el componente

<section>
<div id="nuevo">
    @{{mensaje}}
    <pre>
      @{{conducts}}
    </pre>
</div>
</section>
--}}

@endsection

@section('script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    var b = new Vue({
        el: '#nuevo',
        mounted(){
          axios.get('/conductores').then(res => {
            this.conducts = res.data
          }).catch(err => {console.log(err)})
        },
        data: {
            mensaje: 'Probando bue en conductores',
            conducts: []
        }
    })

</script>

@endsection