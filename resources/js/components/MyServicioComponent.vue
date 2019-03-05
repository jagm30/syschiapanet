<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-component @new="addServicio">                
            </form-component>            
            <servicios-component
                v-for="(servicio, index) in servicios"
                :key="servicio.id"
                :servicio="servicio"
                @update="updateServicio(index, ...arguments)"
                @delete="deleteServicio(index)">
            </servicios-component>
        </div>
    </div>
</template>

<script>
    export default {
    data(){
        return{
            servicios:[]
        }
    },
        mounted() {
            axios.get('servicios/').then((response)=>{
                this.servicios = response.data;
            });
        },
        methods:{
            addServicio(servicio){
                this.servicios.push(servicio);
            },
            deleteServicio(index){
                this.servicios.splice(index, 1);
            },
            updateServicio(index, servicio){
                this.servicios[index] = servicio;
            }
        }
    }
</script>
