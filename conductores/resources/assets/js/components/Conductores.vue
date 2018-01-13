<template>
    <div>
        <div class="row">

            <div class="alert alert-info" v-if="conductores.lenght<=0">
                NO hay resultados
            </div>

            
                  <div v-for="conduct in conductores" class="col-sm-6 col-md-4">

                    <div class="thumbnail conduct">

                  <!-- faltan las fotos -->

                  
                    <img v-if="conduct.extension != null" :src="'/storage/imgs/'+conduct.user_id+'.'+conduct.extension" alt="">

                    <img v-else src="/img/profile.png" alt="">

                      <div class="caption">
                        <h3>{{ conduct.name }} {{ conduct.last_name }}</h3>
                        <p> {{ conduct.short }} </p>

                        <p> <a :href="'conducts/'+conduct.id" class="btn btn-primary" role="button">VER</a> <a href="#" class="btn btn-default" role="button">CONTACTAR</a> </p>
                      </div>

                    </div>

                  </div>

            </div>
        
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted() {
            axios.get('/conductores')
            .then(res => {
                this.conductores = res.data;
                console.log(res.data)
            }).catch(err => {
                console.log(err)
            });
            console.log('Component mounted.')
        },
        data(){
            return {
                conductores: []
            }
        }
    }
</script>