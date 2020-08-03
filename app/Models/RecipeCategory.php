<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RecipeCategory extends Model
{
    protected $fillable=['name'];
    protected $table = 'recipeCategories';

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipesAndCategories',  'category_id','recipe_id')
            ->using(RecipeAndCategory::class);
    }
}
