<?php

namespace App\Http\Controllers;

use App\Models\RecipeCategory;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $recipeCategories = (RecipeCategory::all()->sortBy('name'))->filter(function ($category) {
            return count($category->recipes) > 0;
        });

        return view ('recipe.index', ['recipeCategories' => $recipeCategories]);
    }

    public function find(Request $request)
    {
        $categoryName = $request->category;

        $recipeCategory = RecipeCategory::where('name', $categoryName)->first();
        return $recipeCategory->recipes;
    }
}
