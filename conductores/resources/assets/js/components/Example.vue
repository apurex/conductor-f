<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                        <pre>
                            {{api}}
                        </pre>
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
            axios.get('https://jsonplaceholder.typicode.com/users')
            .then(res => {
                this.api = res.data;
                console.log(res.data)
            });
            console.log('Component mounted.')
        },
        data(){
            return {
                api: []
            }
        }
    }
</script>
