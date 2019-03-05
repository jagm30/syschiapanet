<template>
    <div class="card">
        <div class="card-header">Cliente nuevo:</div>
        <div class="card-body">        
            <form action="" v-on:submit.prevent="newServicio()">
                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input type="text"  class="form-control" name="nombre" v-model="nombre" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"  class="form-control" name="email" v-model="email" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text"  class="form-control" name="direccion" v-model="direccion" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text"  class="form-control" name="telefono" v-model="telefono" required>
                </div>
                <div class="form-group">
                    <label for="fechanac">Fecha de nacimiento</label>
                    <input type="date"  class="form-control" name="fechanac" v-model="fechanac" required>
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
            nombre      : '',
            email       : '',
            direccion   : '',
            telefono    : '',
            fechanac    : ''
        }
    },
        mounted() {
           // console.log('Component mounted.')
        },
        methods:{
            newServicio(){
                const params = {
                    nombre      : this.nombre,
                    email       : this.email,
                    direccion   : this.direccion,
                    telefono    : this.telefono,
                    fechanac    : this.fechanac
                };

                this.nombre     = '';
                this.email      = '';
                this.direccion  = '';
                this.telefono   = '';
                this.fechanac   = '';

                axios.post('/clientes',params).then((response)=>{
                    const cliente = response.data;
                    this.$emit('new', cliente);    
                   // alert(response.data);               
                });
               
               // alert("respuesta: "+cliente);
                
            }
        }
    }
</script>