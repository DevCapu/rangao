<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $table = 'refeicoes';
    protected $fillable = ['periodo', 'data'];
    public $timestamps = false;

    public function alimentos()
    {
        return $this->belongsToMany('App\Alimento');
    }
}
