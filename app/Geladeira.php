<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geladeira extends Model
{
 protected $fillable = ['usuario_id','alimento_id', 'quantidade', 'validade', 'dias_notificacao'];
 protected $table = 'geladeiras';
 public $timestamps= false;

    public function alimento()
    {
        return $this->belongsTo(Alimento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
