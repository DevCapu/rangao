<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index()
    {
        $categories = RecipeCategory::select('recipeCategories.id', 'recipeCategories.name')
            ->join('recipesAndCategories', 'recipesAndCategories.category_id', '=', 'recipeCategories.id')
            ->join('recipes', 'recipes.id', '=', 'recipesAndCategories.recipe_id')
            ->groupBy('recipeCategories.name', 'recipeCategories.id')
            ->get();

        return view('recipe.index', ['recipeCategories' => $categories]);
    }

    public function find(Request $request)
    {
        $categoryName = $request->category;

        return RecipeCategory::where('name', $categoryName)->first()->recipes;
    }

    public function show(Recipe $recipe)
    {
        return view('recipe.show', ['recipe' => $recipe, 'userId' => Auth::id()]);
    }
}
