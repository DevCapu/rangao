<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingerido extends Model
{
    public $timestamps = false;
    protected $fillable = ['refeicao_id', 'alimento_id', 'quantidade'];
    protected $table = "ingeridos";

    public function alimento()
    {
        return $this->belongsTo(Alimento::class);
    }

    public function refeicao()
    {
        return $this->belongsTo(Refeicao::class);
    }


}
