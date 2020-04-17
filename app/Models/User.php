<?php


namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model implements Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'gender',
        'basalEnergyExpenditure',
        'totalEnergyExpenditure',
        'caloriesToCommitObjective',
        'height',
        'weight',
        'photo',
        'activity'
    ];

    public function refrigerator(): HasOne
    {
        return $this->hasOne(Refrigerator::class);
    }

    public function ingested(): HasMany
    {
        return $this->hasMany(Ingested::class);
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
