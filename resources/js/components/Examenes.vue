<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <label>Nombre del examen</label>
            <input v-model="examen" class="form-control" type="text">
        </div>
        <div class="col">
            <label>Categoria</label>
            <div class="form-inline">
                <select @click="listarCategorias()" v-model="categoria_id" class="custom-select" name="">
                    <option value="0">Seleccione</option>
                    <option v-for="categoria in categorias" :key="categoria.id" v-text="categoria.nombre_categoria" :value="categoria.id"></option>
                </select>
                <b-button variant="warning" v-b-modal.modal-1>Nueva categoria</b-button>

                <b-modal id="modal-1" title="Categorias">
                    <categorias></categorias>
                </b-modal>
                <button @click="crearExamen()" class="btn btn-primary">Nuevo Examen</button>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <table class="table table-bordered">
            <thead>
                <th>id</th>
                <th>nombre</th>
                <th>categoria</th>
                <th>autor</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <tr v-for="examen in examenes" :key="examen.id">
                    <td v-text="examen.id"></td>
                    <td v-text="examen.nombre_examen"></td>
                    <td v-text="examen.nombre_categoria"></td>
                    <td>1</td>
                    <td><a class="btn btn-success" :href="'realizar_examen?numero='+examen.id">Realizar examen</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</template>

<script>
import Swal from 'sweetalert2';
import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue';
export default {
    data() {
        return {
            categorias: [],
            examen: '',
            examenes: [],
            categoria_id: 0
        }
    },
    methods: {
        listarCategorias() {
            let me = this;
            axios.get('listar_categoria').then(function(response) {
                var respuesta = response.data.categorias;
                console.log(respuesta);
                me.categorias = respuesta;
            }).catch(function(error) {
                console.log(error);
            })
        },
        crearExamen() {
            let me = this;
            axios.post('crear_examen', {
                'nombre_examen': this.examen,
                'categoria': this.categoria_id
            }).then(function(response) {
                console.log('parece bien');
                var mensaje = me.examen;
                me.alerta(mensaje);
                me.listarExamenes();
                me.resetear();
            }).catch(function(error) {
                console.log(error);
            });
        },
        listarExamenes() {
            let me = this;
            axios.get('listar_examenes').then(function(response) {
                var respuesta = response.data.examenes;
                console.log(respuesta);
                me.examenes = respuesta;
            }).catch(function(error) {
                console.log(error);
            })
        },
        resetear() {
            this.examen = '';
            this.categoria_id = 0;
        },
        alerta(mensaje) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El examen: ' + mensaje + ' fue creado',
                showConfirmButton: false,
                timer: 1500
            });
        }
    },
    mounted() {
        console.log('Component categorias montado.');
        this.listarCategorias();
        this.listarExamenes();
    }
}
</script>
