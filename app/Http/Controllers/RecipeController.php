<?php

namespace App\Http\Controllers;

use App\Converters\RecipeCategoryConverter;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    public function index()
    {
        $recipeCategories = DB::table('recipeCategories')
            ->join('recipesAndCategories', 'recipesAndCategories.category_id', '=', 'recipeCategories.id')
            ->join('recipes', 'recipes.id', '=', 'recipesAndCategories.recipe_id')
            ->select(['recipeCategories.name', 'recipeCategories.id'])
            ->groupBy('recipeCategories.name', 'recipeCategories.id')
            ->get();

        $categories = RecipeCategoryConverter::stdClassToModel($recipeCategories);

        return view('recipe.index', ['recipeCategories' => $categories]);
    }

    public function find(Request $request)
    {
        $categoryName = $request->category;

        $recipeCategory = RecipeCategory::where('name', $categoryName)->first();
        return $recipeCategory->recipes;
    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show', ['recipe' => $recipe, 'userId' => Auth::id()]);
    }
}
