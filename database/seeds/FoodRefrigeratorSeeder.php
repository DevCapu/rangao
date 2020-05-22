<?php

use App\Models\FoodRefrigerator;
use Illuminate\Database\Seeder;

class FoodRefrigeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodRefrigerator::create([
            'food_id' => 2,
            'refrigerator_id' => 1,
            'quantity' => 3,
            'expiration_date' => '2020-08-15',
            'notification' => 3
        ]);
    }
}
