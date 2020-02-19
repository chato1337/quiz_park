@extends('layouts.app')

@section('content')
  @php
    $examen
  @endphp
  <template>
    <preguntas :examen="{{ json_encode($examen) }}"></preguntas>
  </template>
@endsection
