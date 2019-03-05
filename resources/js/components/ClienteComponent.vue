<template>
    <div class="card">
        <div class="card-header">Cliente: {{cliente.nombre}}</div>
        <div class="card-body">
            <input  v-if="editMode" type="text" class="form-control" v-model="cliente.nombre" >
            <p v-else >
                {{cliente.nombre}}
            </p>            
        </div>
        <div class="card-footer">
            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">
                Guardar cambios
            </button>
            <button v-else class="btn btn-default" v-on:click="onClickEdit()">
                Editar
            </button>
            <button class="btn btn-danger" v-on:click="onClickDelete()">
                Eliminar
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['cliente'],
        data(){
            return{
                editMode:false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete(){
                const params ={
                    nombre      : this.cliente.nombre,
                    email       : this.cliente.email,
                    direccion   : this.cliente.direccion,
                    telefono    : this.cliente.telefono,
                    fechanac    : this.cliente.fechanac
                };
                axios.delete('/clientes/'+this.cliente.id).then((response)=>{
                    this.$emit('delete');
                });
                
            },
            onClickEdit(){
                this.editMode= true;
            },
            onClickUpdate(){
                const params ={
                    nombre      : this.cliente.nombre,
                    email       : this.cliente.email,
                    direccion   : this.cliente.direccion,
                    telefono    : this.cliente.telefono,
                    fechanac    : this.cliente.fechanac
                };
                axios.put('/clientes/'+this.cliente.id,params).then((response)=>{
                    this.editMode= false;
                    const cliente = response.data;
                    this.$emit('update', cliente); 
                });                
            }
        }
    }
</script>