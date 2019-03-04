<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-component @new="addServicio">                
            </form-component>            
            <servicios-component
                v-for="servicio in servicios"
                :key="servicio.id"
                :servicio="servicio">
            </servicios-component>
        </div>
    </div>
</template>

<script>
    export default {
    data(){
        return{
            servicios:[{
                'id':1,
                'descripcion': 'abc',
                'created_at': '28/02/2019'
            }]
        }
    },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            addServicio(servicio){
                this.servicios.push(servicio);
            }
        }
    }
</script>
