<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoratividade extends Model
{
  public function atividade()
  {
    return $this->belongsTo('App\Atividade');
  }
}
