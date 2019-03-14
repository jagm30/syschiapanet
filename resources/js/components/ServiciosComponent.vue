<template>
    <div class="card">
        <div class="card-header">Servicio del dia {{servicio.created_at}}</div>
        <div class="card-body">
            <input  v-if="editMode" type="text" class="form-control" v-model="servicio.cliente" >
            <p v-else >
                {{servicio.cliente}}
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
        props: ['servicio'],
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
                    descripcion : this.servicio.descripcion
                };
                axios.delete('/servicios/'+this.servicio.id).then((response)=>{
                    this.$emit('delete');
                });
                
            },
            onClickEdit(){
                this.editMode= true;
            },
            onClickUpdate(){
                const params ={
                    descripcion : this.servicio.descripcion
                };
                axios.put('/servicios/'+this.servicio.id,params).then((response)=>{
                    this.editMode= false;
                    const servicio = response.data;
                    this.$emit('update', servicio); 
                });                
            }
        }
    }
</script>