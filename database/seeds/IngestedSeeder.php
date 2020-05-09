<?php

use App\Models\Food;
use App\Models\Ingested;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class IngestedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingested::create([
            'food_id' => 1,
            'user_id' => 1,
            'quantity' => 4,
            'period' => 'BREAKFAST',
            'date' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
            'calories' => Food::find(1)->calories * 4
        ]);

        Ingested::create([
            'food_id' => 2,
            'user_id' => 1,
            'quantity' => 4,
            'period' => 'LUNCH',
            'date' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
            'calories' => Food::find(1)->calories * 4
        ]);

        Ingested::create([
            'food_id' => 6,
            'user_id' => 1,
            'quantity' => 4,
            'period' => 'BREAKFAST',
            'date' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
            'calories' => Food::find(1)->calories * 4
        ]);

        Ingested::create([
            'food_id' => 5,
            'user_id' => 1,
            'quantity' => 4,
            'period' => 'DINNER',
            'date' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
            'calories' => Food::find(1)->calories * 4
        ]);

        Ingested::create([
            'food_id' => 80,
            'user_id' => 1,
            'quantity' => 4,
            'period' => 'DINNER',
            'date' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
            'calories' => Food::find(1)->calories * 4
        ]);


        Ingested::create([
            'food_id' => 51,
            'user_id' => 1,
            'quantity' => 4,
            'period' => 'DINNER',
            'date' => Carbon::now('America/Sao_Paulo')->format('d/m/y'),
            'calories' => Food::find(1)->calories * 4
        ]);
    }
}
