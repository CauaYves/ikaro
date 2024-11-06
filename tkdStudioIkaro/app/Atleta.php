<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atleta extends Model
{
    public function inscricaos()
    {
        return $this->hasMany('App\Inscricao');
    }
}
