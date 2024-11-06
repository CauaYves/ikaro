<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
  public function instrutor()
  {
    return $this->belongsTo('App\Instrutor');
  }

  public function atividade()
  {
    return $this->belongsTo('App\Atividade');
  }

  public function horariosturmas()
  {
    return $this->hasmany('App\Horariosturma');
  }

  public function alunosturma()
  {
    return $this->hasMany('App\Alunosturma');
  }
}
