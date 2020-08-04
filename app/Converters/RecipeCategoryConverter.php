<?php

namespace App\Converters;

use App\Models\RecipeCategory;
use Illuminate\Support\Collection;

class RecipeCategoryConverter
{
    public static function stdClassToModel(Collection $objects): Collection
    {
        $categories = collect();
        foreach ($objects as $category) {
            $recipeCategory = new RecipeCategory();
            $recipeCategory->id = $category->id;
            $recipeCategory->name = $category->name;

            $categories->push($recipeCategory);
        }
        return $categories;
    }
}
