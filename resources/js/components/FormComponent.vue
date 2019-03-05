<template>
    <div class="card">
        <div class="card-header">¿En que estas pensando ahora?</div>
        <div class="card-body">        
            <form action="" v-on:submit.prevent="newServicio()">
                <div class="form-group">
                    <label for="descripcion">descripcion</label>
                    <input type="text"  class="form-control" name="descripcion" v-model="descripcion">
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
            descripcion: ''
        }
    },
        mounted() {
           // console.log('Component mounted.')
        },
        methods:{
            newServicio(){
                const params = {
                    descripcion : this.descripcion
                };
                this.descripcion = '';
                axios.post('/servicios',params).then((response)=>{
                    const servicio = response.data;
                    this.$emit('new', servicio);                    
                });
               
                
                //alert(this.descripcion);
            }
        }
    }
</script>