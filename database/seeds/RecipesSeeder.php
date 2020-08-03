<?php

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recipe::create([
            'name' => 'Feijoada vegana',
            'description' => 'Saudades de comer uma feijoada deliciosa, essa é uma ótima alternativa!',
            'calories' => 500,
            'timeToPrepare' => 90,
            'difficulty' => 'FÁCIL',
            'validated' => false,
            'photo' => 'https://octoshop.sfo2.digitaloceanspaces.com/lojas/padellasaobenedito/uploads_produto/feijoada-vegana-5da0b2071d40f.jpg'
        ]);

        Recipe::create([
            'name' => 'Omelete c/ Bacon',
            'description' => 'Tipico café da manhã americano',
            'calories' => 260,
            'timeToPrepare' => 10,
            'difficulty' => 'FÁCIL',
            'validated' => 0,
            'photo' => 'https://receitinhas.s3-sa-east-1.amazonaws.com/wp-content/uploads/2017/07/iStock-507401332-848x477.jpg'
        ]);

        Recipe::create([
            'name' => 'Sopa de brócolis',
            'description' => 'Noite fria, comida quente',
            'calories' =>  100,
            'timeToPrepare' => 30,
            'difficulty' => 'FÁCIL',
            'validated' => 1,
            'photo' => 'https://t1.rg.ltmcdn.com/pt/images/7/8/8/img_sopa_de_brocolis_para_bebe_5887_orig.jpg'
      ]);

        Recipe::create([
            'name' => 'Shake de Morango',
            'description' => 'Bob\'s?',
            'calories' => 120,
            'timeToPrepare' => 25,
            'difficulty' => 'FÁCIL',
            'validated' => 0,
            'photo' => 'https://padeiroseconfeiteiros.com/wp-content/uploads/2019/09/SHAKE-COM-MORANGO.jpg'
      ]);
    }
}
