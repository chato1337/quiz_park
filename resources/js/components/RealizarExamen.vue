<template>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2 v-text="examen.nombre_examen"></h2>
            <p v-text="'categoria: '+categorias.nombre_categoria"></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div v-for="pregunta in arrayPreguntas" :key="pregunta.id" class="mb-4">
              <form class="" action="#" method="post">
                <h4 v-text="pregunta.pregunta"></h4>
                <p v-model="respuesta_correcta" v-text="'respuesta: ' + pregunta.respuesta"></p>
                <div class="form-check">
                  <input v-model="respuesta_usuario" class="form-check-input" type="radio" id="a" :value="pregunta.a_opt">
                  <label v-text="'A: ' + pregunta.a_opt" class="form-check-label" for="a"></label>
                </div>
                <div class="form-check">
                  <input v-model="respuesta_usuario" class="form-check-input" type="radio" id="b" :value="pregunta.b_opt">
                  <label v-text="'B: ' + pregunta.b_opt" class="form-check-label" for="b"></label>
                </div>
                <div class="form-check">
                  <input v-model="respuesta_usuario" class="form-check-input" type="radio" id="c" :value="pregunta.c_opt">
                  <label v-text="'C: ' + pregunta.c_opt" class="form-check-label" for="c"></label>
                </div>
                <div class="form-check">
                  <input v-model="respuesta_usuario" class="form-check-input" type="radio" id="d" :value="pregunta.d_opt">
                  <label v-text="'D: ' + pregunta.d_opt" class="form-check-label" for="d"></label>
                </div>
              </form>
            </div>
              <button @click="guardarPregunta()" class="btn btn-success" type="button">Siguiente pregunta</button>
        </div>
    </div>
</div>
</template>

<script>
import Swal from 'sweetalert2';
export default {
    props: ['examen'],
    data() {
        return {
            respuesta_usuario: '',
            categorias: {},
            pregunta: '',
            respuesta_a: '',
            respuesta_b: '',
            respuesta_c: '',
            respuesta_d: '',
            respuesta_correcta: '',
            arrayPreguntas: [],
        }
    },
    methods: {
        obtenerCategoria(url, datos) {
            let me = this;
            axios.get(url).then(function(response) {
                var consulta = response.data.categorias;
                me.categorias = consulta;
            }).catch(function(error) {
                console.log(error)
            });
        },
        obtenerPreguntas() {
            let me = this;
            axios.get('listar_preguntas?id=' + this.examen.id).then(function(response) {
                var respuesta = response.data.preguntas;
                console.log(response);
                me.arrayPreguntas = respuesta;
            }).catch(function(error) {
                console.log(error)
            });
        },
        crearPregunta() {
            let me = this;
            axios.post('crear_pregunta', {
                'examen_id': this.examen.id,
                'pregunta': this.pregunta,
                'a_opt': this.respuesta_a,
                'b_opt': this.respuesta_b,
                'c_opt': this.respuesta_c,
                'd_opt': this.respuesta_d,
                'respuesta': this.respuesta_correcta
            }).then(function(response) {
                var registro = me.pregunta;
                me.alerta(registro);
                me.resetear();
                me.obtenerPreguntas();
            }).catch(function(error) {
                console.log(error)
            });
        },
        guardarPregunta(){

        },
        resetear() {
            this.pregunta = "";
            this.respuesta_a = "";
            this.respuesta_b = "";
            this.respuesta_c = "";
            this.respuesta_d = "";
            this.respuesta_correcta = "";
        },
        alerta(mensaje) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'La pregunta: ' + mensaje + ' fue creada',
                showConfirmButton: false,
                timer: 1500
            });
        }
    },
    mounted() {
        console.log('Component preguntas mounted.');
        console.log(this.examen);
        this.obtenerCategoria('listar_categoria?id=' + this.examen.categoria_id);
        this.obtenerPreguntas();
    }
}
</script>
