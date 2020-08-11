<?php

use App\Models\RecipeAndIngredient;
use Illuminate\Database\Seeder;

class RecipesAndIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeAndIngredient::create([
            'recipe_id' => 1,
            'ingredient_id' => 6,
            'quantity' => 6,
            'measure' => 'dentes'
        ]);
        RecipeAndIngredient::create([
            'recipe_id' => 1,
            'ingredient_id' => 8,
            'quantity' => 2,
            'measure' => 'cabeças'
        ]);
        RecipeAndIngredient::create([
            'recipe_id' => 1,
            'ingredient_id' => 9,
            'quantity' => 150,
            'measure' => 'gr'
        ]);
        RecipeAndIngredient::create([
            'recipe_id' => 1,
            'ingredient_id' => 10,
            'quantity' => 150,
            'measure' => 'gr'
        ]);
    }
}
