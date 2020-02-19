<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;

class CategoriasController extends Controller
{
    public function listar(Request $request)
    {
      $id = $request->id;
      if ($id == '') {
        $categorias = Categorias::all();
      }else {
        $categorias = Categorias::where('id', $id)->first();
      }

      return ['categorias' => $categorias];
    }
    public function crear(Request $request)
    {
      $categoria = new Categorias();
      $categoria->nombre_categoria = $request->categoria;
      $categoria->save();
    }
}
