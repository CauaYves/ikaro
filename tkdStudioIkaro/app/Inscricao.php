<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    public function modalidade()
    {
        return $this->belongsTo('App\Modalidade');
    }

    public function atleta()
    {
        return $this->belongsTo('App\Atleta');
    }
}
