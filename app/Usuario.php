<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'nascimento',
        'sexo',
        'objetivo',
        'gastoEnergeticoBasal',
        'gastoEnergeticoTotal',
        'caloriasParaConseguirObjetivo',
        'altura',
        'peso',
        'foto',
        'atividade'
    ];

    protected $hidden = ['senha'];

    public function refeicoes()
    {
        return $this->hasMany(Refeicao::class);
    }

    /**
     * @inheritDoc
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @inheritDoc
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * @inheritDoc
     */
    public function getRememberToken()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * @inheritDoc
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
