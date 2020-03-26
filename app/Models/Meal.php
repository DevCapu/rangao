<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meal extends Model
{
    protected $fillable = ['period', 'date', 'user_id'];

    public function ingested(): HasMany
    {
        return $this->hasMany(Ingested::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
