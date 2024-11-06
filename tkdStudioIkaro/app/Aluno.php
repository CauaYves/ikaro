<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
  protected $fillable = [
      'name'
  ];

  public function descontoalunos()
  {
    return $this->hasMany('App\Descontoaluno');
  }

  public function alunosturma()
  {
    return $this->hasMany('App\Alunosturma');
  }

  public function contasrecebers()
  {
    return $this->hasMany('App\Contasreceber');
  }
}
