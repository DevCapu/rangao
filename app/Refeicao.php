<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = 'refeicoes';
    protected $fillable = ['periodo', 'data', 'usuario_id'];
    public $timestamps = false;


    public function ingeridos()
    {
        return $this->hasMany(Ingerido::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
