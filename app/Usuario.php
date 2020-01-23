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
        'gastoEnergeticoBasal',
        'gastoEnergeticoTotal',
        'caloriasParaConseguirObjetivo',
        'altura',
        'peso',
        'foto',
        'atividade'
    ];

    protected $hidden = ['senha'];

}
