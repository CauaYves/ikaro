<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrutor extends Model
{
  public function turmas()
  {
    return $this->hasMany('App\Turma');
  }
}
