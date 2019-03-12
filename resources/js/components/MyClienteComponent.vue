<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <formcliente-component @new="addCliente">                
            </formcliente-component>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody>
                <clientes-component
                    v-for="(cliente, index) in clientes"
                    :key="cliente.id"
                    :cliente="cliente"
                    @update="updateCliente(index, ...arguments)"
                    @delete="deleteCliente(index)">
                </clientes-component>
                </tbody>
            </table>
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
            axios.get('clientes/').then((response)=>{
                this.clientes = response.data;
            });
        },
        methods:{
            addCliente(cliente){
                this.clientes.push(cliente);
            },
            deleteCliente(index){
                this.clientes.splice(index, 1);
            },
            updateCliente(index, cliente){
                this.clientes[index] = cliente;
            }
        }
    }
</script>
