<?php

use App\Models\RecipeCategory;
use Illuminate\Database\Seeder;

class RecipeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeCategory::create(['name' => 'Café da Manhã']);
        RecipeCategory::create(['name' => 'Vegetariano']);
        RecipeCategory::create(['name' => 'Vegano']);
        RecipeCategory::create(['name' => 'Almoço']);
        RecipeCategory::create(['name' => 'Jantar']);
        RecipeCategory::create(['name' => 'Low Carb']);
        RecipeCategory::create(['name' => 'Lanche']);
        RecipeCategory::create(['name' => 'Salada']);
        RecipeCategory::create(['name' => 'Sopa']);
        RecipeCategory::create(['name' => 'Sobremesa']);
        RecipeCategory::create(['name' => 'Rápido']);
    }
}
