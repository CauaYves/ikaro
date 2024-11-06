<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunosturma extends Model
{
  public function turma()
  {
    return $this->belongsTo('App\Turma');
  }

  public function aluno()
  {
    return $this->belongsTo('App\Aluno');
  }
}
