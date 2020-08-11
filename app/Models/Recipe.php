<?php

namespace App\Models;

use Cassandra\Exception\DivideByZeroException;
use DivisionByZeroError;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = ['name', 'description', 'calories', 'timeToPrepare', 'difficulty', 'validated', 'photo'];

    public function recipeCategories(): BelongsToMany
    {
        return $this->belongsToMany(RecipeCategory::class, 'recipesAndCategories', 'recipe_id', 'category_id')
            ->using(RecipeAndCategory::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipesAndIngredients', 'recipe_id', 'ingredient_id')
            ->using(RecipeAndIngredient::class)
            ->withPivot(['quantity', 'measure']);
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(RecipeRate::class);
    }

    public function getAvarageRate(): int
    {
        $ratesCount = $this->rates->count();
        if ($ratesCount > 0) {
            $ratesSum = $this->rates->reduce(static function ($sum, $actual) {
                return $sum + $actual->rate;
            }, 0);
            return (int)$ratesSum / $ratesCount;
        }
        return 0    ;
    }
}
