<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            FoodCategoriesSeeder::class,
            FoodsSeeder::class,
            IngestedSeeder::class,
            RefrigeratorSeeder::class,
            FoodRefrigeratorSeeder::class,
            RecipeCategoriesSeeder::class,
            RecipesSeeder::class,
            RecipesAndCategoriesSeeder::class,
            IngredientsSeeder::class,
            RecipesAndIngredientsSeeder::class,
            StepsSeeder::class
        ]);
    }
}
