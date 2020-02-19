@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Menu Principal</div>
                    <template v-if="menu==0">
                      <home></home>
                    </template>
                    <template v-if="menu==1">
                      <examenes></examenes>
                    </template>
                    <template v-if="menu==2">
                      <crear-examen></crear-examen>
                    </template>
                <div class="card-body">
                </div>
                <div class="card-footer">
                  <a @click="menu=1" class="btn btn-info" href="#">Buscar un examen</a>
                  <a @click="menu=2" class="btn btn-success" href="#">Crear un examen</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
