<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examenes extends Model
{
  protected $guarded = ['id'];

  public function categoriaExam()
  {
    return $this->belongsTo('App\Categorias');
  }
}
