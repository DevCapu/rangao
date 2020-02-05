<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlimentoRefeicao extends Model
{
    public $timestamps = false;
    protected $fillable = ['refeicao_id', 'alimento_id', 'quantidade'];
    protected $table = "refeicao_alimentos";

    public function alimento()
    {
        return $this->belongsTo(Alimento::class);
    }

    public function refeicao()
    {
        return $this->belongsTo(Refeicao::class);
    }


}
