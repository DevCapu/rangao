<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
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
}
