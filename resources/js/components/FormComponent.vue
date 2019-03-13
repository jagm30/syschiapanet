<template>
    <div class="card">
        <div class="card-header">Selecciona el usuario:</div>
        <div class="card-body">        
            <form action="" v-on:submit.prevent="newServicio()">
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <select class="form-control" name="cliente" v-model="cliente">
                       
                            <option v-for="(cliente, index) in clientes"
                            :key="cliente.id"
                            :cliente="cliente">{{cliente.nombre}}</option>
                                            
                    </select>
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
            clientes:[]
        }
    },
        mounted() {

           // console.log('Component mounted.')
           axios.get('clientes/').then((response)=>{
                this.clientes = response.data;
            });
        },
        methods:{
            newServicio(){
                const params = {
                    descripcion : this.cliente
                };
                this.descripcion = '';
                axios.post('/servicios',params).then((response)=>{
                    const servicio = response.data;
                    this.$emit('new', servicio);                    
                });
            }
        }
    }
</script>