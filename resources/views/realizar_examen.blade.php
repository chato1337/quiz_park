@extends('layouts.app')

@section('content')
  @php
    $examen
  @endphp
  <template>
    <realizar-examenes :examen="{{ json_encode($examen) }}"></realizar-examenes>
  </template>
@endsection
