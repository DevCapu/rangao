<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeRate extends Model
{
    protected $fillable = ['user_id', 'recipe_id', 'rate'];
    protected $table = 'recipesRates';

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
