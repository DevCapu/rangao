<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'nascimento',
        'sexo',
        'objetivo',
        'gastoDeEnergiaBasal',
        'gastoDeEnergiaTotal',
        'caloriasParaConseguirObjetivo',
        'altura',
        'peso',
        'foto',
        'atividade'
    ];

    protected $hidden = ['senha'];

}
