<template>
    <div class="card">
        <div class="card-header">¿En que estas pensando ahora?</div>
        <div class="card-body">        
            <form action="" v-on:submit.prevent="newServicio()">
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <input type="text" name="" class="form-control" name="cliente" v-model="cliente">
                </div>
                <button type="submit" class="btn btn-primary">
                    Registrar
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
    data(){
        return{
            cliente: ''
        }
    },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            newServicio(){
                let servicio = {
                    id:2,
                    descripcion: this.cliente,
                    created_at: '28/02/2019'
                };
                this.$emit('new', servicio);
                this.cliente = '';
                //alert(this.cliente);
            }
        }
    }
</script>
