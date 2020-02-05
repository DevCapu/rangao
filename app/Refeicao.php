<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = 'refeicoes';
    protected $fillable = ['periodo', 'data', 'usuario_id'];
    public $timestamps = false;


    public function alimentosRefeicao()
    {
        return $this->hasMany(AlimentoRefeicao::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
