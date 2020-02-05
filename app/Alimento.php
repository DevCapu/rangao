<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $fillable = ['nome', 'calorias', 'medida'];
    public $timestamps = false;

    public function refeicoes()
    {
        return $this->hasMany(AlimentoRefeicao::class);
    }
}
