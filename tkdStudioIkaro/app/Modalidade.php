<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
  public function inscricaos()
  {
      return $this->hasMany('App\Inscricao');
  }
}
