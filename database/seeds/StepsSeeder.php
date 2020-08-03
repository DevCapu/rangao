<?php

use App\Models\Step;
use Illuminate\Database\Seeder;

class StepsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Step::create([
            'recipe_id' => 1,
            'description' => "Refogar o shimeji",
            'videoUrl' => ''
        ]);

        Step::create([
            'recipe_id' => 1,
            'description' => "Fazer mais um milhão de coisas",
            'videoUrl' => ''
        ]);

        Step::create([
            'recipe_id' => 1,
            'description' => "Fazer mais um trilhão de coisas",
            'videoUrl' => ''
        ]);

        Step::create([
            'recipe_id' => 1,
            'description' => "Servir",
            'videoUrl' => ''
        ]);

    }
}
