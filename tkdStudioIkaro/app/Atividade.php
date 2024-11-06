<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
  public function valoratividades()
  {
    return $this->hasMany('App\Valoratividade');
  }
  public function descontoalunos()
  {
    return $this->hasMany('App\Descontoaluno');
  }

  public function turmas()
  {
    return $this->hasMany('App\Turma');
  }
}
