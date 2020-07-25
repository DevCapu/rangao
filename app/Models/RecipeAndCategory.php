<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeAndCategory extends Pivot
{
    protected $table = 'recipeAndCategory';

}
