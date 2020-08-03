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
        $recipeCategories = (RecipeCategory::all()->sortBy('name'))->filter(function ($category) {
            return count($category->recipes) > 0;
        });

        return view('recipe.index', ['recipeCategories' => $recipeCategories]);
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
