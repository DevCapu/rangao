<?php

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create(['name' => 'Leite']);
        Ingredient::create(['name' => 'Morango']);
        Ingredient::create(['name' => 'Espinfre']);
        Ingredient::create(['name' => 'Brócolis']);
        Ingredient::create(['name' => 'Alho']);
        Ingredient::create(['name' => 'Cebola Roxa']);
        Ingredient::create(['name' => 'Cebola']);
        Ingredient::create(['name' => 'Shimeji']);
        Ingredient::create(['name' => 'Feijão Preto']);
        Ingredient::create(['name' => 'Feijão']);
        Ingredient::create(['name' => 'Tofu']);
    }
}
