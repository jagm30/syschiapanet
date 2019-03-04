<template>
    <div class="card">
        <div class="card-header">Servicio del dia {{servicio.created_at}}</div>
        <div class="card-body">
            <p>
                {{servicio.descripcion}}
            </p>
        </div>
        <div class="card-footer">
            <button class="btn btn-default">
                Editar
            </button>
            <button class="btn btn-danger">
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
         
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
