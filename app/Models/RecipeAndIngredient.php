<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeAndIngredient extends Pivot
{
    protected $fillable = ['recipe_id', 'ingredient_id', 'quantity', 'measure'];
    protected $table = 'recipesAndIngredients';
    public $timestamps = false;
}
