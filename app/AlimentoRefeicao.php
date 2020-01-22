<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class AlimentoRefeicao extends Model
{
    public $timestamps = false;
    protected $fillable = ['id_refeicao', 'id_alimento', 'quantidade'];
    protected $table = "refeicao_alimentos";
}
