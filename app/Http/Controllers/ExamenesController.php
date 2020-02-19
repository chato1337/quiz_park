<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examenes;
use Illuminate\Support\Facades\DB;

class ExamenesController extends Controller
{
    public function listar()
    {
        $examenes = DB::table('examenes')->join('categorias', 'examenes.categoria_id', '=', 'categorias.id')
                                         ->select('examenes.*', 'categorias.nombre_categoria')
                                         ->get();

        return ['examenes' => $examenes];
    }

    public function mostrar(Request $request)
    {
        $id = $request->numero;
        $examen = Examenes::where('id', $id)->first();
        return view('examen')->with(['examen' => $examen]);
    }

    public function crear(Request $request)
    {
        $examen = new Examenes();
        $examen->categoria_id = $request->categoria;
        $examen->nombre_examen = $request->nombre_examen;
        $examen->save();
    }

    public function realizar(Request $request)
    {
      $id = $request->numero;
      $examen = Examenes::where('id', $id)->first();
      return view('realizar_examen')->with(['examen' => $examen]);
    }
}
