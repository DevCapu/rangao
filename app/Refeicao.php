<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $fillable = ['refeicao', 'data'];
    public $timestamps = false;

    public function alimentos()
    {
        return $this->belongsToMany('App\Alimento');
    }
}
