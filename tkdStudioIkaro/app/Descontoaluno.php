<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descontoaluno extends Model
{
  protected $fillable = [
      'aluno_id', 'atividade_id', 'valor'
  ];

  public function aluno()
  {
    return $this->belongsTo('App\Aluno');
  }
  public function atividade()
  {
    return $this->belongsTo('App\Atividade');
  }
}
