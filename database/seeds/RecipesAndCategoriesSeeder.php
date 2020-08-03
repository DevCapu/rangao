<?php

use App\Models\RecipeAndCategory;
use Illuminate\Database\Seeder;

class RecipesAndCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeAndCategory::create(['recipe_id' => 1, 'category_id' => 1]);
        RecipeAndCategory::create(['recipe_id' => 1, 'category_id' => 4]);
        RecipeAndCategory::create(['recipe_id' => 2, 'category_id' => 1]);
        RecipeAndCategory::create(['recipe_id' => 2, 'category_id' => 3]);
        RecipeAndCategory::create(['recipe_id' => 2, 'category_id' => 4]);
        RecipeAndCategory::create(['recipe_id' => 3, 'category_id' => 6]);
        RecipeAndCategory::create(['recipe_id' => 3, 'category_id' => 8]);
        RecipeAndCategory::create(['recipe_id' => 4, 'category_id' => 2]);
    }
}
