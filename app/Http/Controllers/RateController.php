<?php

namespace App\Http\Controllers;

use App\Models\RecipeRate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function store(Request $request)
    {
        $recipeRate = RecipeRate::updateOrCreate(
            ['user_id' => $request->userId, 'recipe_id' => $request->recipeId,],
            ['rate' => $request->rate]
        );

        return response()->json(['success' => 'success'], 201);
    }
}
