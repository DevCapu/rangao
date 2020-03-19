<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    protected $fillable = ['nome', 'calorias', 'medida'];
    public $timestamps = false;

    public function ingeridos()
    {
        return $this->hasMany(Ingerido::class);
    }

    public function geladeira()
    {
        return $this->hasMany(Geladeira::class);
    }
}
