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
            UsuarioTableSeeder::class,
            AlimentoTableSeeder::class,
            UserSeeder::class,
            FoodCategoriesSeeder::class,
            FoodsSeeder::class,
            IngestedSeeder::class,
            RefrigeratorSeeder::class,
            FoodRefrigeratorSeeder::class
        ]);
    }
}
