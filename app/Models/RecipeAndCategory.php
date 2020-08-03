<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeAndCategory extends Pivot
{
    protected $fillable = ['recipe_id', 'category_id'];
    protected $table = 'recipesAndCategories';
    public $timestamps = false;

}
