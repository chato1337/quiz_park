<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preguntas;

class PreguntasController extends Controller
{
    public function listar(Request $request)
    {
      $id = $request->id;

      $preguntas = Preguntas::where('examen_id', $id)->get();

      return ['preguntas' => $preguntas];
    }

    public function crear(Request $request)
    {
      $pregunta = new Preguntas();
      $pregunta->examen_id = $request->examen_id;
      $pregunta->pregunta = $request->pregunta;
      $pregunta->a_opt = $request->a_opt;
      $pregunta->b_opt = $request->b_opt;
      $pregunta->c_opt = $request->c_opt;
      $pregunta->d_opt = $request->d_opt;
      $pregunta->respuesta = $request->respuesta;
      $pregunta->save();
    }
}
