<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
              <h4>Crear categoria:</h4>
              <div class="form-group form-inline">
                  <input v-model="categoria" class="form-control">
                  <button @click="crearCategoria()" class="btn btn-success">Nueva categoria</button>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2';
    export default {
        data() {
          return {
            categoria: ""
          }
        },
        methods: {
          crearCategoria(){
            let me = this;
            axios.post('crear_categoria', {
              'categoria': this.categoria
            }).then(function (response){
              var registro = me.categoria;
              me.alerta(registro);
              me.resetear();
            }).catch(function(error){
              console.log(error)
            });
          },
          resetear(){
            this.categoria = "";
          },
          alerta(mensaje){
            Swal.fire({
              position: 'top-end',
              icon: 'success',
              title: 'La categoria: ' + mensaje + ' fue creada',
              showConfirmButton: false,
              timer: 1500
            });
          }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
