<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = ['name', 'description', 'calories', 'timeToPrepare', 'difficulty', 'validated', 'photo'];
    public $timestamps = true;

    public function recipeCategory(): BelongsToMany
    {
        return $this->belongsToMany(RecipeCategory::class, 'recipesAndCategories', 'recipe_id', 'category_id')
            ->using(RecipeAndCategory::class);
    }

    public function ingridients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }
}
