<?php


namespace App\Models;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function refrigerators(): HasMany
    {
        return $this->hasMany(Refrigerator::class);
    }

    public function ingested(): HasMany
    {
        return $this->hasMany(Ingested::class);
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
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
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
