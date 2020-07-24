<?php

namespace App\Http\Controllers;

class RecipeController extends Controller
{
    public function index()
    {

        return view('recipe.index');
    }
}
